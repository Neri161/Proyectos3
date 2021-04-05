@extends('layout.admin')

@section('titulo')
    <title>Inicio | Administrador</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')

@endsection

@section('contenido')
    <main class="col-md-12 container-fluid">
        <center>
        <h2>GRAFICAS DEL EXAMEN</h2>
        <div class="col-md-5">
                <canvas id="myChart" ></canvas>
                <canvas id="myChart2"></canvas>
                <canvas id="myChart3"></canvas>
        </div>
            <br>
            <div class="table-responsive col-md-5">
            <table class="table table-hover table-active" border="1">
                <h3>PEOR A MEJOR</h3>
                <thead>
                <tr>
                        <th>NOMBRE</th>
                        <th>PUNTAJE</th>
                </tr>
                </thead>
                <tbody>
                @foreach($top as $valor)
                    <tr>
                        <th>{{$valor['id_Usuario']}}</th>
                        <th>{{$valor['aciertos']}}</th>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </center>
    </main>


@endsection

@section('js')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['MASCULINO', 'FEMENINO'],
                datasets: [{
                    label: 'PROMEDIO',
                    data: [{{$ph}}, {{$pm}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($edad as $valor)
                    {{$valor}},
                    @endforeach],
                datasets: [{
                    label: 'EDADES',
                    data: [
                        @foreach($edad as $valor)
                        {{$valor}},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var ctx = document.getElementById('myChart3').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($puntaje as $valor)
                    {{$valor}},
                    @endforeach],
                datasets: [{
                    label: 'ACIERTOS',
                    data: [
                        @foreach($puntaje as $valor)
                        {{$valor}},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
@endsection
