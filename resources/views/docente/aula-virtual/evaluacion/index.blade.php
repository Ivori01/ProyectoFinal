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


            {{ $curso->cursoinfo->datosCurso->nombre }} |
            {{ $curso->seccionInfo->datosGrado->nombre }}
            {{-- {{ $examen->subContenido->datosContenido->datosCurso->seccionInfo->letra }} |
            {{ $examen->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->DatosNivel->nombre }} --}}
            <i class="fa fa-angle-double-right text-80">
            </i>
            <a href="{{ route('Docente.AulaVirtual.Curso.Contenido', ['id' => $curso->id]) }}">
                Contenido
            </a>
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
    <link href="{{ asset('assets/css/default-skin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/summernote-lite.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="card bcard overflow-hidden shadow">
        <div class="card-body p-3px bgc-green-d2">
            <div class="radius-1 table-responsive">
                <table class="table table-striped table-bordered table-hover brc-black-tp10 mb-0 text-grey">
                    <thead class="brc-transparent">
                        <tr class="bgc-green-d2 text-white">
                            <th>
                                Nombre
                            </th>
                            <th>
                                Resueltos
                            </th>
                            <th>
                                Disponible desde
                            </th>
                            <th>
                                Disponible hasta
                            </th>
                            <th>
                                Resultados
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($curso->contenidos as $contenido)
                            @foreach ($contenido->examenes as $evaluacion)
                                <tr class="bgc-h-yellow-l3">
                                    <td class="text-600 text-dark">
                                        {{ $evaluacion->nombre }}
                                    </td>
                                    <td class=" text-600">

                                        {{ $evaluacion->intentosRealizados->groupBy('alumno_id')->count() }}
                                    </td>
                                    <td>
                                        {{ $evaluacion->fecha_inicio }}
                                    </td>
                                    <td>
                                        {{ $evaluacion->fecha_fin }}

                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a class="text-150 text-brown"
                                            href="{{ route('Docente.Evaluacion.Show', ['evaluacion' => $evaluacion]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-130 text-purple"
                                            href="{{ route('Docente.Evaluacion.Edit', ['evaluacion' => $evaluacion]) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    
                                        <a class="text-130 text-danger " data-target="#modal-destroy" href="" data-toggle="modal"
                                            onclick="deleteEval('{{ route("Docente.Evaluacion.Destroy", ["evaluacion" => $evaluacion])}}. ',this)">
                                            <i class="ace-icon fa fa-trash bigger-130"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- ./table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>
    <input type="hidden" value="{{ csrf_token() }}" id="token">
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('script')
    <script>
        function deleteEval(ruta,el) {
        elem=$(el).parent().parent();
       
            Swal.fire({
                title: 'Desea eliminar esta evaluacion ?',
                text: "La accion no se podra revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si,eliminar !',
            }).then((result) => {
                if (result.value) {
                    token = $("#token").val();
                    $.ajax({
                        url: ruta,
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            _token: token,
                            _method: "DELETE",
                        },
                        success: function(msg) {
                           
                            elem.remove()
                            Swal.fire('Eliminado', msg.message, 'success')
                        },
                        error: function(msg) {
                            Swal.fire('Error!', msg.message, 'error')
                        }
                    });
                }
            })
        }
    </script>
@endsection
