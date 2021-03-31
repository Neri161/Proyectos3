<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Admin;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class UsuarioController extends Controller
{
    public function bienvenida(){
        $productos = Producto::get();
        return view("bienvenida",["productos"=>$productos]);
    }
    public function login(){
        return view("login");
    }

    public function registro(){
        return view("registro");
    }

}
