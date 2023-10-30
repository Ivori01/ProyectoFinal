@extends('layouts.ace',['title'=>'Director | Registrar alumnos'])

@section('logo')
    @component('components.logo', ['app_name' => 'School', 'href_logo' => route('home')])
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
    @component('components.page-name', ['subpage_name' => 'Cursos'])
        @slot('page_name')
            Alumno
        @endslot
        @slot('subpage_name')

            Nuevo
        @endslot
    @endcomponent
@endsection

@section('head')
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            @component('components.card-form', ['cardId' => 'Widget-create', 'formId' => 'form-create', 'color' =>
                'bgc-primary'])
                @slot('titleCard')
                    <p class="text-left text-white">
                        Formulario de Registro
                    </p>
                @endslot

                @slot('formInputs')
                    @include('partials.inputs')
                    <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0">
                               Nivel
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <select name="nivel_id" class="select2">
                              
                                @foreach ($niveles  as $nivel )
                                <option value="{{$nivel->id}}">{{$nivel->nombre}}</option>
                                @endforeach
                            </select>
                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0">
                               DPI Apoderado
                            </label>
                        </div>
                        <div class="col-sm-9">
                           <input type="text" name="dni_padre" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0">
                               Nombres Apoderado
                            </label>
                        </div>
                        <div class="col-sm-9">
                           <input type="text" name="nombre_padre" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0">
                              Telefono Apoderado
                            </label>
                        </div>
                        <div class="col-sm-9">
                           <input type="text" name="telefono_padre" class="form-control">
                        </div>
                    </div>
                    <input hidden="" name="estadoacademico" type="text" value="Estudiando">
                @endslot

                @slot('cardButtons')
                    <button class="btn btn-lg btn-danger" onclick="rstForm('#form-create');" type="button">
                        <i class="fa fa-times mr-2">
                        </i>
                        Cancelar
                    </button>
                    <button class="btn btn-lg btn-success">
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
    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal-registro" role="dialog"
        tabindex="-1">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                @component('components.card-form', ['cardId' => 'Widget-create', 'formId' => 'form-create2', 'color' =>
                    'bgc-primary'])
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
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label class="mb-0">
                                    Numero de Documento :
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control w-75" id="nrodoc2" name="nrodocumento" readonly="" type="text">
                                </input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label class="mb-0">
                                   DPI Apoderado
                                </label>
                            </div>
                            <div class="col-sm-9">
                               <input type="text" name="dni_padre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label class="mb-0">
                                   DPI Apoderado
                                </label>
                            </div>
                            <div class="col-sm-9">
                               <input type="text" name="dni_padre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label class="mb-0">
                                   Nombres Apoderado
                                </label>
                            </div>
                            <div class="col-sm-9">
                               <input type="text" name="dni_padre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                <label class="mb-0">
                                  Telefono Apoderado
                                </label>
                            </div>
                            <div class="col-sm-9">
                               <input type="text" name="dni_padre">
                            </div>
                        </div>
                        <input hidden="" name="estadoacademico" type="text" value="Estudiando">
                    @endslot

                    @slot('cardButtons')
                        <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create2');" type="button">
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
    <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/inputmask/dist/jquery.inputmask.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/additional-methods.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/initinput.js') }}">
    </script>
    <script type="text/javascript">
        jQuery(function($) {

            $('#menu-persona').addClass('active open');
            $('#menu-persona').children('.submenu').addClass('show');
            $('#menu-alumno').addClass('active open');
            $('#menu-alumno').children('.submenu').addClass('show');
            $('#alumno-create').addClass('active');

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



            @component('components.js.validator-check', [
                'MethodName' => 'checkpersona',
                'RutaCheck' => route('Director.Persona.Check'),
                'data' => "{_token:token,nrodocumento : value,model:'persona' }",
                'message' => `<div id="validpersona" class="text-warning">Se han encontrado datos del usuario ingresado <p> Registrelo
                      solo con los datos que faltan .<a href="#modal-registro" data-toggle="modal"
                            class="btn btn-block  btn-success">Registrar</a></div>`,
                'ActionSuccess' => ' $("#nrodoc2").val(value);',
                ])
            @endcomponent

            @component('components.js.validator-check', ['MethodName' => 'checkalumno', 'RutaCheck' =>
                route('Director.Alumno.Check'), 'data' => "{_token:token,nrodocumento : value,model:'alumno' }"])
            @endcomponent


            $.validator.messages.required = "Este Campo es Obligatorio";
            $.validator.messages.require_from_group = "Por favor , complete {0} de estos campos";
            token = $("#token").val();


            @component('components.js.validate-form')
                @slot('formId')
                    '#form-create'
                @endslot
            
                @slot('rules')
                    tipodocumento:{ required:true},
                    nombres: {required: true},
                    apellidos: {required: true},
                    nrodocumento: {required: true,number:true, checkalumno: true, checkpersona:true },
                    genero: {required: true },
                    celular: { require_from_group: [1,".nro"] },
                    telefono:{require_from_group: [1,".nro"] },
                    fechanacimiento: {required: true },
                    correo:{required:true, email:true },
                    direccion: {required: true },
                    apoderado:{required:true }
                @endslot
            
                @slot('messages')
                    nrodocumento: {remote: "Numero de Documento Duplicado"}
            
                @endslot
            
                @slot('submitHandler')
            
                    var formData = new FormData($("#form-create")[0]);
            
                    @component('components.js.ajax')
                        @slot('url')
                            '{!! route('Director.Alumno.Store') !!}'
                        @endslot
            
                        @slot('data')
                            formData
                        @endslot
            
            
                        @slot('beforeSend')
                            $('#Widget-create').aceWidget('startLoading');
                        @endslot
                        @slot('success')
                            //$('#tipodocumento').val(null).trigger('change');
                            $('#apoderado').empty().trigger("change");
                            $('#foto').aceFileInput('resetInput');
                            $('#Widget-create').aceWidget('stopLoading');
                            rstForm("#form-create");
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
                    '#form-create2'
                @endslot
            
                @slot('rules')
                    nrodocumento: {required: true, number:true, checkalumno: true },
                    apoderado:{required:true }
                @endslot
            
                @slot('submitHandler')
                    var formData = new FormData($("#form-create2")[0]);
            
                    @component('components.js.ajax')
            
                        @slot('url')
                            '{!! route('Director.Alumno.Store2') !!}'
                        @endslot
                        @slot('data')
                            formData
                        @endslot
            
                        @slot('beforeSend')
                            $('#widget2').aceWidget('startLoading');
                        @endslot
            
                        @slot('success')
                            $('#widget2').aceWidget('stopLoading');
                            $("#modal-registro").modal('hide');
                            $("#validpersona").html('');
                            rstForm("#form-create");
                            rstForm("#form-create2");
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
    </script>
@stop
