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
                            <img class="card-img-top" src="data:<?php echo $valor['tipoi']; ?>;base64,<?php echo  base64_encode($valor['imagen']); ?>" width="200"></center>
                            <div class="card-body">
                                <span><?php echo $valor['nombre']; ?></span>
                                <h5 class="card-title">$<?php echo $valor['precio']; ?></h5>
                                <p class="card-text">
                                    @if($valor['tipo']=="1") CD @else Vinyl @endif
                                </p>
                                <form action="index.php?controller=Envio&action=comprar" method="post">
                                    <div class="mostrar">
                                        <input type="text" class="carrito" name="id" id="id" value="<?php echo $valor['id']; ?>">
                                    </div>
                                </form>
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

        });

    </script>
@endsection
