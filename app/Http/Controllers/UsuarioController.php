<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

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
}