{{-- @extends('layouts.director',['title'=>'Director | Plan Academico','headertitle'=>'Asignar Criterio de Evaluacion','viewtitle'=>
$plan->datosCurso->nombre. ' - '. $plan->planGrado->datosGrado->numero.'° - '. $plan->planGrado->datosGrado->DatosNivel->nombre,
'page'=>'Plan Academico <i class="ace-icon fa fa-angle-double-right"></i> ' .$plan->planGrado->datosPlan->nombre]) --}}
@extends('layouts.ace',['title'=>'Director | Plan academico - grado - curso','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
 Curso
@endslot
@slot('subpage_name')
 
         Criterios de evaluacion por periodo academico
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
        <strong class="alert-heading  text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
            Plan Academico:
        </strong>
        {{$plan->planGrado->datosPlan->nombre}}.
    </p>
    <p>
        <strong class="alert-heading text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
           Nivel:
        </strong>
        {{$plan->planGrado->datosGrado->DatosNivel->nombre}}.
    </p>
      <p>
        <strong class="alert-heading text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
           Grado:
        </strong>
        {{$plan->planGrado->datosGrado->nombre}}.
    </p>
 <p>
        <strong class="alert-heading text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
           Curso:
        </strong>
        {{$plan->datosCurso->nombre}}.
    </p>

</div>

<div class="row">
	<div class="col-4 "><a href="{{route('Director.PlanAcademico.GradoCurso',['grado'=>$plan->planGrado->id])}}" class="btn btn-lg btn-grey">
												<i class="ace-icon fa fa-arrow-left"></i>
												Volver  a cursos
											</a></div>
<div class="col-8">

        <button class="btn btn-lg btn-info btn-block " data-target="#modal-registro" data-toggle="modal">
           Asignar  Criterios  de evaluacion
            <i class="ace-icon fa fa-plus align-top icon-on-right">
            </i>
        </button>
    </div>
									</div>

								
									


<div class="row">
    <div class="col-12">
        @component('components.ace-table',['title'=>'Criterios  de Evaluacion'])

			<th data-sortable="true">Periodo academico</th>
      <th>Criterios</th>
			<th>Asignar</th>
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
            <input name="_token" type="hidden" id="token" value="{{ csrf_token() }}"/>

            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Criterio de evaluacion :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="criterio" required="">
                        <option value="">
                        </option>
                       	@foreach ($criterios as $criterio)
										   <option value="{{$criterio->id}}" >{{$criterio->nombre}} </option>
									@endforeach 
                    </select>
                </div>
            </div>
             <div class="row">
                <div class="col-12">
                    @component('components.ace-table',['title'=>'Periodos Academicos','id'=>'table-trimestres'])
                 
                    <th class="text-center pr-0">
                        <label>
                          <input type="checkbox" class="align-bottom" autocomplete="off">
                        </label>
                      </th>
                    <th data-sortable="true">
                      Periodo academico
                    </th>
                    
                    @endcomponent
                </div>
            </div>
        <input type="text" name="curso" hidden="" value="{{$plan->id}}" />
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



<div aria-hidden="true"  class="modal fade" id="modal-update-criteriotrimestre" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',[ 'formId'=>'form-update-trimestre','cardId'=>'widget2','color'=>'bgc-primary'])
        @slot('titleCard')
        Editar criterios de evaluacion
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
              <label for="state">Criterios de evaluacion :</label>
            </div>

            <div class="col-sm-9 col-12 tag-input-style">
              <select  class="select2 form-control " data-placeholder="Seleccione"  name="criterio" >
                <option value=''></option>  
                @foreach ($criterios as $criterio)
                       <option value="{{$criterio->id}}" >{{$criterio->nombre}} </option>
                  @endforeach 

              </select>


            </div>
          </div>

          <div class="d-flex flex-row-reverse mr-3">
                     <button class="btn btn-success ">
                  <span class="bigger-110">Guardar</span>
                  <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
              </button>
              <hr>  
          </div>
                
          <div class="col-12 pt-4" id="criteriosupdatetable">

          </div>
                @endslot

        @slot('cardButtons')
          <hr>
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
	var routeUpdate;
	
	jQuery(function($) {

	$('#menu-plan_academico').addClass('active open');
	$('#menu-plan_academico').children('.submenu').addClass('show');
	$('#menu-plan_academico-curso-criterio').addClass('active').removeClass('d-none');		
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
@component('components.js.b-table',['route'=>route('Director.CursoCriterio.Trimestres',['grado_curso'=>$plan->id]),'VarName'=>'tableTrimestres','idTable'=>'table-trimestres'])
@endcomponent
     $('#table-trimestres').on('load-success.bs.table', function (data) {
   $('#table-trimestres tbody tr').on('click', function(e) {
  
            var inp = this.querySelector('input')
            if (inp == null) return;
            if (e.target.tagName != "INPUT") {
              inp.checked = !inp.checked;
            }
            _highlight(this, inp.checked)
          })
})

          $('#table-trimestres thead input').on('change', function() {
            var checked = this.checked;
            $('#table-trimestres tbody input[type=checkbox]').each(function() {
              this.checked = checked
              var row = $(this).closest('tr').get(0)
              _highlight(row, checked);
            })
          })

@component('components.js.b-table',['route'=>route('Director.PlanAcademicoCursoCriterio.Retrieve2',['plan'=>$plan])])
        @endcomponent



@component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'
	  @endslot
      
      @slot('rules')
		criterio: {required: true }
		 
		 
	@endslot

	

       @slot('submitHandler')
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				'{!! route('Director.CursoCriterio.StoreMultiple') !!}'
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


@component('components.js.validate-form')

    @slot('formId')
    '#form-update-trimestre'
    @endslot
      
    @slot('rules')
    criterio: {required: true }
    @endslot

    @slot('submitHandler')
      
      var formData = new FormData($("#form-update-trimestre")[0]);

      @component('components.js.ajax')

          @slot('url')
          '{!! route('Director.CursoCriterio.Store') !!}'
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
          editCriterioTrimestre(message.ruta);
          Swal.fire({
          icon: 'success',
          title: message.message,
          showConfirmButton: false,
          timer: 2500
          })
          myTable.bootstrapTable('refresh');
          @endslot

        @slot('complete')
        $('#widget2').aceWidget('stopLoading');
        @endslot

      @endcomponent

    @endslot

  @endcomponent
	})

  function editCriterioTrimestre(ruta){
        
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
        $('div[class*="form-group"] ').removeClass('has-success');
        $("#criteriosupdatetable").html(message.criterios);
        myTable.bootstrapTable('refresh');
      } ,

      error : function(xhr, status) {
      }
    });


  }

  function destroyCriterio(ruta) {

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
   
                editCriterioTrimestre(message.ruta);
                Swal.fire({
                icon: 'success',
                title: message.message,
                showConfirmButton: false,
                timer: 2500
                })
                myTable.bootstrapTable('refresh');
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