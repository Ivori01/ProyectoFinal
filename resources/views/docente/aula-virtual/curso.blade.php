@extends('layouts.ace',['title'=>'Docente | Aula Virtual'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('Docente.AulaVirtual.Index')])
@endcomponent
@endsection

@section('navbar-menu')
@component('components.docente.a-virtual.navbar-menu')
@endcomponent
@endsection

@section('page-settings')
@component('components.page-settings')
@endcomponent
@endsection

@section('sidebar-buttons')
@component('components.docente.a-virtual.sidebar-button')
@endcomponent
@endsection

@section('sidebar-menu')
@component('components.docente.a-virtual.sidebar-menu')
@endcomponent
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])

@slot('page_name')
<a href="{{ route('Docente.AulaVirtual.Index')}}">Aula virtual</a>
@endslot

@slot('subpage_name')
{{ $curso->cursoinfo->datosCurso->nombre }} | {{ $curso->seccionInfo->datosGrado->nombre }} {{ $curso->seccionInfo->letra }} | {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }}
 
@endslot
@endcomponent
@endsection

@section('head')

@endsection

@section('content')
<div class="row">
</div>
<div class="row radius-1 shadow-md overflow-hidden">
    <div class="col-12 col-sm-6 col-lg-3 my-1 my-lg-0 px-sm-1 px-lg-0">
        <div class="pos-rel bgc-green-d2 py-3 c-pointer">
            <span class="opacity-4 position-rc mr-2 d-none">
                <i class="mr-3 mt-n2 fa fa-dollar-sign text-dark-tp5 opacity-4 w-5 h-5 text-center pt-1 radius-round fa-5x">
                </i>
            </span>
            <a class="d-flex align-items-center" href="
            {{ route('Docente.AulaVirtual.Curso.Contenido',['curso'=>$curso->id]) }}" style="text-decoration:none">
                <div class="pos-rel p-3 bgc-white-tp8 radius-round ml-3 mr-3 shadow-md">
                    <i class="pos-abs mt-n2px ml-n3px fa fa-list-alt text-dark-tp5 opacity-4 w-5 h-5 text-center pt-1 radius-round text-170">
                    </i>
                    <i class="pos-rel fa fa-list-alt text-white w-5 h-5 text-center pt-1 radius-round text-170">
                    </i>
                </div>
                <div class="text-white">
                    <div>
                        <span class="text-160 text-600">
                           Contenido
                        </span>
                       
                    </div>
                    
                </div>
            </a>
        </div>
    </div>
     <div class="col-12 col-sm-6 col-lg-3 my-1 my-lg-0 px-sm-1 px-lg-0">
        <div class="pos-rel bgc-primary-d1 py-3 border-l-3 brc-white-tp3 c-pointer">
            <span class="opacity-4 position-rc mr-45 d-none">
                <i class="mr-4 mt-n4 fa fa-signal text-dark-tp5 opacity-4 w-5 h-5 text-center pt-1 radius-round fa-6x">
                </i>
            </span>
            <a href="
            {{ route('Docente.Evaluacion.Index',['curso'=>$curso->id]) }}" style="text-decoration:none">
                  <div class="d-flex align-items-center">
                <div class="pos-rel p-3 bgc-white-tp8 radius-round ml-3 mr-3 shadow-md">
                    <i class="pos-abs mt-n1 ml-n1 fas fa-question-circle text-blue opacity-3 w-5 h-5 text-center pt-1 radius-round text-170">
                    </i>
                    <i class="pos-rel fas fa-question-circle text-white w-5 h-5 text-center pt-1 radius-round text-170">
                    </i>
                </div>
                <div class="text-white">
                    <div>
                        <span class="text-160 text-600">
                           Evaluaciones 
                        </span>
                      
                    </div>
                   
                </div>
            </div>
            </a>
          
        </div>
    </div> 
    <div class="col-12 col-sm-6 col-lg-3 my-1 my-lg-0 px-sm-1 px-lg-0">
        <div class="bgc-purple-d1 py-3 border-l-3 brc-white-tp3 c-pointer">
            <a href=" {{ route('Docente.TareaEntrega.Index',['id'=>$curso->id]) }} " style="text-decoration:none">
            <div class="d-flex align-items-center">
                <div class="pos-rel p-3 bgc-white-tp8 radius-round ml-3 mr-3 shadow-md">
                    <i class="pos-abs mt-n1 fa fa-clipboard text-purple-d3 opacity-4 w-5 h-5 text-center pt-1 radius-round fa-2x">
                    </i>
                    <i class="pos-rel fa fa-check text-white w-5 h-5 text-center pt-1 radius-round text-170">
                    </i>
                </div>
                <div class="text-white">
                    <div>
                        <span class="text-160 text-600">
                           Tareas
                        </span>
                        
                    </div>
                    
                </div>
            </div>
            </a>
        </div>
    </div>
   {{--  <div class="col-12 col-sm-6 col-lg-3 my-1 my-lg-0 px-sm-1 px-lg-0">
        <div class="bgc-default-d1 py-3 border-l-3 brc-white-tp3 c-pointer">
            <div class="d-flex align-items-center">
                <div class="pos-rel p-3 bgc-white-tp8 radius-round ml-3 mr-3 shadow-md">
                    <i class="pos-abs mt-n2px ml-n3px fa fa-retweet text-default-d2 opacity-3 w-5 h-5 text-center pt-1 radius-round text-170">
                    </i>
                    <i class="pos-rel fas fa-video text-white w-5 h-5 text-center pt-1 radius-round text-170">
                    </i>
                </div>
                <div class="text-white">
                    <div>
                        <span class="text-160 text-600">
                            Video Clases
                        </span>
                       
                    </div>
                   
                </div>
            </div>
        </div>
    </div> --}}
