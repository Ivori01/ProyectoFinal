@extends('layouts.ace',['title'=>'Director | Descuentos','headertitle'=>'Home','viewtitle'=>'Panel
Principal','page'=>'Home'])

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
            Asignar descuentos
        @endslot
        @slot('subpage_name')  
            Cuentas por cobrar
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
    <div class="col-12">
        @component('components.ace-table', ['title' => 'Cuentas por cobrar'])
        <th data-sortable="true">
            Id
          </th>
        <th data-sortable="true">
            Id
          </th>
        <th data-sortable="true">
            Documento
        </th>
        <th data-sortable="true">
            Alumno
        </th>
        <th data-sortable="true">
            Concepto
        </th>
        <th data-sortable="true">
            Importe
        </th>
        <th data-sortable="true">
            Descontando
        </th>
        <th data-sortable="true">
            Descuentos
        </th>
        @endcomponent
    </div>
</div>
<div aria-hidden="true" class="modal fade" id="modal-asignar" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',[ 'formId'=>'form-asignar','cardId'=>'widget2','color'=>'bgc-primary'])
                @slot('titleCard')
                Editar descunetos asignados
                @endslot

                @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot

                @slot('formInputs')
            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="form-group row pb-3">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Descuento :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="descuento">
                        <option value="">
                        </option>
                        @foreach ($descuentos as $descuento)
                        <option value="{{$descuento->id}}">
                            {{$descuento->descripcion}} ({{$school_info->simbolo_moneda}} {{ $descuento->cantidad }})
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex flex-row-reverse mr-3">
                <button class="btn btn-success ">
                    <span class="bigger-110">
                        Guardar
                    </span>
                    <i class="ace-icon fa fa-arrow-right icon-on-right">
                    </i>
                </button>
                <hr>
                </hr>
            </div>
            <div class="col-12 pt-4" id="descuentosupdatetable">
            </div>
            @endslot

                @slot('cardButtons')
            <hr>
                @endslot
            @endcomponent
            </hr>
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
    var myTable;
        var routeUpdate;
        jQuery(function($) {

            $('#menu-contabilidad').addClass('active open');
            $('#menu-contabilidad').children('.submenu').addClass('show');
            $('#menu-contabilidad-asignar-descuento').addClass('active');

            @component('components.js.b-table', ['route' => route('Director.CuentaDescuento.Retrieve')])
            @endcomponent

            $('textarea.limited').maxlength({
                alwaysShow: true,
                allowOverMax: false,
                warningClass: "badge badge-dark",
                limitReachedClass: "badge badge-warning",
                placement: 'bottom-right-inside'
            });

            autosize($('textarea[class*=autosize]'));

            @component('components.js.validate-form')
                @slot('formId')
                    '#form-asignar'
                @endslot

                @slot('rules')
                  
                       descuento: {
                            required: true
                        }
                @endslot

                @slot('submitHandler')
                    var formData = new FormData($("#form-asignar")[0]);

                    @component('components.js.ajax')

                        @slot('url')
                            '{!!  route('Director.CuentaDescuento.Store') !!}'
                        @endslot
                        @slot('data')
                            formData
                        @endslot

                        @slot('beforeSend')
                            $('#widget').aceWidget('startLoading');
                        @endslot

                        @slot('success')
                            $('#widget').aceWidget('stopLoading');
                            $("#modal-registro").modal('hide');
                            rstForm("#form-asignar");
                            editDescuentos(message.ruta);
                            Swal.fire({
                                icon: 'success',
                                title: message.message,
                                showConfirmButton: false,
                                timer: 2500
                            })
                            myTable.bootstrapTable('refresh');
                        @endslot

                    @endcomponent

                @endslot

            @endcomponent

        })


        function editDescuentos(ruta) {

            token = $("#token").val();
            $.ajax({
                url: ruta,
                dataType: 'json',
                beforeSend: function() {
                    $('#widget-update').aceWidget('startLoading');
                },
                success: function(msg) {
                    $('#widget-update').aceWidget('stopLoading');

                    $('div[class*="form-group"] ').removeClass('has-success');
                     myTable.bootstrapTable('refresh');
                 
                    $("#descuentosupdatetable").html(msg.descuentos);

                    //$("#fechadescuentoU").val(msg.datos.fechadescuento);
                    //$("#fechavencimientoU").val(msg.datos.fechavencimiento);
                    routeUpdate = msg.ruta;




                    //$('.datepicker').datepicker( "destroy" );$( '.datepicker' ).removeClass("hasDatepicker").removeAttr('id');


                },

                error: function(xhr, status) {}
            });


        }


            function destroyDescuento(ruta) {

        var formData = new FormData($("#form-destroy")[0]);
        token=$("#token").val();
      
        Swal.fire({
        title: 'Desea eliminar este registro ?',
        text: "La accion no se podra revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si,eliminar !',
            }).then((result) => {
                if (result.value) {
                   $.ajax({
                            url: ruta,
                            type: 'post',
                            data:{_token:token,_method: "DELETE"},
                            dataType: 'json',
                            cache:false,
                            beforeSend: function(){ 
                                $('#widget-destroy').aceWidget('startLoading');          
                            },
                            success:function(message) {
                                $('#widget-destroy').aceWidget('stopLoading');
                                $("#modal-destroy").modal('hide');
                                 editDescuentos(message.ruta);
                                Swal.fire({
                                icon: 'success',
                                title: message.message,
                                showConfirmButton: false,
                                timer: 2500
                                })
                            },
                            error : function(message) {
                                $('#widget-destroy').aceWidget('stopLoading');
                                $("#modal-destroy").modal('hide');
                                Swal.fire({
                                icon: 'warning',
                                title: message.responseJSON.message,
                                showConfirmButton: false,
                                timer: 2500
                                })
        
                            }
                        }); 
                }
            })
                    

    }
</script>
@stop
