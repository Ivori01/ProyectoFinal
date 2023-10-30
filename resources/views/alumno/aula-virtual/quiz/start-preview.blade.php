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
<a href="{{ route('Alumno.AulaVirtual.Index')}}">
    Aula virtual
</a>
@endslot

@slot('subpage_name')
<a href="{{ route('Alumno.AulaVirtual.Curso.Index',['id'=>$evaluacion->subContenido->datosContenido->datosCurso]) }}">
  {{$evaluacion->subContenido->datosContenido->datosCurso->cursoInfo->datosCurso->nombre  }} 
</a>

@endslot
@endcomponent
@endsection



@section('content')

@php
  $intentosRealizados=auth()->user()->persona->alumno->intentosEvaluacion->where('evaluacion_id', $evaluacion->id); 
@endphp
<div class="card border-0" id="card-2">
    <div class="card-header bgc-dark-d1">
        <h5 class="card-title text-white">
            {{ $evaluacion->nombre }}
        </h5>
    </div>
    <div class=" card-body p-0 bgc-warning-l4">
        <div class="p-3">
            <p>
                <b>
                    {{ $evaluacion->indicaciones }}
                </b>
            </p>
            <p class="text-center">
                Disponible desde :
                
                    {{ $evaluacion->fecha_inicio }}
            </p>
            <p class="text-center">
                Disponible hasta :
                
                    {{ $evaluacion->fecha_fin }}
            </p>
            <p class="text-center">
                Método de calificación :
                <b>
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
                </b>
            </p>
            <p class="text-center">
                Intentos permitidos:
                <b>
                    {{ $evaluacion->intentos }}
                </b>
            </p>
            <p class="text-center">
                Duración :
                <b>
                    {{ $evaluacion->duracion }} Minutos
                </b>
            </p>

            @if ($intentosRealizados->count() >=1)

            <p class="bgc-success"><h5><b>Resumen de los últimos intentos</b></h5></p>
             <div class="radius-1 table-responsive pb-4">
                      <table class="table table-striped table-bordered table-hover brc-black-tp10 mb-0 text-grey">
                        <thead class="brc-transparent">
                          <tr class="bgc-green-d2 text-white">
                            <th>
                            Intento
                            </th>
                            <th>
                              Estado
                            </th>
                            <th>
                             Calificacion
                            </th>
                            <th>
                             Revision
                            </th>
                          
                          </tr>
                        </thead>

                        <tbody>
                          @foreach ($intentosRealizados as $intento)
                            <tr class="bgc-white">
                            <td class="text-600 text-dark">
                             {{ $loop->iteration }}
                            </td>

                            <td class="text-info-m1 text-130 text-400">
                             {{ $intento->estado }}
                            </td>

                            <td>
                              @if ( $intento->estado=='Finalizado')
                              @php
                              $puntosEvaluacion = 0;
                            
                      
                              foreach ($evaluacion->preguntas as $pregunta) {
                                  $nameClase = class_basename($pregunta->preguntable);
                                  if ($nameClase == 'PreguntaFija') {
                                      $puntosEvaluacion += $pregunta->preguntable->puntos;
                                  } else {
                                      $puntosEvaluacion += $pregunta->preguntable->puntaje;
                                  }
                              }
                              @endphp
                               {{ $evaluacion->calificacion_max*$intento->resultados->sum('puntaje')/$puntosEvaluacion }} 
                              @endif
                            </td>

                            

                            <td class="text-center">
                              @if ( $intento->estado=='Finalizado')
                                @if ($evaluacion->correccion)
                                  <a href="{{ route('Alumno.Evaluacion.ReviewAttemp',['intento'=>$intento]) }}" class="btn btn-sm btn-light-black radius-round border-0 px-4">
                                 Ver revisión
                                </a>
                                @else
                                 No se permiten revisiones
                                @endif
                              @endif
                             
                            </td>
                          </tr>
                          @endforeach
                          

                        </tbody>
                      </table>
                    </div>
            @endif
           
            <div class="d-flex justify-content-center">



              @if (Carbon\Carbon::now()->between($evaluacion->fecha_inicio,$evaluacion->fecha_fin))
                @if ($intentosRealizados->count()==0)
                <a class="btn px-4 btn-success btn-lg mb-1" href="{{ route('Alumno.Evaluacion.Preview',['evaluacion'=>$evaluacion]) }}">
                Iniciar intento
                </a>
                @else
                  @if ($intentosRealizados->where('estado','En proceso')->count() >=1)
                  <a class="btn px-4 btn-success btn-lg mb-1" href="{{ route('Alumno.Evaluacion.Preview',['evaluacion'=>$evaluacion]) }}">
                  Continuar el ultimo intento
                  </a>
                  @else
                    @if ($intentosRealizados->count()<$evaluacion->intentos)
                     <a class="btn px-4 btn-success btn-lg mb-1" href="{{ route('Alumno.Evaluacion.Preview',['evaluacion'=>$evaluacion]) }}">
                    Reintentar evaluacion
                    </a>
                    @else
                    <h5>No se permiten mas intentos</h5>
                    @endif
                  @endif
                @endif
              @else
                <h5>Evaluacion no disponible</h5>
              @endif
           

            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection



