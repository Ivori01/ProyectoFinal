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
            Lista de notas
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
                        <th>
                            Seccion
                        </th>
                        <th>
                            Curso
                        </th>
                        <th>
                            Nota
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promedios as $prom)
                    <tr>
                        <td>
                            {{ $prom->get('matricula')->datosalumno->persona->nrodocumento }}
                        </td>
                        <td>
                            {{ $prom->get('matricula')->datosalumno->persona->NombresApellidos }}
                        </td>
                        <td>
                            {{ $prom->get('matricula')->datosSeccion->datosGrado->numero }}° 
                               {{ $prom->get('matricula')->datosSeccion->letra }}
                            {{ $prom->get('matricula')->datosSeccion->datosGrado->datosNivel->nombre }}
                        </td>
                        <td>
                            {{ $prom->get('curso')->cursoInfo->datosCurso->nombre }}
                        </td>
                        <td>
                            @if ($califica=='Literal')
                                 {{ $prom->get('literal')}}
                            @else
                                 {{ $prom->get('prom')}}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop




