<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProveedorController extends Controller
{
    public function inicio(){
        return view('inicioProveedor');
    }
    public function registroProducto(){
        $productos=Producto::where("Proveedor",session('proveedor')->id_Proveedor)->get();
        return view('registroProducto',["productos"=>$productos]);
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
        return view('pedidos',["envio"=>$envio]);
    }
    public function envio(Request $datos){
        $envio = Envio::where("id",$datos->id)->first();
        $envio->estatus = 'Enviado';
        $envio->save();
        return redirect()->route('pedidos');
    }
}
