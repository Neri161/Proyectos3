<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
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
    public function verificarProveedor(Request $datos){
        $proveedor = new Proveedor();
        $proveedor->nombre_Proveedor=$datos->nombre;
        $proveedor->correo=$datos->correo;
        $proveedor->contrasenia=bcrypt($datos->contrasenia);
        $proveedor->telefono=$datos->telefono;
        $proveedor->save();
        return redirect()->route('admin.proveedor');
    }
}
