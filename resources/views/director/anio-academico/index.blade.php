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
        @component('components.ace-table',['title'=>'Años academicos'])

			<th data-sortable="true">Descripcion</th>

		
		<th data-sortable="true">Año</th>
<th>Asignar</th>
		<th>Acciones</th>
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

	        <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0">
                            Descripcion :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="descripcion" name="descripcion" maxlength="250" placeholder="50 character limit"></textarea>
                    </div>
                </div>

    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" >
                               Año :
                            </label>
                        </div>
                        <div class="col-sm-9">
                          
                              
                        
                               <div class="input-group date datetimepickerm w-50" id="d-anio">
                            <input type="text"   id="anio" name="anio" class="form-control w-75" >
                            <div class="input-group-addon input-group-append">
                              <div class="input-group-text">
                                <i class="far fa-clock"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
 
                <input hidden="" name="estado" type="text" value="Inactivo"/>

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
jQuery(function($) {
	
   $('#descripcion').maxlength({
            alwaysShow: true,
            allowOverMax: false,
            warningClass: "badge badge-dark",
            limitReachedClass: "badge badge-warning",
            placement: 'bottom-right-inside'
          });

$('#menu-anio-academico').addClass('active open');
  $('#menu-anio-academico').children('.submenu').addClass('show');

  $('#menu-anio-academico-todos').addClass('active'); 

	 @component('components.js.b-table',['route'=>route('Director.AnioAcademico.Retrieve')])
        @endcomponent


   $('#d-anio').datetimepicker({
    icons: {
            time: 'far fa-clock text-success text-120',
            date: 'far fa-calendar text-blue text-120',
            up: 'fa fa-chevron-up text-secondary',
            down: 'fa fa-chevron-down text-secondary',
            previous: 'fa fa-chevron-left text-secondary',
            next: 'fa fa-chevron-right text-secondary',
            today: 'far fa-calendar-check text-purple-m1 text-120',
            clear: 'fa fa-trash-alt text-orange-d1 text-120',
            close: 'fa fa-times text-danger text-120'
        },
         toolbarPlacement: "top",
        allowInputToggle: true,
         format: 'L',
          showTodayButton: true,
                  viewMode: 'years',
                  format: "YYYY"
             
                }); 
    $('#d-anio').on('dp.show', function() {
        $('.collapse.in').addClass('show')
        $(this).find('.table-condensed').addClass('table table-borderless')
        $(this).find('[data-action][title]').tooltip() //enable tooltip
    });
$(document).on('show.bs.collapse', '.bootstrap-datetimepicker-widget .collapse', function() {
        $(this).addClass('in')
    }).on('hide.bs.collapse', '.bootstrap-datetimepicker-widget .collapse', function() {
        $(this).removeClass('in')
    });

$.validator.messages.require_from_group = "Por favor , complete {0} de estos campos";
		@component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'
	  @endslot

      @slot('rules')
		anio:{required:true }, 
		descripcion:{required:true},
		nivel:{required:true},
		conf_horario:{required:true},
		planacad:{required:true}
	  @endslot
	

       @slot('submitHandler')
			var formData = new FormData($('#form-create')[0]);

		@component('components.js.ajax')

		    @slot('url')
				"{{route('Director.AnioAcademico.Store')}}"
			@endslot
	        @slot('data')
				formData
			@endslot
	        @slot('beforeSend')
		        $('#widget').aceWidget('startLoading');
	           
				
	        @endslot

			@slot('success')
				rstForm("#form-create");
				$("#modal-registro").modal('hide');
				Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
               myTable.bootstrapTable('refresh');
				$("#planh-show").addClass('d-none');
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


