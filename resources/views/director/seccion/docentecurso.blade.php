@extends('layouts.ace',['title'=>'Director | Seccion docente curso','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
Secciones del año {{optional($anio)->anio  }}
@endslot
@slot('subpage_name')
 
         Asignar docentes a cursos
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
        @component('components.ace-table',['title'=>'Secciones'])

		<th data-sortable="true" >Nivel</th>
		<th data-sortable="true">Grado</th>
		<th data-sortable="true">Letra</th>
		<th data-sortable="true">Año</th>
		<th>Docente Curso</th>
		<th data-sortable="true">Estado</th>
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
          <div id="inputs">
		</div>
<input type="text" name="anio" value="{{date('Y')}}" hidden="">

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

			

	

$('#menu-seccion').addClass('active open');
  $('#menu-seccion').children('.submenu').addClass('show');

  $('#menu-seccion-docentecurso').addClass('active'); 


 @component('components.js.b-table',['route'=>route('Director.SeccionDocenteCurso.Retrieve')])
        @endcomponent


	@component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'
	  @endslot

      @slot('rules')
		
      @endslot

	

       @slot('submitHandler')
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax')

		    @slot('url')
				"{!! route('Director.SeccionDocenteCurso.Store') !!}"
			@endslot
	       @slot('data')
				formData
			@endslot
	        @slot('beforeSend')
		        $('#widget').aceWidget('startLoading');
				
	        @endslot

			@slot('success')
				
				//rstForm("#form-create");
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





	})


	function createcursodocente(ruta){
        
       $("#inputs").html('');
		token=$("#token").val();
		$.ajax({ 
		url:ruta,
		
		dataType:'json',
		beforeSend: function(){ 
		 $('#widget').aceWidget('startLoading');
			
		},
		success:function(msg) {

			$('#widget').aceWidget('stopLoading');
			$('span[class*="block"] ').html('');
			$('div[class*="form-group"] ').removeClass('has-success');
			$('div[class*="form-group"] ').removeClass('has-error');
			$("#inputs").html(msg.curso);
			
			 routeUpdate=msg.ruta;

	$('.select2').css('width','90%').select2().on('change', function(ev) {
	$(this).closest('form').validate().element($(this));
	});


		} 
		});


	}


  </script>

@stop