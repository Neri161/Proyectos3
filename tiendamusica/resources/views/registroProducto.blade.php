@extends('layout.proveedor')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')

@endsection

@section('contenido')
    <main class="container-fluid">
        <div class="row registros">
            <div class="col-md-6" >
                <form action="{{route('proveedor.form.producto')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <h3 class="text-center">Registro de Productos</h3>
                    <br>
                    <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria: </label>
                        <select name="categoria" class="form-control" id="categoria">
                            @if(isset($categoria))
                            @foreach ($categoria as $valor)
                            <option value="{{$valor['id_Categoria']}}">{{$valor["nombre"]}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo: </label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="1">CD</option>
                            <option value="2">Vinyl</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="artista">Artista: </label>
                        <select name="artista" class="form-control">
                            @if(isset($artista))
                            @foreach ($artista as $valor)
                            <option value="{{$valor['id_Artista']}}">{{$valor['nombre_Artistico']}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio: </label>
                        <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock: </label>
                        <input type="text" name="stock" id="stock" class="form-control" placeholder="Stock" required>
                    </div>
                    <div class="form-group">
                        <label for="anio">Año: </label>
                        <input type="text" name="anio" id="anio" class="form-control" placeholder="Anio" required>
                    </div>
                    <div class="form-group">
                        @error('image')
                        <small class="text-danger">{{$message}}}</small><br>
                        @enderror
                        <label for="foto">1er Foto del Producto</label>
                        <input type="file" class="form-control-file" id="foto" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="foto">2da Foto del Producto</label>
                        <input type="file" class="form-control-file" id="foto2" name="image2">
                    </div>
                    <div class="form-group">
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
                            <th>categoria</th>
                            <th>artista</th>
                            <th>Tipo</th>
                            <th>precio</th>
                            <th>stock</th>
                            <th>anio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($productos))
                        @foreach ($productos as $valor)
                        <tr>
                            <td>{{$valor["id"]}}</td>
                            <td>{{$valor["nombre"]}}</td>
                            <td>{{$valor["categoria"]}}</td>
                            <td>{{$valor["artista"]}}</td>
                            <td>{{$valor["tipo"]}}</td>
                            <td>{{$valor["precio"]}}</td>
                            <td>{{$valor["stock"]}}</td>
                            <td>{{$valor["anio"]}}</td>
                        </tr>
                        @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

@section('js')
@endsection
