<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Tercero;

class UsuarioController extends Controller
{
    public function validarLogin(Request $request)
    {
        $post = $request->all();
        if ($post) {
            $post    = (object) $post;
            $usuario = Usuario::where('usuario', $post->usuario)
                ->where('estado', 1)
                ->first();

            if ($usuario) {
                $clave = md5($post->clave);
                if (trim($usuario->clave) == trim($clave)) {
                    //aca el tercero existe pero hay que mirar el estado
                    if ($usuario->estado == 0) {
                        return back()->withErrors(['error' => 'Acceso denegado']);
                    }
                    session([
                        'id_usuario'         => $usuario->id,
                        'id_tercero_usuario' => $usuario->tercero->id,
                        'id_perfil'          => $usuario->perfil_id,
                        'nombre_usuario'     => $usuario->usuario,
                    ]);
                    return redirect()->route('panel');
                }
                return back()->withErrors(['error' => 'Credenciales invalidas']);
            } else {
                return back()->withErrors(['error' => 'Credenciales invalidas']);
            }
        }
    }

    public function cerrarSesion(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    public function listar()
    {
        $usuarios = Usuario::all();
        return view('usuario.listado', compact(['usuarios']));
        
    }

    public function ver($id)
    {
        $usuario = Usuario::find($id);
        $readonly = true;
        if($usuario == null) { echo "Acceso denegado"; die; }
        return view('usuario.formulario', compact(['usuario', 'readonly']));
    }

    public function form(Request $request, $id = null)
    {
        $readonly = false;
        $post = $request->all();
        $usuario = new Usuario;
        $usuario->estado = 1;
        $usuario->tercero = new Tercero;
        $clave_original=null;
        if($id != null){
            $usuario = Usuario::find($id);
            if($usuario == null) { echo "Acceso denegado"; die; }
            $clave_original = $usuario->clave;
        }
        if($post){
            $post = (object) $post;
            $usuario = new Usuario;
            if($id != null) $usuario = Usuario::find($id);
            $usuario->fill($request->all());
            $tercero = $usuario->tercero;
            if($tercero == null) $tercero = new Tercero;
            $tercero->identificacion = $post->tercero_identificacion;
            $tercero->nombres = $post->tercero_nombres;
            $tercero->apellidos = $post->tercero_apellidos;
            $tercero->email = $post->tercero_email;
            $tercero->save();
            $usuario->tercero_id = $tercero->id;
            if($post->clave != $clave_original){
                $clave = md5($post->clave);
                $usuario->clave = $clave;
            }
            if(!$usuario->save()){
                echo "Ocurrio el siguiente inconveniente: ";
                dd($usuario->errors);
            }
            return redirect()->route('usuario/listar');
        }
        return view('usuario.formulario', compact(['usuario', 'readonly']));
    }
}