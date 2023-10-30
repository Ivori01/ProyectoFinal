@extends('layouts.ace',['title'=>'Director | Usuarios','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
Usuarios
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
        @component('components.ace-table',['title'=>'Usuarios'])
		<th data-sortable="true">ID</th>
      <th data-sortable="true">Documento</th>
		<th data-sortable="true">Apellidos Y Nombres</th>		
		<th>Roles</th>
		<th>Contraseña</th>
		<th>Imagen</th>
		<th data-sortable="true">Estado </th>
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
					<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
					
					<div class="form-group row">
						<div class="col-sm-3 col-form-label text-sm-right pr-0">
							<label for="state">Persona :</label>
						</div>
						<div class="col-sm-9 col-12 tag-input-style">
							<select  class="select2 form-control " id="select2" name="persona">

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


<div aria-hidden="true"  class="modal fade" id="modal-update-criterio" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',[ 'formId'=>'form-update-rol','cardId'=>'widget2','color'=>'bgc-primary'])
				@slot('titleCard')
				Editar Roles
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
						  <label for="state">Rol :</label>
						</div>

						<div class="col-sm-9 col-12 tag-input-style">
							<select  class="select2 form-control " data-placeholder="Seleccione" id="rol" name="rol"  required="">
								<option value=''></option>	
								@foreach ($roles as $rol)
								<option value="{{$rol->id}}" >{{$rol->name}} </option>
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
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/venobox.min.js')}}" type="text/javascript">
</script>

<script type="text/javascript">

   	var myTable;       
	jQuery(function($) {

	@component('components.js.select-search',['name'=>'#select2','ruta'=>route('Director.User.Search')])
	 
	@endcomponent		
			
	$('#menu-persona').addClass('active open');
	$('#menu-persona').children('.submenu').addClass('show');
	$('#menu-user').addClass('active ');  

	@component('components.js.b-table',['route'=>route('Director.User.Retrieve')])
	@endcomponent

	$('#dynamic-table').on('load-success.bs.table', function (data) {
	$('.venobox').venobox();
	})

    @component('components.js.validate-form')
		@slot('formId')
			'#form-create'
		@endslot

		@slot('rules')
			persona: {
			required: true
			}
		@endslot

		@slot('messages')
		nrodocumento: {remote: "Numero de Documento Duplicado"}
		@endslot

		@slot('submitHandler')
			var formData = new FormData($("#form-create")[0]);

			@component('components.js.ajax')
		
			    @slot('url')
					'{!! route('Director.User.Store') !!}'
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
					$('#select2').empty().trigger("change");
					myTable.bootstrapTable('refresh');
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
				    $('#widget').aceWidget('stopLoading')
			    @endslot

			@endcomponent
	
		@endslot

	@endcomponent


	@component('components.js.validate-form')

		@slot('formId')
		'#form-update-rol'
		@endslot
      
		@slot('rules')
		rol: {required: true }
		@endslot

		@slot('submitHandler')
			
			var formData = new FormData($("#form-update-rol")[0]);

			@component('components.js.ajax')

			    @slot('url')
					'{!! route('Director.User.Rol.Add') !!}'
				@endslot
			    @slot('data') 
					formData
				@endslot

			    @slot('beforeSend')
					$('#widget2').aceWidget('startLoading');
					
			    @endslot

				@slot('success')
					$("#modal-registro").modal('hide');

					rstForm("#form-update-rol");
					editrol(message.ruta);
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


	})

	function editrol(ruta){
        
		token=$("#token").val();
		$.ajax({
			url: ruta,
			type:'Post',
			data:{_token:token},
			dataType:'json',
			beforeSend: function(){ 
				$('#widget-update').aceWidget('startLoading'); 
			},
			success:function(message) {
				$('#widget-update').aceWidget('stopLoading');
				$('span[class*="block"] ').html('');
				$('div[class*="form-group"] ').removeClass('has-success');

				$("#nivel2").html(message.nivel);
				$("#nombre2").val(message.nombre);
				$("#descripcion2").val(message.descripcion);
				$("#criteriosupdatetable").html(message.roles);

				routeUpdateCriterio=message.ruta;
				routeEditCriterio=ruta;
			} ,

			error : function(xhr, status) {
			}
		});


	}

	function destroyrol(ruta) {

		var formData = new FormData($("#form-destroy")[0]);
		token=$("#token").val();
		user=$("#user").val();
 
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
							data:{_token:token,user:user},
							dataType: 'json',
							cache:false,
							beforeSend: function(){ 
								$('#widget-destroy').aceWidget('startLoading');          
							},
							success:function(message) {
								$('#widget-destroy').aceWidget('stopLoading');
								$("#modal-destroy").modal('hide');
								editrol(message.ruta);
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

	function resetPassword(ruta) {

		var formData = new FormData($("#form-destroy")[0]);
		token=$("#token").val();
		

		Swal.fire({
		title: 'Desea reestablecer la Contraseña ?',
		text: "La accion no se podra revertir!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, reestablecer !',
		    }).then((result) => {
		        if (result.value) {
		           $.ajax({
							url: ruta,
							type: 'post',
							data:{_token:token},
							dataType: 'json',
							cache:false,
						
							success:function(message) {
								$('#widget-destroy').aceWidget('stopLoading');
								$("#modal-destroy").modal('hide');
								
								Swal.fire({
								icon: 'success',
								title: message.message,
								showConfirmButton: false,
								timer: 2500
								})
						    }
						
						});	
		        }
		    })
					

	}
		function editestado(ruta,estado){

		token=$("#token").val();
		if (estado==true) {estado=1} else {estado=0}
		$.ajax({
			url: ruta,
			type:'Post',
			data:{_token:token,_method:"PUT",activo:estado},
			dataType:'json',
			success:function(message) {
				Swal.fire({
								icon: 'success',
								title: message.message,
								showConfirmButton: false,
								timer: 2500
								})
			} 
		});


		}

  </script> 

@stop