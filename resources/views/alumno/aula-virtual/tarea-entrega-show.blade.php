@extends('layouts.ace',['title'=>'Alumno | Aula Virtual'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('Alumno.AulaVirtual.Index')])
@endcomponent
@endsection

@section('navbar-menu')
@component('components.alumno.a-virtual.navbar-menu')

@slot('li')
<li class="nav-item"><a  class="nav-link dropdown-toggle" href="{{ route('Alumno.TareaEntrega.Revisiones',['id'=>$curso->id]) }}"> <i class="fa fa-eye text-110 icon-animated-vertical mr-lg-1">
                </i> Revisiones</a></li>
                
  <li class="nav-item dd-backdrop dropdown dropdown-mega">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" data-toggle="dropdown" href="http://104.237.146.83/templates/ace/demo/#" role="button" id="li-nrotareas">
                <i class="fa fa-tasks text-110 icon-animated-vertical mr-lg-1">
                </i>
                <span class="d-inline-block d-lg-none ml-2">
                    Tareas Pendientes
                </span>
                <!-- show only on mobile -->
<span id="id-navbar-badge1" class="badge badge-sm badge-warning radius-round text-80 border-1 brc-white-tp5">
                    @php
                   $cont=0;
                   $contenidos=$curso->contenidos;
                   foreach($contenidos as $contenido){
                   foreach($contenido->subContenidos as $subContenido){
                    foreach($subContenido->tareas as $tarea){
                    if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->count() <1 ){
$cont++;
                    }}}} 

                    @endphp
                    {{ $cont }}
                     <input type="text" hidden="" name="" id="nrotareas" value="{{ $cont }}">
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
                  @foreach($contenidos as $contenido)
                   @foreach($contenido->subContenidos as $subContenido)
                    @foreach($subContenido->tareas as $tarea)
                    @if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->count() <1 )

                <div class="px-4 py-2">
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
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bgc-success" role="progressbar" style="width: 100%;">Vence :
                           {{{ $tarea->fecha_ven->diffForHumans() }}}
                        </div>
                    </div>
                </div>
                <hr class="my-1 mx-4">
                @endif
                @endforeach
                 @endforeach
                @endforeach
                
                
            </div>
        </li>
@endslot

@endcomponent
@endsection



@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
<a href="{{ route('Alumno.AulaVirtual.Index')}}">Aula virtual</a>
@endslot
@slot('subpage_name')

<a href="{{ route('Alumno.AulaVirtual.Curso.Index', ['id'=>$curso->id]) }}">
{{ $curso->cursoinfo->datosCurso->nombre }}  
</a>
<i class="fa fa-angle-double-right text-80">
        </i> Revision de tareas

@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap">

@endsection

@section('content')


            
<div class="bgc-success-d1 text-white px-3 py-25">
              <span class="text-90">Tareas</span>
            
            </div>
              <div class="table-responsive-md">
                <table id="datatable" class="table table-border-y text-dark-m2 text-95 border-y-1 border-r-1 border-l-1 brc-secondary-l1">
                  <thead class="text-dark-m3 bgc-grey-l3">
                    <tr>
                      
                      <th class="border-0 bgc-h-default-l3">Tarea</th>
                      <th class="border-0 bgc-h-default-l3">Estado</th>
                      <th class="border-0 bgc-h-default-l3">Fecha de entrega</th>
                      <th class="border-0 bgc-h-default-l3">Nota</th>
                      <th class="border-0 bgc-h-default-l3">Comentario</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($curso->contenidos as $contenido)
                    @foreach($contenido->tareas as $tarea)

                    <tr class="d-style bgc-h-default-l4">
                    
                      <td>
                        <span class="text-105">{{ $tarea->nombre }}</span>
                       
                      </td>
                      @php 
                      $entrega=$tarea->entregas->where('alumno',auth()->user()->persona->id)->first() ;
                      $revision=$tarea->revision->where('alumno',auth()->user()->persona->id)->first();
                      @endphp
                     
                      <td class="text-grey">
                        
                        <div>
                          @if(optional($entrega)->exists())
                          <span class='badge badge badge-success arrowed-in arrowed-in-right'>Entregado</span>
                          @else
                          <span class='badge badge badge-danger arrowed-in arrowed-in-right'>No entregado</span>
                          @endif
                        </div>
                      </td>
                      <td >
                         @if(optional($entrega)->exists())
                        {{  $entrega->created_at->format('Y/m/d g:i:s A')}} 
                          @else
                         -
                          @endif
                      </td>
                     
                      <td>
                         @if(optional($revision)->exists())
                  {{ $revision->nota }}
                          @else
                         -
                          @endif
                      </td>
                     <td class="pos-rel ">
                       {{ optional($revision)->comentario }}
                      </td>
                    </tr>
                    @endforeach
                  @endforeach
                  
                  </tbody>
                </table>
              </div>

            
@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection


@section('script')

 <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}">
        </script>
  <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}">

  </script>
       <script src="{{ asset('assets/js/dataTables.select.min.js')}}">

  </script>    
<script type="text/javascript">
    var myTable; 
    jQuery(function($) {
          

  @component('components.js.table',['route'=>'','idTable'=>'datatable'])
  @endcomponent
        });
</script>
@endsection
