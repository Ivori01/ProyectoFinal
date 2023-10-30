@extends('layouts.ace',['title'=>'Perfil - Ajustes'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 


@section('navbar-menu')
@component('components.director.navbar-menu')
@endcomponent
@endsection



@section('page-name')
@component('components.page-name')
@slot('page_name')
Ver
@endslot
@slot('subpage_name')
 
      Mi perfil
@endslot
@endcomponent
@endsection


@section('content')
<div class="row">
    <div class="col-12 1bgc-default-l4 pt-0 radius-1 d-flex flex-column pos-rel mt-2 mt-md-0">
        <div class="sticky-nav-md">
            <div class="sticky-trigger">
            </div>
            <div class="position-tr w-100 border-t-4 brc-blue-m2 radius-2 d-md-none">
            </div>
            <ul class="nav nav-tabs-scroll is-scrollable nav-tabs nav-tabs-simple p-1px pl-25 bgc-grey-l4 border-1 brc-grey-l2 radius-t-2" id="profile-tabs" role="tablist">
                <li class="nav-item">
                    <a aria-controls="home" aria-selected="true" class="d-style nav-link active p-3 brc-blue" data-toggle="tab" href="#profile-tab-edit" role="tab">
                        <span class="d-n-active">
                            Editar Información
                            <span class="text-danger">
                                *
                            </span>
                        </span>
                        <span class="d-active text-dark-tp3">
                            Editar Información
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a aria-controls="password" aria-selected="true" class="d-style nav-link p-3 brc-blue" data-toggle="tab" href="#password-edit" role="tab">
                        <span class="d-n-active">
                            Cambiar contraseña
                            <span class="text-danger">
                                *
                            </span>
                        </span>
                        <span class="d-active text-dark-tp3">
                            Cambiar contraseña
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content px-0 tab-sliding border-1 flex-grow-1 radius-b-2 border-t-0 brc-grey-l2">
            <div class="tab-pane px-1 px-md-2 px-lg-3 active" id="profile-tab-edit">
                <hr>
                    <div class="row">
                        <div class="col-12 col-md-10 offset-md-1 mt-3" >
                            <form class="text-grey-d1 text-95" id="myInfo">
                                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <div class="form-group row mx-0">
                                        <label class="col-sm-3 col-form-label text-sm-right" for="id-field1">
                                            Mi descripción
                                        </label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="descripcion">{{Auth::user()->persona->descripcion}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mx-0">
                                        <label class="col-sm-3 col-form-label text-sm-right" for="id-field2">
                                            Facebook
                                        </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="url" name="facebook" placeholder="Ej. (https://web.facebook.com/)" value="{{ Auth::user()->persona->facebook }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row mx-0">
                                        <label class="col-sm-3 col-form-label text-sm-right" for="id-field3">
                                            Instagram
                                        </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="instagram" placeholder="Ej. (https://www.instagram.com/heidianazgo/)" type="text" value="{{ Auth::user()->persona->instagram }}">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="form-group row mx-0">
                                        <label class="col-sm-3 col-form-label text-sm-right" for="id-field4">
                                            Whatsapp
                                        </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="whatsapp" placeholder="Ej. (+51) 964121312" type="text" value="{{ Auth::user()->persona->whatsapp }}">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                            <label class="mb-0">
                                                Logo Derecha:
                                            </label>
                                        </div>
                                        <div class=" col-sm-9" id="g-d">
                                            <input id="foto" name="foto" type="file"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="border-double">
                                            <div class="form-group col-md-6 offset-md-3 mt-2">
                                                <button class="btn btn-warning btn-block btn-md btn-bold mt-2 mb-3 radius-2">
                                                    Guardar cambios.
                                                </button>
                                            </div>
                                        </hr>
                                    </div>
                                </input>
                            </form>
                        </div>
                    </div>
                </hr>
            </div>
            <div class="tab-pane px-1 px-md-2 px-lg-3 " id="password-edit">
              
                    <div class="row" >
                        <div class="col-12 col-md-10 offset-md-1 mt-3">
                            <form class="text-grey-d1 text-95" id="myPassword">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                            Contraseña:
                                        </div>
                                        <div class="col-sm-9 pr-0 pr-sm-3">
                                            <input class="form-control col-11 col-sm-6 col-md-4" id="password" name="password" placeholder="" type="password"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                            Confirmar contraseña:
                                        </div>
                                        <div class="col-sm-9 pr-0 pr-sm-3">
                                            <input class="form-control col-11 col-sm-6 col-md-4" name="password2" placeholder="" type="password"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="border-double">
                                            <div class="form-group col-md-6 offset-md-3 mt-2">
                                                <button class="btn btn-success btn-block btn-md btn-bold mt-2 mb-3 radius-2">
                                                    Actualizar contraseña
                                                </button>
                                            </div>
                                        </hr>
                                    </div>
                                </input>
                            </form>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection

@section('script')
<script src="{{ asset('assets/js/additional-methods.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/autosize.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
</script>
<script type="text/javascript">
    jQuery(function($) {

        $('#foto').aceFileInput({
            style: 'drop',
                    droppable: true,
        
                    container: 'border-1 border-dashed brc-grey-m4 brc-h-warning-m1',
                    placeholderClass: 'text-125 text-600 text-grey-l2 my-2',
                    placeholderText: 'Arrastre o cargue Archivo',
                    placeholderIcon: '<i class="fas fa-file fa-3x text-purple-l1 my-2"></i>',
        
                    thumbnail: 'large'
        
        
            }).on('change', function(){
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
            });
        
        
            $('#foto')
            .aceFileInput('showFileList', [
            {format:'image',type: 'image', name: '{{url(Storage::url('sistem/photos/'.Auth::user()->persona->foto))}}', path:"{{url(Storage::url('sistem/photos/'.Auth::user()->persona->foto))}}" }
        
            ]);
            console.log($('#g-d').find('img').attr('style',''));


@component('components.js.validate-form')
    @slot('formId')
      '#myInfo'
    @endslot
      
      @slot('rules')

      descripcion: {required: true }, 
  facebook: {required: true },
  instagram:{required:true},
  whatsapp:{required:true,maxlength:15}
  @endslot

       @slot('submitHandler')
      var formData = new FormData($("#myInfo")[0]);

    @component('components.js.ajax')
    
        @slot('url')
        '{{ route('UpdateMyInfo') }}'
      @endslot
          @slot('data')
        formData
      @endslot

          @slot('beforeSend')
            $('#profile-tab-edit').aceWidget('startLoading');
          @endslot

      @slot('success')
        $('#profile-tab-edit').aceWidget('stopLoading');
      
       
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
      '#myPassword'
    @endslot
      
      @slot('rules')

        password: {
                            required: true,
                            minlength: 5
                        },
                        password2: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password"
                        },
  @endslot

       @slot('submitHandler')
      var formData = new FormData($("#myPassword")[0]);

    @component('components.js.ajax')
    
        @slot('url')
        '{{ route('UpdateMyPassword') }}'
      @endslot
          @slot('data')
        formData
      @endslot

          @slot('beforeSend')
            $('#password-edit').aceWidget('startLoading');
          @endslot

      @slot('success')
        $('#password-edit').aceWidget('stopLoading');
      
       
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
@endsection
