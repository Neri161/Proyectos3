<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registro</title>
</head>

<body>
<div class="container">
    <div class="row justify-content-center pt-5 mt-5 m-1">
        <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
            <form action="{{route('registro.form')}}" method="post">
                {{csrf_field()}}
                <div class="form-group text-center pt-3">
                    <h1 class="text-dark">Registrarse</h1>
                </div>
                @if(isset($estatus))
                    <label class="text-danger">{{$mensaje}}</label>
                @endif
                <div class="form-group mx-sm-4 pt-3">
                    <input type="text" class="form-control"  name="nombre"  placeholder="Ingrese su Nombre">
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <input type="text" class="form-control"  name="paterno" placeholder="Ingrese su Apellido Paterno">
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <input type="text" class="form-control" name="materno"  placeholder="Ingrese su Apellido Materno">
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <input type="text" class="form-control" name="edad"  placeholder="Ingrese su Edad">
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <select name="genero" class="form-control" id="genero">
                        <option value="" class="selected" selected="selected">--Seleccionar Genero--</option>
                        <option value="H" name="genero">Hombre</option>
                        <option value="M" name="genero">Mujer</option>
                    </select>
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <input type="text" class="form-control" name="correo" placeholder="Ingrese su Correo">
                </div>
                <div class="form-group mx-sm-4 pb-3">
                    <input type="text" class="form-control"  name="password1" placeholder="Ingrese su Contraseña">
                </div>
                <div class="form-group mx-sm-4 pb-3">
                    <input type="text" class="form-control" name="password2" placeholder="Ingrese su Contraseña">
                </div>
                <div class="form-group mx-sm-4 pb-2">
                    <input type="submit" class="btn btn-block ingresar" value="INGRESAR">
                </div>

                @if(isset($_GET["r"]))
                    <input type="hidden" name="url" value="{{$_GET["r"]}}">
                @endif

            </form>
            <div class="form-group mx-sm-4 text-right">
                <span class=""><a href="{{route('login')}}" class="olvide">¿Tienes una cuenta? ¡Inicia Sesión!</a></span>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
