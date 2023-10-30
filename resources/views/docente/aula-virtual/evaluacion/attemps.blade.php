@extends('layouts.ace',['title'=>'Docente | Aula Virtual'])

@section('logo')
    @component('components.logo', ['app_name' => 'School', 'href_logo' => route('Docente.AulaVirtual.Index')])
    @endcomponent
@endsection

@section('navbar-menu')
    @component('components.docente.a-virtual.navbar-menu')
    @endcomponent
@endsection

@section('sidebar-buttons')
    @component('components.docente.a-virtual.sidebar-button')
    @endcomponent
@endsection

@section('sidebar-menu')
    @component('components.docente.a-virtual.sidebar-menu')
    @endcomponent
@endsection

@section('page-name')
    @component('components.page-name')
        @slot('page_name')
<a href="{{ route('Docente.AulaVirtual.Index') }}">
    Aula virtual
</a>
@endslot
        @slot('subpage_name')

        <a href="{{ route('Docente.AulaVirtual.Curso.Contenido', ['id' => $evaluacion->subContenido->datosContenido->datosCurso->id]) }}"> {{ $evaluacion->subContenido->datosContenido->datosCurso->cursoinfo->datosCurso->nombre }}

        |
            {{ $evaluacion->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->numero }}
            {{ $evaluacion->subContenido->datosContenido->datosCurso->seccionInfo->letra }} |
            {{$evaluacion->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->DatosNivel->nombre }}</a>

<i class="fa fa-angle-double-right text-80">
</i>
evaluacion


    {{--
<a href="{{ route('Docente.AulaVirtual.Curso.Contenido', ['id' => $examen->subContenido->datosContenido->datosCurso->id]) }}">
    Contenido
</a>
--}}
<i class="fa fa-angle-double-right text-80">
</i>
<a href="{{ route('Docente.Evaluacion.Show',['evaluacion'=>$evaluacion->id]) }}">{{ $evaluacion->nombre }}</a>

<i class="fa fa-angle-double-right text-80">
</i>
Revision
        @endslot
    @endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/summernote-lite.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="mt-45 card bcard border-1 brc-secondary-l2">
      <div class="table-responsive-md mb-5">
                      <table class="table ">
                 

                        <tbody>
<tr><td colspan="2" class="bgc-success-d2 text-white  text-center text-110 font-weight-bold border border-dark">Resumen de evaluación</td></tr>
<tr>
    <td class="bgc-success-d1 text-white brc-black-tp10 w-25 text-right">Alumno</td>
    <td class="border border-dark">{{ optional($intentos->first())->datosAlumno->persona->NombresApellidos }}</td>