</div>
<div class="row mt-5">
    <div class="col-12 {{-- col-sm-8 --}} cards-container" id="content-container">
        <div class="d-flex justify-content-between border-b-1 brc-purple-m4 pb-1">
            <h4 class="font-light text-purple mr-md-5">
                Lista de contenido
            </h4>
            <button class="btn btn-outline-info mb-2px mb-2" data-target="#modal-registro" data-toggle="modal">
                <i class="fas fa-plus text-140 align-text-bottom mr-1">
                </i>
                Nuevo
            </button>
        </div>
        @foreach($contenidos as $contenido)
        <div class="card mb-3 mt-2" data-index="{{ $contenido->id }}" data-position="{{ $contenido->orden }}" style="">
            <div class="card-header card-header-lg">
                <h5 class="card-title text-130">
                    {{ $contenido->nombre }}
                </h5>
                <div class="card-toolbar">
                    <button class="btn btn-sm border-0 radius-0 text-100 btn-yellow ml-1" data-target="#modal-registro-sc" data-toggle="modal" onclick="addSubCont('{{ $contenido->id }}',this)" type="button">
                        Contenido
                        <i class="fas fa-plus text-90">
                        </i>
                    </button>
                    <a class="card-toolbar-btn text-grey-m2" data-action="toggle" draggable="false" href="#">
                        <i class="fa fa-chevron-up">
                        </i>
                    </a>
                    <a class="card-toolbar-btn text-danger-m2" href="#" onclick="deleteCont('{{ route('Docente.Contenido.Destroy',['id'=>$contenido->id]) }}',this)">
                        <i class="fa fa-times">
                        </i>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-white p-0 collapse " style="">
                @foreach($contenido->subContenidos as $SubContenido)
                <div class="">
                    <div class="col-12 cards-container" id="card-container-3">
                        <div class="card bgc-yellow-tp2 mb-3" draggable="false" id="card-3" style="">
                            <div class="card-header card-header-sm">
                                <h5 class="card-title text-dark-tp4 text-600 text-90 pt-2px">
                                    {{ $SubContenido->nombre }}
                                </h5>
                                <div class="card-toolbar">
                                    <a class="card-toolbar-btn text-danger-d2" draggable="false" href="#" onclick="deleteSubCont('{{ route('Docente.SubContenido.Destroy',['id'=>$SubContenido->id]) }}',this)">
                                        <i class="fa fa-times">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body bg-white p-0 collapse " style="">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
        @endforeach
    </div>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal-registro" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',['cardId'=>'Widget-create','formId'=>'form-create'])
          @slot('titleCard')
           Agregar Contenido
          @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
            @slot('formInputs')
            <input hidden="hidden" name="curso" type="text" value="{{ $curso->id }}">
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Nombre :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control col-9" id="id-form-field-1" name="nombre" required="required" type="text">
                            </input>
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
                </input>
            </input>
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal-registro-sc" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @component('components.card-form',['cardId'=>'Widget-create-sc','formId'=>'form-create-sc'])
          @slot('titleCard')
           Agregar Contenido
          @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
            @slot('formInputs')
            <input hidden="hidden" id="contenido" name="contenido" type="text">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Nombre :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control col-9"  name="nombre" required="required" type="text">
                            </input>
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
                </input>
            </input>
        </div>
    </div>
