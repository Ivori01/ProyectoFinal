@extends('layouts.ace',['title'=>'Alumnno | Aula Virtual'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('Alumno.AulaVirtual.Index')])
@endcomponent
@endsection

  

@section('navbar-menu')
@component('components.alumno.a-virtual.navbar-menu')
@slot('li')
<li class="nav-item">
    <a class="nav-link dropdown-toggle" href="{{ route('Alumno.TareaEntrega.Revisiones',['id'=>$curso->id]) }}">
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
                   foreach($contenidos as $contenido){
                   foreach($contenido->subContenidos as $subContenido){
                    foreach($subContenido->tareas as $tarea){
                    if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->count() <1 ){
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
        @foreach($contenidos as $contenido)
                   @foreach($contenido->subContenidos as $subContenido)
                    @foreach($subContenido->tareas as $tarea)
                    @if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->count() <1 )
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

@section('page-name')
@component('components.page-name')
@slot('page_name')
<a href="{{ route('Alumno.AulaVirtual.Index')}}">
    Aula virtual
</a>
@endslot
@slot('subpage_name')

{{ $curso->cursoinfo->datosCurso->nombre }} | {{$curso->seccionInfo->datosGrado->nombre }} {{ $curso->seccionInfo->letra }} | {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }}
<i class="fa fa-angle-double-right text-80">
</i>
Contenido
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/photoswipe.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/summernote-lite.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<style>
    /** no left/right border for page tabs in small devices **/
      @media (max-width: 767.98px) {
        .page-nav-tabs {
          border-left: none !important;
          border-right: none !important;
        }

        .page-nav-tabs>li:first-child>.nav-link {
          border-top-left-radius: 0 !important;
          border-bottom-left-radius: 0 !important;
          border-left: none !important;
        }

        .page-nav-tabs>li:last-child>.nav-link {
          border-top-right-radius: 0 !important;
          border-bottom-right-radius: 0 !important;
          border-right: none !important;
        }
      }

      /** the chat dialog slider **/
      @keyframes chatAppear {
        70% {
          transform: translateY(-20%);
        }

        80% {
          transform: translateY(-20%);
        }

        100% {
          opacity: 1;
          transform: none;
        }
      }

      .animation-appear {
        opacity: 0;
        transform: translateY(75%);

        animation: 750ms chatAppear;
        animation-delay: 1.5s;
        animation-fill-mode: forwards;

        transform-origin: bottom center;
      }

      @media screen and (prefers-reduced-motion: reduce) {
        .animation-appear {
          animation-duration: 1ms;
        }
      }
</style>
@endsection

@section('content')
<div><div class="col-12">
  <div class="page-intro row pos-rel pt-lg-1 pt-xl-4  " style="background-image: url('https://i.pinimg.com/originals/94/c3/e3/94c3e37716d2e8f359e4ba1f3467e03c.jpg')">
    <div class="col-11 col-lg-8 col-xl-7 mx-auto text-center py-4 py-lg-5 d-flex flex-column justify-content-end">
        <div class="bgc-black-tp6 radius-1 pt-2 pt-lg-4 pb-3 pb-lg-5 px-2">
            <h1 class="text-white mb-3">
                {{ $curso->cursoinfo->datosCurso->nombre }}
            </h1>
         
            <div class="text-blue-l3 text-140">
                Just select your desired vacation features
            </div>
            
        </div>
    </div>
</div></div>

</div>
<div class="row">
    <div class="col">
        <div class="sticky-nav ">
            <ul class="nav nav-tabs page-nav-tabs nav-tabs-boxed nav-justified nav-tabs-scroll is-scrollable mx-n3 mx-lg-0" role="tablist">
                @foreach($contenidos as $contenido)
                <li class="nav-item h-100 radius-2px bgc-secondary-l4 py-2 px-25 border-t-2 brc-blue-m1">
                    <a aria-controls="tab-body{{ $contenido->id }}" aria-selected=" @if($loop->first)true
                      @else false @endif" class="nav-link @if($loop->first) active @endif pl-3" data-toggle="tab" href="#tab-body{{ $contenido->id }}" id="{{ $contenido->id }}-tab" role="tab">
                        <i class="text-success-m2 fa fa-home mr-2 text-110">
                        </i>
                        {{ $contenido->nombre }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-content border-0 px-0 pt-0">
            @foreach($contenidos as $contenido)
            <div aria-labelledby="{{ $contenido->id }}-tab" class="tab-pane fade @if($loop->first)show active @endif" id="tab-body{{ $contenido->id}}" role="tabpanel">
                <div class="row mb-1">
                    @foreach($contenido->subContenidos as $subContenido)
                    <div class="col-12 ">
                        <div class="alert d-flex bgc-green-d2 text-white border-0 radius-0" role="alert">
                            <i class="fas fa-bookmark mr-3 fa-2x text-white-l3">
                            </i>
                            <span class="align-self-center text-130">
                                {{ $subContenido->nombre }}
                            </span>
                        </div>
                        <div class="col-12 c-textos">
                            @foreach($subContenido->textos as $texto )
                            <div class="card bgc-green-m1 mt-1 border-right-0 border-left-0 border-bottom-0">
                                <div class="card-header">
                                    <h6 class="card-title text-white text-uppercase font-weight-bold">
                                        {{ $texto->nombre }}
                                    </h6>
                                    <div class="card-toolbar">
                                    </div>
                                </div>
                                <div class="card-body bg-white p-1">
                                    {!! $texto->cuerpo !!}
                                </div>
                            </div>
                            @endforeach
                        </div>
                                   <div class=" row examen">

                            @foreach ($subContenido->examenes as $examen)
                              @component('components.alumno.a-virtual.sub-contenido.quiz.alert',['examen'=>$examen])
                              @endcomponent
                            @endforeach

                        </div>
                        <div class="col-12 c-tareas pt-3 ">
                            @foreach($subContenido->tareas as $tarea)
                            <div class="alert fade show  rounded text-break border-t-4 brc-info-tp1 tarea border-right-0 border-left-0 border-info bgc-secondary-l4 border-bottom-0" role="alert">
                                <div class="position-tl h-102 m-n1px rounded-left t-submited">
                                    <div class="bgc-success p-14 text-center m-n1px radius-l-1">
                                    </div>
                                </div>
                                {{--
                                <div>
                                    <a class="btn btn-xs radius-round position-tr btn-info text-white px-1 pt-0 pb-1 text-150 m-1" href="#" role="button">
                                        <i aria-hidden="true" class="fa fa-eye text-sm w-2 mx-1px">
                                        </i>
                                    </a>
                                </div>
                                --}}
                          @if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->count() >0 )
                                <div>
                                    <a class="btn btn-xs radius-round position-tr btn-success text-white px-1 pt-0 pb-1 text-150 m-1" href="#" role="button">
                                        <i aria-hidden="true" class="fa fa-check text-sm w-2 mx-1px">
                                        </i>
                                    </a>
                                </div>
                                @endif
                                <!-- the big red line on left -->
                                <h5 class="alert-heading text-info-m1 font-bolder text-wrap">
                                    <i class="far fa-calendar-check text-purple text-140 w-3 mr-2px">
                                    </i>

                                    TAREA :
                                    <a href="
                                    @if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->count() > 0 )
                                    {{ route('Alumno.TareaEntrega.Edit',['id'=>$tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->first()->id]) }}
                                    @else
                                    #
                                    @endif
                                    ">
                                        {{ $tarea->nombre }}
                                    </a>
                                </h5>
                                <div class="col-12 border-top border-info">
                                    <p class="text-blue font-weight-bold mb-0">
                                        Indicaciones :
                                    </p>
                                    {{ $tarea->indicaciones }}
                                </div>
                                <div class="col-12 border-top border-bottom border-info mt-3">
                                    <p class="text-blue font-weight-bold mb-0">
                                        Archivos :
                                    </p>
                                    @foreach($tarea->archivos as $archivo)
                                    <p class=" text-warning">
                                        <a href="{{ route('Alumno.ArchivoTarea.Download',['id'=>$archivo->id]) }}">
                                            <span class="text-warning-m1 font-bolder">
                                                {{ $archivo->nombre }}
                                            </span>
                                        </a>
                                    </p>
                                    @endforeach
                                </div>
                                <p class="mt-3 mb-0">
                                    <button class="btn btn-link text-success font-bolder py-0 px-2">
                                        <i class="fas fa-lock-open">
                                        </i>
                                        Disponible : {{ $tarea->fecha_ap->diffForHumans() }}
                                    </button>
                                </p>
                                <p class="my-1">
                                    <button class="btn btn-link text-danger-d1 font-bolder py-0 px-2">
                                        <i class="fas fa-lock text-red">
                                        </i>
                                        Vence : {{ $tarea->fecha_ven->diffForHumans() }}
                                    </button>
                                </p>
                                @if($tarea->entregas->where('tarea',$tarea->id)->where('alumno',auth()->user()->persona->id)->count() <= 0 )
                                <button class="btn btn-warning border-b-2 col-12" data-target="#modal-registro-entrega" data-toggle="modal" href="#" onclick="saveEntrega('{{ $tarea->id }}',this)">
                                    <i class="fa fa-check text-110 text-white mr-1">
                                    </i>
                                    Agregar Entrega
                                </button>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <div class=" row px-2 multimedia ">
                            @foreach($subContenido->archivos as $archivo)
                            <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0 pt-2">
                                <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100 border-t-4 border-b-1 w-100 brc-success-tp2 radius-t-1 ">
                                    <div class="mb-1">
                                        <span class="d-inline-block bgc-success-l2 p-3 radius-round">
                                            <a href=" {{ route('Alumno.Multimedia.Download',['id'=>$archivo->id]) }} ">
                                                <i class="fa fa-download text-success-m1 text-180 w-4">
                                                </i>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="mt-2px">
                                        <div class="text-dark-tp4 text-180">
                                            {{ $archivo->ext }}
                                        </div>
                                        <div class="text-dark-tp5 text-110">
                                            {{ $archivo->nombre }}
                                        </div>
                                    </div>
                                    <div class="text-blue-m2 font-bolder position-tr m-2">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <br>
                        </br>
                    </div>
                    @endforeach
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade " id="modal-registro-entrega" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form',['cardId'=>'Widget-create-entrega','formId'=>'form-create-entrega'])
           @slot('titleCard')
            Entregar tarea
           @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
           @slot('formInputs')
            <input hidden="hidden" id="s-tarea" name="tarea" type="text" value="">
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Texto :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="sendt" id="contenido-texto" name="contenido">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Archivo :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control sendt" id="file-multimedia" name="archivo" type="file"/>
                        </div>
                    </div>
                    @endslot

          @slot('cardButtons')
                    <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create-entrega');" type="button">
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
<script src="{{ asset('assets/js/interact.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/moment.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/additional-methods.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript">
</script>
<script type="text/javascript">
    var elSavesubC;
    var elSubC;
    var elTarea;
    var elDMultimedia;
    var elSaveMult;
    jQuery(function($) {
 $(document).ready(function() {

        if($('#nrotareas').val()>0){
           $('#li-nrotareas').click();
           
        }
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

          $('#contenido-texto').summernote({
            height: 100,
            minHeight: 100,
            maxHeight: 600
          });



$('#file-multimedia').aceFileInput({
            style: 'drop',
            droppable: true,

            container: 'border-1 border-dashed brc-grey-m4 brc-h-warning-m1',

            placeholderClass: 'text-125 text-600 text-grey-l2 my-2',
            placeholderText: 'Arrastre o cargue Archivo',
            placeholderIcon: '<i class="fas fa-file fa-3x text-purple-l1 my-2"></i>',

            thumbnail: 'large'

            //allowExt: 'gif|jpg|jpeg|png|webp|svg'
          });


        var bodyContainer = document.querySelector('.body-container');
        bodyContainer.style.overflow = 'visible' // for sticky nav to work

        document.querySelector('.page-content').classList.add('px-md-4') // for the following 'mx-md-n4'

        //when nav-tabs becomes stuck
        var stickyNav = document.querySelector('.sticky-nav');
        stickyNav.addEventListener('sticky-change', function(e) {
          this.classList.toggle('is-stuck', e.detail.isSticky)

          var insideContainer = bodyContainer.classList.contains('container') || document.querySelector('.page-content').classList.contains('container');
          var pageNav = stickyNav.querySelector('.page-nav-tabs');

          if (!e.detail.isSticky) {
            pageNav.classList.add('nav-tabs-boxed', 'mx-lg-0');
            pageNav.classList.remove('nav-tabs-simple', 'shadow-md', 'bgc-white', 'mx-md-n4', 'border-x-1', 'px-1');
            pageNav.style.height = '';

            pageNav.classList.remove('border-b-1', 'brc-secondary-l1', 'pb-1px', 'shadow');
          } else {
            pageNav.classList.add('nav-tabs-simple', 'bgc-white', 'shadow-md', 'mx-md-n4');

            if (insideContainer) pageNav.classList.add('border-x-1');
            pageNav.classList.add('px-1')

            pageNav.classList.remove('nav-tabs-boxed', 'mx-lg-0');
            pageNav.style.height = '3.75rem'; //specify height

            pageNav.classList.add('border-b-1', 'brc-secondary-l1', 'pb-1px', 'shadow');
          }
        });

      });

    



function editTexto(el) {

  $(el).parent().parent().parent().children('.card-body').summernote({focus: true});
}

function updateText(el,ruta) {
  token = $("#token").val();
 $(el).parent().parent().parent().children('.card-body').summernote('code');

  $(el).parent().parent().parent().children('.card-body').summernote('destroy');
text=$(el).parent().parent().parent().children('.card-body').html();
     $.ajax({
               url: ruta,
               method: 'POST',
               dataType: 'json',
               data: {_method:"PUT",_token:token,cuerpo:text}, success: function (response) {
                    //console.log(response);
               }
            });


}


function saveEntrega(subcont,el) {
  elSavesubC=el;
  $('#s-tarea').val(subcont)
     @component('components.js.validate-form')
       @slot('formId')
       '#form-create-entrega'
       @endslot

      @slot('rules')
     archivo: {require_from_group: [1,".sendt"] }, 
    texto:{require_from_group: [1,".sendt"]}
      @endslot
  
       @slot('submitHandler')
       var formData = new FormData($('#form-create-entrega')[0]);

  @component('components.js.ajax')
@slot('url')
' {{ route('Alumno.TareaEntrega.Store') }} '
@endslot

@slot('data')
formData
@endslot

@slot('beforeSend')
 $('#Widget-create-entrega').aceWidget('reload');
@endslot

@slot('success')
$('#Widget-create-entrega').trigger('reloaded.ace.widget');
$("#modal-registro-entrega").modal('hide');
rstForm("#form-create-entrega");
 
   $(elSavesubC).parent().html(message.tarea);
//$('#content-container').append(message.content);


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
  icon: 'error',
  title: message.responseJSON.message,
  showConfirmButton: false,
  timer: 2500
})
@endslot

@endcomponent
       @endslot

    @endcomponent



}
</script>
@endsection
