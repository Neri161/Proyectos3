@extends('layout.admin')

@section('titulo')
    <title>Inicio | CONTROL ESCOLAR</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')

@endsection

@section('contenido')
    <main class="col-md-12 container-fluid">
        <div class="table-responsive col-md-12">
            <table class="table table-hover table-active" border="1">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO PATERNO</th>
                    <th>APELLIDO MATERNO</th>
                    <th>MATRICULA</th>
                    <th>TELEFONO</th>
                    <th>ACCION</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($usuario))
                @foreach($usuario as $valor)
                <tr>
                    <th>{{$valor['id']}}</th>
                    <th>{{$valor['nombre']}}</th>
                    <th>{{$valor['ap_paterno']}}</th>
                    <th>{{$valor['ap_materno']}}</th>
                    <th>{{$valor['matricula']}}</th>
                    <th>{{$valor['telefono']}}</th>
                    <th>
                        <button class="btn btn-info">CONSULTAR CALIFICACIONES</button>
                    </th>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </main>


@endsection

@section('js')

@endsection
