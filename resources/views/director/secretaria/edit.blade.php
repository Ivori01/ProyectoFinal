@extends('layouts.ace',['title'=>'Director | Editar informacion de secretarias'])

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
Secretaria
@endslot
@slot('subpage_name')
  
        Editar 
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<div class="row">
    <div class="col-12">
        @component('components.card-form',['cardId'=>'Widget-create','formId'=>'form-update','color'=>'bgc-primary'])
          @slot('titleCard')
        <p class="text-left text-white">
            Formulario de Registro 
        </p>
        @endslot
          
            @slot('formInputs')
                @include('partials.inputs')
                <input type="hidden" name="_method" value="PUT">
        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">

             <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Estado :</label>
                </div>

                <div class="col-sm-4 col-12 tag-input-style">
                  <select  class="select2 form-control " data-placeholder="Seleccione" name="estado"  required="">
          	<option value=''></option>	
				@foreach($Secretaria->estados as $estado)
				<option value='{{$estado}}' @if ($estado == $Secretaria->estado) selected=""  @endif>{{$estado}}</option>
				
				@endforeach

                  </select>

                
                </div>
              </div>
                @endslot

          @slot('cardButtons')
                <button class="btn btn-lg btn-success ">
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
  <script type="text/javascript">

	jQuery(function($) {
	
$('#menu-persona').addClass('active open');
  $('#menu-persona').children('.submenu').addClass('show');
  $('#menu-secretaria').addClass('active open');  
  $('#menu-secretaria').children('.submenu').addClass('show');
  $('#secretaria-edit').addClass('active').removeClass('d-none');

	$('#foto').aceFileInput({
    style: 'drop',
            droppable: true,

            container: 'border-1 border-dashed brc-grey-m4 brc-h-warning-m1',
            placeholderClass: 'text-125 text-600 text-grey-l2 my-2',
            placeholderText: 'Arrastre o cargue Archivo',
            placeholderIcon: '<i class="fas fa-file fa-3x text-purple-l1 my-2"></i>',

            thumbnail: 'large'


	}).on('change', function(){
	//console.log($(this).data('ace_input_files'));
	//console.log($(this).data('ace_input_method'));
	});


	$('#foto')
	.aceFileInput('showFileList', [
	{format:'image',type: 'image', name: '{{url(Storage::url('sistem/photos/'.$Persona->foto))}}', path:"{{url(Storage::url('sistem/photos/'.$Persona->foto))}}" }

	]);
    console.log($('#g-f').find('img').attr('style',''));

	$.validator.messages.required = "Este Campo es Obligatorio";
	$.validator.messages.require_from_group = "Por favor , complete {0} de estos campos";

		
		@component('components.js.validate-form')
	  @slot('formId')
	    '#form-update'
	  @endslot
      
      @slot('rules')
		tipodocumento:{ required:true},
		nombres: {required: true},
		apellidos: {required: true},
		nrodocumento: {required: true,number:true, maxlength:11, minlength:8}, 
		genero: {required: true }, 
		celular: { require_from_group: [1,".nro"] },
		telefono:{require_from_group: [1,".nro"] },
		fechanacimiento: {required: true },
		correo:{required:true, email:true }, 
		direccion: {required: true },
		estado:{required:true}
	   @endslot

	  @slot('messages')
		nrodocumento: {remote: "Numero de Documento Duplicado"}
	  @endslot

       @slot('submitHandler')
			var formData = new FormData($("#form-update")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				'{!! route('Director.Secretaria.Update',["Secretaria"=>"$Persona->id"]) !!}'
			@endslot
	        @slot('data')
				formData
			@endslot

	        @slot('beforeSend')
		        $('#Widget-create').aceWidget('startLoading');
				
	        @endslot

			@slot('success')
			$('#Widget-create').aceWidget('stopLoading');
				$('span[class*="block"] ').html('');
		        $('div[class*="form-group"] ').removeClass('has-success');

				                  Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
		    @endslot
@slot('error')
                    $('#Widget-create').aceWidget('stopLoading');
    Swal.fire({
  icon: 'warning',
  title: message.responseJSON.message,
  showConfirmButton: false,
  timer: 2500
})
                @endslot
		@endcomponent
	
	  @endslot

	@endcomponent



	})


     
        </script>

@stop