</tr>
                          <tr>
                            <td class="bgc-success-d1 text-white w-25 text-right ">Método de calificación </td>
                          <td class="border border-dark">
                               @switch($evaluacion->modo_calificacion)

            @case(1)
            Ultimo Intento
            @break

            @case(2)
            Promedio
            @break

            @case(3)
            Mejor puntaje
            @break

            @endswitch
                          </td>
                           
                          </tr>
                          <tr>
                            <td class="bgc-success-d1 text-white  w-25 text-right">Calificacion</td>
                            <td class="border border-dark promfin"> {{ $prom }}</td>
                           
                          </tr>
                          <tr>
                            <td class="bgc-success-d1 text-white  w-25 text-right ">Intentos</td>
                              <td class="border border-dark "> {{ count($intentos) }} de {{ $evaluacion->intentos }}</td>
                           
                          </tr>
                           
                            
                        </tbody>
                      </table>
                    </div>

                    <p class="text-center text-110 font-weight-bold text-brown"><u>Resumen de intentos</u> </p>
    <ul class="nav nav-tabs nav-tabs-simple nav-tabs-scroll is-scrollable nav-tabs-static border-b-1 brc-default-l2 pt-2px" role="tablist">
        @foreach ($intentos as $intento)
        <li class="nav-item mr-3">
            @if ($loop->first)
            <a aria-controls="attemp-{{ $loop->iteration }}" aria-selected="false" class="btn btn-light-lightgrey bgc-white btn-brc-tp btn-h-light-dark btn-a-outline-green btn-a-text-dark py-25 px-15 border-none border-b-4 active" data-toggle="tab" href="#attemp-{{ $loop->iteration }}" id="{{ $loop->iteration }}-tab-btn" role="tab">
                Intento {{ $loop->iteration }}
            </a>
            @else
            <a aria-controls="attemp-{{ $loop->iteration }}" aria-selected="false" class="btn btn-light-lightgrey bgc-white btn-brc-tp btn-h-light-dark btn-a-outline-green btn-a-text-dark py-25 px-15 border-none border-b-4" data-toggle="tab" href="#attemp-{{ $loop->iteration }}" id="{{ $loop->iteration }}-tab-btn" role="tab">
                Intento {{ $loop->iteration }}
            </a>
            @endif
        </li>
        @endforeach

    </ul>
    <div class="tab-content tab-sliding py-2 px-0 mx-md-0">
        @foreach ($intentos as $intento)
       
        
        <div aria-labelledby="{{ $loop->iteration }}-tab-btn" class="tab-pane text-95 px-3 
            @if ($loop->first)
                active 
            @endif
            " 
            id="attemp-{{ $loop->iteration }}" role="tabpanel">
            <div class="table-responsive-md">
                      <table class="table   text-dark-m1 mb-3">
                 

                        <tbody>

                          <tr>
                            <td class="bgc-dark text-white brc-black-tp10 w-25 text-right border border-white">Iniciado el </td>
                            <td class="bgc-yellow-l1 ">{{ $intento->hora_inicio->format('l, d F \de Y, g:i:s A') }}</td>
                           
                          </tr>
                          <tr>
                            <td class="bgc-dark text-white brc-black-tp10 w-25 text-right">Estado</td>
                            <td class="bgc-yellow-l1">{{ $intento->estado }}</td>
                           
                          </tr>
                          <tr>
                            <td class="bgc-dark text-white brc-black-tp10 w-25 text-right">Finalizado el</td>
                            <td class="bgc-yellow-l1">{{ optional($intento->hora_fin)->format('l, d F \de Y, g:i:s A') }}</td>
                           
                          </tr>
                            <tr>
                            <td class="bgc-dark text-white brc-black-tp10 w-25 text-right">Tiempo empleado</td>
                            <td class="bgc-yellow-l1">{{-- {{ gmdate("H:i:s", optional($intento->hora_inicio)->diffInSeconds($intento->hora_fin)) }} --}}
                                {{ $intento->duracion }}</td>
                           
                          </tr>
                          </tr>
                            <tr>
                            <td class="bgc-dark text-white brc-black-tp10 w-25 text-right">Calificacion</td>
                            <td class="bgc-yellow-l1 prom">{{-- {{ gmdate("H:i:s", optional($intento->hora_inicio)->diffInSeconds($intento->hora_fin)) }} --}}
                                {{ $proms->where('intento',$intento->id)->first()['prom'] }}</td>
                           
                          </tr>
                        </tbody>
                      </table>
                    </div>
          @foreach ($intento->preguntas as $pregunta)
            <div class="mb-3">
                @component('components.docente.a-virtual.sub-contenido.quiz.question.review',['pregunta'=>$pregunta->datosPregunta,'numero'=>$loop->iteration,'idCard'=>$pregunta->id,'intento_question'=>$pregunta])
                @endcomponent  
            </div>
          @endforeach
        </div>

        @endforeach
    </div>
</div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection


