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
	Route::any('publicaciones-docentes', [PublicacionController::class, 'publicacionesDocentes'])->name('publicacion/publicaciones-docentes');
	Route::any('publicaciones-por-revisar', [PublicacionController::class, 'publicacionesPorRevisarEvaluadores'])->name('publicacion/publicaciones-por-revisar');
	Route::any('crear', [PublicacionController::class, 'guardar'])->name('publicacion/crear');
	Route::any('detalle/{id}', [PublicacionController::class, 'detalle'])->name('publicacion/detalle');
	Route::any('editar/{id}', [PublicacionController::class, 'guardar'])->name('publicacion/editar');
	Route::post('rechazar', [PublicacionController::class, 'rechazar'])->name('publicacion/rechazar');
	Route::post('aprobar', [PublicacionController::class, 'aprobar'])->name('publicacion/aprobar');
	Route::post('enviar-evaluadores', [PublicacionController::class, 'enviarEvaluadores'])->name('publicacion/enviar-evaluadores');
	Route::post('anular', [PublicacionController::class, 'anular'])->name('publicacion/anular');
	Route::post('enviar-evaluadores-varias', [PublicacionController::class, 'enviarEvaluadoresVarias'])->name('publicacion/enviar-evaluadores-varias');
	Route::any('calificar/{id}', [PublicacionController::class, 'calificar'])->name('publicacion/calificar');
});
