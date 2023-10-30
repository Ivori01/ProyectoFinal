@extends('layouts.ace',['title'=>'Alumno | Aula Virtual'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('Alumno.AulaVirtual.Index')])
@endcomponent
@endsection 

@section('navbar-menu')
@component('components.alumno.a-virtual.navbar-menu')
@slot('li')
<li class="nav-item dd-backdrop dropdown dropdown-mega">
    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" data-toggle="dropdown" href="#" id="li-nrotareas" role="button">
        <i class="fa fa-tasks text-110 icon-animated-vertical mr-lg-1">
        </i>
        <span class="d-inline-block d-lg-none ml-2">
            Tareas Pendientes
        </span>
        <!-- show only on mobile -->
        <span class="badge badge-sm badge-warning radius-round text-80 border-1 brc-white-tp5" id="li-nrotareas2">
            @php
                   $cont=0;
                   foreach($cursos as $curso){
                   foreach($curso->contenidos as $contenido){
                   foreach($contenido->subContenidos as $subContenido){
                    foreach($subContenido->tareas as $tarea){
                    if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->count() <1 ){
$cont++;
                    }}}} }

                    @endphp
            <input hidden="" id="nrotareas" name="" type="text" value="{{ $cont }}">
                {{ $cont }}
            </input>
        </span>
        <i class="caret fa fa-angle-left d-block d-lg-none">
        </i>
        <div class="dropdown-caret brc-warning-l2">
        </div>
    </a>
    <div class="shadow dropdown-menu dropdown-animated animated-1 dropdown-xs p-0 bg-white brc-warning-l1 border-x-1 border-b-1">
        <div class="bgc-warning-l2 py-25 px-4 border-b-1 brc-warning-l2">
            <span class="text-dark-tp4 text-600 text-90 text-uppercase">
                <i class="fa fa-check mr-2px text-warning-d2 text-120">
                </i>
                Tareas sin Enviar
            </span>
        </div>
        @foreach($cursos as $curso)
                  @foreach($curso->contenidos as $contenido)
                   @foreach($contenido->subContenidos as $subContenido)
                    @foreach($subContenido->tareas as $tarea)
                    @if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->count() <1 )
        <div class="px-4 py-2">
            <div class="text-95">
                <span class="text-purple-d1 text-blue font-bolder">
                    {{ $curso->cursoinfo->datosCurso->nombre }}
                </span>
            </div>
            <div class="text-95">
                <span class="text-grey-d1 text-blue font-bolder">
                    {{ $subContenido->nombre }}
                </span>
            </div>
            <div class="text-95">
                <span class="text-grey-d1">
                    {{ $tarea->nombre }}
                </span>
            </div>
            <div class="progress mt-2">
                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bgc-success" role="progressbar" style="width: 100%;">
                    Vence : 
                           {{{ $tarea->fecha_ven->diffForHumans() }}}
                </div>
            </div>
        </div>
        <hr class="my-1 mx-4">
            @endif
                @endforeach
                 @endforeach
                @endforeach
                @endforeach
        </hr>
    </div>
</li>
@endslot
@endcomponent
@endsection


@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
<a href="{{ route('Alumno.AulaVirtual.Index') }}">
    Aula Virtual
</a>
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/photoswipe.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<style>
    .pricing-col {
        z-index: 0;
        transition: border-color 150ms, transform 150ms, z-index 0ms;
        transition-delay: 0ms, 0ms, 75ms;
      }

      .pricing-col:hover {
        transition-delay: 0ms;
        z-index: 1;
        transform: scale(1.06);
        /** box-shadow: 0 0 5px 0px rgba(0,0,0,0.1); **/
      }
</style>
@endsection

@section('content')
<div class="row d-flex justify-content-center mx-1 mx-lg-0 mt-3 col 8">
    @foreach($cursos as $curso)
    <div class="col-12 col-sm-6 col-lg-3 px-2 pt-4 pricing-col">
        <div class="d-style w-100 border-t-3 my-1 pb-3 btn btn-outline-light btn-h-outline-blue btn-h-bgc-white btn-a-outline-blue btn-a-bgc-white">
            <div class="d-flex flex-column align-items-center">
                <span class="position-tr mt-n25 mr-5px">
                    <span class="badge badge-warning badge-lg arrowed-in arrowed-in-right">
                        {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }}
                    </span>
                </span>
                <h4 class="w-90 pb-1 text-140 text-blue-m3 mt-2 mb-3 border-b-2 brc-grey-l2">
                    <i>
                        {{  $curso->cursoInfo->datosCurso->nombre }}
                    </i>
                </h4>
                <div class="mb-2 px-2 py-25 brc-default-m4">
                    {{--
                    <i class="w-6 fas fa-running fa-2x">
                    </i>
                    --}}
                    <img height="120" src="{{  url(Storage::url('sistem/photos/curso/'.$curso->cursoInfo->datosCurso->imagen)) }}" width="70%">
                    </img>
                </div>
                <div class="text-secondary-m1">
                    <span class="">
                        {!!  $curso->seccionInfo->datosGrado->nombre .' '. $curso->seccionInfo->letra !!}
                    </span>
                </div>
                <hr class="w-90 my-4 brc-grey-l2">
                    <div class="flex-grow-1 text-grey-m1 text-90 w-90">
                        <ul class="list-unstyled text-left mx-auto mb-1">
                            <li class="d-flex align-items-start mt-25">
                                <i class="fas fa-chalkboard-teacher text-info-m3 text-110 mr-2 mt-1">
                                </i>
                                <div class="text-truncate">
                                    <span class="text-110 font-weight-bold ">

                                        {{ $curso->docenteInfo->persona->NombresApellidos ?? 'Docente no asignado'}}
                                        
                                    </span>
                                </div>
                            </li> 
                            <li class="mt-3 text-center">
                                <hr class="my-4 brc-grey-l2">
                                    <a class="pos-abs v-n-active btn btn-outline-default px-3 btn-bold" href="{{ route('Alumno.AulaVirtual.Curso.Index', ['id' => $curso->id]) }}">
                                        Ver 
                                    </a>
                                    <a class="pos-rel v-active btn btn-blue px-3 btn-bold" href="{{ route('Alumno.AulaVirtual.Curso.Index', ['id' => $curso->id]) }}">
                                        Ver
                                    </a>
                                </hr>
                            </li>
                        </ul>
                    </div>
                </hr>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection


@section('script')
<script type="text/javascript">
    jQuery(function($) {
     $(document).ready(function() {

        if($('#nrotareas').val()>0){
           $('#li-nrotareas').click();
           
        }
        });

        });
</script>
@endsection
