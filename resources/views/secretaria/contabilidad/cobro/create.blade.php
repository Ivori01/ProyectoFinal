@extends('layouts.ace',['title'=>'Secretaria | Cobro','headertitle'=>'Home'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 

@section('navbar-menu')
@component('components.secretaria.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.secretaria.sidebar-menu') 
@endcomponent
@endsection
@endcomponent 
@endsection

@section('page-name')
@component('components.page-name')
@slot('page_name')
Cobro
@endslot
@slot('subpage_name')
 
       Nuevo
@endslot
@endcomponent
@endsection
@section('linksAfterAce')
<link href="{{ asset('assets/css/smart_wizard.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/smart_wizard_theme_circles.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="text-blue text-125">
                            Registrar nuevo cobro de deuda
                        </span>
                        <div class="card-toolbar pl-3">
                            <button class="mx-2px btn btn-outline-default btn-h-outline-primary btn-bgc-white btn-a-primary border-2 radius-1" disabled="" id="wizard-1-prev" type="button">
                                <i class="fa fa-chevron-left">
                                </i>
                            </button>
                            <button class="mx-2px btn btn-outline-default btn-h-outline-primary btn-bgc-white btn-a-primary border-2 radius-1" id="wizard-1-next" type="button">
                                <i class="fa fa-chevron-right">
                                </i>
                            </button>
                            <button class="d-none mx-2px px-3 btn btn-outline-success btn-h-outline-success btn-bgc-white border-2 radius-1" id="wizard-1-finish" type="button">
                                <i class="fa fa-arrow-right">
                                </i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-2">
                        <div class="d-none" id="smartwizard-1">
                            <ul class="mx-auto">
                                <li class="wizard-progressbar">
                                </li>
                                <li>
                                    <a href="#step-1">
                                        <span class="step-title">
                                            1
                                        </span>
                                        <span class="step-title-done">
                                            <i class="fa fa-check text-success-m1">
                                            </i>
                                        </span>
                                    </a>
                                    <span class="step-description">
                                        Alumno
                                    </span>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step-title">
                                            2
                                        </span>
                                        <span class="step-title-done">
                                            <i class="fa fa-check text-success-m1">
                                            </i>
                                        </span>
                                    </a>
                                    <span class="step-description">
                                        Cobrar deuda
                                    </span>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step-title">
                                            3
                                        </span>
                                        <span class="step-title-done">
                                            <i class="fa fa-check text-success-m1">
                                            </i>
                                        </span>
                                    </a>
                                    <span class="step-description">
                                       Resumen
                                    </span>
                                </li>
                            </ul>
                            <div class="px-2 py-2 mb-4">
                                <div class="" id="step-1">
                                    <form id="form-alumno" novalidate="">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                                <label for="state">
                                                </label>
                                            </div>
                                            <div class="col-sm-9 col-12 tag-input-style">
                                                <select class="select2" data-placeholder="Introduzca DNI para buscar ..." id="alumno-search" name="alumno" onchange="deudas($(this).val());">
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="step-2">
                                    <form id="form-deudas" novalidate="">
                                        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                                    <label for="state">
                                                        Deudas
                                                    </label>
                                                </div>
                                                <div class="col-sm-9 col-12 tag-input-style" id="pago">
                                                </div>
                                            </div>
                                          
                                        </input>
                                    </form>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0 mt-3">
                                                <div class="card-header bgc-info">
                                                    <h6 class="card-title text-white font-normal">
                                                        <span class="text-110">
                                                            Resumen de pago
                                                        </span>
                                                    </h6>
                                                </div>
                                                <div class="card-body border-x-1 border-b-1 brc-blue-l1 bgc-default-l4 px-1px py-0 ace-scroll ace-scroll-wrap" id="table-pay">
                                                    <div class="ace-scroll-inner">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center" id="step-3">


                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0 mt-3">
                                                <div class="card-header bgc-info">
                                                    <h6 class="card-title text-white font-normal">
                                                        <span class="text-110">
                                                            Resumen de pago
                                                        </span>
                                                    </h6>
                                                </div>
                                                <div class="card-body border-x-1 border-b-1 brc-blue-l1 bgc-default-l4 px-1px py-0 ace-scroll ace-scroll-wrap" id="table-pay2">
                                                    <div class="ace-scroll-inner">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .card -->
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        @component('components.ace-table',['title'=>'Deudas cobradas'])
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
            Deudas
        </th>
        <th data-sortable="true">
            Importe
        </th>
        <th data-sortable="true">
            Fecha y Hora
        </th>
        <th>
        </th>
        @endcomponent
    </div>
</div>


<div class="modal" id="modal-boleta">
    <div class="modal-dialog">
        <div class="widget-box widget-color-blue3" id="widget-bo">
            <iframe id="invoice-iframe" src="">
            </iframe>
        </div>
    </div>
</div>
@stop

@section('footer')
@component('components.footer')
@endcomponent
@endsection

@section('script')
<script src="{{ asset('assets/js/moment.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/jquery.inputmask.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/additional-methods.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-maxlength.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/jquery.smartWizard.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/jquery.fileDownload.js')}}">
</script>
<script src="{{ asset('assets/js/initinput.js')}}">
</script>

<script type="text/javascript">
    var myTable;
    var routeUpdate;
$('#menu-contabilidad').addClass('active open');
  $('#menu-contabilidad').children('.submenu').addClass('show');
  $('#menu-cobros').addClass('active open');  
  $('#menu-cobros').children('.submenu').addClass('show');
  $('#cobro-create').addClass('active'); 

    jQuery(function($) {
        var stepCount = $('#smartwizard-1').find('li > a').length;
        var left = (100 / (stepCount * 2));
        //for example if we have 4 steps, left and right of progressbar should be 12.5%
        //so that before first step and after last step we don't have any lines
        $('#smartwizard-1').find('.wizard-progressbar').css({
            left: left + '%',
            right: left + '%'
        });
        //enable wizard
        var selectedStep = 0;
        $('#smartwizard-1').smartWizard({
                theme: 'circles',
                useURLhash: false,
                showStepURLhash: false,
                autoAdjustHeight: true,
                transitionSpeed: 150,
                //errorSteps: [0,1],
                //disabledSteps: [2,3],
                selected: selectedStep,
                toolbarSettings: {
                    toolbarPosition: 'bottom', // none, top, bottom, both
                    toolbarButtonPosition: 'right', // left, right
                    showNextButton: false, // show/hide a Next button
                    showPreviousButton: false, // show/hide a Previous button
                    toolbarExtraButtons: [
                        $('<button class="btn btn-secondary sw-btn-prev"><i class="fa fa-arrow-left mr-1"></i> Anterior</button>'),
                        $('<button class="btn btn-success sw-btn-next sw-btn-hide">Siguiente <i class="fa fa-arrow-right mr-1"></i></button>'),
                        $('<button class="btn btn-purple sw-btn-finish">Finalizar <i class="fa fa-check mr-1"></i></button>').on('click', function() {
                            
                             getTable();
                                  if ($('#form-deudas').valid() === true) {
                        var formData = new FormData($("#form-deudas")[0]);
                        formData.append('alumno', $('#alumno').val());
                        $.ajax({
                            url: "{!! route('Secretaria.Cobro.Store') !!}",
                            type: 'POST',
                            data: formData,
                            cache: false,
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(message) {
                                rstForm("#form-deudas");
                                rstForm("#form-alumno");
                                myTable.bootstrapTable('refresh');
                                $('#alumno-search').empty().trigger("change");
                             
                               Swal.fire({
                                  title: '<strong>Registro agregado correctamente</strong>',
                                  icon: 'success',
                                  html:'<p class="text-success">Imprimir comprobante de pago</p><br>'+ message.print,
                                  showCloseButton: true,
                                  showCancelButton: false,
                                  showConfirmButton: false,
                                  focusConfirm: false
                                })
                            },
                            error: function(msg) {},
                            complete: function(xhr, status) {
                                 $('#smartwizard-1').smartWizard("reset");
                            }
                        });
                    }
                        }),
                    ]
                }
            }).removeClass('d-none') //initially it is hidden, and we show it after it is properly rendered
            .on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                //move the progress bar
                //var stepCount = $('#smartwizard-1').find('li > a').length;
                var progress = parseInt((stepNumber + 1) * 100 / stepCount);
                var halfStepWidth = parseInt(100 / stepCount) / 2;
                progress -= halfStepWidth; //because for example for the first step, we don't want progressbar to move all the way to next step
                $('#smartwizard-1').find('.wizard-progressbar').css('max-width', progress + '%');
                //hide/show widget toolbar buttons
                if (stepNumber > 0) {
                    $('#wizard-1-prev').removeAttr('disabled');
                } else {
                    $('#wizard-1-prev').attr('disabled', '');
                }

                if (stepNumber == stepCount - 1) {
                    $('#wizard-1-next').addClass('d-none');
                    $('#wizard-1-finish').removeClass('d-none');
                } else {
                    $('#wizard-1-next').removeClass('d-none');
                    $('#wizard-1-finish').addClass('d-none');
                }
            }).on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                if (stepNumber == 0 && stepDirection == 'forward') {
                    if (!$('#form-alumno').valid()) return false;   
                }
                if (stepNumber == 1 && stepDirection == 'forward') {
                    //form validataion needed?
                    if (!$('#form-deudas').valid()) return false;
               
                }
                if (stepNumber == 2 && stepDirection == 'forward') {
                    
                }
            }).triggerHandler('showStep', [null, selectedStep, null, null]) //move progressbar to step 1 (0 index)
        $('#wizard-1-prev').on('click', function() {
            $('#smartwizard-1').smartWizard('prev');
        });
        $('#wizard-1-next').on('click', function() {
            $('#smartwizard-1').smartWizard('next');
        });
        $('#wizard-1-finish').on('click', function() { });

        @component('components.js.validate-form')
            @slot('formId')
            '#form-alumno'
            @endslot
            @slot('rules')
            alumno: {
                required: true
            }
            @endslot
            @slot('submitHandler')
            @endslot
        @endcomponent

        @component('components.js.validate-form')
            @slot('formId')
            '#form-deudas'
            @endslot
            @slot('rules')
            'deuda[]': {
                required: true
            }
            @endslot
            @slot('submitHandler')
            @endslot
        @endcomponent

        @component('components.js.select-search', ['name' => '#alumno-search', 'ruta' => route('Secretaria.Cobro.Alumno.Search')])
        @endcomponent

   $('#menu-caja').addClass('active open');
          $('#menu-caja').children('.submenu').addClass('show');
        $('#menu-caja-index').addClass('active');
 @component('components.js.b-table', ['route' => route('Secretaria.Cobro.Retrieve')])
        @endcomponent
    
    })

  function deudas(alumno) {
      //$("#alumno-name").html('');
      //$("#hide").addClass('hide')
      if (alumno) {
          token = $("#token").val();
          @component('components.js.ajax-submit')
          @slot('rutaAjax')
          "{!! route('Secretaria.CuentaPorCobrar.Alumno.Duedas') !!}"
          @endslot
          @slot('data') {
              _token: token,
              alumno: alumno
          }
          @endslot
          @slot('procesData')
          @endslot
          @slot('beforeSendAjax')
          //$('#widget').widget_box('reload');
          $(".datosapoderado").attr("hidden", true);
          @endslot
          @slot('successAjax')
          $("#pago").html(msg.deudas);
          $('#deuda').css('width', '90%').select2().on('change', function(ev) {
              $(this).closest('form').validate().element($(this));
          });
          @endslot
          @endcomponent
      }
  }

  function getTable() {
      $('#table-pay').html('');
      var formData = new FormData($("#form-deudas")[0]);
      $.ajax({
          url: "{!! route('Secretaria.Cobro.Showtable') !!}",
          type: 'POST',
          data: formData,
          cache: false,
          dataType: 'json',
          processData: false,
          contentType: false,
          success: function(msg) {
              $('#table-pay').html(msg.tabla);
              $('#table-pay2').html(msg.tabla);
          },
          error: function(msg) {},
          complete: function(xhr, status) {}
      });
  }

  function invoice(ruta) {
    
      $('#invoice-iframe').attr('src', ruta);
  }
</script>
@stop
