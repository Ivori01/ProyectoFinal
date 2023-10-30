@extends('layouts.ace',['title'=>'Alumno | Aula Virtual'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('Alumno.AulaVirtual.Index')])
@endcomponent
@endsection

@php $tarea=$tarea_e->datosTarea; @endphp

@section('navbar-menu')
@component('components.alumno.a-virtual.navbar-menu')
@slot('li')
<li class="nav-item">
    <a class="nav-link dropdown-toggle" href="{{ route('Alumno.TareaEntrega.Revisiones',['id'=>$tarea->subContenido->datosContenido->datosCurso->id]) }}">
        <i class="fa fa-eye text-110 icon-animated-vertical mr-lg-1">
        </i>
        Revisiones
    </a>
</li>
<li class="nav-item dd-backdrop dropdown dropdown-mega">
    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" data-toggle="dropdown" href="http://104.237.146.83/templates/ace/demo/#" id="li-nrotareas" role="button">
        <i class="fa fa-tasks text-110 icon-animated-vertical mr-lg-1">
        </i>
        <span class="d-inline-block d-lg-none ml-2">
            Tareas Pendientes
        </span>
        <!-- show only on mobile -->
        <span class="badge badge-sm badge-warning radius-round text-80 border-1 brc-white-tp5" id="id-navbar-badge1">
            @php
                   $cont=0;
                   $curso=$tarea->subContenido->datosContenido->datosCurso;
                   foreach($curso->contenidos as $contenido){
                   foreach($contenido->subContenidos as $subContenido){
                    foreach($subContenido->tareas as $tarea){
                    if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->user)->count() <1 ){
$cont++;
                    }}}} 

                    @endphp
                    {{ $cont }}
            <input hidden="" id="nrotareas" name="" type="text" value="{{ $cont }}">
            </input>
        </span>
        <i class="caret fa fa-angle-left d-block d-lg-none">
        </i>
        <div class="dropdown-caret brc-warning-l2">
        </div>
    </a>
    <div class="shadow dropdown-menu dropdown-animated animated-1 dropdown-xs p-0 bg-white brc-warning-l1 border-x-1 border-b-1">
        <div class="bgc-warning-l2 py-25 px-4 border-b-1 brc-warning-l2">
            <span class="text-dark-tp4 text-600 text-90 text-uppercase">
                <i class="fa fa-check mr-2px text-warning-d2 text-120">
                </i>
                Tareas sin Enviar
            </span>
        </div>
        @foreach($curso->contenidos as $contenido)
                   @foreach($contenido->subContenidos as $subContenido)
                    @foreach($subContenido->tareas as $tarea)
                    @if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->user)->count() <1 )
        <div class="px-4 py-2">
            <div class="text-95">
                <span class="text-grey-d1 text-blue font-bolder">
                    {{ $subContenido->nombre }}
                </span>
            </div>
            <div class="text-95">
                <span class="text-grey-d1">
                    {{ $tarea->nombre }}
                </span>
            </div>
            <div class="progress mt-2">
                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bgc-success" role="progressbar" style="width: 100%;">
                    Vence :
                           {{{ $tarea->fecha_ven->diffForHumans() }}}
                </div>
            </div>
        </div>
        <hr class="my-1 mx-4">
            @endif
                @endforeach
                 @endforeach
                @endforeach
        </hr>
    </div>
</li>
@endslot
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
@component('components.page-name')
@slot('page_name')
<a href="{{ route('Alumno.AulaVirtual.Index')}}">
    Aula virtual
</a>
@endslot
@slot('subpage_name')
<a href="{{ route('Alumno.AulaVirtual.Curso.Index',['id'=>$tarea->subContenido->datosContenido->datosCurso->id]) }}">
    {{ $tarea->subContenido->datosContenido->datosCurso->cursoinfo->datosCurso->nombre }} | {{$tarea->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->nombre }} {{ $tarea->subContenido->datosContenido->datosCurso->seccionInfo->letra}} | {{ $tarea->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->DatosNivel->nombre}}