</div>
@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection


@section('script')
<script crossorigin="anonymous" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js">
</script>
<script type="text/javascript">
    var el;
    var elCont;
    jQuery(function($) {
   
$(document).ready(function() {


    //$('id-ace-settings-modal').click();
    //alert();

  $('#content-container').sortable({
    items:'> .card',
     cursor: "move",
opacity: 1,
    helper: "clone",
      scroll: false,

             update: function (event, ui) {
                   $(this).children().each(function (index) {
                        if ($(this).attr('data-position') != (index+1)) {
                            $(this).attr('data-position', (index+1)).addClass('updated');
                        }
                   });

                   saveNewPositions();
               }
  });
  $( "#content-container" ).sortable( "refresh" );
  $( "#content-container" ).sortable( "refreshPositions" )
  });

    @component('components.js.validate-form')
       @slot('formId')
       '#form-create'
       @endslot

      @slot('rules')
       nombre:{required:true }
      @endslot
  

       @slot('submitHandler')
        var formData = new FormData($('#form-create')[0]);

@component('components.js.ajax')
@slot('url')
' {{ route('Docente.Contenido.Store') }} '
@endslot

@slot('data')
formData
@endslot


@slot('beforeSend')
$('#Widget-create').aceWidget('startLoading');
@endslot
@slot('success')

$('#Widget-create').aceWidget('stopLoading');

rstForm("#form-create");
$('#content-container').append(message.content);
$( "#content-container" ).sortable( "refresh" );
$("#modal-registro").modal('hide');
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
              
        
       });

            function saveNewPositions() {
            var positions = [];
            $('.updated').each(function () {
               positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
               $(this).removeClass('updated');
            });    

token=$("#token").val();
  $( "#content-container" ).sortable( "refreshPositions" )
            $.ajax({
               url: '{{ route('Docente.Contenido.Reorder') }}',
               method: 'POST',
               dataType: 'json',
               data: {
                _token:token,
                 
                   positions: positions
               }, success: function (response) {
                    //console.log(response);
               }
            });
        }

        function deleteCont(ruta,el) {
         elCont=el;
    Swal.fire({
        title: 'Desea eliminar este registro ?',
        text: "La accion no se podra revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si,eliminar !',
    }).then((result) => {
        if (result.value) {
 token = $("#token").val();
              $.ajax({
               url: ruta,
               method: 'POST',
               dataType: 'json',
               data: {
                _token:token,
                  _method: "DELETE",
               }, success: function (msg) {
                console.log(elCont);

                 $(elCont).parent().parent().parent().remove();
                    Swal.fire('Eliminado', msg.message, 'success')
                   
               }
               ,
            error: function(msg) {
                Swal.fire('Error!', msg.message, 'error')
            }
            });
            
        }
    })
}

function addSubCont(cont,elem) {
  el=elem;
   $("#contenido").val('');
 $("#contenido").val(cont);
   @component('components.js.validate-form')
       @slot('formId')
       '#form-create-sc'
       @endslot
 
      @slot('rules')
       nombre:{required:true }
      @endslot
  

       @slot('submitHandler')
        var formData = new FormData($('#form-create-sc')[0]);
        //formData.append("contenido", cont);

      
@component('components.js.ajax')
@slot('url')
' {{ route('Docente.SubContenido.Store') }} '
@endslot

@slot('data')
formData
@endslot
@slot('beforeSend')
 $('#Widget-create-sc').aceWidget('reload');   
@endslot
@slot('success')
$('#Widget-create-sc').aceWidget('stopLoading');
$(el).parent().parent().parent().children('.card-body').append(message.subcontent);
rstForm("#form-create-sc");
//$('#content-container').append(message.content);
//$( "#content-container" ).sortable( "refresh" );
$("#modal-registro-sc").modal('hide');
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
}


        function deleteSubCont(ruta,el) {
         
    Swal.fire({
        title: 'Desea eliminar este registro ?',
        text: "La accion no se podra revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si,eliminar !',
    }).then((result) => {
        if (result.value) {
 token = $("#token").val();
              $.ajax({
               url: ruta,
               method: 'POST',
               dataType: 'json',
               data: {
                _token:token,
                  _method: "DELETE",
               }, success: function (msg) {
                 
                    Swal.fire('Eliminado', msg.message, 'success')
                    $(el).parent().parent().parent().remove();
                   
               }
               ,
            error: function(msg) {
                Swal.fire('Error!', msg.message, 'error')
            }
            });
            
        }
    })
}
</script>
@endsection
