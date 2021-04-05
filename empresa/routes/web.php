<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login',[UsuarioController::class,'login'])->name('login');
Route::post('/login',[UsuarioController::class,'verificarCredenciales'])->name('login.form');
Route::get('/cerrarSesion',[UsuarioController::class,'cerrarSesion'])->name('cerrar.sesion');
Route::get('/cerrarSesion',[AdminController::class,'cerrarSesion'])->name('cerrar.sesion.admin');
Route::get('/registro',[UsuarioController::class,'registro'])->name('registro');
Route::post('/registro',[UsuarioController::class,'registroForm'])->name('registro.form');

Route::prefix('/usuario')->middleware("VerificarUsuario")->group(function (){
    Route::get('/inicio', [UsuarioController::class,'inicio'])->name('usuario.inicio');
    Route::get('/respuesta/{aciertos?}', [UsuarioController::class,'respuesta'])->name('usuario.test');
});
Route::prefix('/usario')->middleware("VerificarAdmin")->group(function (){
    Route::get('/inicio', [AdminController::class,'inicio'])->name('admin.inicio');
    Route::get('/Descarga', [AdminController::class,'descargar'])->name('admin.descarga');
});
