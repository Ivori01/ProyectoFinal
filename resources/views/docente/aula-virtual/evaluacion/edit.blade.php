@extends('layouts.ace',['title'=>'Docente | Aula Virtual'])

@section('logo')
    @component('components.logo', ['app_name' => 'School', 'href_logo' => route('Docente.AulaVirtual.Index')])
    @endcomponent
@endsection

@section('navbar-menu')
    @component('components.docente.a-virtual.navbar-menu')
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
            <a href="{{ route('Docente.AulaVirtual.Index') }}">
                Aula virtual
            </a>
        @endslot
        @slot('subpage_name')


            {{ $examen->subContenido->datosContenido->datosCurso->cursoinfo->datosCurso->nombre }} |
            {{ $examen->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->nombre}}
            {{ $examen->subContenido->datosContenido->datosCurso->seccionInfo->letra }} |
            {{ $examen->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->DatosNivel->nombre }}
            <i class="fa fa-angle-double-right text-80">
            </i>
            <a
                href="{{ route('Docente.AulaVirtual.Curso.Contenido', ['id' => $examen->subContenido->datosContenido->datosCurso->id]) }}">
                Contenido
            </a>
            <i class="fa fa-angle-double-right text-80">
            </i>
            examen
            <i class="fa fa-angle-double-right text-80">
            </i>
            Editar
        @endslot
    @endcomponent
@endsection

