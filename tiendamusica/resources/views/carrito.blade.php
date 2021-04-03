@extends('layout.user')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
    <div class="container">
        <h3 class="text-center">Productos Pedidos</h3>
        <br>
        <div class="row">

            @if(isset($productos))
                @if(isset($envio))
                    @foreach($productos as $valor)
                        @foreach($envio as $valor2)
                            @if($valor2["id_UD"]==session('direccion')->id_Direccion)
                            @if($valor["id"] == $valor2["id_Producto"])
                                <div class="col-md-3">
                                    <div class="card">
                                        <img class="card-img-top" src="data:{{$valor['tipoi']}};base64,{{base64_encode($valor['imagen'])}}" width="200"></center>
                                        <div class="card-body">
                                            <span><?php echo $valor['nombre']; ?></span>
                                            <h5 class="card-title">$<?php echo $valor['precio']; ?></h5>
                                            <p class="card-text">
                                                @if($valor['tipo']=="1") CD @else Vinyl @endif
                                            </p>
                                            <i>{{$valor2["estatus"]}}</i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endif
                        @endforeach
                    @endforeach
                @endif
            @endif
        </div>
    </div>

@endsection

@section('contenido')

@endsection

@section('js')

@endsection
