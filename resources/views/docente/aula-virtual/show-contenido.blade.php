@extends('layouts.ace',['title'=>'Docente | Aula Virtual'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('Docente.AulaVirtual.Index')])
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
<a href="{{ route('Docente.AulaVirtual.Index')}}">
    Aula virtual
</a>
@endslot
@slot('subpage_name')
<a href="{{ route('Docente.AulaVirtual.Curso.Index',['id'=>$curso->id]) }}">
    {{ $curso->cursoinfo->datosCurso->nombre }} | {{$curso->seccionInfo->datosGrado->nombre }} {{ $curso->seccionInfo->letra }} | {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }}
</a>
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
<div>
    <div class="col-12">
        <div class="page-intro row pos-rel pt-lg-1 pt-xl-4 " style="background-image: url('https://i.pinimg.com/originals/94/c3/e3/94c3e37716d2e8f359e4ba1f3467e03c.jpg')">
            <div class="col-11 col-lg-8 col-xl-7 mx-auto text-center py-4 py-lg-5 d-flex flex-column justify-content-end">
                <div class="bgc-black-tp6 radius-1 pt-2 pt-lg-4 pb-3 pb-lg-5 px-2">
                    <h1 class="text-white mb-3">
                        {{ $curso->cursoinfo->datosCurso->nombre }}
                    </h1>
                    {{--
                    <div class="text-blue-l3 text-140">
                        Just select your desired vacation features
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="sticky-nav ">
            <ul class="nav nav-tabs page-nav-tabs nav-tabs-boxed nav-justified nav-tabs-scroll is-scrollable mx-n3 mx-lg-0" role="tablist">
                @foreach($contenidos->sortBy('orden') as $contenido)
                <li class="nav-item">
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
        <div class="tab-content border-0 px-0 pt-5">
            @foreach($contenidos->sortBy('orden') as $contenido)
            <div aria-labelledby="{{ $contenido->id }}-tab" class="tab-pane fade @if($loop->first)show active @endif" id="tab-body{{ $contenido->id}}" role="tabpanel">
                <div class="row mb-1">
                    @foreach($contenido->subContenidos as $subContenido)
                    <div class="col-12 ">
                        <div class="alert d-flex bgc-green-m1 text-white border-0 radius-0" role="alert">
                            <i class="fas fa-bookmark mr-3 fa-2x text-white-l3">
                            </i>
                            <span class="align-self-center text-130">
                                {{ $subContenido->nombre }}
                            </span>
                        </div>
                        <div class="col-12 c-textos">
                            @foreach($subContenido->textos as $texto )
                            <div class="card bgc-purple-tp2 mt-4">
                                <div class="card-header">
                                    <h6 class="card-title text-white">
                                        {{ $texto->nombre }}
                                    </h6>
                                    <div class="card-toolbar">
                                        <button class="btn btn-sm border-0 radius-0 text-100 btn-light" onclick="editTexto(this)" type="button">
                                            <i class="fa fa-arrow-left text-90">
                                            </i>
                                            Editar
                                        </button>
                                        <button class="btn btn-sm border-0 radius-0 text-100 btn-yellow ml-1" onclick="updateText(this,'{{ route('Docente.Texto.Update',['id'=>$texto->id]) }}')" type="button">
                                            Guardar
                                            <i class="fa fa-chevron-down text-90">
                                            </i>
                                        </button>
                                        <a class="card-toolbar-btn text-danger-m2" href="#" onclick="deleteText('{{ route('Docente.Texto.Destroy',['id'=>$texto->id]) }}',this)">
                                            <i class="fa fa-times">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body bg-white p-1">
                                    {!! $texto->cuerpo !!}
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-12 c-tareas pt-3">
                            @foreach($subContenido->tareas as $tarea)
                            <div class="alert fade show bgc-white rounded text-break border-t-4 brc-info-tp1 " role="alert">
                                <div class="position-tl h-102 m-n1px rounded-left ">
                                </div>
                                <div>
                                    <a class="btn btn-xs radius-round position-tr btn-info text-white px-1 pt-0 pb-1 text-150 m-1" href="#" role="button">
                                        <i aria-hidden="true" class="fa fa-eye text-sm w-2 mx-1px">
                                        </i>
                                    </a>
                                </div>
                                <!-- the big red line on left -->
                                <h5 class="alert-heading text-info-m1 font-bolder text-wrap">
                                    <i class="far fa-calendar-check text-purple text-140 w-3 mr-2px">
                                    </i>
                                    TAREA :
                                    <a href="{{ route('Docente.Tarea.Edit',['id'=>$tarea->id]) }}">
                                        {{ $tarea->nombre }}
                                    </a>
                                </h5>
                                {{ $tarea->indicaciones }}
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
                                <p class=" col-12">
                                    <button class="btn btn-warning border-b-2 col-12" onclick="deleteTarea('{{ route('Docente.Tarea.Destroy',['id'=>$tarea->id]) }}',this)">
                                        <i class="fa fa-trash-alt text-110 text-white mr-1">
                                        </i>
                                        Eliminar
                                    </button>
                                </p>
                            </div>
                            @endforeach
                        </div>
                        <div class=" row px-2 multimedia ">
                            @foreach($subContenido->archivos as $archivo)
                            <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0 pt-2">
                                <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100 border-t-4 border-b-1 w-100 brc-success-tp2 radius-t-1">
                                    <div class="mb-1">
                                        <span class="d-inline-block bgc-success-l2 p-3 radius-round">
                                            <a href=" {{ route('Docente.Multimedia.Download',['id'=>$archivo->id]) }} ">
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
                                        <a href="#" onclick="deleteMultimedia('{{ route('Docente.Multimedia.Destroy',['id'=>$archivo->id]) }}',this)">
                                            <i class="fas fa-trash text-danger text-120">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class=" row examen">

                            @foreach ($subContenido->examenes as $examen)
                              @component('components.docente.a-virtual.sub-contenido.quiz.alert',['examen'=>$examen])
                              @endcomponent
                            @endforeach

                        </div>
                        <div class="">
                            <div class="dropdown dd-backdrop d-inline-block pt-3">
                                <a aria-expanded="false" aria-haspopup="true" class="btn btn-primary btn-md dropdown-toggle text-120 font-bold" data-toggle="dropdown" href="#" role="button">
                                    Añadir recurso
                                </a>
                                <div aria-labelledby="dropdownMenuLink2" class="dropdown-menu dd-slide-up" style="">
                                    <div class="dropdown-inner">
                                        <h6 class="dropdown-header text-primary text-140">
                                            Recursos
                                        </h6>
                                        <a class="dropdown-item btn btn-outline-success btn-h-light-success btn-a-light-success my-1 text-90 font-bolder text-uppercase text-default" data-target="#modal-registro-text" data-toggle="modal" href="#" onclick="saveText('{{ $subContenido->id }}',this)">
                                            <i class="fas fa-columns text-warning-d1 text-140 w-3 mr-2px">
                                            </i>
                                            Contenido Temático
                                        </a>
                                        <a class="dropdown-item btn btn-outline-success btn-h-light-success btn-a-light-success my-1 text-90 font-bolder text-uppercase text-default" data-target="#modal-registro-tarea" data-toggle="modal" href="#" onclick="saveTarea('{{ $subContenido->id }}',this)">
                                            <i class="far fa-calendar-check text-purple text-140 w-3 mr-2px">
                                            </i>
                                            Tarea
                                        </a>
                                        <a class="dropdown-item btn btn-outline-success btn-h-light-success btn-a-light-success my-1 text-90 font-bolder text-uppercase text-default" data-target="#modal-registro-multimedia" data-toggle="modal" href="#" onclick="saveMultimedia('{{ $subContenido->id }}',this)">
                                            <i class="fas fa-file-excel text-success-d1 text-140 w-3 mr-2px">
                                            </i>
                                            Multimedia
                                        </a>
                                        <a class="dropdown-item btn btn-outline-success btn-h-light-success btn-a-light-success my-1 text-90 font-bolder text-uppercase text-default" data-target="#modal-registro-examen" data-toggle="modal" href="#" onclick="saveExamen('{{ $subContenido->id }}',this)">
                                            <i class="fas fa-list-alt text-danger-d1 text-140 w-3 mr-2px">
                                            </i>
                                            Examen
                                        </a>
                                    </div>
                                </div>
                            </div>
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
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade " id="modal-registro-text" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form',['cardId'=>'Widget-create-text','formId'=>'form-create-text'])
          @slot('titleCard')
           Agregar Contenido Temático
          @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
            @slot('formInputs')
            <input hidden="hidden" id="subcont" name="sub_cont" type="text" value="">
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Nombre :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control col-9" name="nombre" type="text">
                            </input>
                        </div>
                    </div>
                    <textarea id="contenido-texto" name="cuerpo">
                    </textarea>
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
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade " id="modal-registro-tarea" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form',['cardId'=>'Widget-create-tarea','formId'=>'form-create-tarea'])
          @slot('titleCard')
           Agregar Tarea
          @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
            @slot('formInputs')
            <input hidden="hidden" id="subcont_tarea" name="sub_cont" type="text" value="">
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Nombre :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control " name="nombre" type="text">
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
                            <textarea class="form-control" name="indicaciones">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Fecha Inicio :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group date" id="id-timepicker">
                                <input class="form-control" id="fecha_ap" name="fecha_ap" type="text"/>
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
                                Fecha Limite :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group date" id="id-timepicker">
                                <input class="form-control" id="fecha_ven" name="fecha_ven" type="text"/>
                                <div class="input-group-addon input-group-append">
                                    <div class="input-group-text">
                                        <i class="far fa-clock">
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endslot

          @slot('cardButtons')
                    <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create-text');" type="button">
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
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade " id="modal-registro-multimedia" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form',['cardId'=>'Widget-create-multimedia','formId'=>'form-create-multimedia'])
          @slot('titleCard')
           Agregar recurso multimedia
          @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
            @slot('formInputs')
            <input hidden="hidden" id="subcont_multimedia" name="subcont" type="text" value="">
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Archivo :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" id="file-multimedia" name="nombre" type="file"/>
                        </div>
                    </div>
                    @endslot

          @slot('cardButtons')
                    <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create-text');" type="button">
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
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade " id="modal-registro-examen" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form',['cardId'=>'Widget-create-examen','formId'=>'form-create-examen'])
          @slot('titleCard')
           Agregar nuevo examen
          @endslot
           @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
            @slot('formInputs')
            <input hidden="hidden" id="subcont_examen" name="subcontenido_id" type="text" value="">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Nombre :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" name="nombre" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Indicaciones :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="indicaciones">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Fecha Inicio :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group date" id="id-timepicker">
                                <input class="form-control" id="fecha_inicio" name="fecha_inicio" type="text"/>
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
                                Fecha Fin :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group date" id="id-timepicker">
                                <input class="form-control" id="fecha_fin" name="fecha_fin" type="text"/>
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
                                <input class="form-control form-control" id="form-field-mask-3" inputmode="text" name="duracion" type="number">
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
                            <input class="form-control" name="intentos" type="number">
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
                            <input class="form-control" name="calificacion_max" type="number">
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
                                <option value="1">
                                    Ultimo intento
                                </option>
                                <option value="2">
                                    Promedio
                                </option>
                                <option value="3">
                                    Mejor puntaje
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Orden de preguntas Aleatorio  :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <label>
                                <input class="input-lg bgc-green" name="aleatorio" type="checkbox" value="1">
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
                        <div class="col-sm-9 mt-4">
                            <div class="mb-0">
                                <label>
                                    <input class="input-lg bgc-green" name="correccion" type="checkbox" value="1">
                                    </input>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Preguntas  a mostrar:
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" name="n_preguntas" type="number">
                            </input>
                        </div>
                    </div>
                    @endslot

          @slot('cardButtons')
                    <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create-examen');" type="button">
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
<script src="{{ asset('assets/js/summernote-lite.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/interact.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/moment.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
<script type="text/javascript">
    var elSavesubC;
    var elSubC;
    var elTarea;
    var elDMultimedia;
    var elSaveMult;
    var elDExamen;
    jQuery(function($) {
;
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

            //"format": "HH:mm:ss"
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

            //"format": "HH:mm:ss"
          })



        $('#fecha_inicio').datetimepicker({
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
    $('#fecha_fin').datetimepicker({
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
            height: 450,
            minHeight: 150,
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

    


function saveText(subcont,el) {
  elSavesubC=el;
  $('#subcont').val(subcont)
     @component('components.js.validate-form')
       @slot('formId')
       '#form-create-text'
       @endslot

      @slot('rules')
       nombre:{required:true }
      @endslot
  
       @slot('submitHandler')
       var formData = new FormData($('#form-create-text')[0]);

  @component('components.js.ajax')
@slot('url')
' {{ route('Docente.Texto.Store') }} '
@endslot

@slot('data')
formData
@endslot

@slot('beforeSend')
 $('#Widget-create-text').aceWidget('reload');
@endslot

@slot('success')
$('#Widget-create-text').aceWidget('stopLoading');
$("#modal-registro-text").modal('hide');
rstForm("#form-create-text");
 $(elSavesubC).parent().parent().parent().parent().parent().children('.c-textos').append(message.texto);
$('#content-container').append(message.content);


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

  function deleteText(ruta,el) {
         elSubC=el;
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
                
                 $(elSubC).parent().parent().parent().remove();
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


function saveTarea(subcont,el) {
  elSavesubC=el;
  $('#subcont_tarea').val(subcont)
     @component('components.js.validate-form')
       @slot('formId')
       '#form-create-tarea'
       @endslot

      @slot('rules')
       nombre:{required:true },
       indicaciones:{required:true},
       fecha_ap:{required:true},
       fecha_ven:{required:true}
      @endslot
  
       @slot('submitHandler')
       var formData = new FormData($('#form-create-tarea')[0]);

  @component('components.js.ajax')
@slot('url')
' {{ route('Docente.Tarea.Store') }} '
@endslot

@slot('data')
formData
@endslot

@slot('beforeSend')
 $('#Widget-create-tarea').aceWidget('reload');
@endslot

@slot('success')
$('#Widget-create-tarea').aceWidget('stopLoading');
$("#modal-registro-tarea").modal('hide');
rstForm("#form-create-tarea");
 $(elSavesubC).parent().parent().parent().parent().parent().children('.c-tareas').append(message.tarea);
//$('#content-container').append(message.content);


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


  function deleteTarea(ruta,el) {
         elTarea=el;
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
                
                 $(elTarea).parent().parent().remove();
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




function saveMultimedia(subcont,el) {
  elSaveMult=el;
  $('#subcont_multimedia').val(subcont)
     @component('components.js.validate-form')
       @slot('formId')
       '#form-create-multimedia'
       @endslot

      @slot('rules')
       nombre:{required:true }
      @endslot
  
       @slot('submitHandler')
       var formData = new FormData($('#form-create-multimedia')[0]);

  @component('components.js.ajax')
@slot('url')
' {{ route('Docente.Multimedia.Store') }} '
@endslot

@slot('data')
formData
@endslot

@slot('beforeSend')
 $('#Widget-create-multimedia').aceWidget('reload');
@endslot

@slot('success')
$('#Widget-create-multimedia').aceWidget('stopLoading');
$("#modal-registro-multimedia").modal('hide');
rstForm("#form-create-multimedia");
 $(elSaveMult).parent().parent().parent().parent().parent().children('.multimedia').append(message.Multimedia);
//$('#content-container').append(message.content);


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


  function deleteMultimedia(ruta,el) {
         elDMultimedia=el;
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
                
                 $(elDMultimedia).parent().parent().parent().remove();
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



function saveExamen(subcont,el) {
  elSaveMult=el;
  $('#subcont_examen').val(subcont)
     @component('components.js.validate-form')
       @slot('formId')
       '#form-create-examen'
       @endslot

      @slot('rules')
       nombre:{required:true },
       indicaciones:{required:true},
       fecha_inicio:{required:true},
       fecha_fin:{required:true},
       duracion:{required:true},
       intentos:{required:true},
       calificacion_max:{required:true},
       modo_calificacion:{required:true},
       n_preguntas:{required:true}

      @endslot
  
       @slot('submitHandler')
       var formData = new FormData($('#form-create-examen')[0]);

  @component('components.js.ajax')
@slot('url')
' {{ route('Docente.Evaluacion.Store') }} '
@endslot

@slot('data')
formData
@endslot

@slot('beforeSend')
 $('#Widget-create-examen').aceWidget('reload');
@endslot

@slot('success')
$('#Widget-create-examen').aceWidget('stopLoading');
$("#modal-registro-examen").modal('hide');
rstForm("#form-create-examen");
 $(elSaveMult).parent().parent().parent().parent().parent().children('.examen').append(message.evaluacion);
//$('#content-container').append(message.content);


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


  function deleteExamen(ruta,el) {
         elDExamen=el;
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
                
                 $(elDExamen).parent().remove();
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
</script>
<script type="text/javascript">
</script>
@endsection
