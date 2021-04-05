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
            <div class="sidebar-datos col-md-12">
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
                            <th>estatus</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($productos))
                        @foreach ($productos as $valor)
                        @foreach ($envio as $valor2)
                            @if($valor->id==$valor2->id_Producto)
                        <tr>
                            <td>{{$valor["id"]}}</td>
                            <td>{{$valor["nombre"]}}</td>
                            <td>{{$valor["precio"]}}</td>
                            <td>{{$valor["stock"]}}</td>
                            <td>{{$valor["anio"]}}</td>
                            <td>{{$valor2["estatus"]}}</td>
                            @if($valor2["estatus"]!="Pedido")
                                <td>Esperando entrega</td>
                            @else
                            <td>
                                <form action="{{route('pedidos.form.producto')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="text" class="mostrar" name="id" value="{{$valor2['id']}}">
                                    <button class="btn btn-primary form-control agregar"  id="agregar" type="submit">Enviar</button>
                                </form></td>
                            @endif
                        </tr>
                            @endif
                        @endforeach
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
