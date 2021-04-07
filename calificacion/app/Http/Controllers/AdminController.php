<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Usuario;
use App\Models\Materias;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function inicio(){

        $alumno=Usuario::get();
        $calficaciones=Calificacion::get();
        foreach ($calficaciones as $valor){
            $materia=Materias::find($valor->id_materia);
            $valor->id_materia=$materia->asignatura;
        }

        return view('adminInicio',['usuario'=>$alumno,'cali'=>$calficaciones]);
    }
    public function consulta($id){
        $calficaciones=Calificacion::where('id_usuario',$id)->first();
        $verificar=$calficaciones;
        if(!$verificar)
            return json_encode(["estatus" => "danger","mensaje" => "error"]);

        return json_encode(["estatus" => "success","mensaje" => $id]);

    }
    public function calificacion($id){
        $cali = Calificacion::get();
        $asig = Materias::get();
        return view('calificaciones',['id'=>$id,'asig'=>$asig,'cali'=>$cali]);
    }
    public function materia($nombre){
        $materia=new Materias();
        $materia->asignatura=$nombre;
        $verificar=$materia->save();
        if (!$verificar)
            return json_encode(["estatus" => "danger","mensaje" => "Error Al Registrar"]);

        return json_encode(["estatus" => "success","mensaje" => $nombre]);
    }
    public function alumnos(){
        return view('alumnos');
    }
    public function registroalumnos(Request $datos){
        $alumno = new Usuario();
        $datos->validate([
            'image'=>'required|image|',
            'image2'=>'required|image|',
            'image3'=>'required|image|'
        ]);
        $imagenes = $datos->file('image')->store('public/imagenes');
        $url= Storage::url($imagenes);
        $imagenes2 = $datos->file('image2')->store('public/imagenes');
        $url2 = Storage::url($imagenes2);
        $imagenes3 = $datos->file('image3')->store('public/imagenes');
        $url3 = Storage::url($imagenes3);

        $alumno->nombre=$datos->nombre;
        $alumno->ap_paterno=$datos->paterno;
        $alumno->ap_materno=$datos->materno;
        $alumno->INE=$url;
        $alumno->acta_Nac=$url2;
        $alumno->curp=$url3;
        $alumno->matricula=$datos->matricula;
        $alumno->contrasenia=$datos->contrasenia;
        $alumno->telefono=$datos->telefono;
        $alumno->save();
        return redirect(route('admin.alumnos'));
    }
    public function cali(Request $datos,$idu,$idm){
    $cali = new Calificacion();
    $cali->id_materia=$idm;
    $cali->id_usuario=$idu;
    $cali->calificacion=$datos->cali;
    $cali->save();
    return redirect(route('admin.cal')."/".$idu);
    }
    public function graficas(){
        $valoresGrafica=[];
        $nombres=[];
        $nMaterias = Materias::get()->count();
        for ($x=1; $x<=$nMaterias; $x++){
            $barra=Calificacion::where('id_materia',$x)->get();
            $materia = Materias::where('id',$x)->first();
            array_push($nombres,$materia->asignatura);
            $nbarra=Calificacion::where('id_materia',$x)->get()->count();
            $promedio=0;
            foreach ($barra as $valor){
                $promedio=$promedio+$valor['calificacion'];
            }
            $promedio=$promedio/$nbarra;
            array_push($valoresGrafica,$promedio);
        }
        return view('graficas',['n'=>$nombres,'p'=>$valoresGrafica]);
    }
}
