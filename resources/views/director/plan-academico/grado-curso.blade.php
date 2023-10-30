{{-- @extends('layouts.director',['title'=>'Director | Plan Academico','headertitle'=>'Asignar Cursos a Grado','viewtitle'=>$plan->datosGrado->numero.'° '.$plan->datosGrado->DatosNivel->nombre,'page'=>' Plan Academico <i class="ace-icon fa fa-angle-double-right"></i> '.$plan->datosPlan->nombre]) --}}

@extends('layouts.ace',['title'=>'Director | Plan academico - grados','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
Grado
@endslot
@slot('subpage_name')
 
         Cursos
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
        {{$plan->datosPlan->nombre}}.
    </p>
    <p>
        <strong class="alert-heading text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
           Nivel:
        </strong>
        {{$plan->datosGrado->DatosNivel->nombre}}.
    </p>
      <p>
        <strong class="alert-heading text-warning font-bolder">
            <i class="ace-icon fa fa-check">
            </i>
           Grado:
        </strong>
        {{$plan->datosGrado->nombre}}.
    </p>
</div>

<div class="row">
	<div class="col-4 "><a href="{{route('Director.PlanAcademico.Grado',['plan'=>$plan->datosPlan->id])}}" class="btn btn-lg btn-grey"> 
												<i class="ace-icon fa fa-arrow-left"></i>
												Volver  a grados
											</a></div>
<div class="col-8">

        <button class="btn btn-lg btn-info btn-block " data-target="#modal-registro" data-toggle="modal">
            Registrar Nuevo
            <i class="ace-icon fa fa-plus align-top icon-on-right">
            </i>
        </button>
    </div>
									</div>



<div class="row">
    <div class="col-12">
        @component('components.ace-table',['title'=>'Cursos'])
        	<th data-sortable="true">Curso</th>
			<th data-sortable="true">Nivel</th>
			<th>Asignar</th>
			<th>Acciones</th>
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
                        Curso :
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" name="curso" required="">
                        <option value="">
                        </option>
                       	@foreach ($cursos as $curso)
										   <option value="{{$curso->id}}" >{{$curso->nombre }}</option>
									@endforeach 
                    </select>
                </div>
            </div>
           	<input type="text" name="plan_grado" hidden="" value="{{$plan->id}}" />
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
	$('#menu-plan_academico-asignar-grado-curso').addClass('active').removeClass('d-none');	
			

@component('components.js.b-table',['route'=>route('Director.PlanAcademicoGradoCurso.Retrieve',['plan'=>$plan])])
        @endcomponent

@component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'
	  @endslot
      
      @slot('rules')
		curso: {required: true }
		 
		 
	@endslot

	

       @slot('submitHandler')
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				'{!! route('Director.PlanAcademicoGradoCurso.Store') !!}'
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

	})


  </script>

@stop