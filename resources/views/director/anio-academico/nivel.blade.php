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
 
         Niveles
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
<div class="alert fade show bgc-yellow-l4 brc-secondary-l1 rounded" role="alert">
    <div class="position-tl h-102 border-l-4 brc-success-tp1 m-n1px rounded-left">
    </div>
    <!-- the big red line on left -->
    <p>
        <strong class="alert-heading text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
            Descripcion año acádemico:
        </strong>
        {{$anio->descripcion}}.
    </p>
    <p>
        <strong class="alert-heading text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
            Año:
        </strong>
        {{$anio->anio}}.
    </p>
</div>
<div class="row">
    <div class="col-12">
        <button class="btn btn-lg btn-info btn-block " data-target="#modal-registro" data-toggle="modal">
            Registrar Nuevo
            <i class="ace-icon fa fa-plus align-top icon-on-right">
            </i>
        </button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @component('components.ace-table',['title'=>'Niveles'])
        <th data-sortable="true">
            Nivel
        </th>
        <th>
            Plan academico
        </th>
        <th>
            Asignar
        </th>
        <th>
            Acciones
        </th>
        @endcomponent
    </div>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal-registro" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',[ 'formId'=>'form-create','cardId'=>'widget','title'=>'Formulario de Registro de Niveles de Educacion','color'=>'bgc-primary'])
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
            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Nivel :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="nivel" required="">
                        <option value="">
                        </option>
                        @foreach ($niveles as $nivel)
                        <option value="{{$nivel->id}}">
                            {{$nivel->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Plan academico :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="plan" required="">
                        <option value="">
                        </option>
                        @foreach ($planes as $plan)
                        <option value="{{$plan->id}}">
                            {{$plan->nombre}} - ({{ $plan->DatosNivel->nombre }})
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input hidden="" name="anio" type="text" value="{{ $anio->id }}"/>
            @endslot

          @slot('cardButtons')
            <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create');" type="button">
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
<div aria-hidden="true" class="modal fade" id="modal-niveles" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',[ 'formId'=>'form-create2','cardId'=>'widget2','color'=>'bgc-primary'])
        @slot('titleCard')
        Editar Configuraciones de horario por grado
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
  
   $('#descripcion').maxlength({
            alwaysShow: true,
            allowOverMax: false,
            warningClass: "badge badge-dark",
            limitReachedClass: "badge badge-warning",
            placement: 'bottom-right-inside'
          });

$('#menu-anio-academico').addClass('active open');
  $('#menu-anio-academico').children('.submenu').addClass('show');

  $('#menu-anio-academico-nivel').addClass('active').removeClass('d-none'); 

   @component('components.js.b-table',['route'=>route('Director.AnioAcademicoNivel.Retrieve',['anio'=>$anio->id])])
        @endcomponent



$.validator.messages.require_from_group = "Por favor , complete {0} de estos campos";
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
        "{{route('Director.AnioAcademicoNivel.Store')}}"
      @endslot
          @slot('data')
        formData
      @endslot
          @slot('beforeSend')
            $('#widget').aceWidget('startLoading');
             
        
          @endslot

      @slot('success')
        rstForm("#form-create");
        $("#modal-registro").modal('hide');
        Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
               myTable.bootstrapTable('refresh');
        $("#planh-show").addClass('d-none');
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
      $("#inputs").html(msg.grados);
      
       routeUpdate=msg.ruta;

  $('.select2').css('width','90%').select2().on('change', function(ev) {
  $(this).closest('form').validate().element($(this));
  });


    } 
    });


  }
</script>
@stop
