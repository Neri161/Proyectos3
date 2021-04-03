<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Artista;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function inicio(){
        return view('inicioAdmin');
    }
    public function registroProveedor(){
        $proveedor=Proveedor::get();
        return view('registroProveedor',["proveedor"=>$proveedor]);
    }
    public function registroArtista(){
        $artista=Artista::get();
        return view('registroArtista',["artista"=>$artista]);
    }
    public function registroCategoria(){
        $categoria=Categoria::get();
        return view('registroCategoria',["categoria"=>$categoria]);
    }
    public function verificarProveedor(Request $datos){
        $proveedor = new Proveedor();
        $proveedor->nombre_Proveedor=$datos->nombre;
        $proveedor->correo=$datos->correo;
        $proveedor->contrasenia=bcrypt($datos->contrasenia);
        $proveedor->telefono=$datos->telefono;
        $proveedor->save();
        return redirect()->route('admin.proveedor');
    }
    public function verificarArtista(Request $datos){
        $artista= new Artista();
        $artista->nombre_Artistico=$datos->nombre;
        $artista->save();
        return redirect()->route('admin.artista');
    }
    public function verificarCategoria(Request $datos){
        $categoria=new Categoria();
        $categoria->nombre=$datos->nombre;
        $categoria->save();
        return redirect()->route('admin.categoria');
    }
}
