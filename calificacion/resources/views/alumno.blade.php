@extends('layout.user')

@section('titulo')
    <title>ALUMNOS | CONTROL ESCOLAR</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')

@endsection

@section('contenido')

    <main class="container-fluid">
        <center>
            <img class="img-fluid"  src="https://th.bing.com/th/id/Rfbe55be8fb0e226e9570d5943d90f40b?rik=ApnmyHLy1FS72Q&riu=http%3a%2f%2f4.bp.blogspot.com%2f-mtS8Bxzzs3Q%2fUJSSKv3tBOI%2fAAAAAAAAAAU%2fgkkcIb6EXJs%2fs1600%2fdownloadicon.gif&ehk=uphVlP9oVkaCMYBDxls5ZJOERE9NFRUtQNMOU48nHV8%3d&risl=&pid=ImgRaw" alt="">
            <a href="{{route('usuario.pdf')}}"><button class="btn btn-danger form-control ">DESCARGAR TU BOLETA</button></a>
        </center>
    </main>

@endsection

@section('js')

@endsection
