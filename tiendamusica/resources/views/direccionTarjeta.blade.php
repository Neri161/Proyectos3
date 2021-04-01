@extends('layout.user')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
    <main class="container">
        @if(!isset(session('direccion')->id_Direccion))
        <form action="{{route('direccion.form')}}/{{session('usuario')->id_usuario}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nombre">CP: </label>
                    <input type="text" name="CP" id="CP" class="form-control" placeholder="CP" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="nombre">Calle: </label>
                    <input type="text" name="calle" id="calle" class="form-control" placeholder="calle" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="nombre">No. Interior: </label>
                    <input type="text" name="no_Interior" id="no_Interior" class="form-control" placeholder="No. Interior" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="nombre">No. Exterior: </label>
                    <input type="text" name="no_Exterior" id="no_Exterior" class="form-control" placeholder="No. Exterior" required>
                </div>
                <div class="form-group col-6">
                    <label for="nombre">Telefono: </label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Referencia: </label>
                <input type="text" name="referencia" id="referencia" class="form-control" placeholder="Referencia" required>
            </div>
            <div class="form-group mx-sm-4 pb-2">
                <input type="submit" class="btn btn-block ingresar" value="INGRESAR">
            </div>
        </form>
        @endif
        @if(!isset(session('tarjeta')->folio_Tarjeta))
        <form action="{{route('tarjeta.form')}}/{{session('usuario')->id_usuario}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="nombre">Folio de Tarjeta: </label>
                    <input type="text" name="folio_Tarjeta" id="folio_Tarjeta" class="form-control" placeholder="Folio de Tarjeta" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nombre ">Fecha de Vencimiento: </label>
                    <input type="text" name="fech_Vencimineto" id="fech_Vencimiento" class="form-control" placeholder="Fecha de Vencimiento" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="nombre">Numero de Seguridad: </label>
                    <input type="text" name="noSeguridad" id="noSeguridad" class="form-control" placeholder="Numero de Seguridad" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="nombre">Compañia: </label>
                    <input type="text" name="compania" id="compania" class="form-control" placeholder="Compañia" required>
                </div>
            </div>
            <button class="btn-success form-control" id="guardar">Guardar</button>
        </form>
            @endif
    </main>
@endsection

@section('contenido')

@endsection

@section('js')
    <script>
        $(document).ready(function () {

        });

    </script>
@endsection
