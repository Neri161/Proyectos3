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
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{$valor['imagen']}}" class="d-block w-100" width="200px" height="200px" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{$valor['imagen2']}}" class="d-block w-100" height="200px" alt="...">
                                                </div>
                                            </div>
                                        </div>
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
