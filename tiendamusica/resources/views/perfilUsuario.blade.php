@extends('layout.user')

@section('titulo')
    <title>Perfil | {{session('usuario')->nombre}}</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
    <div class="container">
        <br>
            <div class="image-upload">
                <center>
                            <img  src="/img/defecto.jpg" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto"
                                  data-toggle="popover"
                                  data-content="Cambiar Foto">
                </center>

            </div>
        <br>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" readonly class="form-control" placeholder="Nombre" required value="{{session('usuario')->nombre}}">
            </div>
            <div class="form-group col-md-3">
                <label for="paterno">Apellido Paterno: </label>
                <input type="text" name="paterno" id="paterno" readonly class="form-control" placeholder="Apellido Paterno" required value="{{session('usuario')->apellido_paterno}}">
            </div>
            <div class="form-group col-md-3">
                <label for="materno">Apellido Materno: </label>
                <input type="text" name="materno" id="materno" readonly class="form-control" placeholder="Apellido Materno" required value="{{session('usuario')->apellido_materno}}">
            </div>
            <div class="form-group col-md-3">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" readonly class="form-control" value="{{session('usuario')->correo}}">

            </div>
        </div>

        @if(session('direccion'))
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nombre">CP: </label>
                    <input type="text" name="CP" id="CP" readonly class="form-control" placeholder="CP" value="{{session('direccion')->CP}}" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="nombre">Calle: </label>
                    <input type="text" name="calle" id="calle" readonly class="form-control" placeholder="calle" value="{{session('direccion')->calle}}" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="nombre">No. Interior: </label>
                    <input type="text" name="no_Interior" id="no_Interior" readonly class="form-control" placeholder="No. Interior" value="{{session('direccion')->no_Interior}}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="nombre">No. Exterior: </label>
                    <input type="text" name="no_Exterior" id="no_Exterior" readonly class="form-control" placeholder="No. Exterior" value="{{session('direccion')->no_Exterior}}" required>
                </div>
                <div class="form-group col-6">
                    <label for="nombre">Telefono: </label>
                    <input type="text" name="telefono" id="telefono" readonly class="form-control" placeholder="Telefono" value="{{session('direccion')->telefono}}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Referencia: </label>
                <input type="text" name="referencia" id="referencia" readonly class="form-control" placeholder="Referencia" value="{{session('direccion')->referencia}}" required>
            </div>
        @endif


        @if(session('tarjeta'))
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="nombre">Folio de Tarjeta: </label>
                    <input type="text" name="folio_Tarjeta" id="folio_Tarjeta" readonly class="form-control" placeholder="Folio de Tarjeta" value="{{session('tarjeta')->folio_Tarjeta}}" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nombre ">Fecha de Vencimiento: </label>
                    <input type="text" name="fech_Vencimineto" id="fech_Vencimiento" readonly class="form-control" placeholder="Fecha de Vencimiento" value="{{session('tarjeta')->fechVencimiento}}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="nombre">Numero de Seguridad: </label>
                    <input type="text" name="noSeguridad" id="noSeguridad" readonly class="form-control" placeholder="Numero de Seguridad" value="{{session('tarjeta')->noSeguridad}}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="nombre">Compañia: </label>
                    <input type="text" name="compania" id="compania" readonly class="form-control" placeholder="Compañia" value="{{session('tarjeta')->compania}}" required>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('contenido')

@endsection

@section('js')
    <script>
        $(document).ready(function () {

        });

    </script>
@endsection
