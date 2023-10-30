@extends('layouts.ace',['title'=>'Director | Horario','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
Horario {{ $seccion->datosGrado->nombre  ."° " .$seccion->letra}}</strong>  <strong>{{$seccion->datosGrado->datosNivel->nombre}}
@endslot
@slot('subpage_name')
 
        Asignar
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

@component('components.card-form',['cardId'=>'Widget-create','formId'=>'form-create','color'=>'bgc-primary'])
          @slot('titleCard')
        <p class="text-left text-white"> 
           Asignar horario 
        </p>
        @endslot
          
            @slot('formInputs')
              
        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Curso :</label>
                </div>

                <div class="col-sm-9 col-12 tag-input-style">
                  <select  class="select2 form-control " data-placeholder="Seleccione" name="curso"  >
          	<option value=''></option>	
				@foreach ($seccion->cursos as $curso)
								
										   <option value="{{$curso->id}}" > {{$curso->cursoinfo->datosCurso->nombre}} </option>
									@endforeach 

                  </select>

                
                </div>
              </div>


               <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Hora :</label>
                </div>

                <div class="col-sm-9 col-12 tag-input-style">
                  <select  class="select2 form-control " data-placeholder="Seleccione" name="value"  required="">
          	<option value=''></option>	
				@php
$total=count($horas);
$f=$total-2;
$c=0;
for ($i=0; $i <= $f; $i++) { 
$horalibre =  $hlibre->where( ["horainicio"=> date("H:i:s",strtotime($horas[$i])) ,"idconfig"=>$config->id])->count();
  if ( $horalibre==0) {
           	 echo'<option value="'.$horas[$i].$horas[$c+1].'" > '.$horas[$i] .' - '. $horas[$c+1].' </option>';

                }
                else{
                  //  $horaActual->addMinutes($duracion);
                }



	
	
	$c++;

}

								
									 @endphp

                  </select>

                
                </div>
              </div>
               <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Dia :</label>
                </div>

                <div class="col-sm-9 col-12 tag-input-style">
                  <select  class="select2 form-control " data-placeholder="Seleccione" name="dia"  required="">
          	<option value=''></option>	
				@php 
				foreach ($dias as $dia){
if ($config[strtolower($dia)]=='true') {
  echo '<option value="'.$dia.'" > '.$dia .'</option>';
} 
								
										
								}
									@endphp	

                  </select>

                
                </div>
              </div>
            <input type="" name="idconfig" value="{{$config->id}}" hidden="hidden">
                @endslot

          @slot('cardButtons')
                <button class="btn btn-lg btn-danger" onclick="rstForm('#form-create');" type="button">
                    <i class="fa fa-times mr-2">
                    </i>
                    Cancelar
                </button>
                <button class="btn btn-lg btn-success">
                    Aceptar
                    <i class="fa fa-arrow-right ml-2">
                    </i>
                </button>
                @endslot
          @endcomponent


<div class="table-responsive-md">
<div class="bgc-dark-tp2 text-white px-3 py-25 mt-4">
   Horario 
 </div>
<table class="table table-striped table-bordered table-hover" id="table">
		<thead>
			<tr>
				<th>Hora</th>
				<th>Lunes</th>
				<th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sabado</th>
				<th>Domingo</th>
			</tr>
		</thead>

		<tbody id="horaslist">
			
		</tbody>
	</table>
</div>




	<table class="table table-striped table-bordered table-hover">
	<thead class="thin-border-bottom">
		<tr>
			<th>
				<i class="ace-icon fa fa-caret-right blue"></i>Curso
			</th>

			<th>
				<i class="ace-icon fa fa-caret-right blue"></i>Docente
			</th>

		
		</tr>
	</thead>

	<tbody>
		@foreach($seccion->cursos as $curso)
		<tr>
			<td>{{$curso->cursoinfo->datosCurso->nombre}}</td>

			<td>
			
				<b class="green">	@if($curso->docenteinfo)
					<div class="name">
						<a href="#">{{$curso->docenteinfo->persona->nombres}} {{$curso->docenteinfo->persona->apellidos}}</a>
					</div>

					
					
	@endif</b>
			</td>

			
		</tr>

	@endforeach
	</tbody>
	</table>



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


			
			 $('#menu-horario').addClass('active open');
  $('#menu-horario').children('.submenu').addClass('show');
  $('#menu-horario-main').addClass('active open');  
  $('#menu-horario-main').children('.submenu').addClass('show');
  $('#menu-horario-asignar-edit').addClass('active').removeClass('d-none'); 

$(document).ready(function() {

gethorario($("#nivel").val());

				 });



@component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'
	  @endslot
      
      @slot('rules')
curso: {
	required: true

	},
value: {
	required: true

	},
	dia:{
	required: true	
	}
  @endslot

	

       @slot('submitHandler')
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				'{{ route("Director.Horario.Store") }}'
			@endslot
	        @slot('data')
				formData
			@endslot

	        @slot('beforeSend')
		        $('#Widget-create').aceWidget('startLoading');
				
	        @endslot

			@slot('success')
				gethorario();

			
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
		    $('#Widget-create').aceWidget('stopLoading');
		    @endslot

		@endcomponent
	
	  @endslot

	@endcomponent


	




			})




	function gethorario() {

$('#horaslist').html('');
			$.ajax({
		url:'{{route('Director.Horario.Show',['id'=>$seccion->id])}}',
		
		dataType:'text',
			beforeSend: function(){ 
		 $('#table').aceWidget('startLoading');



		},
	
		success:function(msg) {

						
			 $('#horaslist').html(msg);
$('#table').aceWidget('stopLoading');

		} ,

		error : function(xhr, status) {
		}
		});
	}




	function destroyhorario(value) {
		
token=$("#token").val();
			$.ajax({
		url:'{{route('Director.Horario.Destroy',['id'=>'$config->id'])}}',
		type:'post',
		data:{"value":value,"_token":token,"_method":"DELETE"},
		dataType:'json',
	
		success:function(msg) {
	gethorario();
				messageSucess(msg);


		} ,

		error : function(msg) {
			messageError(msg);
		}
		});
	}

  </script>




@stop


