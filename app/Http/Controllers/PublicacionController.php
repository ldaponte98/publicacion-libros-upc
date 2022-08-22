<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function misPublicaciones()
    {
        return view('publicaciones.mis-publicaciones');
    }

    public function crear(Request $request)
    {
        return view('publicaciones.formulario');
    }
}
