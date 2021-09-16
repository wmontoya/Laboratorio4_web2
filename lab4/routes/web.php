<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ControladorProductos;
use App\Http\Controllers\ControladorInicioSesion;
use App\Http\Controllers\HomeController;
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

Auth::routes();

//  Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/inicio', function () {
    return view('plantillas.inicio_sesion');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('insertar',[ControladorProductos::class,'insertar_producto']);

Route::get('/',[ControladorProductos::class,'mostrar_productos'])->middleware('auth');

Route::get('mostrar',[ControladorProductos::class,'mostrar_productos_ajax']);

Route::post('iniciar_sesion',[ControladorInicioSesion::class,'iniciar_sesion'])->name('IniciarSesion');

Route::post('cerrar_session',[ControladorInicioSesion::class,'cerrar_session'])->name('salir');