@extends('layouts.ace',['title'=>'Director | Año academico','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
 
         Habilitar
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



@component('components.card-form',[ 'formId'=>'form','cardId'=>'widget','color'=>'bgc-primary'])

	  @slot('titleCard')
	    Activar Año  academico
	  @endslot
	 @slot('toolbarCard')
	  	<a href="#" data-action="collapse">
							<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
						</a>
	  @endslot

	  @slot('formInputs')
	      	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

       <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Año academico :</label>
                </div>

                <div class="col-sm-9 col-12 tag-input-style">
                  <select  class="select2 form-control " data-placeholder="Seleccione" name="anio"  required="">
          	<option value=''></option>	
				@foreach($anios  as $anio)

				<option value="{{$anio->id}}" @if ($anio->estado=='Activo') selected=""  @endif >
					{{$anio->descripcion}} - {{$anio->anio}}
				</option>
				
				@endforeach

                  </select>

                
                </div>
              </div>

	  @endslot

	
          @slot('cardButtons')
		<div class="offset-md-9 col-md-9">
                  <button class="btn btn-info" >
                    <i class="fa fa-check mr-1"></i>
                    Actualizar
                  </button>

                
                </div>

						
	  @endslot

	@endcomponent

@stop
@section('footer')
@component('components.footer')
@endcomponent
@endsection


@section('script')

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
		


$('#menu-anio-academico').addClass('active open');
  $('#menu-anio-academico').children('.submenu').addClass('show');

  $('#menu-anio-academico-activar').addClass('active'); 

		$.validator.messages.required = "Este Campo es Obligatorio";
		$.validator.messages.require_from_group = "Por favor , complete {0} de estos campos";



		@component('components.js.validate-form')
	  @slot('formId')
	    '#form'
	  @endslot
      
      @slot('rules')
		
		anio:{required:true}
	   @endslot



       @slot('submitHandler')
			var formData = new FormData($("#form")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				'{{route('Director.AnioAcademico.Estado.Update')}}'
			@endslot
	        @slot('data')
				formData
			@endslot

	        @slot('beforeSend')
		        $('#widget').aceWidget('startLoading');
				
	        @endslot

			@slot('success')
				//$('#widget').widget_box('reload');

          $('div[class*="form-group"] ').removeClass('has-success');
          $('div[class*="form-group"] ').removeClass('has-error');

			Swal.fire({
  icon: 'success',
  title: message.message,
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


