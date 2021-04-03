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
                                    @if(session('direccion') && session('tarjeta'))
                                        <button class="btn btn-primary form-control agregar" name="accion" producto="{{$valor['id']}}" id="agregar" type="submit" data-toggle='modal' data-target='#modal1'>Comprar</button>
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
        <div class="modal" tabindex="-1" id="modal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-center">Pedido...</h3>
                </div>
                <div class="modal-body">
                    <img src="/img/envio.gif" alt="envio">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss='modal'>&times;</button>
                </div>
            </div>
        </div>
        </div>
@endsection

@section('contenido')

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $(".agregar").click(function (){
                var idProducto = $(this).attr('producto');
                agregar(idProducto)
            });
            function agregar(idProducto){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "get",
                    url: "{{route('usario.envio')}}/{{session('direccion')->id_Direccion}}/"+idProducto,
                    dataType: 'json',
                    cache: false,
                    success: function (data) {

                    }
                });
            }
        });

    </script>
@endsection
