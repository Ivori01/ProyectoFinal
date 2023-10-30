@extends('layouts.ace',['title'=>'Alumno | Notas','headertitle'=>'Alumno','viewtitle'=>'Notas '.$seccion->datosseccion->datosGrado->numero.'°' .$seccion->datosseccion->letra.' '.$seccion->datosseccion->datosGrado->nivel.' '.$seccion->datosseccion->datosAnioNivel->datosAnio->anio,'page'=>'Alumno'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 

@section('navbar-menu')
@component('components.alumno.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.alumno.sidebar-menu') 
@endcomponent
@endsection
@endcomponent
@endsection

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
    <div class="col-12 tabs-above">
        <div class="tab-content rounded-bottom">
            <div aria-labelledby="home-tab" class="tab-pane fade text-95 active show" id="home" role="tabpanel">
                {!! $tabla !!}
            </div>
        </div>
    </div>
</div>  

<div aria-hidden="true" aria-labelledby="warningModalLabel" class="modal fade" id="modal-detalle" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-width-0 border-t-4 brc-warning-m2 px-3">
            <div class="modal-header py-2" >
               <p class="text-600 mb-1  text-120 " id="detalle-title"></p>
            </div>
            <div class="modal-body text-center" id="show-detalle">
               
            </div>
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
