@extends('layouts.ace',['title'=>'Alumno | Deudas'])

@section('logo')
    @component('components.logo', ['app_name' => 'School', 'href_logo' => route('home')])
    @endcomponent
@endsection

@section('navbar-menu')
    @component('components.alumno.navbar-menu')
    @endcomponent
@endsection

@section('sidebar')
    @component('components.sidebar')
        @section('sidebar-menu')
            @component('components.alumno.sidebar-menu')
            @endcomponent
        @endsection
    @endcomponent
@endsection

@section('page-name')
    @component('components.page-name', ['subpage_name' => 'Cursos'])
        @slot('page_name')
            Ver
        @endslot
        @slot('subpage_name')

            Deudas
        @endslot
    @endcomponent
@endsection

@section('head')
    <link href="{{ asset('assets/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/photoswipe.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/default-skin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/venobox.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')



    <div class="space-12"></div>



    <h4 class="text-danger-l1 text-center">Total a pagar : <strong class="text-danger">{{ $total }}</strong></h4>

    <div class="col-12">
        <div class="card dcard">
            <div class="card-body px-1 px-md-3">

                <form autocomplete="off">


                    <table id="simple-table"
                        class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
                        <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
                            <tr>
                                <th class="text-center pr-0">
                                    Id
                                </th>

                                <th>
                                    Descripcion
                                </th>

                                <th>
                                    Importe
                                </th>

                                <th class="d-none d-sm-table-cell">
                                    Mora por dia
                                </th>

                                <th class="d-none d-sm-table-cell">
                                    Fecha de vencimiento
                                </th>

                                <th class="d-none d-sm-table-cell">
                                    Año
                                </th>

                                <th></th>

                            </tr>
                        </thead>

                        <tbody class="mt-1">

                            @foreach ($deudas as $deuda)
                                <tr class="bgc-h-yellow-l4 d-style">
                                    <td class="text-center pr-0 pos-rel">
                                        <div class="position-tl h-100 ml-n1px border-l-4 brc-orange-m1 v-hover">

                                        </div>
                                        <div class="position-tl h-100 ml-n1px border-l-4 brc-success-m1 v-active">
                                            <!-- border shown when row is selected -->
                                        </div>

                                        <label>
                                            {{ $deuda->id }}
                                        </label>
                                    </td>

                                    <td>
                                        {{ $deuda->conceptoPagoInfo->descripcion }}
                                    </td>

                                    <td class="text-600 text-orange-d2">
                                        {{ $school_info->simbolo_moneda . $deuda->conceptoPagoInfo->importe }}
                                    </td>

                                    <td class="d-none d-sm-table-cell text-grey-d1">
                                        {{ $school_info->simbolo_moneda . $deuda->conceptoPagoInfo->mora_dia }}
                                    </td>

                                    <td class="d-none d-sm-table-cell text-grey text-95">
                                        {{ $deuda->conceptoPagoInfo->fechavencimiento->format('Y/m/d h:i:s a') }}
                                    </td>

                                    <td class="d-none d-sm-table-cell">
                                        {{ $deuda->conceptoPagoInfo->anio }}

                                    </td>

                                    <td class="text-center pr-0">
                                        @if ($deuda->estado == 'Pendiente')
                                            <span class="badge badge-danger arrowed-in">Pendiente</span>
                                        @else
                                            <span class="badge badge-success arrowed-in">Pagado</span>
                                        @endif
                                    </td>


                                </tr>

                            @endforeach

                        </tbody>
                    </table>

                </form>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>
@stop

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('script')
    <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-table.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/venobox.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/initinput.js') }}"></script>
    <script type="text/javascript">
        var tableAlumnos;

        var routeUpdate;

        var tableDeudas;
        var tableSecciones;
        jQuery(function($) {


            $('#menu-deuda').addClass('active open');
            $('#menu-deuda').children('.submenu').addClass('show');
            $('#menu-deuda-todos').addClass('active');



            @component('components.js.b-table', ['route' => route('Alumno.Deuda.Retrieve'), 'VarName' => 'tableDeudas', 'idTable' =>
                'table-deudas'])
            @endcomponent


            @component('components.js.table', ['route' => route('Alumno.Deuda.Retrieve'), 'VarName' => 'tableDeudas', 'idTable' =>
                'table-deudas'])
            @endcomponent








        })
    </script>

@stop
