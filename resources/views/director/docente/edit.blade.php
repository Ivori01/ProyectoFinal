
@extends('layouts.ace',['title'=>'Director | Editar informacion de los docentes'])

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
Docente
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
            Formulario de actualizacion
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
      @foreach($docente->estados as $estado)
      <option value="{{$estado}}" @if($estado==$docente->estado) selected="" @endif>{{$estado}} </option>
      @endforeach

    </select>

  </div>
</div>
                 <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Nivel:</label>
                </div>

                <div class="col-sm-4 col-12 tag-input-style">
                  <select  class="select2 form-control " data-placeholder="Seleccione" name="nivel[]"  multiple="" required="">
          	<option value=''></option>	
				@foreach ($niveles as $nivel)
							   <option value="{{$nivel->id}}" @if($docente->niveles->where('nivel',$nivel->id)->count()==1) selected="" @endif>{{$nivel->nombre}} </option>
						@endforeach 

                  </select>

                
                </div>
              </div>
                  <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                       Especialidad :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control w-75"  name="especialidad" type="text" value="{{$docente->especialidad}}">
                    </input>
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
  $('#menu-docente').addClass('active open');  
  $('#menu-docente').children('.submenu').addClass('show');
  $('#docente-edit').addClass('active').removeClass('d-none');
 $('.select2').css('width', '80%').select2({
        allowClear: false
    }).on('change', function() {
        $(this).closest('form').validate().element($(this));
    });
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
	{type: 'image', name: '{{url(Storage::url('sistem/photos/'.$Persona->foto))}}', path:"{{url(Storage::url('sistem/photos/'.$Persona->foto))}}" }

	]);

  $('.ace-file-icon align-self-center mx-2px').find('img').attr("style","");

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
		nrodocumento: {required: true,number:true, maxlength:11, minlength:8 }, 
		genero: {required: true }, 
		celular: { require_from_group: [1,".nro"] },
		telefono:{require_from_group: [1,".nro"] },
		fechanacimiento: {required: true },
		correo:{required:true, email:true }, 
		direccion: {required: true },
		/*nivel:{required:true },*/
		especialidad:{required:true},
		estado:{required:true}
	   @endslot

	

       @slot('submitHandler')
			var formData = new FormData($("#form-update")[0]);
         
		@component('components.js.ajax')
		
		    @slot('url')
				'{{ route("Director.Docente.Update",["Docente"=>"$Persona->id"]) }}'
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