</a>
<i class="fa fa-angle-double-right text-80">
</i>
Tarea
<i class="fa fa-angle-double-right text-80">
</i>
Editar
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/summernote-lite.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

@php
   $t=$tarea_e->datosTarea; 
@endphp
<div class="col-12 alert bgc-info-l3 brc-info-m3 border-1 border-l-4 rounded-sm">
    <h3 class="font-light">
        {{ $t->nombre }}
    </h3>
    <p class="mt-4">
        {{ $t->indicaciones}}
    </p>
    <p class="mt-1">
        Disponible : {{ $t->fecha_ap->format('Y/m/d g:i:s A') }}
    </p>
    <p class="mt-4">
        Vence : {{ $t->fecha_ven->format('Y/m/d g:i:s A') }}
    </p>
    <div class="alert d-flex bgc-danger-l4 text-dark-tp3 radius-0 text-120 brc-danger-l3" role="alert">
        <div class="position-tl h-102 ml-n1px border-l-4 brc-danger-tp3 m-n1px">
        </div>
        <!-- the big red line on left -->
        <i class="fas fa-clock mr-3 fa-2x text-warning-d2 opacity-1">
        </i>
        <span class="align-self-center">
            <div id="clock">
            </div>
        </span>
    </div>
</div>
<div class="card bgc-purple-tp2 mt-4">
    <div class="card-header">
        <h6 class="card-title text-white">
            Texto
        </h6>
        <div class="card-toolbar">
            <button class="btn btn-sm border-0 radius-0 text-100 btn-light" onclick="editTexto(this)" type="button">
                <i class="fa fa-arrow-left text-90">
                </i>
                Editar
            </button>
            <button class="btn btn-sm border-0 radius-0 text-100 btn-yellow ml-1" onclick="updateText(this,'{{ route('Docente.Texto.Update',['id'=>$tarea_e->id]) }}')" type="button">
                Guardar
                <i class="fa fa-chevron-down text-90">
                </i>
            </button>
        </div>
    </div>
    <div class="card-body bg-white p-1" id="te_texto">
        {!! $tarea_e->contenido !!}
    </div>
