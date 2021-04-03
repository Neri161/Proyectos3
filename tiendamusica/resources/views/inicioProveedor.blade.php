@extends('layout.proveedor')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')

@endsection

@section('contenido')
    <div class="container">
        <br>
        <h5 class="text-center">Bienvenido Proveedor {{session('proveedor')->nombre_Proveedor}}</h5>
        <center><img class="img-responsive col-md-6" src="/img/logo.jpeg" alt="usuario" width="70px"></center>
    </div>
@endsection

@section('js')
@endsection
