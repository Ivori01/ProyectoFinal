@extends('layouts.ace',['title'=>'Director | Secciones','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
Secciones 
@endslot
@slot('subpage_name')
 
         Todos
@endslot
@endcomponent
@endsection
@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/photoswipe.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/venobox.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection


@section('content')
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
        @component('components.ace-table',['title'=>'Secciones'])
        <th data-sortable="true">
            Nivel
        </th>
        <th data-sortable="true">
            Grado
        </th>
        <th data-sortable="true">
            Letra
        </th>
        <th data-sortable="true">
            Capacidad
        </th>
        <th data-sortable="true">
             Vacantes libres
        </th>
        <th data-sortable="true">
           Año Academico
        </th>
        <th>reportes</th>
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
              Registrar secciones 
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
                        Nivel
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="anio_nivel" onchange="grados($(this).val());">
                        <option value="">
                        </option>
                        @foreach ($anios  as $anio)
                        @foreach ($anio->niveles as $nivel)
                        <option value="{{$nivel->id}}">
                            {{$nivel->datosNivel->nombre}} (  {{$anio->anio}} )
                        </option>
                        @endforeach
                        @endforeach
                       
                    </select>
                </div>
            </div>
  
            <div class="d-none" id="grados-show">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0">
                            Capacidad :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control col-sm-5" id="capacidad" name="capacidad" type="number"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="state">
                            Letra
                        </label>
                    </div>
                    <div class="col-sm-9 col-12 tag-input-style">
                        <select class="select2 form-control " data-placeholder="Seleccione" name="letra">
                            <option value="">
                            </option>
                            @foreach ($letras as $letra)
                            <option value="{{$letra}}">
                                {{$letra}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="state">
                            Grado :
                        </label>
                    </div>
                    <div class="col-sm-9 col-12 tag-input-style" id="grado2">
                    </div>
                </div>
                 <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="state">
                           Tutor :
                        </label>
                    </div>
                    <div class="col-sm-9 col-12 tag-input-style" id="tutor2">
                    </div>
                </div>
            </div>
            <input hidden="" name="estado" type="text" value="Inactivo"/>
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
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal-update" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',[ 'formId'=>'form-update','cardId'=>'widget-update','color'=>'bgc-primary'])
          @slot('titleCard')
          Formulario de actualizacion
          @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
            @slot('formInputs')
            <input name="_method" type="hidden" value="PUT">
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label for="state">
                                Letra
                            </label>
                        </div>
                        <div class="col-sm-9 col-12 tag-input-style" id="letra2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0">
                                Capacidad :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input class=" form-control col-sm-5" id="capacidad2" name="capacidad" type="number"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label for="state">
                                Tutor
                            </label>
                        </div>
                        <div class="col-sm-9 col-12 tag-input-style" id="tutor-u">
                        </div>
                    </div>
                    @endslot

          @slot('cardButtons')
                    <button class="btn btn-bold btn-success">
                        Aceptar
                        <i class="fa fa-arrow-right ml-2">
                        </i>
                    </button>
                    @endslot
          @endcomponent
                </input>
            </input>
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
<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
<script type="text/javascript">
    var myTable;
  var routeUpdate;
  jQuery(function($) {

$('#menu-seccion').addClass('active open');
  $('#menu-seccion').children('.submenu').addClass('show');

  $('#menu-seccion-todos').addClass('active');

 @component('components.js.b-table',['route'=>route('Director.Seccion.Retrieve')])
        @endcomponent




  @component('components.js.validate-form')
    @slot('formId')
      '#form-create'
    @endslot

      @slot('rules')
    grado: {required: true }, 
    letra: {required: true },
    capacidad:{required: true }, 
    anio_acad:{required:true } 
      @endslot

  

       @slot('submitHandler')
      var formData = new FormData($("#form-create")[0]);

    @component('components.js.ajax')

        @slot('url')
        "{!! route('Director.Seccion.Store') !!}"
      @endslot
         @slot('data')
        formData
      @endslot
          @slot('beforeSend')
            $('#widget').aceWidget('startLoading');

        
          @endslot

      @slot('success')
        
        rstForm("#form-create");
        $("#modal-create").modal('hide');
        Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
               myTable.bootstrapTable('refresh');
        
        @endslot

        @slot('complete')
        $('#widget').aceWidget('stopLoading');

        @endslot

    @endcomponent

    @endslot

  @endcomponent


  @component('components.js.validate-form')
    @slot('formId')
      '#form-update'
    @endslot

      @slot('rules')
  
      letra: {required: true }, 
  
      nivel:{required:true } 
    @endslot

  

       @slot('submitHandler')
      var formData = new FormData($('#form-update')[0]);

    @component('components.js.ajax')

        @slot('url')
        routeUpdate
      @endslot
         @slot('data')
        formData
      @endslot
          @slot('beforeSend')
            $('#widget-update').aceWidget('startLoading');
              
        
          @endslot

      @slot('success')
        myTable.bootstrapTable('refresh');
        $("#modal-update").modal('hide');
        Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})

        
        @endslot
        @slot('complete')
        $('#widget-update').aceWidget('stopLoading');
        @endslot

    @endcomponent

    @endslot

  @endcomponent



  })

  function editseccion(ruta){
       
    token=$("#token").val();
    $.ajax({
    url: ruta,
    dataType:'json',
    beforeSend: function(){
     $('#widget-update').aceWidget('startLoading');
    },
    success:function(msg) {
      $('#widget-update').aceWidget('stopLoading');

      $('div[class*="form-group"] ').removeClass('has-success');

      $("#letra2").html(msg.letra);
       $("#tutor-u").html(msg.tutor);
      $("#capacidad2").val(msg.capacidad);
    
       routeUpdate=msg.ruta;

  $('.select2').css('width','90%').select2().on('change', function(ev) {
  $(this).closest('form').validate().element($(this));
  });


    } 
    });


  }

  function grados(anio){
  token=$("#token").val();
  $.ajax({
  url: "{!! route('Director.Seccion.Create') !!}",
  
  data: {anio_nivel : anio ,_token:token},
  dataType:'json',

  success:function(resp) {
    $("#grados-show").removeClass("d-none");
    $("#grado2").html(resp.grados);
        $("#tutor2").html(resp.tutores);
     $('.select2').css('width','90%').select2().on('change', function(ev) {
  $(this).closest('form').validate().element($(this));
  });
  } ,

  error : function(xhr, status) {

  $("#grados-show").addClass('d-none');
  }
  });


  }
</script>
@stop
