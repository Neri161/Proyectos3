<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Usuario;
use App\Models\Materias;

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
    $calficaciones=Calificacion::where('id_usuario',$id)->get();
    if($calficaciones)
        return json_encode(["estatus" => "success","mensaje" => $id]);

    return json_encode(["estatus" => "danger","mensaje" => "error"]);

}

}
