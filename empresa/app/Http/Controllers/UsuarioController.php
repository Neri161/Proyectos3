<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{

    public function bienvenida(){
        return view("bienvenida");
    }
    public function login(){
        return view("login");
    }

    public function registro(){
        return view("registro");
    }
    public function cerrarSesion(){
        if(Session::has('usuario'))
            Session::forget('usuario');
        if(Session::has('tarjeta'))
            Session::forget('tarjeta');
        if(Session::has('direccion'))
            Session::forget('direccion');
        if(Session::has('admin'))
            Session::forget('admin');
        if(Session::has('proveedor'))
            Session::forget('admin');

        return redirect()->route('login.form');
    }
    public function registroForm(Request $datos){

        if(!$datos->correo || !$datos->password1 || !$datos->password2)
            return view("registro",["estatus"=> "error", "mensaje"=> "¡Falta información!"]);

        $usuario = Usuario::where('correo',$datos->correo)->first();
        if($usuario)
            return view("registro",["estatus"=> "error", "mensaje"=> "¡El correo ya se encuentra registrado!"]);

        $nombre = $datos->nombre;
        $paterno = $datos->paterno;
        $materno = $datos->materno;
        $correo = $datos->correo;
        $password2 = $datos->password2;
        $password1 = $datos->password1;
        $genero = $datos->genero;

        if($password1 != $password2){
            return view("registro",["estatus" => "¡Las contraseñas son diferentes!"]);
        }
        $usuario = new Usuario();
        $usuario->nombre =  $nombre;
        $usuario->apellido_paterno =  $paterno;
        $usuario->apellido_materno =  $materno;
        $usuario->genero=$genero;
        $usuario->correo =  $correo;
        $usuario->contrasenia = bcrypt($password1);
        $usuario->save();
        return view("login",["estatus"=> "success", "mensaje"=> "¡Cuenta Creada!"]);

    }
    public function verificarCredenciales(Request $datos){

        if(!$datos->correo || !$datos->password)
            return view("login",["estatus"=> "error", "mensaje"=> "¡Completa los campos!"]);

        $usuario = Usuario::where("correo",$datos->correo)->first();
        if(!$usuario) {
            return view("login", ["estatus" => "error", "mensaje" => "¡El correo no esta registrado!"]);

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
