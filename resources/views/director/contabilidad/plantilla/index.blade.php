@extends('layouts.ace',['title'=>'Director | Cuentas Por Cobrar','headertitle'=>'Home'])

@section('logo')
    @component('components.logo', ['app_name' => 'School', 'href_logo' => route('home')])
    @endcomponent
@endsection

@section('navbar-menu')
    @component('components.director.navbar-menu')
    @endcomponent
@endsection

@section('sidebar')
    @component('components.sidebar')
        @section('sidebar-menu')
            @component('components.director.sidebar-menu')
            @endcomponent
        @endsection
    @endcomponent
@endsection

@section('page-name')
    @component('components.page-name')
        @slot('page_name')
            Plantillas de pago
        @endslot
        @slot('subpage_name')

            Todos
        @endslot
    @endcomponent
@endsection
@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/photoswipe.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/venobox.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="row">
   
    <div class="col">
        <button class="btn btn-lg btn-info btn-block" data-target="#modal-registro2" data-toggle="modal">
            Nuevo
           
        </button>
    </div>
   
</div>
<div class="row">
    <div class="col-12">
        @component('components.ace-table', ['title' => 'Plantillad de pago', 'id' => 'table-deudas'])
        <th data-sortable="true">
            Id
          </th>
        <th data-sortable="true">
            Nombre
        </th>
        <th data-sortable="true">
          Grado
        </th>
        <th data-sortable="true">
          Año
        </th>
        <th>
            Cantidad de pagos
        </th>
        
        <th>
        </th>
        @endcomponent
    </div>