@section('script')
<script src="{{ asset('assets/js/summernote-lite.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript">
</script>
<script type="text/javascript">
    $("#addMore").click(function (e) { 
        
            e.preventDefault();
            var cantidad=$(".clone").length+1; 
            var cloned = $("#copy:first").clone(true) ;
            cloned.appendTo('#addparts'); 
            cloned.find('#name-label').html('Opción ' + cantidad);
            cloned.find('#checkbox-respuesta').attr('name', 'respuesta'+cantidad);

        });

       var el;
       var routeUpdatePregunta;
       var elCardUpdate;
       var routeGetOptions;
       var routeCreateQuestion ;
       var routeFixed='{{ route('Docente.Pregunta.Store') }}';

       var container='main';
        jQuery(function($) {

$('#descripcion').summernote({
  
});
$('#descripcion2').summernote({
  
});
$('#descripcion3').summernote({
  
});
$('.descripcion').summernote({
  
});


        });



function editPregunta(ruta, elem) {
    el = elem;

    $.ajax({
        url: ruta,
        method: 'get',
        dataType: 'json',
        success: function(msg) {
            $('#pmu-nombre').val(msg.pregunta.nombre);
           // $('#pmu-descripcion').html(msg.pregunta.descripcion);
            $('#pmu-correccion').html(msg.pregunta.retroalimentacion);
            $('#pmu-puntos').val(msg.pregunta.puntos);
            elCardUpdate = $(el).parent().parent().parent().parent();
            routeUpdatePregunta = msg.ruta;
             // $('#pmu-descripcion').summernote('destroy');
                    $('#pmu-descripcion').summernote('code',msg.pregunta.descripcion);
        },
        error: function(msg) {
            Swal.fire('Error!', msg.message, 'error')
        }
    });
}

function editPreguntaRand(ruta, elem) {
    el = elem;

    $.ajax({
        url: ruta,
        method: 'get',
        dataType: 'json',
        success: function(msg) {
            $('#pmu-nombreR').val(msg.pregunta.nombre);
            $('#pmu-puntaje').val(msg.pregunta.puntaje);
            elCardUpdate = $(el).parent().parent().parent().parent();
            routeUpdatePregunta = msg.ruta;
           
                    
        },
        error: function(msg) {
            Swal.fire('Error!', msg.message, 'error')
        }
    });
}
function editOptionsMultiple(ruta, elem) {
    el = elem;
    routeGetOptions = ruta;

    $.ajax({
        url: ruta,
        method: 'get',
        dataType: 'json',
        success: function(msg) {
            $('#pmu-opciones-edit').html(msg.options);
              $('#pmu-opciones-edit2').html(msg.options);
            //routeUpdatePregunta = msg.ruta;
            elCardUpdate = $(el).parent().parent().parent().parent();
        },
        error: function(msg) {
            Swal.fire('Error!', msg.message, 'error')
        }
    });
}



function updateFeedback(element,ruta,numero) {
   
    comment=$(element).val();
    token = $("#token").val();
    $.ajax({
        url: ruta,
        method: 'post',
        dataType: 'json',
        data:{_token:token,'comentario':comment,'numero':numero},
        success: function(msg) {
          Swal.fire('Correcto', msg.message, 'success')
        },
        error: function(msg) {
            Swal.fire('Error!', msg.message, 'error')
        }
    });
}


function updateNota(element,ruta,numero) {
   
    comment=$(element).val();
    parent=$(element).parent().parent().parent().parent().parent()
    
    token = $("#token").val();
    $.ajax({
        url: ruta,
        method: 'post',
        dataType: 'json',
        data:{_token:token,'puntaje':comment,'numero':numero},
        success: function(msg) {
            parent.html(msg.slot)
         
           parent.parent().find('.prom').html(msg.prom_attemp)

          parent.parent().parent().parent().find('.promfin').html(msg.prom)
          Swal.fire('Correcto', msg.message, 'success')
        },
        error: function(msg) {
            Swal.fire('Error!', msg.responseJSON.message, 'error')
        }
    });
}
    
</script>
@endsection
