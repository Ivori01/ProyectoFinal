@extends('layouts.ace',['title'=>'Docente | Aula Virtual'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('Docente.AulaVirtual.Index')])
@endcomponent
@endsection

@section('navbar-menu')
@component('components.docente.a-virtual.navbar-menu')
@endcomponent
@endsection

@section('page-settings')
@component('components.page-settings')
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
@component('components.page-name',['subpage_name'=>'Cursos'])

@slot('page_name')
<a href="{{ route('Docente.AulaVirtual.Index')}}">
    Aula virtual
</a>
@endslot

@slot('subpage_name')
{{-- {{ $curso->cursoinfo->datosCurso->nombre }} | {{$repo_grado->onlyName( $curso->seccionInfo->datosGrado->numero) }} {{ $curso->seccionInfo->letra }} | {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }} --}}
 
@endslot
@endcomponent
@endsection

@section('head')
    <link href="{{ asset('assets/css/summernote-lite.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
@php
  $nroTabs= 
  floor($evaluacion->preguntas->count() /$evaluacion->n_preguntas) + $evaluacion->preguntas->count() % $evaluacion->n_preguntas;
  $preguntas=[];
  if ($evaluacion->aleatorio) {
    $preguntas=$evaluacion->preguntas->shuffle();
  } else {
     $preguntas=$evaluacion->preguntas;
  }
 
 $grupos=[];
 for($i=1;$i<=$nroTabs;$i++){
    $grupos[]=$preguntas->take($evaluacion->n_preguntas);
    for($j=1;$j<=$evaluacion->n_preguntas;$j++){
      $preguntas->shift();
    }
    
 }
 
 
 $i=1;
@endphp

 <form id="quiz-form">
    <div class="row mt-45">
      <input  name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="col-12 col-lg-3">
          <div class="sticky-top pt-4">
          <h5 class="pb-1">Navegacion</h5>
          <div class="pt-2">
          <ul role="tablist" class="w-100 nav nav-fill nav-tabs nav-tabs-simple nav-tabs-static border-0 px-1 px-md-0">
          @foreach ($grupos as $grupo)
          @foreach ($grupo as $pregunta)
          <li class="nav-item mr-1px mb-0">
          <a class="btn btn-app  border-1 btn btn-outline-light btn-h-light-warning btn-a-warning  btn-xs my-1 border-2 px-0 " id="btn-tab-{{ $pregunta->id}}" style="min-width: 3.25rem;"  data-toggle="tab" href="#tab-{{ $loop->parent->iteration}}"   role="tab"  @if ($loop->first)
          aria-selected="true" @else aria-selected="false"
          @endif  onclick="setActive('card-{{ $pregunta->id}}')">
          {{ $i}}
          @php
          $i++;
          @endphp
          </a>
          </li>
          @endforeach
          @endforeach
          </ul>
          </div>

          <p class="text-center pt-2"  id="clock"></p>
          <button class="mt-3 btn btn-green py-2 text-600 letter-spacing-1 btn-block">
          Terminar intento
          </button>
          </div>
        </div>
        <!-- /.col -->
        <!-- results -->
        <div class="col-12 col-lg-9 ">
            <!-- sponsored results -->
           
               <div class="tab-content tab-sliding px-0 text-grey-d3 border-0" id="tabsk">
                @php

                $i=1;
                @endphp
               @foreach ($grupos as $grupo)
              
                <div  class="tab-pane show px-25
                @if($loop->first) active @endif" id="tab-{{ $loop->iteration }}" role="tabpanel" >
                 @foreach ($grupo as $pregunta)

                   @if (class_basename($pregunta->preguntable)=='PreguntaFija')
                              <div class="mb-3">
                                @component('components.docente.a-virtual.sub-contenido.quiz.pregunta-preview',['pregunta'=>$pregunta->preguntable,'numero'=>$i,'idCard'=>$pregunta->id])
                                @endcomponent  
                            </div>
                            @endif

                              @if (class_basename($pregunta->preguntable)=='PreguntaAleatoria')
                              <div class="mb-3 bgc-dark">
                               
                                @component('components.docente.a-virtual.sub-contenido.quiz.pregunta-preview',['pregunta'=>$pregunta->preguntable->preguntas->random()->datosPregunta,'numero'=>$i,'idCard'=>$pregunta->id])
                                @endcomponent  
                            </div>
                          
                            @endif
              
                 @php
                    $i++;
                    @endphp
                @endforeach
              </div>
                @endforeach
              </div>
           
            <!-- other results -->
        </div>

        <!-- /.col -->
    </div>
    </form>

    @endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection


