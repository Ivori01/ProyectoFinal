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
{{-- {{ $curso->cursoinfo->datosCurso->nombre }} | {{ $curso->seccionInfo->datosGrado->nombre}} {{ $curso->seccionInfo->letra }} | {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }} --}}
 
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

  $i=1;
@endphp

    <div class="row mt-45">
      <input  name="_token" type="hidden" value="{{ csrf_token() }}"/>
   
        <!-- /.col -->
        <!-- results -->
        <div class="col-12  " id="preguntas-intento">
            <!-- sponsored results -->
           
             
                @php

                $i=1;
                @endphp
               @foreach ($preguntas as $pregunta)
              
                
                  
                              <div class="mb-3">
                                @component('components.alumno.a-virtual.sub-contenido.quiz.pregunta-review',['pregunta'=>$pregunta->datosPregunta,'numero'=>$i,'idCard'=>$pregunta->id,'intento_question'=>$pregunta])
                                @endcomponent  
                            </div>
                         

              
                 @php
                    $i++;
                    @endphp
              
             
                @endforeach
             
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


    <script type="text/javascript">
        var el;
    var elCont;
    jQuery(function($) {


 
   
        
       });




    </script>
    @endsection
</hr>