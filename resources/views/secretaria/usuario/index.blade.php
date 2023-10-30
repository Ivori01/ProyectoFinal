 @extends('layouts.director',['title'=>'Director | Usuario','headertitle'=>'Usuario','viewtitle'=>'Todos','page'=>'Usuario'])


@section('content')
<style type="text/css">
	input[type=checkbox].ace.ace-switch + .lbl::before {
   text-indent: -35px;
}
input[type=checkbox].ace.ace-switch:checked + .lbl::before {
   text-indent: 8px;
    background-color: #7eb661;
   

}
input[type=checkbox].ace.ace-switch+.lbl::before {

    width: 72px;
   
      background-color: #c45a5a;
        color: #fff;
}

input[type=checkbox].ace.ace-switch:checked+.lbl::after {
    left: 50px;
  
}


</style>


<div class="row">
	<div class="col-xs-12">
		<button class="btn btn-info btn-block "  data-target="#modal-registro" data-toggle="modal">
		Registrar
		<i class="ace-icon glyphicon glyphicon-plus align-top  icon-on-right"></i>
		</button>
	</div>


</div> 

<div class="space-12"></div>
	@component('components.table')
	  @slot('title')
	       Usuarios
	  @endslot
		<th>Documento</th>
		<th>Apellidos Y Nombres</th>		
		<th>Roles</th>
		<th>Imagen</th>
		<th>Estado </th>
		<th>Acciones</th>
	@endcomponent

	<div id="modal-registro" class="modal">
	<div class="modal-dialog" >

			@component('components.widget-box', ['foo' => 'foo','formId'=>'form-create','id'=>'widget'])
	  @slot('title')
	       Formulario de registro  de usuarios
	  @endslot
	  @slot('toolbar')
	  <a href="#" >
					<i class="ace-icon fa bigger-120 white"  data-dismiss="modal">X</i>
				    </a>
	  @endslot

	  @slot('body')
	      			<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

						<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Persona</label>
								<div class="col-xs-12 col-sm-9" >
									
									    <select class="select2" id="select2" name="persona"  data-placeholder="Ingrese numero de  documento..">
									    	
                                         </select> 
									
								</div>
								<span class="block input-icon input-icon-right">
								</span>
							</div>
					

	  @endslot

	  @slot('footer')
	 
		<button class="btn  btn-danger pull-left" type="button"  onclick="resetForm('#form-create');" >
								<i class="ace-icon fa fa-times"></i>
								<span class="bigger-110">Cancelar</span>
							</button>

							<button class="btn btn-success pull-right">
								<span class="bigger-110">Aceptar</span>
								<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
							</button>
	  @endslot

	@endcomponent

	
	</div>
</div>

<div id="modal-update-criterio" class="modal ">
	<div class="modal-dialog" >
			@component('components.widget-box', [
		'foo' => 'foo',
		'formId'=>'form-update-rol',
		'id'=>'widget2',
		'title'=>'Editar Roles'])
		 	  @slot('toolbar')
	  <a href="#" >
					<i class="ace-icon fa bigger-120 white"  data-dismiss="modal">X</i>
				    </a>
	  @endslot
	  @slot('body')
			
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
							

								           	<div class="form-group">
																<label class="control-label col-xs-12 col-sm-4 " for="email">Rol</label>

																<div class="col-xs-12 col-sm-7">
																	<div class="clearfix">
																									<select class="select2"  data-placeholder="Seleccione ..." id="rol" name="rol" required="">
																	<option value=""></option>
	@foreach ($roles as $rol)
										   <option value="{{$rol->id}}" >{{$rol->name}} </option>
									@endforeach  
																</select>
																	</div>
																</div>
																<span class="block input-icon input-icon-right">
							</span>
										
															</div>
														<div class=" widget-toolbox padding-10 clearfix">
						

							<button class="btn btn-success pull-right">
								<span class="bigger-110">Guardar</span>
								<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
							</button>
						</div>
					
							<div class="space-12"> </div>

<div class="space-36"> </div>
																						<div class="form-group">
															

																<div class="col-xs-12 " id="criteriosupdatetable">
																
																</div>
															</div>
	  @endslot
	
	  @slot('footer')
	  <hr>
			
	  @endslot
		
	@endcomponent

	</div>
</div>


        

	@include('partials.destroy')

@stop



