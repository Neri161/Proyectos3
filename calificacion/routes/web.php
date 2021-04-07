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
Route::get('/registro',[UsuarioController::class,'registro'])->name('registro');
Route::post('/registro',[UsuarioController::class,'registroForm'])->name('registro.form');

Route::prefix('/admin')->middleware("VerificarControl")->group(function (){
    Route::get('/inicio', [AdminController::class,'inicio'])->name('admin.inicio');
    Route::get('/calificaciones/{id?}', [AdminController::class,'calificacion'])->name('admin.cal');
    Route::get('/alumnos', [AdminController::class,'alumnos'])->name('admin.alumnos');
    Route::get('/graficas', [AdminController::class,'graficas'])->name('admin.graficas');
    Route::get('/consulta/{id?}', [AdminController::class,'consulta'])->name('admin.cons');
    Route::get('/materia/{nombre?}', [AdminController::class,'materia'])->name('admin.mat');
    Route::post('/materia/{nombre?}', [AdminController::class,'registroalumnos'])->name('alumno.registro.form');
    Route::post('/cali/{id?}/{idm?}', [AdminController::class,'cali'])->name('alumno.cali.form');
});

Route::prefix('/usuario')->middleware("VerificarUsuario")->group(function (){
    Route::get('/inicio', [UsuarioController::class,'inicio'])->name('usuario.inicio');
    Route::get('/pdf', [UsuarioController::class,'descargar'])->name('usuario.pdf');

});
