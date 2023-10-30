@extends('layouts.ace',['title'=>'Director | Criterios de evaluacion','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
Criterios de evaluacion
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
        @component('components.ace-table',['title'=>'Criterios de evaluacion'])
        <th data-sortable="true">Nombre</th>
		<th data-sortable="true">Descripcion</th>
    <th data-sortable="true">Curso</th>
    <th data-sortable="true">Nivel</th>
		<th data-sortable="true">Estado</th>
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
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0">
                            Nombre :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control w-75"  name="nombre" type="text">
                        </input>
                    </div>
                </div>
                  <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0">
                            Descripcion :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="descripcion" maxlength="250" placeholder="250 character limit"></textarea>
                    </div>
                </div>
                     <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Curso</label>
                </div>

                <div class="col-sm-9 col-12 tag-input-style">
                  <select  class="select2 form-control " data-placeholder="Seleccione" name="curso" >
                    <option value=''></option>  
                @foreach ($cursos as $curso)
                           <option value="{{$curso->id}}" >{{$curso->nombre .' - '.$curso->DatosNivel->nombre}} </option>
                    @endforeach  
                  </select>

                
                </div>
              </div>

                <input hidden="" name="estado" type="text" value="Activo"/>

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
             <input type="hidden" name="_method" value="PUT">
            <input name="_token"  id ="token" type="hidden" value="{{ csrf_token() }}">

            <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0">
                            Nombre :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control w-75" id="nombre2" name="nombre" type="text">
                        </input>
                    </div>
                </div>
                  <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0">
                            Descripcion :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <textarea name="descripcion" id="descripcion2" class="form-control"  maxlength="250" placeholder="250 character limit"></textarea>
                    </div>
                </div>
  <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Curso :</label>
                </div>

                <div class="col-sm-9 col-12 tag-input-style" id="s-curso">
               

                
                </div>
              </div>
       <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Estado :</label>
                </div>

                <div class="col-sm-4 col-12 tag-input-style" id="s-estado">
               

                
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
			
	$('#menu-criterioevaluacion').addClass('active'); 	

	$('textarea.limited').maxlength({

            alwaysShow: true,
            allowOverMax: false,

            warningClass: "badge badge-dark",
            limitReachedClass: "badge badge-warning",
            placement: 'bottom-right-inside'
          });
					autosize($('textarea[class*=autosize]'));
				
 @component('components.js.b-table',['route'=>route('Director.CriterioEvaluacion.Retrieve')])
        @endcomponent


	@component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'
	  @endslot
      
      @slot('rules')
		nombre: {required: true }, 
		descripcion: {required: true }
	   @endslot

       @slot('submitHandler')
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				'{!! route('Director.CriterioEvaluacion.Store') !!}'
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
				rstForm("#form-create");
					
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
	    '#form-update'
	  @endslot
      
      @slot('rules')
		nombre: {required: true }, 
		descripcion: {required: true }
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

	function editcriterio(ruta){
       
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
		
$("#s-estado").html(msg.CriterioEvaluacion.select);
$("#s-curso").html(msg.CriterioEvaluacion.select_curso);
			$("#nombre2").val(msg.CriterioEvaluacion.nombre);
			$("#descripcion2").val(msg.CriterioEvaluacion.descripcion);

			 routeUpdate=msg.CriterioEvaluacion.ruta;
	$('.select2').css('width','90%').select2().on('change', function(ev) {
	$(this).closest('form').validate().element($(this));
	});


		} ,

		error : function(xhr, status) {
		}
		});


	}


  </script>

@stop