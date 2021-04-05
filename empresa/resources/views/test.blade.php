@extends('layout.user')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')

@endsection

@section('contenido')
    @if($estatus!="success")
    <div class="container" id="contenedor">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <label>1. ¿Está especializada en el cuidado de la piel y el cuerpo a través de medios no quirúrgicos ?</label>
                        <br>
                        <input class="form-check-input" name="p1" type="radio" value="1" id="rio1">
                        <label class="form-check-label" for="rio1">Estética</label>
                        <br>
                        <input class="form-check-input" name="p1"  type="radio" value="0" id="rio2">
                        <label class="form-check-label" for="rio2">Oftalmología</label>
                        <br>
                        <input class="form-check-input" name="p1" type="radio" value="0" id="rio3">
                        <label class="form-check-label" for="rio3">Peluquería</label>
                    </div>
                    <div class="form-check">
                        <label for="rio">2. ¿Acto de arrancar el vello, caída del pelo?</label>
                        <br>
                        <input class="form-check-input" name="p2" type="radio" value="0" id="juegos1">
                        <label class="form-check-label" for="juegos">Opilación</label>
                        <br>
                        <input class="form-check-input" name="p2" type="radio" value="0" id="juegos2">
                        <label class="form-check-label"  for="radio">Depilación</label>
                        <br>
                        <input class="form-check-input" name="p2" type="radio" value="1" id="juegos3">
                        <label class="form-check-label" for="radio">Epilación</label>
                        <br>
                    </div>
                    <div class="form-check">
                        <label for="rio">3. ¿Cuando el vello es depilado sin arrancar ?</label>
                        <br>
                        <input class="form-check-input" name="p3" type="radio" value="0" id="cena">
                        <label class="form-check-label" for="cena">Epilación</label>
                        <br>
                        <input class="form-check-input" name="p3" type="radio" value="0" id="cena">
                        <label class="form-check-label" for="cena">Opilación</label>
                        <br>
                        <input class="form-check-input" name="p3" type="radio" value="1" id="cena">
                        <label class="form-check-label" for="cena">Depilación</label>
                        <br>
                    </div>
                    <div class="form-check">
                        <label>4. ¿Cuál es la tipología del pelo?</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p4" value="1" id="colon">
                        <label class="form-check-label" for="colon">Varía de acuerdo a la zona cutánea, el sexo y edad de la persona</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p4" value="0" id="colon">
                        <label class="form-check-label" for="colon">Varía de acuerdo a la zona cutánea, el largo y color de cabello de la persona</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p4" value="0" id="colon">
                        <label class="form-check-label" for="colon">Varía de acuerdo a la abundancia y resequedad del cabello de la persona</label>
                        <br>
                    </div>
                    <div class="form-check">
                        <label for="rio">5. ¿Con respecto a los Peeling Cosméticos?</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p5" value="0" id="carto">
                        <label class="form-check-label" for="carto">Borra las arrugas</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p5" value="1" id="carto">
                        <label class="form-check-label" for="colon">Desprende células muertas de la piel</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p5" value="0" id="carto">
                        <label class="form-check-label" for="carto">Suaviza la piel</label>
                        <br>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <label for="rio">6. ¿Qué es la Piodermitis?</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p6" value="0" id="planeta">
                        <label class="form-check-label" for="planeta">Son infecciones causadas por virus</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p6" value="0" id="planeta">
                        <label class="form-check-label" for="planeta">Son infecciones causadas por hongos</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p6" value="1" id="planeta">
                        <label class="form-check-label" for="planeta">Son infecciones causadas por bacterias</label>
                        <br>
                    </div>
                    <div class="form-check">
                        <label for="rio">7. Marque la alternativa correcta:</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p7" value="1" id="moneda">
                        <label class="form-check-label" for="moneda">La capa córnea está formada por vasos sanguíneos y queratinocitos</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p7" value="0" id="moneda">
                        <label class="form-check-label" for="moneda">La piel tiene pocas terminaciones nerviosas</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p7" value="0" id="moneda">
                        <label class="form-check-label" for="moneda">El pelo tienes 3 fases de crecimientos anágena, catágena, telógena</label>
                        <br>
                    </div>
                    <div class="form-check">
                        <label for="rio">8. Capas de la piel</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p8" value="0" id="pais">
                        <label class="form-check-label" for="pais">Células bipolares, células amacrinas y células horizontales</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p8" value="0" id="pais">
                        <label class="form-check-label" for="pais">Corteza, Manto interior, Manto superior</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p8" value="1" id="pais">
                        <label class="form-check-label" for="pais">Epidermis, Dermis e Hipodermis</label>
                        <br>
                    </div>
                    <div class="form-check">
                        <label for="rio">9.  Es un producto que no se recomienda poner o aplicar en la piel</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p9" value="0" id="primos">
                        <label class="form-check-label" for="primos">Azúcar</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p9" value="1" id="primos">
                        <label class="form-check-label" for="primos">Agua caliente</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p9" value="0" id="primos">
                        <label class="form-check-label" for="primos">Leche</label><br>
                    </div>
                    <div class="form-check">
                        <label for="rio">10. Razón por la que se suaviza la piel facial</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p10" value="0" id="animal">
                        <label class="form-check-label" for="animal">Menor secreción de la glándula sebácea</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p10" value="1" id="animal">
                        <label class="form-check-label" for="animal">Lavarse la cara dos veces al día (no más) con agua tibia</label>
                        <br>
                        <input class="form-check-input" type="radio" name="p10" value="0" id="animal">
                        <label class="form-check-label" for="animal">Alteración de los lípidos cementantes</label>
                        <br>
                    </div>
                </div>
            </div>
            <br>
            <button class="btn-success form-control" id="guardar2">ENVIAR EXAMEN</button>
            <br>
    </div>
    @else
    <div class="container">
        <h1 class="text-center text-info">USTED YA ENVIO SUS RESPUESTAS</h1>
        <center>
        <img class="img-fluid"  src="https://th.bing.com/th/id/R0b9c4b386cffe73fd440da528af7c56b?rik=0KK0g6RRypvaGw&riu=http%3a%2f%2fwww.animatedimages.org%2fdata%2fmedia%2f1574%2fanimated-success-image-0015.gif&ehk=sudAVHp1WjFaGYI38Pt%2fgfo8ulqI98XS52ZQ%2bWy2qEo%3d&risl=&pid=ImgRaw" alt="">
        </center>
    </div>
    @endif
