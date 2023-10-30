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

{{-- 
            {{ $curso->cursoinfo->datosCurso->nombre }} |
{{ $curso->seccionInfo->datosGrado->nombre }} --}}
{{-- {{ $examen->subContenido->datosContenido->datosCurso->seccionInfo->letra }} |
{{ $examen->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->DatosNivel->nombre }} --}}
<i class="fa fa-angle-double-right text-80">
</i>
{{--
<a href="{{ route('Docente.AulaVirtual.Curso.Contenido', ['id' => $curso->id]) }}">
Contenido
</a>
--}}
<i class="fa fa-angle-double-right text-80">
</i>
examen
<i class="fa fa-angle-double-right text-80">
</i>
Editar
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/summernote-lite.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


@php
$curso=$evaluacion->subContenido->datosContenido->datosCurso;
@endphp
<div class="alert bgc-secondary-l3 text-dark-m1 border-none border-l-4 brc-blue radius-0 py-3 text-115">
    Resultados de :
    <b>
        {{ $evaluacion->nombre }}
    </b>
    <p class=" mb-0 mt-2">
        Metodo de calificacion :
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
    <p>
        Calificaciones sobre :
        <b>
            {{ $evaluacion->calificacion_max}}
        </b>
    </p>
</div>
<div class="radius-1 table-responsive">
    <table class="table table-striped table-bordered table-hover brc-black-tp10 mb-0 text-grey">
        <thead class="brc-transparent">
            <tr class="bgc-green-d2 text-white">
                <th>
                    #
                </th>
                <th>
                    Alumno
                </th>
                <th>
                    Intentos
                </th>
                <th>
                    Nota
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($curso->seccionInfo->alumnos as $alumno)
            <tr class="bgc-h-yellow-l3">
                <td>
                    {{ $loop->iteration }}
                </td>
                <td class="text-600 text-dark">
                    {{ $alumno->datosAlumno->persona->ApellidosNombres }}
                </td>
                <td class=" text-center text-600">
                    @php
                    $miAttemps=$evaluacion->intentosRealizados->where('alumno_id',$alumno->id_alumno);
                  
                    @endphp
                    @if ($miAttemps->count()>=1)
                    <a href="{{ route('Docente.Evaluacion.Attemps',['evaluacion'=>$evaluacion->id,'alumno'=>$alumno->id_alumno]) }}">
                        {{ $miAttemps->count() }}
                    </a>
                    @endif
                </td>
                <td class="text-center text-600">
                    {{$promedios->where('alumno',$alumno->datosAlumno->id)->first()['nota'] }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div style="width: 100%;height: 700px" id="barchart_material" class="pt-5">

</div>
@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection

@section('script')
<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" type="text/javascript">
</script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Notas', 'Alumnos'],
            @foreach($promedios->sortBy('nota')->groupBy('nota') as $grupo)



            [ '{{
                    $grupo->first()['nota']
                }}' , {{
                    $grupo->count()
                }}],
            @endforeach


        ]);

        var options = {
            vAxis: {
                format: 'decimal'
            },

            legend: {
                position: 'none'
            },
            bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
{{-- expr --}}
@endsection