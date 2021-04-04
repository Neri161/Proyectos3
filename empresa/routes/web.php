<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

