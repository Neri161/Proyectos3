<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Mail</title>
</head>
<body>
<h1>{{$data['title']}}</h1>
<p>{{$data['id']}}</p>
<p>{{$data['nombre']}}</p>
<p>Correo: {{$data['correo']}}</p>
<p>Aciertos: {{$data['aciertos']}}</p>
<p>Fecha de aplicacion: {{$data['fecha']}}</p>
<br>
<p>Gracias Por responder {{$data['nombre']}}</p>
</body>
</html>
