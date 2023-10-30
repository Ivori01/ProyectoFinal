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
<a href="{{ route('Docente.AulaVirtual.Index')}}">Aula virtual</a>
@endslot
@slot('subpage_name')


{{ $tarea->subContenido->datosContenido->datosCurso->cursoinfo->datosCurso->nombre }} | {{$tarea->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->numero }} {{ $tarea->subContenido->datosContenido->datosCurso->seccionInfo->letra}} | {{ $tarea->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->DatosNivel->nombre}}
 <i class="fa fa-angle-double-right text-80">
        </i> <a href="{{ route('Docente.AulaVirtual.Curso.Contenido',['id'=>$tarea->subContenido->datosContenido->datosCurso->id]) }}">Contenido</a> <i class="fa fa-angle-double-right text-80">
        </i> Tarea <i class="fa fa-angle-double-right text-80">
        </i> Editar
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')




<div>
    @component('components.card-form',['cardId'=>'Widget-update','formId'=>'form-update'])
          @slot('titleCard')
         Editar
          @endslot
           @slot('toolbarCard')
    <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
        <i class="fa fa-times">
        </i>
    </a>
    @endslot
            @slot('formInputs')

        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
        @method('PUT')
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0" for="id-form-field-1">
                        Nombre :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control col-9" name="nombre" type="text" value="{{ $tarea->nombre }}">
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
                    <textarea class="form-control" id="contenido-texto" name="indicaciones" >{{ $tarea->indicaciones}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0" for="id-form-field-1">
                        Fecha Inicio :
                    </label>
                </div>
                <div class="col-sm-9">
                    <div class="input-group datetimepicker" id="id-timepicker">
                        <input class="form-control" id="fecha_ap" name="fecha_ap" type="text" value="{{ $tarea->fecha_ap->format('Y/m/d g:i:s A') }}"/>
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
                        <input class="form-control" id="fecha_ven" name="fecha_ven" type="text" value="{{ $tarea->fecha_ven->format('Y/m/d g:i:s A') }}"/>
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

<div class="col-12 p-3">
  <hr class="border-dotted my-3">
  <p>
                  <button class="btn btn-md btn-purple btn-block" data-target="#modal-registro-archivo" data-toggle="modal">Nuevo Archivo</button>
                </p>
<div class="col-12 order-last order-lg-first">
                <div class="card border-0">
                  <div class="card-header bg-transparent border-0 pl-1">
                    <h5 class="card-title mb-2 mb-md-0 text-120">
                      <i class="fa fa-star mr-1 text-warning text-90"></i>
                      <span class="text-105">Archivos Adjuntos</span>
                    </h5>

                    <div class="card-toolbar align-self-center">
                      <a href="#" data-action="toggle" class="card-toolbar-btn text-grey text-110"><i class="fa fa-chevron-up"></i></a>
                    </div>
                  </div>
                  <div class="card-body p-0 border-t-2 brc-default-l2 collapse show" style="">
                    <table class="table brc-secondary-l4">
                      <thead class="border-0 ">
                        <tr class="border-0 bg-transparent text-default-tp4 te1xt-95 text-blue">
                          <th class="border-0 font-normal">Nombre</th>
                          <th class="border-0 font-normal">Eliminar</th>
                          
                        </tr>
                      </thead>

                      <tbody class="archivos">
                         @foreach($tarea->archivos as $archivo)
                        <tr class="bgc-h-primary-l5">
                         
                          <td><a href="{{ route('Docente.ArchivoTarea.Download',['id'=>$archivo->id]) }}"><span class="text-success-m1 font-bolder">{{ $archivo->nombre }}</span></a>
                            
                          </td>
                          <td>
                            <a href="#" data-action="toggle" class="card-toolbar-btn text-grey text-110" onclick="deleteArchivo('{{ route('Docente.ArchivoTarea.Destroy',['id'=>$archivo->id]) }}',this)"><i class="fa fa-trash-alt text-danger"></i></a>
                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

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
                    
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label text-sm-right pr-0">
                            <label class="mb-0" for="id-form-field-1">
                                Archivo :
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" id="file-tarea" type="file" name="nombre" />
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
        </div>
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
<script type="text/javascript">
 var el;
    jQuery(function($) {

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
       '#form-create-archivo'
       @endslot

      @slot('rules')
       nombre:{required:true}
      @endslot
  

       @slot('submitHandler')
        var formData = new FormData($('#form-create-archivo')[0]);

@component('components.js.ajax')
@slot('url')
' {{ route('Docente.ArchivoTarea.Store') }} '
@endslot

@slot('data')
formData
@endslot


@slot('beforeSend')
 $('#Widget-create-archivo').aceWidget('reload');
@endslot
@slot('success')
$('#Widget-create-archivo').aceWidget('stopLoading');

$('.archivos').append(message.ArchivoTarea);
$("#modal-registro-archivo").modal('hide');
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
                Swal.fire('Error!', msg.message, 'error')
            }
            });
            
        }
    })
}
</script>
@endsection
