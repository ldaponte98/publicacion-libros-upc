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
        $padre = Dominio::find($id);
        $readonly = true;
        if($padre == null) { echo "Acceso denegado"; die; }
        return view('dominio.formulario', compact(['padre', 'readonly']));
    }

    public function form(Request $request, $id = null)
    {
        $readonly = false;
        $post = $request->all();
        $padre = Dominio::find($id);
        if($padre == null) { echo "Acceso denegado"; die; }
        $hijos = Dominio::all()->where('padre_id', $id);
        return view('dominio.formulario', compact(['padre', 'hijos', 'readonly']));
    }
}