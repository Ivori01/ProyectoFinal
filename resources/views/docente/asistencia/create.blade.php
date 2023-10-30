@extends('layouts.ace',['title'=>'Docente | Asistencia'])

@section('logo')
    @component('components.logo', ['app_name' => 'School', 'href_logo' => route('home')])
    @endcomponent
@endsection


@section('navbar-menu')
    @component('components.docente.navbar-menu')
    @endcomponent
@endsection

@section('sidebar')
    @component('components.sidebar')
        @section('sidebar-menu')
            @component('components.docente.sidebar-menu')
            @endcomponent
        @endsection
    @endcomponent
@endsection

@section('page-name')
    @component('components.page-name', ['subpage_name' => 'Cursos'])
        @slot('page_name')
            Asistencia
        @endslot
        @slot('subpage_name')
        {{$seccion->seccionInfo->datosGrado->nombre}} {{ $seccion->seccionInfo->letra }} -  {{ $seccion->cursoInfo->datosCurso->nombre }}
        @endslot
    @endcomponent
@endsection

@section('head')
    <link href="{{ asset('assets/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <div class="row">
        <div class="col-12">


            @php
                $now = Jenssegers\Date\Date::now();
                $week = [];
                $days = [];
                $carbaoDay = Jenssegers\Date\Date::now();
                for ($i = 0; $i < 5; $i++) {
                    $days[] = $carbaoDay
                        ->startOfWeek()
                        ->addDay($i)
                        ->format('Y-m-d');
                    $week[] = $carbaoDay
                        ->startOfWeek()
                        ->addDay($i)
                        ->format('l j F'); //push the current day and plus the mount of $i
                }
                
            @endphp

            <div class="table-responsive">
                <form action="{{route('Docente.Asistencia.Store')}}"  method="POST" >
                    @csrf
                    <input type="text" name="seccion" value="{{$seccion->id}}" hidden>
                    <table class="table  table-bordered text-dark  ">
                        <thead class="text-dark-tp3 bgc-secondary-l3 text-80 ">
                            <tr>
                                <th rowspan="2 brc-grey-1">
                                    Alumno
                                </th>
                                @foreach ($week as $day)
                                    <th colspan="{{ count($estados) }}">{{ $day }}</th>
                                @endforeach
    
    
                            </tr>
                            <tr class=" text-80 ">
                                @foreach ($week as $day)
                                    @foreach ($estados as $estado)
                                        <th>
                                            {{ $estado->valor1 }} <label class="py-0">
                                                <input type="radio" class="align-middle">
                                            </label>
                                        </th>
                                    @endforeach
                                @endforeach
                            </tr>
                        </thead>
    
                        <tbody class="mt-1 text-75">
    
                            @foreach ($seccion->seccionInfo->alumnos as $alumno)
                                <tr class=" ">
    
    
                                    <td>
                                        {{ $alumno->datosAlumno->persona->apellidos_nombres }}
                                    </td>
    
                                    @foreach ($week as $day)
                                        @php
                                            $class = '';
                                            $size = 'sm';
                                            if ($loop->index == $now->dayOfWeek) {
                                                $class = 'bgc-green-m2';
                                                $size = 'lg';
                                            }
                                        @endphp
                                        @foreach ($estados as $estado)
                                            <td class="{{ $class }} 
                                                 @if ($loop->first)
                                                border-l-2
    
                                        @endif
    
                                        @if ($loop->last)
                                            border-r-2 
    
                                        @endif
                                        ">
                                        <div>
                                            @php
                                            $checked='';
                                                $asistencia=$asistencias->where('fecha',$days[$loop->parent->index])
                                                ->where('alumno_id',$alumno->id)->where('curso_id',$seccion->id)
                                                ->where('estado',$estado->id);
                                                if(count($asistencia)>0){
                                                    $checked='checked';
                                                }

                                            @endphp
                                     
                                            <label>
                                                <input type="radio" name="{{ $alumno->id }}.{{ $days[$loop->parent->index] }}"
                                                    class="input-{{ $size }} text-success" value="{{$estado->id}}" {{$checked}}>
    
                                            </label>
                                        </div>
                                        </td>
                                    @endforeach
                            @endforeach
    
                            </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                    <input type="submit" class="btn btn-success btn-block" value="Guardar">
                </form>

                

            </div>

        </div>


    </div>
@stop


@section('footer')
    @component('components.footer')
    @endcomponent
@endsection


@section('script')
    <script src="{{ asset('assets/js/bootstrap-table.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js') }}" type="text/javascript">
    </script>
    <script type="text/javascript">
        @if(session('updated'))
            Swal.fire({
                icon: 'success',
                title:'Registro actualizado',
                showConfirmButton: false,
                timer: 2500
              })
        @endif
     
        var myTable;
        jQuery(function($) {
            $('#menu-asistencia').addClass('active open');
            $('#menu-asistencia').children('.submenu').addClass('show');

            $('#menu-asistencia-index').addClass('active');




            @component('components.js.b-table', ['route' => route('Docente.Asistencia.Secciones')])
            @endcomponent





        })
    </script>
@stop