@section('script')
   <script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
<script src="{{ asset('assets/js/summernote-lite.min.js')}}" type="text/javascript">
</script>
    <script type="text/javascript">
        var el;
    var elCont;
    jQuery(function($) {

var fiveSeconds = new Date().getTime() + (60000* {{ $evaluacion->duracion }});
$('#clock').countdown(fiveSeconds, {elapse: true})
.on('update.countdown', function(event) {
  var $this = $(this);
  console.log(event);
  if (event.elapsed) {
    $this.html(event.strftime('After end: <span>%H:%M:%S</span>'));
    alert('fin')
  } else {
    $this.html(event.strftime('Tiempo restante: <span>%H:%M:%S</span>'));
  }
});
      $('.descripcion').summernote({
    callbacks: {
     onChange: function(contents, $editable) {
      console.log('onChange:', contents, $editable);
      name=$editable.parent().parent().parent().parent().parent().parent().parent().parent().attr('btn-id')
      $(name).addClass('btn-success text-white').removeClass('btn-h-light-warning btn-a-warning');
    },
                onBlur: function() {
                  console.log('Editable area loses focus');
                }
              }
});
 
     $('[data-toggle=next]')
          .on('click', function(e) {
            e.preventDefault()

            $(this)
              .closest('.card-body')
              .find('a[data-toggle=tab][href="' + this.getAttribute('href') + '"]')
              .tab('show')
          })
$(document).ready(function() {




  });

    @component('components.js.validate-form')
       @slot('formId')
       '#quiz-form'
       @endslot

      @slot('rules')
       nombre:{required:true }
      @endslot
  

       @slot('submitHandler')
        var formData = new FormData($('#quiz-form')[0]);

@component('components.js.ajax')
@slot('url')
' {{ route('Docente.Evaluacion.QualifyPreview',['evaluacion'=>$evaluacion->id]) }} '
@endslot

@slot('data')
formData
@endslot


@slot('beforeSend')
$('#Widget-create').aceWidget('startLoading');
@endslot
@slot('success')

$('#Widget-create').aceWidget('stopLoading');

rstForm("#form-create");
$('#content-container').append(message.content);
$( "#content-container" ).sortable( "refresh" );
$("#modal-registro").modal('hide');
Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
@endslot


@endcomponent


       @endslot

    @endcomponent
              
        
       });



function setActive(index) {
    //$("#tabs").tabs("option", "active", index );
    setTimeout(function() {
        window.location.href = "#" + index
    }, 2000);
}

function checkCBox(el) {
    container = $(el).parent().parent().parent();
    elementos = container.find('input:checkbox:checked').length;
    name = container.parent().parent().parent().attr('btn-id')
    if (elementos >= 1) {
        $(name).addClass('btn-success text-white').removeClass('btn-h-light-warning btn-a-warning');
    } else {
        $(name).removeClass('btn-success text-white').addClass('btn-h-light-warning btn-a-warning');
    }
}

function checkRadio(el) {
    container = $(el).parent().parent().parent();
    elementos = container.find('input:radio:checked').length;
    name = container.parent().parent().parent().attr('btn-id')
    if (elementos >= 1) {
        $(name).addClass('btn-success text-white').removeClass('btn-h-light-warning btn-a-warning');
    } else {
        $(name).removeClass('btn-success text-white').addClass('btn-h-light-warning btn-a-warning');
    }
}
    </script>
    @endsection
</hr>