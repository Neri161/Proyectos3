<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Artista;
use Illuminate\Support\Facades\Storage;

class ProveedorController extends Controller
{
    public function inicio(){
        return view('inicioProveedor');
    }
    public function registroProducto(){
        $productos=Producto::where("Proveedor",session('proveedor')->id_Proveedor)->get();
        $artista=Artista::get();
        $categoria=Categoria::get();
        foreach($productos as $valor){
            $artistas=Artista::where("id_Artista",$valor->artista)->first();
            $valor->artista=$artistas->nombre_Artistico;
            $categorias=Categoria::where("id_categoria",$valor->categoria)->first();
            $valor->categoria=$categorias->nombre;
            if ($valor->tipo==1)
                $valor->tipo='CD';
            else
                $valor->tipo='Vinyl';
        }



        return view('registroProducto',["productos"=>$productos,"artista"=>$artista,"categoria"=>$categoria]);
    }
    public function registrarProducto(Request $datos){
        $producto = new Producto();
        $datos->validate([
            'image'=>'required|image'
        ]);
        $imagenes = $datos->file('image')->store('public/imagenes');
        $url = Storage::url($imagenes);
        $imagenes2 = $datos->file('image2')->store('public/imagenes');
        $url2 = Storage::url($imagenes2);
        $producto->nombre=$datos->nombre;
        $producto->categoria=$datos->categoria;
        $producto->tipo=$datos->tipo;
        $producto->artista=$datos->artista;
        $producto->precio=$datos->precio;
        $producto->stock=$datos->stock;
        $producto->anio=$datos->anio;
        $producto->Proveedor=session('proveedor')->id_Proveedor;
        $producto->imagen=$url;
        $producto->imagen2=$url2;
        $producto->save();
        return redirect()->route('registroProducto');

    }
    public function pedidos(){
        $productos=Producto::where("Proveedor",session('proveedor')->id_Proveedor)->get();
        $envio = Envio::get();
        foreach($productos as $valor){
            $artistas=Artista::where("id_Artista",$valor->artista)->first();
            $valor->artista=$artistas->nombre_Artistico;
            $categorias=Categoria::where("id_categoria",$valor->categoria)->first();
            $valor->categoria=$categorias->nombre;
            if ($valor->tipo==1)
                $valor->tipo='CD';
            else
                $valor->tipo='Vinyl';
        }
        return view('pedidos',["envio"=>$envio,"productos"=>$productos]);
    }
    public function envio(Request $datos){
        echo $datos->id;
        $envio = Envio::where("id",$datos->id)->first();
        $envio->estatus = 'Enviado';
        $envio->save();
        return redirect()->route('pedidos');
    }
}
