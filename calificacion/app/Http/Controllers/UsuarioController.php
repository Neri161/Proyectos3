<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Calificacion;
use App\Models\Materias;
use App\Models\Usuario;
use Barryvdh\DomPDF\PDF;
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

        $usuario = Usuario::where("matricula",$datos->correo)->first();
       if(!$usuario) {
            $admin = Admin::where("usuario",$datos->correo)->first();

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
        if($datos->password!=$usuario->contrasenia)
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
        return view('alumno');
    }
    public function descargar(){
        $calficaciones=Calificacion::where('id_usuario',session('usuario')->id)->get();
        foreach ($calficaciones as $valor){
            $materia=Materias::find($valor->id_materia);
            $valor->id_materia=$materia->asignatura;
        }
        $pdf = \PDF::loadView('pdf.boleta',['b'=>$calficaciones]);
        return $pdf->download(session('usuario')->nombre.'.pdf');
    }
    public function pdf(){
        $calficaciones=Calificacion::where('id_usuario',session('usuario')->id)->get();
        foreach ($calficaciones as $valor){
            $materia=Materias::find($valor->id_materia);
            $valor->id_materia=$materia->asignatura;
        }
        return view('pdf.boleta',['b'=>$calficaciones]);

    }
}
