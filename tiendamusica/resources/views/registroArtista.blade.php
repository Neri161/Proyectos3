@extends('layout.admin')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')

@endsection

@section('contenido')
    <main class="container">
        <div class="row registros">
            <div class="col-md-6">
                <form action="{{route('admin.form.artista')}}" method="post">
                    {{csrf_field()}}
                    <br>
                    <h1 class="text-center">Registro Artista</h1>
                    <div class="form-group">
                        <label for="nombre">Nombre Artistico: </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre Artistico" required>
                    </div>
                    <br>
                    <button class="btn-success form-control" id="guardar">Guardar</button>
                </form>
            </div>
            <div class="sidebar-datos col-md-6">
                <div class="container-fluid">
                    <table class="table table-hover table-active" border="1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($artista))
                        @foreach ($artista as $valor)
                        <tr>
                            <td>{{$valor["id_Artista"]}}</td>
                            <td>{{$valor["nombre_Artistico"]}}</td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')

@endsection