@section('head')
   
    <link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/summernote-lite.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

     <div>
        @component('components.card-form', ['cardId' => 'Widget-update', 'formId' => 'form-update'])
            @slot('titleCard')
                Editar
            @endslot
            @slot('toolbarCard')
              <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="{{ route('Docente.Evaluacion.StartPreview',['evaluacion'=>$examen->id]) }}">
                    <i class="fa fa-eye">
                    </i>
                </a>
              <a class="card-toolbar-btn  d-style collapsed text-white" data-action="toggle" draggable="false" href="#">
                <i class="fa fa-minus d-n-collapsed">
                </i>
                <i class="fa fa-plus d-collapsed">
                </i>
            </a>
                

            @endslot
            @slot('formInputs')
                <input  name="_token" type="hidden" value="{{ csrf_token() }}">
                @method('PUT')
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Nombre :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control col-9" name="nombre" type="text" value="{{ $examen->nombre }}">
                        </input>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Indicaciones :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="contenido-texto" name="indicaciones">{{ $examen->indicaciones }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Disponible desde :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <div class="input-group datetimepicker" id="id-timepicker">
                            <input class="form-control" id="fecha_ap" name="fecha_inicio" type="text"
                                value="{{ $examen->fecha_inicio->format('Y/m/d g:i:s A') }}" />
                            <div class="input-group-addon input-group-append">
                                <div class="input-group-text">
                                    <i class="far fa-clock">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Disponible hasta :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <div class="input-group date" id="id-timepicker">
                            <input class="form-control" id="fecha_ven" name="fecha_fin" type="text"
                                value="{{ $examen->fecha_fin->format('Y/m/d g:i:s A') }}" />
                            <div class="input-group-addon input-group-append">
                                <div class="input-group-text">
                                    <i class="far fa-clock">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Duración :
                        </label>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input class="form-control form-control" id="form-field-mask-3" inputmode="text" name="duracion"
                                type="number" value="{{ $examen->duracion }}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-clock">
                                        Minutos
                                    </i>
                                </span>
                            </div>
                            </input>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Intentos :
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" name="intentos" type="number" value="{{ $examen->intentos }}">
                        </input>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Puntuación máxima :
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" name="calificacion_max" type="number" value="{{ $examen->calificacion_max }}">
                        </input>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Modo calificación :
                        </label>
                    </div>
                    <div class="col-sm-9 tag-input-style">
                        <select class="select2 form-control" data-placeholder="Seleccione" name="modo_calificacion">
                            <option value="">
                            </option>
                            <option @if ($examen->modo_calificacion == 1)
                                selected=""
                                @endif
                                value="1">
                                Ultimo intento
                            </option>
                            <option @if ($examen->modo_calificacion == 2)
                                selected=""
                                @endif value="2">

                                Promedio
                            </option>
                            <option @if ($examen->modo_calificacion == 3)
                                selected=""
                                @endif value="3">

                                Mejor puntaje
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Orden de preguntas Aleatorio :
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <label>
                            <input @if ($examen->aleatorio == 1)
                            checked=""
                            @endif
                            class="input-lg bgc-green" name="aleatorio" type="checkbox" value="1">


                            </input>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Mostrar revision :
                        </label>
                    </div>
                    <div class="col-sm-9 mt-2">
                        <div class="mb-0">
                            <label>
                                <input @if ($examen->correccion == 1)
                                checked=""
                                @endif
                                class="input-lg bgc-green" name="correccion" type="checkbox" value="1">
                               
                                </input>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label class="mb-0" for="id-form-field-1">
                            Numero de preguntas por pagina:
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" name="n_preguntas" type="number" value="{{ $examen->n_preguntas }}">
                        </input>
                    </div>
                </div>
            @endslot

            @slot('cardButtons')
                <button class="btn btn-bold btn-sm btn-danger"  type="button">
                    <i class="fa fa-times mr-2">
                    </i>
                    Cancelar
                </button>
                <button class="btn btn-bold btn-success" >
                    Aceptar
                    <i class="fa fa-arrow-right ml-2">
                    </i>
                </button>
            @endslot
        @endcomponent
      
    </div>

    <div class="col-12 p-3">
        <hr class="border-dotted my-3">
   

        <div class="row btn-group-lg">
            
              <button type="button" class="col-sm btn btn-outline-warning text-break m-1" data-target="#modal-registro-pregunta1" data-toggle="modal" onclick="routeCreateQuestion=routeFixed;container='main';">
                  
                    Pregunta opción múltiple  <i class="fa fa-plus ml-2 f-n-hover "></i>
                </button>
           <button type="button" class="col-sm btn btn-outline-primary text-break m-1" data-target="#modal-registro-pregunta2" data-toggle="modal" onclick="routeCreateQuestion=routeFixed;container='main';">
                     Pregunta Verdadero / Falso <i class="fa fa-plus ml-2 f-n-hover"></i>
                </button>
                 <button type="button" class="col-sm btn btn-outline-success text-break m-1" data-target="#modal-registro-pregunta3" data-toggle="modal" onclick="routeCreateQuestion=routeFixed;container='main';">
                    Pregunta abierta <i class="fa fa-plus ml-2 f-n-hover"></i>
                </button>
                   <button type="button" class="col-sm btn btn-outline-purple text-break m-1" data-target="#modal-registro-pregunta4" data-toggle="modal" onclick="routeCreateQuestion=routeFixed;container='main';">
                   Pregunta aleatoria<i class="fa fa-plus ml-2 f-n-hover"></i>
                </button>
        </div>
        
        <div class="col-12 order-last order-lg-first">
            <div class="card border-0">
                <div class="card-header bg-transparent border-0 pl-1">
                    <h5 class="card-title mb-2 mb-md-0 text-120">
                        <i class="fa fa-star mr-1 text-warning text-90">
                        </i>
                        <span class="text-105">
                           Lista de preguntas
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
                       
                        <tbody id="preguntas">
                            @foreach ($examen->preguntas as $pregunta)  
                            @if (class_basename($pregunta->preguntable)=='PreguntaFija')
                              <div>
                                @component('components.docente.a-virtual.sub-contenido.quiz.pregunta',['pregunta'=>$pregunta->preguntable,'numero'=>$loop->index+1])
                                @endcomponent  
                            </div>
                            @endif
                             @if (class_basename($pregunta->preguntable)=='PreguntaAleatoria')
                              <div>
                                @component('components.docente.a-virtual.sub-contenido.quiz.pregunta-aleatoria',['pregunta'=>$pregunta->preguntable,'numero'=>$loop->index+1])
                                @endcomponent  
                            </div>
                            @endif
                             
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          
    </div>


@component('components.docente.a-virtual.sub-contenido.quiz.question.multiple.form-create',['examen'=>$examen])
@endcomponent

@component('components.docente.a-virtual.sub-contenido.quiz.question.true-false.form-create',['examen'=>$examen])
@endcomponent

@component('components.docente.a-virtual.sub-contenido.quiz.question.open.form-create',['examen'=>$examen])
@endcomponent
@component('components.docente.a-virtual.sub-contenido.quiz.question.random.form-create',['examen'=>$examen])
@endcomponent

@component('components.docente.a-virtual.sub-contenido.quiz.question.multiple.form-edit')
@endcomponent

@component('components.docente.a-virtual.sub-contenido.quiz.question.random.form-edit')
@endcomponent

@component('components.docente.a-virtual.sub-contenido.quiz.question.multiple.form-options-edit')
@endcomponent

@component('components.docente.a-virtual.sub-contenido.quiz.question.true-false.form-options-edit')
@endcomponent
   
  


@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection


@section('script')
<script src="{{ asset('assets/js/summernote-lite.min.js')}}" type="text/javascript">
</script>
    <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript">
    </script>
    
    <script type="text/javascript">
         $("#addMore").click(function (e) { 
        
            e.preventDefault();
            var cantidad=$(".clone").length+1; 
            var cloned = $("#copy:first").clone(true) ;
            cloned.appendTo('#addparts'); 
            cloned.find('#name-label').html('Opción ' + cantidad);
            cloned.find('#checkbox-respuesta').attr('name', 'respuesta'+cantidad);

        });

       var el;
       var routeUpdatePregunta;
       var elCardUpdate;
       var routeGetOptions;
       var routeCreateQuestion ;
       var routeFixed='{{ route('Docente.Pregunta.Store') }}';

       var container='main';
        jQuery(function($) {

$('#descripcion').summernote({
  
});
$('#descripcion2').summernote({
  
});
$('#descripcion3').summernote({
  
});
$('.descripcion').summernote({
  
});



            $('#file-examen').aceFileInput({
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
                    nombre: {
                            required: true
                        },

                        indicaciones: {
                            required: true
                        },
                        fecha_inicio: {
                            required: true
                        },
                        fecha_fin: {
                            required: true
                        }
                @endslot


                @slot('submitHandler')
                    var formData = new FormData($('#form-update')[0]);

                    @component('components.js.ajax')
                        @slot('url')
                        '{{ route('Docente.Evaluacion.Update', ['id ' => $examen->id,] )}}'
                        @endslot

                        @slot('data')
                            formData
                        @endslot


                        @slot('beforeSend')
                            $('#Widget-update').aceWidget('reload');
                        @endslot
                        @slot('success')
                            $('#Widget-update').aceWidget('stopLoading');

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
                    '#form-create-Pmultiple'
                @endslot

                @slot('rules')
                    nombre: {
                            required: true
                        },
                       puntos: {
                            required: true
                        },
                          "opcion[]":{required:true}
                @endslot


                @slot('submitHandler')
                    var formData = new FormData($('#form-create-Pmultiple')[0]);

                    @component('components.js.ajax')
                        @slot('url')
                                routeCreateQuestion
                        @endslot

                        @slot('data')
                            formData
                        @endslot


                        @slot('beforeSend')
                            $('#modal-registro-pMultiple').aceWidget('reload');
                        @endslot
                        @slot('success')
                            $('#modal-registro-pMultiple').aceWidget('stopLoading');
                              if (container=='main') {
                                 $('#preguntas').append(message.pregunta);
                            }
                             else {
                              $(container) .parent().parent().children('.random-options').append(message.pregunta);
                             }
                           
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
                    '#form-create-Ptruefalse'
                @endslot

                @slot('rules')
                    nombre: {
                            required: true
                        },
                       puntos: {
                            required: true
                        },
                          "option":{required:true}
                @endslot


                @slot('submitHandler')
                    var formData = new FormData($('#form-create-Ptruefalse')[0]);

                    @component('components.js.ajax')
                        @slot('url')
                               routeCreateQuestion
                        @endslot

                        @slot('data')
                            formData
                        @endslot


                        @slot('beforeSend')
                            $('#modal-registro-pMultiple').aceWidget('reload');
                        @endslot
                        @slot('success')
                            $('#modal-registro-pMultiple').aceWidget('stopLoading');
                              if (container=='main') {
                                 $('#preguntas').append(message.pregunta);
                            }
                             else {
                              $(container) .parent().parent().children('.random-options').append(message.pregunta);
                             }
                           
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
                    '#form-create-Popen'
                @endslot

                @slot('rules')
                    nombre: {
                            required: true
                        },
                       puntos: {
                            required: true
                        },
                          "option":{required:true}
                @endslot


                @slot('submitHandler')
                    var formData = new FormData($('#form-create-Popen')[0]);

                    @component('components.js.ajax')
                        @slot('url')
                              routeCreateQuestion
                        @endslot

                        @slot('data')
                            formData
                        @endslot


                        @slot('beforeSend')
                            $('#modal-registro-pMultiple').aceWidget('reload');
                        @endslot
                        @slot('success')
                            $('#modal-registro-pMultiple').aceWidget('stopLoading');
                            if (container=='main') {
                                 $('#preguntas').append(message.pregunta);
                            }
                             else {
                              $(container) .parent().parent().children('.random-options').append(message.pregunta);
                             }
                           $('.descripcion').summernote({});
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
                    '#form-create-Prandom'
                @endslot

                @slot('rules')
                    nombre: {
                            required: true
                        },
                       puntos: {
                            required: true
                        },
                          "option":{required:true}
                @endslot


                @slot('submitHandler')
                    var formData = new FormData($('#form-create-Prandom')[0]);

                    @component('components.js.ajax')
                        @slot('url')
                                routeCreateQuestion
                        @endslot

                        @slot('data')
                            formData
                        @endslot


                        @slot('beforeSend')
                            $('#widget-create-random').aceWidget('reload');
                        @endslot
                        @slot('success')
                            $('#widget-create-random').aceWidget('stopLoading');

                                          $('#preguntas').append(message.pregunta);           
                         
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
                    '#form-update-Pmultiple'
                @endslot

                @slot('rules')
                    nombre: {
                            required: true
                        },
                       puntos: {
                            required: true
                        },
                      
                @endslot


                @slot('submitHandler')
                    var formData = new FormData($('#form-update-Pmultiple')[0]);

                    @component('components.js.ajax')
                        @slot('url')
                                routeUpdatePregunta
                        @endslot

                        @slot('data')
                            formData
                        @endslot


                        @slot('beforeSend')
                            $('#modal-update-pMultiple').aceWidget('reload');
                        @endslot
                        @slot('success')
                    
                            $('#modal-update-pMultiple').aceWidget('stopLoading');
                            elCardUpdate.html(message.pregunta);
$('.descripcion').summernote({
  
});
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
                    '#form-update-pMultipleOpt'
                @endslot

                @slot('rules')
                    nombre: {
                            required: true
                        },
                       puntos: {
                            required: true
                        },
                      
                @endslot


                @slot('submitHandler')
                    var formData = new FormData($('#form-update-pMultipleOpt')[0]);

                    @component('components.js.ajax')
                        @slot('url')
                               '{{ route('Docente.Pregunta.UpdateOptions') }}'
                        @endslot

                        @slot('data')
                            formData
                        @endslot


                        @slot('beforeSend')
                            $('#modal-update-pMultiple').aceWidget('reload');
                        @endslot
                        @slot('success')
              
                          $('#modal-update-pMultiple').aceWidget('stopLoading');
                             /* elCardUpdate.html(message.pregunta);*/
elCardUpdate.html(message.pregunta);
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
                    '#form-update-pTrueFalseOpt'
                @endslot

                @slot('rules')
                    nombre: {
                            required: true
                        },
                       puntos: {
                            required: true
                        },
                      
                @endslot


                @slot('submitHandler')
                    var formData = new FormData($('#form-update-pTrueFalseOpt')[0]);

                    @component('components.js.ajax')
                        @slot('url')
                               '{{ route('Docente.Pregunta.UpdateOptions') }}'
                        @endslot

                        @slot('data')
                            formData
                        @endslot


                        @slot('beforeSend')
                            $('#modal-update-pMultiple').aceWidget('reload');
                        @endslot
                        @slot('success')
              
                          $('#modal-update-pMultiple').aceWidget('stopLoading');
                             /* elCardUpdate.html(message.pregunta);*/
elCardUpdate.html(message.pregunta);
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
                    '#form-update-pRandom'
                @endslot

                @slot('rules')
                    nombre: {
                            required: true
                        },
                       puntos: {
                            required: true
                        },
                      
                @endslot


                @slot('submitHandler')
                    var formData = new FormData($('#form-update-pRandom')[0]);

                    @component('components.js.ajax')
                        @slot('url')
                               routeUpdatePregunta
                        @endslot

                        @slot('data')
                            formData
                        @endslot


                        @slot('beforeSend')
                            $('#modal-update-pMultiple').aceWidget('reload');
                        @endslot
                        @slot('success')
              
                          $('#modal-update-pMultiple').aceWidget('stopLoading');
                             /* elCardUpdate.html(message.pregunta);*/
elCardUpdate.html(message.pregunta);
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



function editPregunta(ruta, elem) {
    el = elem;

    $.ajax({
        url: ruta,
        method: 'get',
        dataType: 'json',
        success: function(msg) {
            $('#pmu-nombre').val(msg.pregunta.nombre);
           // $('#pmu-descripcion').html(msg.pregunta.descripcion);
            $('#pmu-correccion').html(msg.pregunta.retroalimentacion);
            $('#pmu-puntos').val(msg.pregunta.puntos);
            elCardUpdate = $(el).parent().parent().parent().parent();
            routeUpdatePregunta = msg.ruta;
             // $('#pmu-descripcion').summernote('destroy');
                    $('#pmu-descripcion').summernote('code',msg.pregunta.descripcion);
        },
        error: function(msg) {
            Swal.fire('Error!', msg.message, 'error')
        }
    });
}

function editPreguntaRand(ruta, elem) {
    el = elem;

    $.ajax({
        url: ruta,
        method: 'get',
        dataType: 'json',
        success: function(msg) {
            $('#pmu-nombreR').val(msg.pregunta.nombre);
            $('#pmu-puntaje').val(msg.pregunta.puntaje);
            elCardUpdate = $(el).parent().parent().parent().parent();
            routeUpdatePregunta = msg.ruta;
           
                    
        },
        error: function(msg) {
            Swal.fire('Error!', msg.message, 'error')
        }
    });
}
function editOptionsMultiple(ruta, elem) {
    el = elem;
    routeGetOptions = ruta;

    $.ajax({
        url: ruta,
        method: 'get',
        dataType: 'json',
        success: function(msg) {
            $('#pmu-opciones-edit').html(msg.options);
              $('#pmu-opciones-edit2').html(msg.options);
            //routeUpdatePregunta = msg.ruta;
            elCardUpdate = $(el).parent().parent().parent().parent();
        },
        error: function(msg) {
            Swal.fire('Error!', msg.message, 'error')
        }
    });
}

function saveOptionMultiple() {
    var formData = new FormData($('#form-update-pMultipleOpt')[0]);
    $.ajax({
        url: '{{ route('Docente.Pregunta.SaveOptions') }}',
        method: 'post',
        dataType: 'json',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(msg) {
            elCardUpdate.html(msg.pregunta);
            $.ajax({
                url: routeGetOptions,
                method: 'get',
                dataType: 'json',
                success: function(msg) {
                    $('#pmu-opciones-edit').html(msg.options);
                }
            });
        },
        error: function(msg) {
            Swal.fire('Error!', msg.message, 'error')
        }
    });
}


  function deleteOption(ruta, elem) {
            el = elem;
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
                       data:{_token:token},
                        success: function(msg) {
                            elCardUpdate.html(msg.pregunta);
  $.ajax({
                url: routeGetOptions,
                method: 'get',
                dataType: 'json',
                success: function(msg) {
                    $('#pmu-opciones-edit').html(msg.options);
                }
            });
                           // $(el).parent().parent().remove();
                            Swal.fire('Eliminado', msg.message, 'success')

                        },
                        error: function(msg) {
                            Swal.fire('Error!', msg.message, 'error')
                        }
                    });

                }
            })
        }

        function deletePregunta(ruta, elem) {
            el = elem;
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
                       data:{_token:token,_method:'delete'},
                        success: function(msg) {
                           
                           $(el).parent().parent().parent().remove();
                            Swal.fire('Eliminado', msg.message, 'success')

                        },
                        error: function(msg) {
                            Swal.fire('Error!', msg.message, 'error')
                        }
                    });

                }
            })
        }
    </script>
@endsection
