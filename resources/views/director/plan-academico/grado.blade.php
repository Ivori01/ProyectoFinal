@extends('layouts.ace',['title'=>'Director | Plan academico - grados'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 


@section('navbar-menu')
@component('components.alumno.a-virtual.navbar-menu')
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
Plan academico
@endslot
@slot('subpage_name')
 
         Grados
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
<div class="alert fade show bgc-yellow-l4 brc-secondary-l1 rounded" role="alert">
    <div class="position-tl h-102 border-l-4 brc-success-tp1 m-n1px rounded-left">
    </div>
    <!-- the big red line on left -->
    <p>
        <strong class="alert-heading text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
            Plan Academico:
        </strong>
        {{$plan->nombre}}.
    </p>
    <p>
        <strong class="alert-heading text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
            Nivel:
        </strong>
        {{$plan->DatosNivel->nombre}}.
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
        @component('components.ace-table',['title'=>'Grados'])
        <th data-sortable="true">
            Grado
        </th>
        <th data-sortable="true">
            Nivel
        </th>
        <th>
            Calificacion
        </th>
        <th>
            Criterios
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
                        Grado :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="grado" required="">
                        <option value="">
                        </option>
                        @foreach ($grados as $grado)
                        <option value="{{$grado->id}}">
                            {!! $grado->nombre !!}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Calificacion :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="tipo_cal" required="">
                        <option value="">
                        </option>
                        @foreach ($tipos as $tipo)
                        <option value="{{$tipo}}">
                            {!! $tipo !!}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Criterios  de evaluacion :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="modo_criterio" required="">
                        <option value="">
                        </option>
                        @foreach ($modos as $modo=>$descrip)
                        <option value="{{$modo}}">
                            {{  $descrip }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input hidden="" name="plan" type="text" value="{{$plan->id}}">
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
            </input>
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
             <input type="hidden" name="_method" value="PUT">
            <input name="_token"  id ="token" type="hidden" value="{{ csrf_token() }}">

              <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Criterios  de evaluacion :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style" id="u-criterio">
                   
                </div>
            </div>
              <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Calificacion :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style" id="u-calificacion">
                   
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
<div aria-hidden="true" class="modal fade" id="modal-update-trimestre" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',[ 'formId'=>'form-update-trimestre','cardId'=>'widget2','color'=>'bgc-primary'])
        @slot('titleCard')
        Editar periodo academico
        @endslot

        @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot

              @slot('formInputs')
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="form-group row pb-3">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                       Periodo academico :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" id="rol" name="trimestre" required="">
                        <option value="">
                        </option>
                        @foreach ($trimestres as $trimestre)
                        <option value="{{$trimestre->id}}">
                            {{ $trimestre->periodo }} - {{$trimestre->numero}} °
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
            <div class="col-12 pt-4" id="criteriosupdatetable">
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
    var routeUpdate;
    
    jQuery(function($) {

    $('#menu-plan_academico').addClass('active open');
    $('#menu-plan_academico').children('.submenu').addClass('show');
    $('#menu-plan_academico-asignar-grado').addClass('active').removeClass('d-none');

@component('components.js.b-table',['route'=>route('Director.PlanAcademicoGrado.Retrieve',['plan'=>$plan])])
        @endcomponent


@component('components.js.validate-form')
      @slot('formId')
        '#form-create'
      @endslot
      
      @slot('rules')
        grado: {required: true }
         
         
    @endslot

    

       @slot('submitHandler')
            var formData = new FormData($("#form-create")[0]);

        @component('components.js.ajax')
        
            @slot('url')
                '{!! route('Director.PlanAcademicoGrado.Store') !!}'
            @endslot
            @slot('data')
                formData
            @endslot

            @slot('beforeSend')
                $('#widget').aceWidget('startLoading');
            @endslot

            @slot('success')
                $('#widget').aceWidget('stopLoading');
                rstForm("#form-create");
                $("#modal-registro").modal('hide');
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

 @component('components.js.validate-form')

    @slot('formId')
    '#form-update-trimestre'
    @endslot
      
    @slot('rules')
    rol: {required: true }
    @endslot

    @slot('submitHandler')
      
      var formData = new FormData($("#form-update-trimestre")[0]);

      @component('components.js.ajax')

          @slot('url')
          '{!! route('Director.PlanAcademicoGrado.Trimestre.Add') !!}'
        @endslot
          @slot('data') 
          formData
        @endslot

          @slot('beforeSend')
          $('#widget2').aceWidget('startLoading');
          
          @endslot

        @slot('success')
          $("#modal-registro").modal('hide');

          rstForm("#form-update-trimestre");
          editTrimestre(message.ruta);
          Swal.fire({
          icon: 'success',
          title: message.message,
          showConfirmButton: false,
          timer: 2500
          })
          @endslot

        @slot('complete')
        $('#widget2').aceWidget('stopLoading');
        @endslot

      @endcomponent

    @endslot

  @endcomponent


  @component('components.js.validate-form')
    @slot('formId')
      '#form-update'
    @endslot
      
      @slot('rules')
    tipo_cal: {required: true },
    
      modo_criterio:{required:true}
     
  @endslot

       @slot('submitHandler')
      var formData = new FormData($("#form-update")[0]);

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
        $('#widget-update').aceWidget('stopLoading');
      
        $("#modal-update").modal('hide');
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


  function edit(ruta){
       
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
    
        $("#u-calificacion").html(msg.tipo);
      $("#u-criterio").html(msg.modo);
  

       routeUpdate=msg.ruta;

  $('.select2').css('width','90%').select2().on('change', function(ev) {
  $(this).closest('form').validate().element($(this));
  });


    } ,

    error : function(xhr, status) {
    }
    });


  }


      function editTrimestre(ruta){
        
    token=$("#token").val();
    $.ajax({
      url: ruta,
      type:'Post',
      data:{_token:token},
      dataType:'json',
      beforeSend: function(){ 
        $('#widget2').aceWidget('startLoading'); 
      },
      success:function(message) {
        $('#widget2').aceWidget('stopLoading');
        $('span[class*="block"] ').html('');
        $('div[class*="form-group"] ').removeClass('has-success');

        $("#criteriosupdatetable").html(message.trimestres);

      } ,

      error : function(xhr, status) {
      }
    });


  }


    function destroyTrimestre(ruta) {

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
              data:{_token:token},
              dataType: 'json',
              cache:false,
           
              success:function(message) {
               
                editTrimestre(message.ruta);
                Swal.fire({
                icon: 'success',
                title: message.message,
                showConfirmButton: false,
                timer: 2500
                })
                },
              error : function(message) {
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
