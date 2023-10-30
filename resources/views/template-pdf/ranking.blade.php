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
    	<p class="h2 text-center">Ranking de notas</p>
        <div class="table-responsive-md">
            <table class="table table-bordered text-dark-m1">
                <thead>
                    <tr class="bgc-secondary-l3">
                        <th>
                           Documento
                        </th>
                        <th>
                           Nombres Apellidos
                        </th>
                        <th>
                            Seccion
                        </th>
                        <th>
                            Nota
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promedios as $prom)
                    <tr>
                        <td>
                            {{ $prom->get('matricula')->datosalumno->persona->nrodocumento }}
                        </td>
                        <td>
                            {{ $prom->get('matricula')->datosalumno->persona->NombresApellidos }}
                        </td>
                        <td>
                            {{ $prom->get('matricula')->datosSeccion->datosGrado->numero }}° 
                               {{ $prom->get('matricula')->datosSeccion->letra }}
                            {{ $prom->get('matricula')->datosSeccion->datosGrado->datosNivel->nombre }}
                        </td>
                        <td>
                        	@if ($califica=='Literal')
                        		 {{ $prom->get('literal')}}
                        	@else
                        		 {{ $prom->get('prom')}}
                        	@endif
                          
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
