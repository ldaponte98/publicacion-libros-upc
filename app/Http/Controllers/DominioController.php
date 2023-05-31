<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dominio;

class DominioController extends Controller
{

    public function listar()
    {
        $variables = Dominio::all()->where('padre_id', null);
        return view('dominio.listado', compact(['variables']));
        
    }

    public function ver($id)
    {
        $dominio = Dominio::find($id);
        $readonly = true;
        if($dominio == null) { echo "Acceso denegado"; die; }
        return view('dominio.formulario', compact(['dominio', 'readonly']));
    }

    public function variables($id = null)
    {
        $readonly = false;
        $padre = Dominio::find($id);
        if($padre == null) { echo "Acceso denegado"; die; }
        $hijos = Dominio::all()->where('padre_id', $id);
        return view('dominio.variables', compact(['padre', 'hijos', 'readonly']));
    }

    public function form(Request $request, $id_padre, $id = null)
    {
        $readonly = false;
        $post = $request->all();
        $dominio = new Dominio;
        $dominio->estado = 1;
        $dominio->padre_id = $id_padre;
        if($id != null){
            $dominio = Dominio::find($id);
            if($dominio == null) { echo "Acceso denegado"; die; }
        }
        if($post){
            $post = (object) $post;
            $dominio = new Dominio;
            if($id != null) $dominio = Dominio::find($id);
            $dominio->fill($request->all());
            $dominio->padre_id = $id_padre;
            if(!$dominio->save()){
                echo "Ocurrio el siguiente inconveniente: <br>";
                dd($usuario->errors);
            }
            return redirect()->route('dominio/variables', $id_padre);
        }
        return view('dominio.formulario', compact(['dominio', 'readonly']));
    }
}