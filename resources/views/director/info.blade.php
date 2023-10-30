@extends('layouts.ace',['title'=>'Director | Registrar alumnos'])
 
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
Informacion
@endslot
@slot('subpage_name')
 
      Editar
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        @component('components.card-form',['cardId'=>'Widget-create','formId'=>'form-create','color'=>'bgc-primary'])
          @slot('titleCard')
        <p class="text-left text-white">
            Formulario de Registro
        </p>
        @endslot
          
            @slot('formInputs')
        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
        <h4 class="text-primary mb-4 ml-md-4">
           Informacion del colegio
           </h4>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Nombre :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control w-75" name="nombre" type="text" value="{{ $info->nombre }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Direccion :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control w-75" name="direccion" type="text" value="{{ $info->direccion }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Telefono :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control w-75" name="telefono" type="text" value="{{ $info->telefono }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Correo :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control w-75" name="mail" type="text" value="{{ $info->mail }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Logo :
                    </label>
                </div>
                <div class=" col-sm-9" id="g-f">
                    <input id="foto" name="logo" type="file"/>
                </div>
            </div>
            <hr>
            <!-- <h4 class="text-primary mb-4 ml-md-4">
               Logos reportes
              </h4>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Logo Izquierda :
                    </label>
                </div>
                <div class=" col-sm-9" id="g-i">
                    <input id="foto_i" name="logo_i" type="file"/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0">
                        Logo Derecha:
                    </label>
                </div>
                <div class=" col-sm-9" id="g-d">
                    <input id="foto_d" name="logo_d" type="file"/>
                </div>
            </div>
            <hr>
            <h4 class="text-primary mb-4 ml-md-4">
               Opciones
            </h4> -->
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  Restringir visualizacion de notas con deudas pendientes:
                </div>

                <div class="col-sm-9 pr-0 pr-sm-3 pt-1">
                  <div>
                    <label>
                        @php
                        $checked='';
                            if($info->restringir_notas==1){
                                $checked='checked';
                            }

                            @endphp
                      <input type="checkbox" id="id-check-1" name="restringir_notas" value="1" class="mr-1 align-sub" {{$checked}}>
                    
                    </label>
                  </div>

                
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                  Simbolo de moneda:
                </div>

                <div class="col-sm-9 pr-0 pr-sm-3 pt-1">
                  <div>
                <input type="text" value="{{$info->simbolo_moneda}}" class="form-control w-25" name="simbolo_moneda" placeholder="S/">
                  </div>

                
                </div>
              </div>
            @endslot

          @slot('cardButtons')
            <button class="btn btn-lg btn-block btn-success">
                Guardar
                <i class="fa fa-arrow-right ml-2">
                </i>
            </button>
            @endslot
          @endcomponent
        </input>
    </div>
</div>
@endsection

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
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
<script type="text/javascript">
    jQuery(function($) {

$('#colegio-info').addClass('active');; 

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
          $('#foto_i').aceFileInput({
            style: 'drop',
            droppable: true,

            container: 'border-1 border-dashed brc-grey-m4 brc-h-warning-m1',

            placeholderClass: 'text-125 text-600 text-grey-l2 my-2',
            placeholderText: 'Arrastre o cargue Archivo',
            placeholderIcon: '<i class="fas fa-file fa-3x text-purple-l1 my-2"></i>',

            thumbnail: 'large'

            //allowExt: 'gif|jpg|jpeg|png|webp|svg'
          });
          $('#foto_d').aceFileInput({
            style: 'drop',
            droppable: true,

            container: 'border-1 border-dashed brc-grey-m4 brc-h-warning-m1',

            placeholderClass: 'text-125 text-600 text-grey-l2 my-2',
            placeholderText: 'Arrastre o cargue Archivo',
            placeholderIcon: '<i class="fas fa-file fa-3x text-purple-l1 my-2"></i>',

            thumbnail: 'large'

            //allowExt: 'gif|jpg|jpeg|png|webp|svg'
          });

    $('#foto')
  .aceFileInput('showFileList', [
  {format:'image',type: 'image', name: '{{url(Storage::url('sistem/photos/'.$info->logo))}}', path:"{{url(Storage::url('sistem/photos/'.$info->logo))}}" }

  ]);

  $('#foto_i')
  .aceFileInput('showFileList', [
  {format:'image',type: 'image', name: '{{url(Storage::url('sistem/photos/'.$info->logo_i))}}', path:"{{url(Storage::url('sistem/photos/'.$info->logo_i))}}" }

  ]);

  $('#foto_d')
  .aceFileInput('showFileList', [
  {format:'image',type: 'image', name: '{{url(Storage::url('sistem/photos/'.$info->logo_d))}}', path:"{{url(Storage::url('sistem/photos/'.$info->logo_d))}}" }

  ]);
console.log($('#g-f').find('img').attr('style',''));
console.log($('#g-i').find('img').attr('style',''));
console.log($('#g-d').find('img').attr('style',''));
    $.validator.messages.required = "Este Campo es Obligatorio";
    $.validator.messages.require_from_group = "Por favor , complete {0} de estos campos";
    token=$("#token").val();


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
       '{!! route('Director.Info.Update',['info'=>$info->id]) !!}'
        @endslot

        @slot('data')
          formData
         @endslot


          @slot('beforeSend')
            $('#Widget-create').aceWidget('startLoading');
          @endslot
@slot('success')
    
$('#Widget-create').aceWidget('stopLoading');

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
