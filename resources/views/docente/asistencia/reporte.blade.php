@extends('layouts.print',['title'=>'Reporte','headertitle'=>'Alumno'])


@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
ver
@endslot
@slot('subpage_name')
 
      Notas
@endslot
@endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-12 ">
        <p class="h2 text-center">
            Reporte  de asistencia
        </p>
        <div class="table-responsive-md">
            <table class="table table-bordered text-dark-m1 ">
                <thead>
                    <tr class="bgc-secondary-l3">
                        <th>
                            Documento
                        </th>
                        <th>
                            Nombres Apellidos
                        </th>
                        @foreach($estados as $estado)
                        <th>
                           {{$estado->valor1}}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                    <tr>
                        <th>
                            {{$alumno->datosAlumno->persona->nrodocumento}}
                        </th>
                        <th>
                            {{$alumno->datosAlumno->persona->apellidos_nombres}}
                        </th>
                        @foreach($estados as $estado)
                        <th>
                          {{$asistencias->where('alumno_id',$alumno->id)->where('estado',$estado->id)->count()}}
                          
                        </th>
                        @endforeach
                        
                    </tr>
                        
                    @endforeach
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection