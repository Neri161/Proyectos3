<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>BOLETA</h1>
    <table class="table table-hover table-active" border="1">
        <thead>
        <tr>
            <th>Asigantura</th>
            <th>Calificacion</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($b))
            @foreach($b as $valor)
                <tr id="{{$valor['id_usuario']}}" class="trh {{$valor['id_usuario']}}">
                    <th>{{$valor['id_materia']}}</th>
                    <th>{{$valor['calificacion']}}</th>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</body>
</html>
