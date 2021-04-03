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
                <form action="{{route('admin.form')}}" method="post">
                    {{csrf_field()}}
                    <h3 class="text-center">Registro de Proveedor</h3>
                    <br>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre">Nombre: </label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Telefono: </label>
                            <input type="number" name="telefono" id="telefono" class="form-control" placeholder="telefono" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="email" id="correo" name="correo" placeholder="Correo" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contrasenia">Contraseña:</label>
                            <input type="password" id="contrasenia-1" name="contrasenia" placeholder="Contraseña" required class="form-control">
                            <br>
                            <label for="contrasenia-2">Contraseña</label>
                            <input type="password" id="contrasenia-2" name="contrasenia2" placeholder="Contraseña" required class="form-control">
                            <span  id="mensaje-2"></span>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12" style="padding-bottom: 3%;">
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
                            <th>Correo</th>
                            <th>Telefono</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($proveedor))
                        @foreach ($proveedor as $valor)
                        <tr>
                            <td>{{$valor["id_Proveedor"]}}</td>
                            <td>{{$valor["nombre_Proveedor"]}}</td>
                            <td>{{$valor["correo"]}}</td>
                            <td>{{$valor["telefono"]}}</td>
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
