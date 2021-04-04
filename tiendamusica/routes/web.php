<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;


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
    return redirect()->route('bienvenida');
});
Route::get('/bienvenida',[UsuarioController::class,'bienvenida'])->name('bienvenida');
Route::get('/bienvenida',[UsuarioController::class,'bienvenida'])->name('bienvenida');
Route::get('/login',[UsuarioController::class,'login'])->name('login');
Route::post('/login',[UsuarioController::class,'verificarCredenciales'])->name('login.form');
Route::get('/cerrarSesion',[UsuarioController::class,'cerrarSesion'])->name('cerrar.sesion');
Route::get('/registro',[UsuarioController::class,'registro'])->name('registro');
Route::post('/registro',[UsuarioController::class,'registroForm'])->name('registro.form');

Route::prefix('/usuario')->middleware("VerificarUsuario")->group(function (){
    Route::get('/inicio', [UsuarioController::class,'inicio'])->name('usuario.inicio');
    Route::get('/perfil', [UsuarioController::class,'perfil'])->name('usuario.perfil');
    Route::get('/Datos', [UsuarioController::class,'datos'])->name('usuario.datos');
    Route::post('/direccion/{idUsuario?}',[UsuarioController::class,'direccion'])->name('direccion.form');
    Route::post('/tarjeta/{idUsuario?}',[UsuarioController::class,'tarjeta'])->name('tarjeta.form');
    Route::get('/envio/{idDireccion?}/{idProducto?}',[UsuarioController::class,'envio'])->name('usario.envio');
    Route::get('/carrito/{idDireccion?}',[UsuarioController::class,'carrito'])->name('usuario.carrito');

});

Route::prefix('/Admin')->middleware("VerificarAdmin")->group(function (){
    Route::get('/inicio', [AdminController::class,'inicio'])->name('admin.inicio');
    Route::get('/RegistroP', [AdminController::class,'registroProveedor'])->name('admin.proveedor');
    Route::post('/RegistroProveedor', [AdminController::class,'verificarProveedor'])->name('admin.form');
    Route::get('/RegistroA', [AdminController::class,'registroArtista'])->name('admin.artista');
    Route::post('/RegistroArtista', [AdminController::class,'verificarArtista'])->name('admin.form.artista');
    Route::get('/RegistroC', [AdminController::class,'registroCategoria'])->name('admin.categoria');
    Route::post('/RegistroCategoria', [AdminController::class,'verificarCategoria'])->name('admin.form.categoria');
});
Route::prefix('/proveedor')->middleware("VerificarProveedor")->group(function (){
    Route::get('/inicio', [ProveedorController::class,'inicio'])->name('proveedor.inicio');
    Route::get('/RegistroP', [ProveedorController::class,'registroProducto'])->name('registroProducto');
    Route::get('/pedidos', [ProveedorController::class,'pedidos'])->name('pedidos');
    Route::post('/RegistroProducto', [ProveedorController::class,'registrarProducto'])->name('proveedor.form.producto');
    Route::post('/envio',[ProveedorController::class,'envio'])->name('pedidos.form.producto');
});
