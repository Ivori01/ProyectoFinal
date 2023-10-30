@extends('layouts.ace',['title'=>'Director | Año academico'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
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
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Año academico
@endslot
@slot('subpage_name')
 
         Fecha Inicio/Fin Periodo academico
@endslot
@endcomponent
@endsection
@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/photoswipe.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/venobox.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

<div class="alert fade show bgc-green-l4 brc-secondary-l1 rounded" role="alert">
    <div class="position-tl h-102 border-l-4 brc-success-tp1 m-n1px ">
    </div>
    <!-- the big red line on left -->
        <p>
        <strong class="alert-heading text-blue font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
            Año acádemico:
        </strong>
        {{$anio->datosAnio->descripcion }} - {{ $anio->datosAnio->anio }}.
    </p>
    <p>
        <strong class="alert-heading text-blue font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
            Nivel:
        </strong>
        {{$anio->datosNivel->nombre }} .
    </p>
</div>

<div class="row">
    <div class="col-12">
        @component('components.ace-table',['title'=>'Grados'])
        <th data-sortable="true">
            Grado 
        </th>
        <th>
            Acciones
        </th>
        @endcomponent
    </div>
</div>

<div aria-hidden="true" class="modal fade" id="modal-grados" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',[ 'formId'=>'form-create','cardId'=>'widget2','color'=>'bgc-primary'])
        @slot('titleCard')
        Editar Inicio/Fin  de trimestres
        @endslot

        @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot

              @slot('formInputs')
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div id="inputs">
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
<script src="{{ asset('assets/js/moment.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript">
</script>
<script src="https://cdn.jsdelivr.net/npm/inputmask/dist/jquery.inputmask.min.js" type="text/javascript">
</script>
<script src="{{ asset('assets/js/additional-methods.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-maxlength.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/autosize.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
<script type="text/javascript">
    var myTable;      
jQuery(function($) {
  


$('#menu-anio-academico').addClass('active open');
  $('#menu-anio-academico').children('.submenu').addClass('show');

  $('#menu-anio-academico-trimestre').addClass('active').removeClass('d-none'); 

   @component('components.js.b-table',['route'=>route('Director.AnioAcademicoTrimestre.Retrieve',['anio'=>$anio->id])])
        @endcomponent

    @component('components.js.validate-form')
    @slot('formId')
      '#form-create'
    @endslot

      @slot('rules')
    
    descripcion:{required:true},
    nivel:{required:true},
    conf_horario:{required:true},
    planacad:{required:true}
    @endslot
  

       @slot('submitHandler')
      var formData = new FormData($('#form-create')[0]);

    @component('components.js.ajax')

        @slot('url')
        "{{route('Director.AnioAcademicoTrimestre.Store')}}"
      @endslot
          @slot('data')
        formData
      @endslot
          @slot('beforeSend')
            $('#widget').aceWidget('startLoading');
             
        
          @endslot

      @slot('success')
       
        $("#modal-registro").modal('hide');
        Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
              
        @endslot
          @slot('error')                        
          Swal.fire({
          icon: 'warning',
          title: message.responseJSON.message,
          showConfirmButton: false,
          timer: 2500
          })
              @endslot
        @slot('complete')
        $('#widget').aceWidget('stopLoading');
        @endslot

    @endcomponent

    @endslot

  @endcomponent



      })



  function editHConf(ruta){
        
       $("#inputs").html('');
    token=$("#token").val();
    $.ajax({ 
    url:ruta,
    
    dataType:'json',
    beforeSend: function(){ 
     $('#widget2').aceWidget('startLoading');
      
    },
    success:function(msg) {

      $('#widget2').aceWidget('stopLoading');
      $('span[class*="block"] ').html('');
      $('div[class*="form-group"] ').removeClass('has-success');
      $('div[class*="form-group"] ').removeClass('has-error');
      $("#inputs").html(msg.trimestres);
      
    

  $('.select2').css('width','90%').select2().on('change', function(ev) {
  $(this).closest('form').validate().element($(this));
  });



              $('.datetimepicker').datetimepicker({
        icons: {
            time: 'far fa-clock text-success text-120',
            date: 'far fa-calendar text-blue text-120',
            up: 'fa fa-chevron-up text-secondary',
            down: 'fa fa-chevron-down text-secondary',
            previous: 'fa fa-chevron-left text-secondary',
            next: 'fa fa-chevron-right text-secondary',
            today: 'far fa-calendar-check text-purple-m1 text-120',
            clear: 'fa fa-trash-alt text-orange-d1 text-120',
            close: 'fa fa-times text-danger text-120'
        },
        // sideBySide: true,
        toolbarPlacement: "top",
        allowInputToggle: true,
        // showClose: true,
        // showClear: true,
        showTodayButton: true,
        format: 'L',
        format: 'DD-MM-YYYY'
        //"format": "HH:mm:ss"
    })
    // this plugin was designed for BS3, so to make it work with BS4, the following piece of code is required
    $('.datetimepicker').on('dp.show', function() {
        $('.collapse.in').addClass('show')
        $(this).find('.table-condensed').addClass('table table-borderless')
        $(this).find('[data-action][title]').tooltip() //enable tooltip
    });
    // now listen to the `.collapse` events inside this datetimepicker accordion (one `.collapse` is for timepicker, the other one is for datepicker)
    // then add or remove the old `in` BS3 class so the plugin works correctly
    $(document).on('show.bs.collapse', '.bootstrap-datetimepicker-widget .collapse', function() {
        $(this).addClass('in')
    }).on('hide.bs.collapse', '.bootstrap-datetimepicker-widget .collapse', function() {
        $(this).removeClass('in')
    });

    } 
    });


  }
</script>
@stop
