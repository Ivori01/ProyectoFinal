@extends('layouts.print',['title'=>'Reporte','headertitle'=>'Alumno'])



@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
ver
@endslot
@slot('subpage_name')
 
      Notas
@endslot
@endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-12 ">
        <p class="text-center font-weight-bold h2 text-default">
            Boleta de Notas
        </p>
        <p class="h5">
            Apellidos : {{ $matricula->datosalumno->persona->apellidos }}
        </p>
        <p class="h5">
            Nombres : {{ $matricula->datosalumno->persona->nombres }}
        </p>
        <p class="h5">
            Grado :{{ $matricula->datosSeccion->datosGrado->numero }}°  {{ $matricula->datosSeccion->datosGrado->datosNivel->nombre }}
        </p>
        <div aria-labelledby="home-tab" class="tab-pane fade text-95 active show" id="home" role="tabpanel">
            {!! $tabla !!}
        </div>
    </div>
</div>
@stop



@section('script')
<script type="text/javascript">
    jQuery(function($) {
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  var target = $(e.target).attr("href") 
  // activated tab
  //alert(target);
});


    $('.toolti').tooltip({
       
    });

    $('#menu-grado').addClass('active open');
  $('#menu-grado').children('.submenu').addClass('show');

  $('#menu-grado-notas').addClass('active').removeClass('d-none'); 

			
		})



	function detalles(ruta){
       
		token=$("#token").val();
		$.ajax({
		url: ruta,
		dataType:'json',
		beforeSend: function(){ 
		 $('#modal-detalle').aceWidget('startLoading');
		},
		success:function(msg) {
			$('#modal-detalle').aceWidget('stopLoading');
			
			$("#detalle-title").html(msg.curso);
			$("#show-detalle").html(msg.tabla);
	


		} ,

		error : function(xhr, status) {
		}
		});


	}
</script>
@stop
