@extends('layouts.ace',['title'=>'Alumno | Aula Virtual'])

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
{{-- {{ $curso->cursoinfo->datosCurso->nombre }} | {{$curso->seccionInfo->datosGrado->nombre }} {{ $curso->seccionInfo->letra }} | {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }} --}}
 
@endslot
@endcomponent
@endsection

@section('head')
    <link href="{{ asset('assets/css/summernote-lite.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

@php
$evaluacion=$intento->datosEvaluacion;
$preguntas=$intento->preguntas;

  $nroTabs=floor($preguntas->count() /$evaluacion->n_preguntas) + $evaluacion->preguntas->count() % $evaluacion->n_preguntas;
  $grupos=[];
  for($i=1;$i<=$nroTabs;$i++){
     $grupos[]=$preguntas->take($evaluacion->n_preguntas);
     for($j=1;$j<=$evaluacion->n_preguntas;$j++){
       $preguntas->shift();
     }
     
  }
  $i=1;
@endphp

    <div class="row mt-45">
      <input  name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="col-12 col-lg-3">
          <div class="sticky-top pt-4">
          <h5 class="pb-1">Navegacion</h5>
          <div class="pt-2" id="cajas">
          <ul role="tablist" class="w-100 nav nav-fill nav-tabs nav-tabs-simple nav-tabs-static border-0 px-1 px-md-0">
          @foreach ($grupos as $grupo)
          @foreach ($grupo as $pregunta)
          @php
             $marqueds=$pregunta->respuestasMarcadas;
             $text=$pregunta->respuestaTexto;
             $marcada=0;
             if ($marqueds->count()>=1 || $text->texto!=null) {
               $marcada=1;
             }
             
          @endphp

          <li class="nav-item mr-1px mb-0">
          <a class="btn btn-app  border-1 btn btn-outline-light btn-h-light-warning btn-a-warning   @if ($marcada==1)
           btn-success text-white
          @endif btn-xs my-1 border-2 px-0 " id="btn-tab-{{ $pregunta->id}}" style="min-width: 3.25rem;"  data-toggle="tab" href="#tab-{{ $loop->parent->iteration}}"   role="tab"  @if ($loop->first)
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
          <button class="mt-3 btn btn-green py-2 text-600 letter-spacing-1 btn-block" onclick="finishAttemp();">
          Terminar intento
          </button>
          </div>
        </div>
        <!-- /.col -->
        <!-- results -->
        <div class="col-12 col-lg-9 " id="preguntas-intento">
            <!-- sponsored results -->
           
               <div class="tab-content tab-sliding px-0 text-grey-d3 border-0" id="tabsk">
                @php

                $i=1;
                @endphp
               @foreach ($grupos as $grupo)
                <div  class="tab-pane show px-25
                @if($loop->first) active @endif" id="tab-{{ $loop->iteration }}" role="tabpanel" >
                 @foreach ($grupo as $pregunta)

                  
                              <div class="mb-3">
                                @component('components.alumno.a-virtual.sub-contenido.quiz.pregunta-preview',['pregunta'=>$pregunta->datosPregunta,'numero'=>$i,'idCard'=>$pregunta->id,'intento_question'=>$pregunta])
                                @endcomponent  
                            </div>
                         

              
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
      const date1 = new Date("{{ $intento->hora_inicio }}");
/*      console.log(date1.getTime())
console.log(Date.parse('{{ $intento->hora_inicio }}'));*/
var fiveSeconds = date1.getTime() + (60000* {{ $evaluacion->duracion }});
$('#clock').countdown(fiveSeconds)
.on('update.countdown', function(event) {
  var $this = $(this);
 
  if (event.elapsed) {
    $this.html(event.strftime('After end: <span>%H:%M:%S</span>'));
  
  } else {
    $this.html(event.strftime('Tiempo restante: <span>%H:%M:%S</span>'));
  }
}).on('finish.countdown', function(event) {

window.location.assign("{{ route('Alumno.Evaluacion.FinishAttemp',['intento'=>$intento]) }}")

});
      $('.descripcion').summernote({
    callbacks: {
     onChange: function(contents, $editable) {
      console.log('onChange:', contents, $editable);

      name=$editable.parent().parent().parent().parent().parent().parent().parent().parent().parent().attr('btn-id')
      $(name).addClass('btn-success text-white').removeClass('btn-h-light-warning btn-a-warning');
    },
                onBlur: function(contents) {

form='#'+$(contents.target).parent().parent().parent().parent().parent().parent().attr('id');
    submitAnswer(form);
           
                  console.log('Editable area loses focus');
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
    form='#'+container.parent().attr('id');
    submitAnswer(form);
  
    elementos = container.find('input:checkbox:checked').length;
    name = container.parent().parent().parent().parent().attr('btn-id')
    if (elementos >= 1) {
        $(name).addClass('btn-success text-white').removeClass('btn-h-light-warning btn-a-warning');

    } else {
        $(name).removeClass('btn-success text-white').addClass('btn-h-light-warning btn-a-warning');
    }
}

function checkRadio(el) {
    container = $(el).parent().parent().parent();
    elementos = container.find('input:radio:checked').length;
 form='#'+container.parent().attr('id');
 console.log(container.parent());
    submitAnswer(form);
  
    name = container.parent().parent().parent().parent().attr('btn-id')
    if (elementos >= 1) {
        $(name).addClass('btn-success text-white').removeClass('btn-h-light-warning btn-a-warning');
    } else {
        $(name).removeClass('btn-success text-white').addClass('btn-h-light-warning btn-a-warning');
    }
}


function submitAnswer(form) {

   dataF= new FormData($(form)[0]);

     $.ajax({
               url: '{{ route('Alumno.Evaluacion.SaveAnswer') }}',
               method: 'POST',
               data: dataF, 
  cache:false,
    dataType:'json',
   processData:false,
    contentType:false,
             
               success: function (response) {
                    console.log(response);
               }
            });
}


function finishAttemp() {
Swal.fire({
  title: 'Esta seguro de finalizar  el intento ?',
  text: "Finalizado el intento, no podrá modificar sus respuestas. ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#62cb9f',
  cancelButtonColor: '#d33',
   cancelButtonText: 'Cancelar',
  confirmButtonText: 'Si, finalizar intento!'
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.value) {
    window.location.assign("{{ route('Alumno.Evaluacion.FinishAttemp',['intento'=>$intento]) }}")
  }
})

  
}
    </script>
    @endsection
</hr>