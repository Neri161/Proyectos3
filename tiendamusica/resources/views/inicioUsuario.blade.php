@extends('layout.user')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
    <div class="container">
        <h3 class="text-center">Productos</h3>
        <br>
        <div class="row">

            @if(isset($productos))
                @foreach($productos as $valor)
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="data:{{$valor['tipoi']}};base64,{{base64_encode($valor['imagen'])}}" width="200"></center>
                            <div class="card-body">
                                <span><?php echo $valor['nombre']; ?></span>
                                <h5 class="card-title">$<?php echo $valor['precio']; ?></h5>
                                <p class="card-text">
                                    @if($valor['tipo']=="1") CD @else Vinyl @endif
                                </p>

                                    <div class="mostrar">
                                        <input type="text" class="carrito" name="id" id="id" value="{{$valor['id']}}">
                                        <input type="text" class="carrito" name="idDireccion" id="idDireccion" value="@if(session('direccion')){{session('direccion')->id_Direccion}}@endif">

                                    </div>
                                    @if(session('direccion') && session('tarjeta'))
                                        <button class="btn btn-primary form-control agregar" name="accion" value="agregar" id="agregar" type="submit">Comprar</button>
                                    @else
                                        <i>Agrega tarjeta o Direccion</i>
                                    @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@section('contenido')

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $(".agregar").click(function (){
                var idDireccion = $("#idDireccion").val();
                var idProducto = $("#id").val();
                agregar(idDireccion,idProducto)
            });
            function agregar(idDireccion,idProducto){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "get",
                    url: "{{route('usario.envio')}}/"+idDireccion+"/"+idProducto,
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        if(data.estatus == "success"){
                            alert(data.mensaje);
                            location.reload();
                        }else{
                            alert(data.mensaje);
                            location.reload();
                        }
                    }
                });
            }
        });

    </script>
@endsection
