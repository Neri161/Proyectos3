<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function login(){
        return view("login");
    }

    public function registro(){
        return view("registro");
    }

    public function cerrarSesion(){
        if(Session::has('usuario'))
            Session::forget('usuario');

        if(Session::has('admin'))
            Session::forget('admin');

        return redirect()->route('login.form');
    }

    public function verificarCredenciales(Request $datos){

        if(!$datos->correo || !$datos->password)
            return view("login",["estatus"=> "error", "mensaje"=> "¡Completa los campos!"]);

        $usuario = Usuario::where("correo",$datos->correo)->first();

        if(!$usuario) {

            $admin = Admin::where("correo",$datos->correo)->first();
            if (!$admin)
                return view("login", ["estatus" => "error", "mensaje" => "¡El correo no esta registrado!"]);

            if($datos->password!=$admin->contrasenia)
                return view("login",["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);

            Session::put('admin',$admin);

            if(isset($datos->url)){
                $url = decrypt($datos->url);
                return redirect($url);
            }else{
                return redirect()->route('admin.inicio');
            }

        }
        if(!Hash::check($datos->password,$usuario->contrasenia))
            return view("login",["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);

        Session::put('usuario',$usuario);

        if(isset($datos->url)){
            $url = decrypt($datos->url);
            return redirect($url);
        }else{
            return redirect()->route('usuario.inicio');
        }

    }
}