@endsection

@section('js')
    <script>
    $(document).ready(function (){
    $("#guardar2").click(function () {
        var respuestas = 0;
    var p1=$('input:radio[name=p1]:checked').val();
    var p2=$('input:radio[name=p2]:checked').val();
    var p3=$('input:radio[name=p3]:checked').val();
    var p4=$('input:radio[name=p4]:checked').val();
    var p5=$('input:radio[name=p5]:checked').val();
    var p6=$('input:radio[name=p6]:checked').val();
    var p7=$('input:radio[name=p7]:checked').val();
    var p8=$('input:radio[name=p8]:checked').val();
    var p9=$('input:radio[name=p9]:checked').val();
    var p10=$('input:radio[name=p10]:checked').val();
    if (p1 == "" || p1==null){
    alert("Responda la pregunta 1");
    return false;
    }else if (p1 == 1){
        respuestas=respuestas+1;
    }
    if (p2 == "" || p2==null){
    alert("Responda la pregunta 2");
    return false;
    }else if (p2 == 1){
        respuestas=respuestas+1;
    }
    if (p3 == "" || p3==null){
    alert("Responda la pregunta 3");
    return false;
    }else if (p3 == 1){
        respuestas=respuestas+1;
    }
    if (p4 == "" || p4==null){
    alert("Responda la pregunta 4");
    return false;
    }else if (p4 == 1){
        respuestas=respuestas+1;
    }
    if (p5 == "" || p5==null){
    alert("Responda la pregunta 5");
    return false;
    }else if (p5 == 1){
        respuestas=respuestas+1;
    }
    if (p6 == "" || p6==null){
    alert("Responda la pregunta 6");
    return false;
    }else if (p6 == 1){
        respuestas=respuestas+1;
    }
    if (p7 == "" || p7==null){
    alert("Responda la pregunta 7");
    return false;
    }else if (p7 == 1){
        respuestas=respuestas+1;
    }
    if (p8 == "" || p8==null){
    alert("Responda la pregunta 8");
    return false;
    }else if (p8 == 1){
        respuestas=respuestas+1;
    }
    if (p9 == "" || p9==null){
    alert("Responda la pregunta 9");
    return false;
    }else if (p9 == 1){
        respuestas=respuestas+1;
    }
    if (p10 == "" || p10==null){
    alert("Responda la pregunta 10");
    return false;
    }else if (p10 == 1){
        respuestas=respuestas+1;
    }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "get",
            url: "{{route('usuario.test')}}/"+respuestas,
            dataType: 'json',
            cache: false,
            success: function (data) {
                if(data.estatus == "success"){
                    location.reload();
                }else{
                    alert(data.mensaje);
                }
            }
        });


    });
    });
    </script>
@endsection
