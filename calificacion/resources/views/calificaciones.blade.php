@extends('layout.admin')

@section('titulo')
    <title>ALUMNOS | CONTROL ESCOLAR</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')

@endsection

@section('contenido')

    <main >
    @if(isset($asig))
     @foreach($asig as $valor1)
         <div class="col-md-5">
         <form action="{{route('alumno.cali.form')}}/{{$id}}/{{$valor1['id']}}" method="post">
          {{csrf_field()}}
           <h3 class="text-info text-center">{{$valor1['asignatura']}}</h3>
           <div class="form-group">
           <input type="text" class="form-control" name="cali" placeholder="CALIFICACION" required>
           </div>
           <button class="btn btn-primary form-control">REGISTRAR</button>
         </form>
       </div>
      @endforeach
    @endif
    </main>

@endsection

@section('js')

@endsection