@section('script')
 <script src="{{ asset('assets/js/initinput.js')}}"></script>

  <script type="text/javascript">
  
   	var myTable;       
	jQuery(function($) {



	@component('components.js.select-search',['name'=>'#select2','ruta'=>route('Director.User.Search')])
	
	@endcomponent		
			
						
		$('#menu-persona').addClass('active open');
		$('#menu-user').addClass('active');				
		$('#Usuario-todos').addClass('active');

	
	@component('components.js.table',['route'=>route('Director.User.Retrieve')])
	@endcomponent


@component('components.js.validate-form')
	  @slot('form')
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

       @slot('valid')
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax-submit')
		
		    @slot('rutaAjax')
				'{!! route('Director.User.Store') !!}'
			@endslot
	        @slot('data')
				formData
			@endslot

	        @slot('beforeSendAjax')
		        $('#widget').widget_box('reload');
				
	        @endslot

			@slot('successAjax')
				//$('#widget').widget_box('reload');
				resetForm("#form-create");
				$("#modal-registro").modal('hide');
				myTable.ajax.reload();
				messageSucess(msg);
		    @endslot
       @slot('completeAjax')
		    $('#widget').trigger('reloaded.ace.widget');
		    @endslot

		@endcomponent
	
	  @endslot

	@endcomponent


	@component('components.js.validate-form')

		@slot('form')
		'#form-update-rol'
		@endslot
      
		@slot('rules')
		rol: {required: true }
		@endslot

		@slot('valid')
			
	var formData = new FormData($("#form-update-rol")[0]);

			@component('components.js.ajax-submit')

			    @slot('rutaAjax')
					'{!! route('Director.User.Rol.Add') !!}'
				@endslot
			    @slot('data') 
					formData
				@endslot

			    @slot('beforeSendAjax')
					$('#widget2').widget_box('reload');
					
			    @endslot

				@slot('successAjax')
					//$('#widget2').trigger('reloaded.ace.widget');
					$("#modal-registro").modal('hide');
					resetForm("#form-update-rol");
					editrol(msg.ruta);
                    messageSucess(msg);
			    @endslot
			        @slot('completeAjax')
		    $('#widget2').trigger('reloaded.ace.widget');
		    @endslot

			@endcomponent

		@endslot

	@endcomponent


	})

	function editrol(ruta){
        $.gritter.removeAll();
		token=$("#token").val();
		$.ajax({
		url: ruta,
		type:'Post',
		data:{_token:token},
		dataType:'json',
		beforeSend: function(){ 
		 $('#widget-update').widget_box('reload');
		},
		success:function(msg) {
			$('#widget-update').trigger('reloaded.ace.widget');
			$('span[class*="block"] ').html('');
			$('div[class*="form-group"] ').removeClass('has-success');
		
			$("#nivel2").html(msg.nivel);
			
			$("#nombre2").val(msg.nombre);
			$("#descripcion2").val(msg.descripcion);
				$("#criteriosupdatetable").html(msg.roles);

			 routeUpdateCriterio=msg.ruta;
			 routeEditCriterio=ruta;



		} ,

		error : function(xhr, status) {
		}
		});


	}

		function destroyrol(ruta) {
		   $.gritter.removeAll();
                    
           var formData = new FormData($("#form-destroy")[0]);
           token=$("#token").val();
            user=$("#user").val();
			$("#btn-destroy").off('click').on('click', function() {
  
				$.ajax({
					url: ruta,
					type: 'post',
					data:{_token:token,user:user},
					dataType: 'json',
					cache:false,
					beforeSend: function(){ 
					$('#widget-destroy').widget_box('reload');
					              
					},

					success:function(msg) {

					$('#widget-destroy').trigger('reloaded.ace.widget');
			
					$("#modal-destroy").modal('hide');
editrol(msg.ruta);
				messageSucess(msg);
				
					},
					error : function(msg) {
                        $('#widget-destroy').trigger('reloaded.ace.widget');
					
						$("#modal-destroy").modal('hide');
						messageError(msg);

						
					}
				});
				
			}); // click remove btn

		}

			function editestado(ruta,estado){
        $.gritter.removeAll();
       
		token=$("#token").val();
		if (estado==true) {estado=1} else {estado=0}
		$.ajax({
		url: ruta,
		type:'Post',
		data:{_token:token,_method:"PUT",activo:estado},
		dataType:'json',
	
		success:function(msg) {

messageSucess(msg);
		} 
		});


	}

  </script> 

@stop