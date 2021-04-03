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
                <form action="{{route('admin.form.categoria')}}" method="post">
                    {{csrf_field()}}
                    <br>
                    <h1 class="text-center">Registro Categoria</h1>
                    <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <button class="btn-success form-control" id="guardar">Guardar</button>
                    </div>
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
                        @if(isset($categoria))
                        @foreach ($categoria as $valor)
                        <tr>
                            <td>{{$valor["id_Categoria"]}}</td>
                            <td>{{$valor["nombre"]}}</td>
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
