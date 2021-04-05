<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use App\Models\Admin;
use App\Models\Respuesta;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

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
        $edad = $datos->edad;
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
        $usuario->edad =  $edad;
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
    public function inicio(){
        $usuario=Respuesta::where("id_Usuario",session('usuario')->id_usuario)->first();
        if($usuario)
            return view('test',["estatus"=>"success"]);

        return view('test',["estatus"=>"danger"]);
    }
    public function respuesta($aciertos){
      $resultado = new Respuesta();
      $resultado->id_Usuario=session('usuario')->id_usuario;
      $resultado->aciertos=$aciertos;
      $verificar=$resultado->save();
      $correo=session('usuario')->correo;
      $respuesta=Respuesta::where("id_Usuario",session('usuario')->id_usuario)->first();

      $data = ['title' => 'Resultado de examen',
                'id' => "ID DE USUARIO: ".session('usuario')->id_usuario,
                'nombre' => session('usuario')->nombre." ".session('usuario')->apellido_paterno." ".session('usuario')->apellido_materno,
                'correo' => $correo,
                'aciertos'=>$aciertos,
                'fecha' =>$respuesta->created_at
              ];

        Mail::to($correo)->send(new TestMail($data));
      if($verificar)
        return json_encode(["estatus" => "success","mensaje" => "Envio de datos exitoso"]);


      return json_encode(["estatus" => "success","mensaje" => "occurio un error"]);
    }


}
