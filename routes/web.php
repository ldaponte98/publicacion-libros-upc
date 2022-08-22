<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PublicacionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('sitio.login'); });
Route::any('panel', function () { return view('sitio.panel'); })->name('panel');

Route::group(['prefix' => 'usuario'], function () {
	Route::post('validarLogin', [UsuarioController::class, 'validarLogin']);
	Route::any('cerrarSesion', [UsuarioController::class, 'cerrarSesion'])->name('usuario/cerrarSesion');
});

Route::group(['prefix' => 'publicacion'], function () {
	Route::any('mis-publicaciones', [PublicacionController::class, 'misPublicaciones'])->name('publicacion/mis-publicaciones');
	Route::any('crear', [PublicacionController::class, 'crear'])->name('publicacion/crear');
});
