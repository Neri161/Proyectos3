<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/inicio.css">
</head>
<body>
<!-- Navbar en la parte superior que se deliza lo largo de la pagina -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="">Aner Vinyl </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--Items, titulos -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <!--Busqueda -->
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <!--Elementos de la derecha -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="{{route('login')}}"> Bienvenido Identificate </a>
            </li>
        </ul>
    </div>
</nav>
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
                                <?php if($valor['tipo']=="1"){echo "CD";}else{echo "Vinyl";} ?>
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



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
