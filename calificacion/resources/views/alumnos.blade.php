@extends('layout.admin')

@section('titulo')
    <title>ALUMNOS | CONTROL ESCOLAR</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')

@endsection

@section('contenido')

    <main class="container-fluid">
        <div class="container col-md-offset-4 col-md-4">
            <form action="{{route('alumno.registro.form')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <h3 class="text-info text-center">REGISTRO DE ALUMNOS</h3>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="nombre">
                </div>
                <div class="form-group">
                    <label for="">Apellido Paterno</label>
                    <input type="text" class="form-control" name="paterno" placeholder="paterno">
                </div>
                <div class="form-group">
                    <label for="">Apellido Materno</label>
                    <input type="text" class="form-control" name="materno" placeholder="materno">
                </div>
                <div class="form-group">
                    @error('image')
                    <small class="text-danger">{{$message}}}</small><br>
                    @enderror
                    <label for="foto">INE</label>
                    <input type="file" class="form-control-file" id="foto" name="image" accept="image/*">
                </div>
                <div class="form-group">
                    @error('image2')
                    <small class="text-danger">{{$message}}}</small><br>
                    @enderror
                    <label for="foto2">ACTA DE NACIMIENTO</label>
                    <input type="file" class="form-control-file" id="foto2" name="image2" accept="image/*">
                </div>
                <div class="form-group">
                    @error('image3')
                    <small class="text-danger">{{$message}}}</small><br>
                    @enderror
                    <label for="foto3">CURP</label>
                    <input type="file" class="form-control-file" id="foto3" name="image3" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="">MATRICULA</label>
                    <input type="text" class="form-control" name="matricula" placeholder="matricula">
                </div>
                <div class="form-group">
                    <label for="">CONTRASEÑA</label>
                    <input type="text" class="form-control" name="contrasenia" placeholder="contraseña">
                </div>
                <div class="form-group">
                    <label for="">TELEFONO</label>
                    <input type="text" class="form-control" name="telefono" placeholder="telefono">
                </div>
                <button class="btn btn-primary form-control">REGISTRAR</button>
            </form>
        </div>
    </main>

@endsection

@section('js')

@endsection
