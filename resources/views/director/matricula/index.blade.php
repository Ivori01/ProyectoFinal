@extends('layouts.ace',['title'=>'Director | Matriculas','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
Matriculas 
@endslot
@slot('subpage_name')
 
         Todas
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
        @component('components.ace-table',['title'=>'Matriculas'])
		<th data-sortable="true">Documento</th>
		<th data-sortable="true">Apellidos y Nombres</th>
		<th data-sortable="true">Nivel</th>
		<th data-sortable="true">Seccion</th>
		<th data-sortable="true">Fecha</th>
		<th >Acciones</th>
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
            <input name="_token" id="token" type="hidden" value="{{ csrf_token() }}"/>

              <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Seccion</label>
                </div>

                <div class="col-sm-9 col-12 tag-input-style">
                  <select  class="select2 form-control " data-placeholder="Seleccione" name="id_seccion"  >
                    <option value=''></option>	
                   
                    @foreach ($secciones->sortBy('datosGrado.numero') as $seccion)
                    <option value="{{$seccion->id}}">{{$seccion->datosGrado->nombre .' - '.$seccion->letra .' - '.$seccion->datosGrado->DatosNivel['nombre']}} ( {{$seccion->datosAnioNivel->datosAnio->anio}} )</option>  
                    @endforeach	 
                   
 
                  </select>

                
                </div>
              </div>


<div class="form-group row">
    <div class="col-sm-3 col-form-label text-sm-right pr-0">
      <label for="state">Alumno</label>
    </div>

    <div class="col-sm-9 col-12 tag-input-style">
      <select  class="select2 form-control " data-placeholder="Seleccione" id="alumno" name="id_alumno"  >
        
      </select>
    </div>
  </div>

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
 <script src="{{ asset('assets/js/initinput.js')}}"></script>
  <script type="text/javascript">
	var myTable;   
	var routeUpdate;  
	jQuery(function($) {


	$('#menu-matricula').addClass('active open');
  $('#menu-matricula').children('.submenu').addClass('show');
  $('#menu-matricula-todos').addClass('active');

@component('components.js.select-search',['name'=>'#alumno','ruta'=>route('Director.Alumno.Search')])

		@endcomponent

 @component('components.js.b-table',['route'=>route('Director.Matricula.Retrieve')])
        @endcomponent
	


	@component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'
	  @endslot

      @slot('rules')
		seccion: {required: true }, 
		alumno: {required: true }
	  @endslot

       @slot('submitHandler')
			var formData = new FormData($('#form-create')[0]);

		@component('components.js.ajax')

		    @slot('url')
				"{!! route('Director.Matricula.Store') !!}"
			@endslot
	      @slot('data')
				formData
			@endslot
	        @slot('beforeSend')
		        $('#widget').aceWidget('startLoading');
	           
	        @endslot

			@slot('success')
			$('#alumno').empty().trigger("change");
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





	})




  </script>

@stop