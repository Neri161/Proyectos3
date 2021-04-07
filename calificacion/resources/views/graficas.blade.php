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
        <div class="col-md-8">
            <canvas id="myChart2"></canvas>
        </div>
    </main>

@endsection

@section('js')
    <script>
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($n as $valor)
                    '{{$valor}}',
                    @endforeach],
                datasets: [{
                    label: 'PROMEDIO DE ASIGANTURA',
                    data: [
                        @foreach($p as $valor)
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

