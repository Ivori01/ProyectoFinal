@extends('layouts.ace',['title'=>'Director | Descuentos','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
@component('components.page-name')
@slot('page_name')
Descuento
@endslot
@slot('subpage_name')
 
        Todos
@endslot
@endcomponent
@endsection
@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/photoswipe.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/venobox.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <button class="btn btn-lg btn-info btn-block " data-target="#modal-registro" data-toggle="modal">
            Registrar Nuevo
            <i class="ace-icon fa fa-plus align-top icon-on-right">
            </i>
        </button>
    </div>
</div>


<div class="row">
    <div class="col-12">
        @component('components.ace-table',['title'=>'Descuentos'])
		<th data-sortable="true">Descripcion</th>
		<th data-sortable="true">Cantidad</th>
		<th >Acciones</th>
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
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
 <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Descripcion :
                    </label>
                </div>
                <div class="col-sm-9">
                    <textarea class="form-control" maxlength="50" id="descripcion" name="descripcion" placeholder="50 character limit">
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Cantidad :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control col-sm-5" name="cantidad" id="costo" type="number"/>
                </div>
            </div>
                  
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

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal-update" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',[ 'formId'=>'form-update','cardId'=>'widget-update','color'=>'bgc-primary'])
          @slot('titleCard')
          Formulario de actualizacion
          @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
            @slot('formInputs')
            <input name="_method" type="hidden" value="PUT"/>
            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Descripcion :
                    </label>
                </div>
                <div class="col-sm-9">
                    <textarea class="form-control" id="descripcionU" maxlength="50" name="descripcion" placeholder="50 character limit">
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Cantidad :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control col-sm-5" id="costoU" name="cantidad" type="number"/>
                </div>
            </div>
              
            @endslot

          @slot('cardButtons')
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
<script src="{{ asset('assets/js/jquery.inputmask.min.js')}}" type="text/javascript">
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
  
  $('#menu-contabilidad').addClass('active open');
  $('#menu-contabilidad').children('.submenu').addClass('show');
  $('#menu-contabilidad-concepto-descuento').addClass('active');

@component('components.js.b-table',['route'=>route('Director.Descuento.Retrieve')])
        @endcomponent

$('textarea.limited').maxlength({
            alwaysShow: true,
            allowOverMax: false,
            warningClass: "badge badge-dark",
            limitReachedClass: "badge badge-warning",
            placement: 'bottom-right-inside'
          });
  
		autosize($('textarea[class*=autosize]'));

@component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'
	  @endslot
      
      @slot('rules')
		descripcion: {required: true },
		 cantidad: {required: true }
		@endslot

       @slot('submitHandler')
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				'{!! route('Director.Descuento.Store') !!}'
			@endslot
	        @slot('data')
				formData
			@endslot

	        @slot('beforeSend')
		        $('#widget').aceWidget('startLoading');
	        @endslot

			@slot('success')
				$('#widget').aceWidget('stopLoading');
					$("#modal-registro").modal('hide');
				rstForm("#form-create");
			Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
               myTable.bootstrapTable('refresh');
		    @endslot

		@endcomponent
	
	  @endslot

	@endcomponent

@component('components.js.validate-form')
	  @slot('formId')
	    '#form-update'
	  @endslot
      
      @slot('rules')
	descripcion: {required: true }, 
	cantidad: {required: true }
	   @endslot

       @slot('submitHandler')
			var formData = new FormData($("#form-update")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				routeUpdate
			@endslot
	        @slot('data')
				formData
			@endslot

	        @slot('beforeSend')
		        $('#widget2').aceWidget('startLoading');
	        @endslot

			@slot('success')
				$('#widget2').aceWidget('stopLoading');
					$("#modal-update").modal('hide');
				
								Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
               myTable.bootstrapTable('refresh');
		    @endslot

		@endcomponent
	
	  @endslot

	@endcomponent	


	})

	
	function editdescuento(ruta){
       
		token=$("#token").val();
		$.ajax({
		url: ruta,
		dataType:'json',
		beforeSend: function(){ 
		 $('#widget-update').aceWidget('startLoading');
		},
		success:function(msg) {
			$('#widget-update').aceWidget('stopLoading');

			$('div[class*="form-group"] ').removeClass('has-success');
	
			$("#descripcionU").val(msg.datos.descripcion);
			$("#costoU").val(msg.datos.cantidad);

			//$("#fechadescuentoU").val(msg.datos.fechadescuento);
			//$("#fechavencimientoU").val(msg.datos.fechavencimiento);
			 routeUpdate=msg.ruta;
			
			


//$('.datepicker').datepicker( "destroy" );$( '.datepicker' ).removeClass("hasDatepicker").removeAttr('id');


		} ,

		error : function(xhr, status) {
		}
		});


	}


  </script>

@stop