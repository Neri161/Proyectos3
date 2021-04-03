<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Envio;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Admin;
use App\Models\Tarjeta;
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
    public function cerrarSesion(){
        if(Session::has('usuario'))
            Session::forget('usuario');
        if(Session::has('tarjeta'))
            Session::forget('tarjeta');
        if(Session::has('direccion'))
            Session::forget('direccion');

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

        if($password1 != $password2){
            return view("registro",["estatus" => "¡Las contraseñas son diferentes!"]);
        }
        $usuario = new Usuario();
        $usuario->nombre =  $nombre;
        $usuario->apellido_paterno =  $paterno;
        $usuario->apellido_materno =  $materno;
        $usuario->correo =  $correo;
        $usuario->contrasenia = bcrypt($password1);
        $usuario->foto='';
        $usuario->tipo='';
        $usuario->save();
        return view("login",["estatus"=> "success", "mensaje"=> "¡Cuenta Creada!"]);

    }
    public function verificarCredenciales(Request $datos){

        if(!$datos->correo || !$datos->password)
            return view("login",["estatus"=> "error", "mensaje"=> "¡Completa los campos!"]);

        $usuario = Usuario::where("correo",$datos->correo)->first();
        if(!$usuario) {
            $proveedor = Proveedor::where("correo",$datos->correo)->first();

            if(!$proveedor) {
                $admin = Admin::where("nombre",$datos->correo)->first();
                if (!$admin)
                return view("login", ["estatus" => "error", "mensaje" => "¡El correo no esta registrado!"]);

                if (!$datos->password==$admin->contrasenia)
                    return view("login",["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);

                Session::put('admin',$admin);
                if(isset($datos->url)){
                    $url = decrypt($datos->url);
                    return redirect($url);
                }else{
                    return redirect()->route('proveedor.inicio');
                }
            }
            if(!Hash::check($datos->password,$proveedor->contrasenia))
                return view("login",["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);

            Session::put('proveedor',$proveedor);

            if(isset($datos->url)){
                $url = decrypt($datos->url);
                return redirect($url);
            }else{
                return redirect()->route('proveedor.inicio');
            }
        }

        if(!Hash::check($datos->password,$usuario->contrasenia))
            return view("login",["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);

            Session::put('usuario',$usuario);

            $tarjeta = Tarjeta::where("id_Usuario",$usuario->id_usuario)->first();

            if($tarjeta)
                Session::put('tarjeta',$tarjeta);

            $direccion = Direccion::where("id_Usuario",$usuario->id_usuario)->first();

            if($direccion)
                Session::put('direccion',$direccion);

            if(isset($datos->url)){
                $url = decrypt($datos->url);
                return redirect($url);
            }else{
                    return redirect()->route('usuario.inicio');
            }

    }

    public function inicio(){
        $productos = Producto::get();
        $pedidos = 0;
        if(session('direccion'))
        $pedidos = Envio::where("id_UD",session('direccion')->id_Direccion)->count();

        return view('inicioUsuario',["productos"=>$productos,"pedidos"=>$pedidos]);
    }
    public function perfil(){
        $pedidos = 0;
        if(session('direccion'))
            $pedidos = Envio::where("id_UD",session('direccion')->id_Direccion)->count();
        return view('perfilUsuario',["pedidos"=>$pedidos]);
    }
    public function datos(){
        $pedidos = 0;
        if(session('direccion'))
            $pedidos = Envio::where("id_UD",session('direccion')->id_Direccion)->count();
        return view('direccionTarjeta',["pedidos"=>$pedidos]);
    }
    public function direccion(Request $datos,$idusuario){
        $pedidos = 0;
        if(session('direccion'))
            $pedidos = Envio::where("id_UD",session('direccion')->id_Direccion)->count();

        $direccion = new Direccion();

        $direccion->CP=$datos->CP;
        $direccion->calle=$datos->calle;
        $direccion->no_Interior=$datos->no_Interior;
        $direccion->no_Exterior=$datos->no_Exterior;
        $direccion->telefono=$datos->telefono;
        $direccion->referencia=$datos->referencia;
        $direccion->id_Usuario=$idusuario;

        $direccion->save();
        $direccion = Direccion::where("id_Usuario",$idusuario)->first();
        Session::put('direccion',$direccion);
        return view('direccionTarjeta',["pedidos"=>$pedidos]);

    }
    public function tarjeta(Request $datos){
        $pedidos = 0;
        if(session('direccion'))
            $pedidos = Envio::where("id_UD",session('direccion')->id_Direccion)->count();

        $tarjeta = new Tarjeta();
        $tarjeta->folio_Tarjeta=$datos->folio_Tarjeta;
        $tarjeta->fechVencimiento=$datos->fech_Vencimineto;
        $tarjeta->noSeguridad=$datos->noSeguridad;
        $tarjeta->compania=$datos->compania;
        $tarjeta->id_Usuario=$idusuario;
        $tarjeta->save();
        $tarjeta = Tarjeta::where("id_Usuario",$idusuario)->first();
        Session::put('tarjeta',$tarjeta);
        $productos = Producto::get();
        return view('inicioUsuario',["productos"=>$productos,"pedidos"=>$pedidos]);
    }
    public function envio($idDireccion,$id){

        $envio = new Envio();
        $envio->id_UD=$idDireccion;
        $envio->id_Producto=$id;
        $envio->estatus='Pedido';
        $envio->save();
        $pedidos = 0;
        if(session('direccion'))
            $pedidos = Envio::where("id_UD",session('direccion')->id_Direccion)->count();
        return json_encode(["estatus" => "success","mensaje" => $pedidos]);
    }
    public function carrito($idDireccion){
        $pedidos = 0;
        if(session('direccion'))
            $pedidos = Envio::where("id_UD",session('direccion')->id_Direccion)->count();

        $productos = Producto::get();
        $envio = Envio::where("id_UD",$idDireccion)->get();
        return view('carrito',["productos"=>$productos,"envio"=>$envio,"pedidos"=>$pedidos]);
    }
}
