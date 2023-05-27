<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\PublicacionCalificacion;
use App\Models\PublicacionPersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PublicacionController extends Controller
{
    public function misPublicaciones()
    {
        $publicaciones = Publicacion::all()->where('tercero_id', session('id_tercero_usuario'));
        return view('publicaciones.mis-publicaciones', compact(['publicaciones']));
    }

    public function publicacionesDocentes()
    {
        $publicaciones = Publicacion::all()->where('estado', '!=', "ANULADA");
        return view('publicaciones.publicaciones-docentes', compact(['publicaciones']));
    }

    public function publicacionesPorRevisarEvaluadores()
    {
        $publicaciones = Publicacion::all()->whereIn('estado', 
            ["APROBADA - EN REVISION POR EVALUADORES", "APROBADA", "RECHAZADA POR EVALUADORES"]
        );
        return view('publicaciones.publicaciones-por-revisar-evaluadores', compact(['publicaciones']));
    }

    public function guardar(Request $request, $id = null)
    {
        $post = $request->all();
        $errores = [];
        $publicacion = new Publicacion;
        if($id != null) $publicacion = Publicacion::find($id);
        if($post){
            $post = (object) $post;
            $publicacion->fill($request->except(['_token', 'archivo_obra_pdf', 'archivo_obra_word', 'archivo_firma']));
            $publicacion->tercero_id = session('id_tercero_usuario');
            $publicacion->estado = "ENVIADA A COMITE EDITORIAL";
            if ($publicacion->save()) {

                if($post->coautores != null){
                    $coautores = json_decode($post->coautores);
                    DB::delete("DELETE FROM publicacion_persona WHERE tipo = 'COAUTOR' AND publicacion_id = " . $publicacion->id);
                    foreach ($coautores as $item) {
                        $item = (array) $item;
                        $coautor = new PublicacionPersona();
                        $coautor->fill($item);
                        $coautor->publicacion_id = $publicacion->id;
                        $coautor->tipo = "COAUTOR";
                        $coautor->save();
                    }
                }

                if($post->colaboradores != null){
                    $colaboradores = json_decode($post->colaboradores);
                    DB::delete("DELETE FROM publicacion_persona WHERE tipo = 'COLABORADOR' AND publicacion_id = " . $publicacion->id);
                    foreach ($colaboradores as $item) {
                        $item = (array) $item;
                        $colaborador = new PublicacionPersona();
                        $colaborador->fill($item);
                        $colaborador->publicacion_id = $publicacion->id;
                        $colaborador->tipo = "COLABORADOR";
                        $colaborador->save();
                    }
                }

                $archivo_pdf  = $request->file('archivo_obra_pdf');
                if ($archivo_pdf) {
                    $ruta           = '/archivos/pdf';
                    $extension      = explode('.', $archivo_pdf->getClientOriginalName())[1];
                    $nombre_archivo = rand(10000, 99999) . "-" . date('Y-m-d-H-i-s') . "." . $extension;
                    Storage::disk('public')->put($ruta . "/" . $nombre_archivo, \File::get($archivo_pdf));
                    $publicacion->archivo_pdf = $nombre_archivo;
                }

                $archivo_word  = $request->file('archivo_obra_word');
                if ($archivo_word) {
                    $ruta           = '/archivos/word';
                    $extension      = explode('.', $archivo_word->getClientOriginalName())[1];
                    $nombre_archivo = rand(10000, 99999) . "-" . date('Y-m-d-H-i-s') . "." . $extension;
                    Storage::disk('public')->put($ruta . "/" . $nombre_archivo, \File::get($archivo_word));
                    $publicacion->archivo_word = $nombre_archivo;
                }

                $archivo_firma  = $request->file('archivo_firma');
                if ($archivo_firma) {
                    $ruta           = '/archivos/firmas-digitales';
                    $extension      = explode('.', $archivo_firma->getClientOriginalName())[1];
                    $nombre_archivo = rand(10000, 99999) . "-" . date('Y-m-d-H-i-s') . "." . $extension;
                    Storage::disk('public')->put($ruta . "/" . $nombre_archivo, \File::get($archivo_firma));
                    $publicacion->archivo_firma = $nombre_archivo;
                }

                $publicacion->save();
                return redirect()->route('publicacion/detalle', $publicacion->id);
            } else {
                $errores = $publicacion->errors;
            }        
        }
        $data = (object)[
            'publicacion' => $publicacion, 
            'errores' => $errores,
            'readonly' => false,
            'aprobar_rechazar' => false,
            'permiso_enviar_evaluadores' => false,
            'permiso_calificar' => false
        ];
        return view('publicaciones.formulario', compact(['data']));
    }

    public function detalle($id)
    {
        $publicacion = Publicacion::find($id);
        $data = (object)[
            'publicacion' => $publicacion, 
            'readonly' => true,
            'aprobar_rechazar' => $publicacion->estado == "ENVIADA A COMITE EDITORIAL" and session('id_perfil') == 1,
            'permiso_enviar_evaluadores' => $publicacion->estado == "APROBADA - SIN ENVIO A EVALUADORES" and session('id_perfil') == 1,
            'permiso_calificar' => $publicacion->estado == "APROBADA - EN REVISION POR EVALUADORES" and session('id_perfil') == 3
        ];
        return view('publicaciones.formulario', compact(['data']));
    }

    public function rechazar(Request $request)
    {
        $error = true;
        $mensaje = "";
        $post = $request->all();
        if($post){
            $post = (object) $post;
            $id = $post->id;
            $publicacion = Publicacion::find($id);
            if($publicacion){
                $publicacion->estado = "RECHAZADA POR COMITE EDITORIAL";
                $publicacion->observaciones_rechazo_comite = $post->causas;
                $publicacion->id_usuario_rechaza_comite = session('id_usuario');
                $publicacion->save();
                $error = false;
                $mensaje = "Rechazo reportado exitosamente";
            }else{
                $mensaje = "Error, la publicación no existe";
            }
        }else{
            $mensaje = "Error en la información enviada";
        }

        return response()->json([
            'error' => $error,
            'mensaje' => $mensaje
        ]);
    }

    public function aprobar(Request $request)
    {
        $error = true;
        $mensaje = "";
        $post = $request->all();
        if($post){
            $post = (object) $post;
            $id = $post->id;
            $publicacion = Publicacion::find($id);
            if($publicacion){
                $publicacion->estado = "APROBADA - SIN ENVIO A EVALUADORES";
                $publicacion->id_usuario_aprueba_comite = session('id_usuario');
                $publicacion->save();
                $error = false;
                $mensaje = "Aprobación realizada exitosamente";
            }else{
                $mensaje = "Error, la publicación no existe";
            }
        }else{
            $mensaje = "Error en la información enviada";
        }

        return response()->json([
            'error' => $error,
            'mensaje' => $mensaje
        ]);
    }

    public function enviarEvaluadores(Request $request)
    {
        $error = true;
        $mensaje = "";
        $post = $request->all();
        if($post){
            $post = (object) $post;
            $id = $post->id;
            $publicacion = Publicacion::find($id);
            if($publicacion){
                $publicacion->estado = "APROBADA - EN REVISION POR EVALUADORES";
                $publicacion->save();
                $publicacion->fecha_envio_evaluador = date('Y-m-d H:i:s');
                $error = false;
                $mensaje = "Publicación enviada a evaluadores exitosamente";
            }else{
                $mensaje = "Error, la publicación no existe";
            }
        }else{
            $mensaje = "Error en la información enviada";
        }

        return response()->json([
            'error' => $error,
            'mensaje' => $mensaje
        ]);
    }

    public function anular(Request $request)
    {
        $error = true;
        $mensaje = "";
        $post = $request->all();
        if($post){
            $post = (object) $post;
            $id = $post->id;
            $publicacion = Publicacion::find($id);
            if($publicacion){
                $publicacion->estado = "ANULADA";
                $publicacion->save();
                $error = false;
                $mensaje = "Publicación anulada exitosamente";
            }else{
                $mensaje = "Error, la publicación no existe";
            }
        }else{
            $mensaje = "Error en la información enviada";
        }

        return response()->json([
            'error' => $error,
            'mensaje' => $mensaje
        ]);
    }

    public function enviarEvaluadoresVarias(Request $request)
    {
        $error = true;
        $mensaje = "";
        $post = $request->all();
        if($post){
            $post = (object) $post;
            foreach ($post->lista as $id) {
                $publicacion = Publicacion::find($id);
                if($publicacion){
                    $publicacion->estado = "APROBADA - EN REVISION POR EVALUADORES";
                    $publicacion->fecha_envio_evaluador = date('Y-m-d H:i:s');
                    $publicacion->save();
                }
            }
            $error = false;
             $mensaje = "Publicaciónes enviadas a evaluadores exitosamente";            
        }else{
            $mensaje = "Error en la información enviada";
        }

        return response()->json([
            'error' => $error,
            'mensaje' => $mensaje
        ]);
    }

    public function calificar(Request $request, $id = null)
    {
        $post = $request->all();
        $errores = [];
        $readonly = false;
        $errores = [];
        $calificacion = new PublicacionCalificacion();
        $calificacion->estado_evaluacion_final = "No registrada";
        if($id != null) $publicacion = Publicacion::find($id);
        if($publicacion == null) { echo "Acceso denegado"; die;}
        
        $busqueda = PublicacionCalificacion::where('publicacion_id', $id)->first();
        if($busqueda != null){
            $readonly = true;
            $calificacion = $busqueda;
        }else{
            if($post){
                $post = (object) $post;  
                $calificacion->fill($request->except(['_token', 'archivo_firma']));
                $calificacion->publicacion_id = $id;
                $calificacion->tercero_id = session('id_tercero_usuario');
                if ($calificacion->save()) {
                    $publicacion->estado = $post->estado_evaluacion_final;
                    if($publicacion->estado == "APROBADA"){
                        $publicacion->id_usuario_aprueba_parents = session("id_usuario");
                    }else{
                        $publicacion->id_usuario_rechaza_parents =  session("id_usuario");
                        $publicacion->observaciones_rechazo_parents = $post->observaciones;
                    }
                    $archivo_firma  = $request->file('archivo_firma');
                    if ($archivo_firma) {
                        $ruta           = '/archivos/firmas-digitales';
                        $extension      = explode('.', $archivo_firma->getClientOriginalName())[1];
                        $nombre_archivo = rand(10000, 99999) . "-" . date('Y-m-d-H-i-s') . "." . $extension;
                        Storage::disk('public')->put($ruta . "/" . $nombre_archivo, \File::get($archivo_firma));
                        $calificacion->archivo_firma = $nombre_archivo;
                    }
                    $publicacion->save();
                    $calificacion->save();
                    $readonly = true;
                } else {
                    $errores = $calificacion->errors;
                } 
            }
        }
        
        $data = (object)[
            'publicacion' => $publicacion,
            'calificacion' => $calificacion,
            'readonly' => $readonly,
            'errores' => $errores
        ];
        return view('calificaciones.formulario', compact(['data']));
    }
}