</div>
<div class="col-12 p-3">
    <hr class="border-dotted my-3">
        <p>
            <button class="btn btn-md btn-purple btn-block" data-target="#modal-registro-archivo" data-toggle="modal">
                Reemplazar Archivo
            </button>
        </p>
        <div class="col-12 order-last order-lg-first">
            <div class="card border-0">
                <div class="card-header bg-transparent border-0 pl-1">
                    <h5 class="card-title mb-2 mb-md-0 text-120">
                        <i class="fa fa-star mr-1 text-warning text-90">
                        </i>
                        <span class="text-105">
                            Archivo Adjunto
                        </span>
                    </h5>
                    <div class="card-toolbar align-self-center">
                        <a class="card-toolbar-btn text-grey text-110" data-action="toggle" href="#">
                            <i class="fa fa-chevron-up">
                            </i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0 border-t-2 brc-default-l2 collapse show" style="">
                    <table class="table brc-secondary-l4">
                        <thead class="border-0 ">
                            <tr class="border-0 bg-transparent text-default-tp4 te1xt-95 text-blue">
                                <th class="border-0 font-normal">
                                    Nombre
                                </th>
                                <th class="border-0 font-normal">
                                    Eliminar
                                </th>
                            </tr>
                        </thead>
                        <tbody class="archivos">
                            <tr class="bgc-h-primary-l5">
                                <td>
                                    <a href="{{ route('Alumno.TareaEntrega.Download',['id'=>$tarea_e->id]) }}">
                                        <span class="text-success-m1 font-bolder">
                                            {{ $tarea_e->archivo_name }}
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    @if($tarea_e->archivo_name !=null )
                                    <a class="card-toolbar-btn text-grey text-110" data-action="toggle" href="#" onclick="deleteArchivo('{{ route('Alumno.TareaEntrega.Destroy',['id'=>$tarea_e->id]) }}',this)">
                                        <i class="fa fa-trash-alt text-danger">
                                        </i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </hr>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade " id="modal-registro-archivo" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form',['cardId'=>'Widget-create-archivo','formId'=>'form-create-archivo'])
          @slot('titleCard')
           Agregar Archivo
          @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
            @slot('formInputs')
            <input hidden="hidden" id="tarea" name="tarea" type="text" value="{{ $tarea->id }}">
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input name="_method" type="hidden" value="PUT">
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label class="mb-0" for="id-form-field-1">
                                    Archivo :
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control" id="file-tarea" name="archivo" type="file"/>
                            </div>
                        </div>
                        @endslot

          @slot('cardButtons')
                        <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create-text');" type="button">
                            <i class="fa fa-times mr-2">
                            </i>
                            Cancelar
                        </button>
                        <button class="btn btn-bold btn-success" id="text-save">
                            Aceptar
                            <i class="fa fa-arrow-right ml-2">
                            </i>
                        </button>
                        @endslot
          @endcomponent
                    </input>
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
<script src="{{ asset('assets/js/summernote-lite.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/moment.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/jquery.countdown.min.js')}}" type="text/javascript">
</script>
<script type="text/javascript">
    var el;



    jQuery(function($) {

$('#clock').countdown(" {{ $t->fecha_ven->format('Y/m/d g:i:s A') }}", {elapse: true})
.on('update.countdown', function(event) {
   var $this = $(this).html(event.strftime(''
    + '<span>%w</span> weeks '
    + '<span>%d</span> days '
    + '<span>%H</span> hr '
    + '<span>%M</span> min '
    + '<span>%S</span> sec'));
if (event.elapsed) {
    $this.html(event.strftime('Tiempo Vencido '));
  }
   //var $this = $(this);
  /*if (event.elapsed) {
    $this.html(event.strftime('Tiempo Vencido hace: <span>%H:%M:%S</span>'));
  } else {
    $this.html(event.strftime('To end: <span>%H:%M:%S</span>'));
  }*/
});

        $.extend($.summernote.options.icons, {
            'align': 'fa fa-align',
            'alignCenter': 'fa fa-align-center',
            'alignJustify': 'fa fa-align-justify',
            'alignLeft': 'fa fa-align-left',
            'alignRight': 'fa fa-align-right',
            'indent': 'fa fa-indent',
            'outdent': 'fa fa-outdent',
            'arrowsAlt': 'fa fa-arrows-alt',
            'bold': 'fa fa-bold',
            'caret': 'fa fa-caret-down text-grey-m3 ml-1',
            'circle': 'fa fa-circle',
            'close': 'fa fa fa-close',
            'code': 'fa fa-code',
            'eraser': 'fa fa-eraser',
            'font': 'fa fa-font',
            'italic': 'fa fa-italic',
            'link': 'fa fa-link text-success-m1',
            'unlink': 'fas fa-unlink',
            'magic': 'fa fa-magic text-brown-m3',
            'menuCheck': 'fa fa-check',
            'minus': 'fa fa-minus',
            'orderedlist': 'fa fa-list-ol text-blue',
            'pencil': 'fa fa-pencil',
            'picture': 'far fa-image text-purple',
            'question': 'fa fa-question',
            'redo': 'fa fa-repeat',
            'square': 'fa fa-square',
            'strikethrough': 'fa fa-strikethrough',
            'subscript': 'fa fa-subscript',
            'superscript': 'fa fa-superscript',
            'table': 'fa fa-table text-danger-m2',
            'textHeight': 'fa fa-text-height',
            'trash': 'fa fa-trash',
            'underline': 'fa fa-underline',
            'undo': 'fa fa-undo',
            'unorderedlist': 'fa fa-list-ul text-blue',
            'video': 'far fa-file-video text-pink-m2'
           
          });

      $('#file-tarea').aceFileInput({
            style: 'drop',
            droppable: true,

            container: 'border-1 border-dashed brc-grey-m4 brc-h-warning-m1',

            placeholderClass: 'text-125 text-600 text-grey-l2 my-2',
            placeholderText: 'Arrastre o cargue Archivo',
            placeholderIcon: '<i class="fas fa-file fa-3x text-purple-l1 my-2"></i>',

            thumbnail: 'large'

            //allowExt: 'gif|jpg|jpeg|png|webp|svg'
          });

           $('#fecha_ap').datetimepicker({
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

            // sideBySide: true,

            toolbarPlacement: "top",

            allowInputToggle: true,
            // showClose: true,
            // showClear: true,
            showTodayButton: true,
 format: 'Y/MM/DD hh:mm:ss A',
        
          })
    $('#fecha_ven').datetimepicker({
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

            // sideBySide: true,

            toolbarPlacement: "top",

            allowInputToggle: true,
            // showClose: true,
            // showClear: true,
            showTodayButton: true,
           format: 'Y/MM/DD hh:mm:ss A ',
           // "format": "yyyy-mm-dd hh:ii"
          })

     @component('components.js.validate-form')
       @slot('formId')
       '#form-update'
       @endslot

      @slot('rules')
       nombre:{required:true },
       indicaciones:{required:true},
       fecha_ven:{required:true},
       fecha_ap:{required:true}
      @endslot
  

       @slot('submitHandler')
        var formData = new FormData($('#form-update')[0]);

@component('components.js.ajax')
@slot('url')
' {{ route('Docente.Tarea.Update',['id'=>$tarea->id]) }} '
@endslot

@slot('data')
formData
@endslot


@slot('beforeSend')
 $('#Widget-update').aceWidget('reload');
@endslot
@slot('success')
$('#Widget-update').trigger('reloaded.ace.widget');


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
       '#form-create-archivo'
       @endslot

      @slot('rules')
       archivo:{required:true}
      @endslot
  

       @slot('submitHandler')
        var formData = new FormData($('#form-create-archivo')[0]);

@component('components.js.ajax')
@slot('url')
' {{ route('Alumno.TareaEntrega.Update',['id'=>$tarea_e->id]) }} '
@endslot

@slot('data')
formData
@endslot


@slot('beforeSend')
 $('#Widget-create-archivo').aceWidget('reload');
@endslot
@slot('success')
$('#Widget-create-archivo').trigger('reloaded.ace.widget');
$('.archivos').html(message.te);
$("#modal-registro-archivo").modal('hide');
Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
@endslot
@slot('error')
console.log(message);
Swal.fire({
  icon: 'warning',
  title: message.responseJSON.message,
  showConfirmButton: false,
  timer: 2500
})
@endslot

@endcomponent


       @endslot

    @endcomponent

        });

     function deleteArchivo(ruta,elem) {
         el=elem;
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
                
                 $(el).parent().parent().remove();
                    Swal.fire('Eliminado', msg.message, 'success')
                   
               }
               ,
            error: function(msg) {
                Swal.fire({
  icon: 'warning',
  title: msg.responseJSON.message,
  showConfirmButton: false,
  timer: 2500
})
            }
            });
            
        }
    })
}

function editTexto() {

  $('#te_texto').summernote({focus: true});
}



function updateText(el,ruta) {
  token = $("#token").val();
 $('#te_texto').summernote('code');

  $('#te_texto').summernote('destroy');
text=$('#te_texto').html();
     $.ajax({
               url: '{{ route('Alumno.TareaEntrega.Update',['id'=>$tarea_e->id]) }}',
               method: 'POST',
               dataType: 'json',
               data: {_method:"PUT",_token:token,contenido:text}, success: function (response) {
                    //console.log(response);
               },

    error : function(message) {
   
console.log(message);
Swal.fire({
  icon: 'warning',
  title: message.responseJSON.message,
  showConfirmButton: false,
  timer: 2500
})

    }
            });


}
</script>
@endsection
