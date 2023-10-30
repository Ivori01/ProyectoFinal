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
<a href="{{ route('Docente.AulaVirtual.Index')}}">
    Aula virtual
</a>
@endslot

@slot('subpage_name')
{{-- {{ $curso->cursoinfo->datosCurso->nombre }} | {{$repo_grado->onlyName( $curso->seccionInfo->datosGrado->numero) }} {{ $curso->seccionInfo->letra }} | {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }} --}}
 
@endslot
@endcomponent
@endsection

@section('head')

@endsection

@section('content')
<div class="card border-0 radius-0" id="card-2">
    <div class="card-header bgc-dark-d1">
        <h5 class="card-title text-white">
            {{ $evaluacion->nombre }}
        </h5>
    </div>
    <div class="card-body bgc-transparent p-0 border-0 brc-primary-m3 border-t-0">
        <div class="p-3">
            <p>
                <b>
                    {{ $evaluacion->indicaciones }}
                </b>
            </p>
             <p class="text-center">
                Disponible desde :
                
                    {{ $evaluacion->fecha_inicio }}
               
            </p>
               <p class="text-center">
                Disponible hasta :
                
                    {{ $evaluacion->fecha_fin }}
                
            </p>
            <p class="text-center">
                Método de calificación :
                <b>
                    @switch($evaluacion->modo_calificacion)

                        @case(1)
                        Ultimo Intento
                        @break

                        @case(2)
                        Promedio
                        @break 

                        @case(3)
                        Mejor puntaje
                        @break

                    @endswitch
                </b>
            </p>
            <p class="text-center">
                Intentos permitidos:
                <b>
                    {{ $evaluacion->intentos }}
                </b>
            </p>
              <p class="text-center">
                Duración :
                <b>
                    {{ $evaluacion->duracion }} Minutos
                </b>
            </p>
            <div class="d-flex justify-content-center">
                <a class="btn px-4 btn-success btn-lg mb-1" href="{{ route('Docente.Evaluacion.Preview',['evaluacion'=>$evaluacion]) }}">
                    Iniciar intento
                </a>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
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
