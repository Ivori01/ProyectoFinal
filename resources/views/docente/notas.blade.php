@extends('layouts.ace',['title'=>'Docente | Notas'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 


@section('navbar-menu')
@component('components.docente.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.docente.sidebar-menu') 
@endcomponent
@endsection
@endcomponent
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Asignar
@endslot
@slot('subpage_name')
 
      Notas
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="mt-3 alert text-white bgc-purple-d3 radius-0 border-0 text-105 py-3 pos-rel shadow">
    <div class="position-tl h-100 w-100 bgc-green-tp1 opacity-5 border-none border-l-4 brc-black-tp5">
    </div>
    <div class="pos-rel">
        <p>
            <i class="fa fa-check text-100 mr-2 text-yellow-l4 ">
            </i>
            {{ $seccion->cursoInfo->datosCurso->nombre }}
        </p>
        <p>
            <i class="fa fa-check text-100 mr-2 text-yellow-l4 ">
            </i>
            {{ $seccion->seccionInfo->datosGrado->nombre }} "{{ $seccion->seccionInfo->letra }}"
        </p>
        <p>
            <i class="fa fa-check text-100 mr-2 text-yellow-l4 ">
            </i>
            {{ $seccion->seccionInfo->datosGrado->datosNivel->nombre }}
        </p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form class="form-horizontal" id="form-create" novalidate="novalidate" role="form">
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 input-lg " data-placeholder="Seleccione periodo..." id="trimestre" name="trimestre" onchange="getNotas($(this).val());">
                        <option value="">
                        </option>
                        @foreach ($seccion->gradoCurso->planGrado->trimestres->sortBy('datosTrimestre.numero') as $trimestre)
                        <option value="{{$trimestre->id}}">

                           {{$trimestre->datosTrimestre->periodo  }} - {{$trimestre->datosTrimestre->nombre}} 
                           ({{ optional(optional($trimestre->fechas->where('anio_nivel',$seccion->seccionInfo->datosAnioNivel->id)->first())->fechainicio)->format('m/d/Y')}} - {{ optional(optional($trimestre->fechas->where('anio_nivel',$seccion->seccionInfo->datosAnioNivel->id)->first())->fechafin)->format('m/d/Y')}})
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="table-responsive-md">
                    <table class="table table-striped table-bordered table-hover mb-0" id="notastb">
                       
                    </table>
                    <button class="btn btn-md btn-success btn-block rounded-0">
                        Guardar
                    </button>
                </div>
            </input>
        </form>
    </div>
</div>
@stop



@section('script')
<script src="{{ asset('assets/js/moment.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/additional-methods.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
<script type="text/javascript">
    var myTable;
	var routeUpdate;        
jQuery(function($) {



$('#menu-curso').addClass('active open');
  $('#menu-curso').children('.submenu').addClass('show');

  $('#menu-curso-notas').addClass('active').removeClass('d-none'); 
	
				

		$(document).ready(function() {

getNotas();

		});


jQuery.validator.addClassRules('literal',{
	required:true
});

@component('components.js.validate-form',['showSuccess'=>''])

	  @slot('formId')
	    '#form-create'
	  @endslot

      @slot('rules')
	trimestre: {required: true}
      @endslot

       @slot('submitHandler')
     
       $('.form-text d-inline-block ml-sm-2').addClass('d-none');
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax')

		    @slot('url')
				"{!! route('Docente.Notas.Store',['id'=>$seccion]) !!}"
			@endslot
	         @slot('data')
        formData
      @endslot
	      

			@slot('success')
			getNotas($('#trimestre').val());
			    Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
            
		    @endslot

		   

		@endcomponent

	  @endslot

	@endcomponent



 var $validClass = '';


			})




	function getNotas(trimestre) {
		$('#submitnotas').addClass('hide'); 
$('#notastb').html('');

			$.ajax({
		url:'{{route('Docente.Notas.Retrieve',['id'=>$seccion])}}',
		 data:{"trimestre":trimestre},
		dataType:'json',
			beforeSend: function(){ 
		 $('#notastb').aceWidget('startLoading');



		},
	
		success:function(msg) {

		$('#submitnotas').removeClass('hide'); 				
			
			  $('#notastb').html(msg.table);
 $('#notastb').aceWidget('stopLoading');

		} ,

		error : function(message) {
               Swal.fire({
  icon: 'warning',
  title: message.responseJSON.message,
  showConfirmButton: false,
  timer: 2500
})
			$('#notastb').aceWidget('stopLoading');  
		}
		});
	}
</script>
@stop
