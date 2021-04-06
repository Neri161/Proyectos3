<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Usuario;
use App\Models\Materias;

class AdminController extends Controller
{

public function inicio(){

    $alumno=Usuario::get();
    $materia=Materias::get();

    return view('adminInicio',['usuario'=>$alumno,'materia'=>$materia]);
}
public function consulta($id){
    $calficaciones=Materias::where('id_usuario',$id)->get();
    if($calficaciones)
        return json_encode(["estatus" => "success","mensaje" => $id]);

    return json_encode(["estatus" => "danger","mensaje" => "error"]);

}

}
