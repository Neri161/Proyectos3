<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>
</head>
<body>
<div class="table-responsive col-md-5">
    <table class="table table-hover table-active" border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO PATERNO</th>
            <th>APELLIDO MATERNO</th>
            <th>EDAD</th>
            <th>GENERO</th>
            <th>GENEROCORREO</th>
            <th>ACIERTOS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($respuesta as $valor2)
            @if($valor->id_usuario==$valor2->id_Usuario)
                <tr>
                    <th>{{$valor['id_usuario']}}</th>
                    <th>{{$valor['nombre']}}</th>
                    <th>{{$valor['apellido_paterno']}}</th>
                    <th>{{$valor['apellido_materno']}}</th>
                    <th>{{$valor['edad']}}</th>
                    <th>{{$valor['genero']}}</th>
                    <th>{{$valor['correo']}}</th>
                    <th>{{$valor2['aciertos']}}</th>
                </tr>
            @endif
        @endforeach
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
