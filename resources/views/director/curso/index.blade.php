@extends('layouts.ace',['title'=>'Director | Cursos','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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
Cursos
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
        @component('components.ace-table',['title'=>'Cursos'])

        <th  data-sortable="true">
        Nombre
        </th>
        <th  data-sortable="true">
        Nivel
        </th>
        <th  data-sortable="true">
        Estado
        </th>
          <th>
       Imagen
        </th>
        <th>
        Acciones
        </th>
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
                            Nombre :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control w-75"  name="nombre" type="text">
                        </input>
                    </div>
                </div>
             <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Nivel</label>
                </div>

                <div class="col-sm-9 col-12 tag-input-style">
                  <select  class="select2 form-control " data-placeholder="Seleccione" name="nivel" >
                    <option value=''></option>  
                @foreach ($niveles as $nivel)
                           <option value="{{$nivel->id}}" >{{$nivel->nombre}} </option>
                    @endforeach  
                  </select>

                
                </div>
              </div>

                <div class="form-group row" >
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label class="mb-0" >
                                    foto :
                                </label>
                            </div>
                            <div class="col-sm-9" id="g-f">
                                <input class="form-control ace-file-input" id="foto" name="imagen" type="file"/>
                              
                            </div>
                        </div>

                <input hidden="" name="estado" type="text" value="Activo"/>
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
             <input type="hidden" name="_method" value="PUT">
            <input name="_token"  id ="token" type="hidden" value="{{ csrf_token() }}">

            <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0">
                            Nombre :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control w-75" id="nombre2" name="nombre" type="text">
                        </input>
                    </div>
                </div>
       <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  <label for="state">Estado</label>
                </div>

                <div class="col-sm-9 col-12 tag-input-style" id="estado2">


                
                </div>
              </div>

               <div class="form-group row" >
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label class="mb-0" >
                                    foto :
                                </label>
                            </div>
                            <div class="col-sm-9" id="g-f2">
                                <input class="form-control ace-file-input" id="foto2" name="imagen" type="file"/>
                              
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
                </input>
            </input>
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
<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/venobox.min.js')}}" type="text/javascript">
    </script>
<script src="{{ asset('assets/js/initinput.js')}}">

</script>
<script type="text/javascript">
    var myTable;   
	var routeUpdate;
	
	jQuery(function($) {


   $('#foto').aceFileInput({
            style: 'drop',
            droppable: true,

            container: 'border-1 border-dashed brc-grey-m4 brc-h-warning-m1',

            placeholderClass: 'text-125 text-600 text-grey-l2 my-2',
            placeholderText: 'Arrastre o cargue Archivo',
            placeholderIcon: '<i class="fas fa-file fa-3x text-purple-l1 my-2"></i>',

            thumbnail: 'large'

            //allowExt: 'gif|jpg|jpeg|png|webp|svg'
          });
	

$('#menu-curso').addClass('active');				
			

    @component('components.js.b-table',['route'=>route('Director.Curso.Retrieve')])
        @endcomponent
      $('#dynamic-table').on('load-success.bs.table', function (data) {
   $('.venobox').venobox();})

@component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'
	  @endslot
      
      @slot('rules')
		nombre: {required: true },
		  nivel:{required:true } 
	@endslot

	

       @slot('submitHandler')
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				'{!! route('Director.Curso.Store') !!}'
			@endslot
	        @slot('data')
				formData
			@endslot

	        @slot('beforeSend')
		        $('#widget').aceWidget('startLoading');
	        @endslot

			@slot('success')
				$('#widget').aceWidget('stopLoading');
				rstForm("#form-create");
				$("#modal-registro").modal('hide');
				myTable.bootstrapTable('refresh');
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


@component('components.js.validate-form')
	  @slot('formId')
	    '#form-update'
	  @endslot
      
      @slot('rules')
		nombre: {required: true },
		
		  estado:{required:true}
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
		        $('#widget-update').aceWidget('startLoading');
	        @endslot

			@slot('success')
				$('#widget-update').aceWidget('stopLoading');
			
				$("#modal-update").modal('hide');
				 myTable.bootstrapTable('refresh');
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




	})

	function editcurso(ruta){
       
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
			$("#nombre2").val(msg.nombre);
			$("#estado2").html(msg.estado);
		 $('#foto2').aceFileInput({
            style: 'drop',
            droppable: true,

            container: 'border-1 border-dashed brc-grey-m4 brc-h-warning-m1',

            placeholderClass: 'text-125 text-600 text-grey-l2 my-2',
            placeholderText: 'Arrastre o cargue Archivo',
            placeholderIcon: '<i class="fas fa-file fa-3x text-purple-l1 my-2"></i>',

            thumbnail: 'large'

            //allowExt: 'gif|jpg|jpeg|png|webp|svg'
          });

            $('#foto2')
    .aceFileInput('showFileList', [
    {type: 'image', name: '{{url(Storage::url('sistem/photos/curso/'))}}'+'/'+msg.foto, path:"{{url(Storage::url('sistem/photos/curso/'))}}"+'/'+msg.foto }

    ]);
      console.log($('#g-f2').find('img').attr('style','').attr('width','150'));
				$("#criteriosupdate").html(msg.criterios);

			 routeUpdate=msg.ruta;

	$('.select2').css('width','90%').select2().on('change', function(ev) {
	$(this).closest('form').validate().element($(this));
	});


		} ,

		error : function(xhr, status) {
		}
		});


	}
</script>
@stop
