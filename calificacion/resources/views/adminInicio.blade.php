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
                        <button class="btn btn-info  agregar" data-toggle='modal' producto="{{$valor['id']}}" data-toggle='modal' data-target='#modal1' id="agregar">CONSULTAR CALIFICACIONES</button>
                    </th>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="modal" tabindex="-1" id="modal1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">CALIFICACIONES</h3>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive col-md-12">
                            <table class="table table-hover table-active" border="1">
                                <thead>
                                <tr>
                                    <th>ESP</th>
                                    <th>MAT</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($materia))
                                    @foreach($materia as $valor)
                                        <tr id="{{$valor['id_usuario']}}" class="trh">
                                            <th>{{$valor['espaniol']}}</th>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss='modal'>&times;</button>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection

@section('js')

    <script>
        $(document).ready(function () {
            $(".agregar").click(function (){
                var idProducto = $(this).attr('producto');
                $('.trh').hide();
                agregar(idProducto)
            });
            function agregar(idProducto){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "get",
                    url: "{{route('admin.cons')}}/"+idProducto,
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        if(data.estatus == "success"){
                            alert(data.mensaje);
                            $("#"+data.mensaje).show();
                        }else{
                            alert('ALUMNO SIN CALIFICACIONES SUBIDAS');
                            location.reload();
                        }
                    }
                });
            }
        });

    </script>

@endsection