</div>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal-registro2" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form', ['formId' => 'form-create2', 'cardId' => 'widget2', 'title' =>
                    'Formulario de Registro de Niveles de Educacion', 'color' => 'bgc-primary'])
                    @slot('titleCard')
                        Formulario de registro
                    @endslot
                    @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
                    @slot('formInputs')
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Nombre
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                   <input class="form-control" name="nombre">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Año
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                   <input class="form-control" name="anio" min="1900"  step="1" type="number" value='{{date("Y")}}'>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Grado
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="grado_id">
                        <option value="">
                        </option>
                        @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}">
                         {{$grado->nombre}}  ( {{ $grado->datosNivel->nombre }} ) 
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @component('components.ace-table', ['title' => 'Conceptos de pago', 'id' => 'table-conceptos'])
                    <th class="text-center pr-0">
                        <label>
                            <input autocomplete="off" class="align-bottom" type="checkbox">
                            </input>
                        </label>
                    </th>
                    <th data-sortable="true">
                       Pago
                    </th>
                    <th data-sortable="true">
                        Importe
                    </th>
                   
                    @endcomponent
                </div>
            </div>
            @endslot

                    @slot('cardButtons')
            <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create2');" type="button">
                <i class="fa fa-times mr-2">
                </i>
                Cancelar
            </button>
            <button class="btn btn-bold btn-success">
                Aceptar
                <i class="fa fa-arrow-right ml-2">
                </i>
            </button>
            @endslot
                @endcomponent
        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal-pagos" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form', ['formId' => 'form-create2', 'cardId' => 'widget2', 'title' =>
                    'Formulario de Registro de Niveles de Educacion', 'color' => 'bgc-primary'])
                    @slot('titleCard')
                       Pagos
                    @endslot
                    @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
                    @slot('formInputs')
   
            <div class="row">
                <div class="col-12">
                    <table class="table table-condensed table-bordered">
                        <thead class="bgc-dark text-white">
                            <th>Pago</th>
                            <th>Importe</th>

                        </thead>
                        <tbody id="body-pagos">

                        </tbody>
                    </table>
                  
                </div>
            </div>
            @endslot

                    @slot('cardButtons')
           
            @endslot
                @endcomponent
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal-edit" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form', ['formId' => 'form-create2', 'cardId' => 'widget2', 'title' =>
                    'Formulario de Registro de Niveles de Educacion', 'color' => 'bgc-primary'])
                    @slot('titleCard')
                        Formulario de registro
                    @endslot
                    @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
                    @slot('formInputs')
            <input name="_token" type="hidden" value="{{ csrf_token() }}" id="token"/>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Nombre
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                   <input class="form-control" name="nombre">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Año
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                   <input class="form-control" name="anio" min="1900"  step="1" type="number" value='{{date("Y")}}'>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Grado
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="grado_id">
                        <option value="">
                        </option>
                        @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}">
                         {{$grado->nombre}}  ( {{ $grado->datosNivel->nombre }} ) 
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @component('components.ace-table', ['title' => 'Conceptos de pago', 'id' => 'table-conceptos'])
                    <th class="text-center pr-0">
                        <label>
                            <input autocomplete="off" class="align-bottom" type="checkbox">
                            </input>
                        </label>
                    </th>
                    <th data-sortable="true">
                       Pago
                    </th>
                    <th data-sortable="true">
                        Importe
                    </th>
                   
                    @endcomponent
                </div>
            </div>
            @endslot

                    @slot('cardButtons')
            <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create2');" type="button">
                <i class="fa fa-times mr-2">
                </i>
                Cancelar
            </button>
            <button class="btn btn-bold btn-success">
                Aceptar
                <i class="fa fa-arrow-right ml-2">
                </i>
            </button>
            @endslot
                @endcomponent
        </div>
    </div>
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
<script src="{{ asset('assets/js/jquery.inputmask.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/additional-methods.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-maxlength.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/autosize.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/initinput.js') }}">
</script>
<script type="text/javascript">
    var tableAlumnos;

        var routeUpdate;

        var myTable;
        var tableSecciones;
        jQuery(function($) {

            $('#menu-contabilidad').addClass('active open');
            $('#menu-contabilidad').children('.submenu').addClass('show');
            $('#menu-contabilidad-plantilla-pago').addClass('active');


            @component('components.js.b-table', ['route' => route('Director.PlantillaPago.Retrieve'), 'VarName' =>
                    'myTable', 'idTable' => 'table-deudas'
                ])
            @endcomponent

            function _highlight(row, checked) {
                //`toggle` with 2 arguments isn't supported in IE10+
                //row.classList.toggle('active', checked);
                //row.classList.toggle('bgc-yellow-l3', checked);
                //row.classList.toggle('bgc-h-default-l3', !checked);

                if (checked) {
                    row.classList.add('active');
                    row.classList.add('bgc-yellow-l3');
                    row.classList.remove('bgc-h-default-l3');
                } else {
                    row.classList.remove('active');
                    row.classList.remove('bgc-yellow-l3');
                    row.classList.add('bgc-h-default-l3');
                }
            }

            @component('components.js.b-table', ['route' => route('Director.PlantillaPago.Conceptos'), 'VarName' =>
                    'tableSecciones', 'idTable' => 'table-conceptos'
                ])
            @endcomponent
            $('#table-conceptos').on('load-success.bs.table', function(data) {
                $('#table-conceptos tbody tr').on('click', function(e) {

                    var inp = this.querySelector('input')
                    if (inp == null) return;
                    if (e.target.tagName != "INPUT") {
                        inp.checked = !inp.checked;
                    }
                    _highlight(this, inp.checked)
                })
            })

            $('#table-conceptos thead input').on('change', function() {
                var checked = this.checked;
                $('#table-conceptos tbody input[type=checkbox]').each(function() {
                    this.checked = checked
                    var row = $(this).closest('tr').get(0)
                    _highlight(row, checked);
                })
            })
            @component('components.js.b-table', ['route' => route('Director.CuentaPorCobrar.Alumnos'), 'VarName' =>
                    'tableAlumnos', 'idTable' => 'table-alumnos'
                ])
            @endcomponent

            $('#table-alumnos').on('load-success.bs.table', function(data) {
                $('#table-alumnos tbody tr').on('click', function(e) {

                    var inp = this.querySelector('input')
                    if (inp == null) return;
                    if (e.target.tagName != "INPUT") {
                        inp.checked = !inp.checked;
                    }
                    _highlight(this, inp.checked)
                })
            })

            $('#table-alumnos thead input').on('change', function() {
                var checked = this.checked;
                $('#table-alumnos tbody input[type=checkbox]').each(function() {
                    this.checked = checked
                    var row = $(this).closest('tr').get(0)
                    _highlight(row, checked);
                })
            })




            @component('components.js.validate-form')
                @slot('formId')
                    '#form-create2'
                @endslot

                @slot('rules')
                    concepto: {
                        required: true
                    }
                @endslot

                @slot('submitHandler')
                    var formData = new FormData($("#form-create2")[0]);

                    @component('components.js.ajax')

                        @slot('url')
                            '{!!  route('Director.PlantillaPago.Store') !!}'
                        @endslot
                        @slot('data')
                            formData
                        @endslot

                        @slot('beforeSend')
                            $('#widget2').aceWidget('startLoading');
                        @endslot

                        @slot('success')
                            $('#widget2').aceWidget('stopLoading');
                            $("#modal-registro2").modal('hide');
                            rstForm("#form-create2");
                            Swal.fire({
                                icon: 'success',
                                title: message.message,
                                showConfirmButton: false,
                                timer: 2500
                            })
                            myTable.bootstrapTable('refresh');
                        @endslot
                        @slot('error')
                            $('#widget2').aceWidget('stopLoading');
                            Swal.fire({
                                icon: 'warning',
                                title: message.responseJSON.message,
                                showConfirmButton: false,
                                timer: 2500
                            })
                        @endslot
                    @endcomponent

                @endslot

            @endcomponent





        })


        function getPagos(url){
                @component('components.js.ajax',['type'=>'get'])

                        @slot('url')
                           url
                        @endslot
                        @slot('data')
                            {}
                        @endslot

                      

                        @slot('success')
                            $('#body-pagos').html(message.table);
                           
                           
                        @endslot
                  
                    @endcomponent
        }
</script>
@stop
