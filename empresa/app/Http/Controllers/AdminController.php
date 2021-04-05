<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Respuesta;
use Illuminate\Support\Facades\DB;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF;


class AdminController extends Controller
{
    public function inicio(){
        $promedioH=0;
        $promedioM=0;
        $numeroHombres=0;
        $hombres=Usuario::where("genero","H")->get();
        $numeroMujeres=0;
        $mujeres=Usuario::where("genero","M")->get();
        $respuestas=Respuesta::get();

        foreach ($respuestas as $valor2){
        foreach ($hombres as $valor){
                if ($valor["id_usuario"]==$valor2["id_Usuario"])
                {
                    $promedioH=$promedioH+$valor2['aciertos'];
                    $numeroHombres=$numeroHombres+1;
                }
            }
        }

        $promedioH=$promedioH/$numeroHombres;
        foreach ($respuestas as $valor2){
        foreach ($mujeres as $valor){
                if ($valor["id_usuario"]==$valor2["id_Usuario"])
                {
                    $promedioM=$promedioM+$valor2['aciertos'];
                    $numeroMujeres=$numeroMujeres+1;
                }
            }
        }
        $puntaje=Respuesta::get();
        $puntajes=[];
        foreach ($puntaje as $valor){
            array_push($puntajes,$valor->aciertos);
        }
        $puntajes=array_unique($puntajes);
        $edad=Usuario::select('edad')->get();
        $edades=[];
        foreach ($edad as $valor){
            array_push($edades,$valor->edad);
        }
        $edades=array_unique($edades);
        $promedioM=$promedioM/$numeroMujeres;
        $top=Respuesta::orderby('aciertos','asc')->get();
        foreach ($top as $valor){
            $nombre=Usuario::where('id_usuario',$valor->id_Usuario)->first();
            $valor->id_Usuario=$nombre->nombre;
        }

        return view('inicio',["pm"=>$promedioM,"ph"=>$promedioH,"edad"=>$edades,"puntaje"=>$puntajes,'top'=>$top]);
    }
    public function descargar(){
        
        $Usario=Usuario::all();
        $respuesta=Respuesta::all();
        $pdf = PDF::loadView('pdf.pdf', ['usuario'=>$Usario,'respuesta'=>$respuesta]);
        return $pdf->download('pdf.pdf');
    }
    public function pdf(){
        $Usario=Usuario::all();
        $respuesta=Respuesta::all();
        return view('pdf.pdf', ['usuario'=>$Usario,'respuesta'=>$respuesta]);
    }
}
