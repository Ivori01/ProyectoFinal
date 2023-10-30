@extends('layouts.ace',['title'=>'Secretaria | reportes','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 


@section('navbar-menu')
@component('components.secretaria.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.secretaria.sidebar-menu') 
@endcomponent
@endsection
@endcomponent
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Reportes
@endslot
@slot('subpage_name')
 
    Boleta de notas
@endslot
@endcomponent
@endsection
@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/photoswipe.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/venobox.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        @component('components.card-form',[ 'formId'=>'form-create','cardId'=>'widget','title'=>'Formulario de Registro de Niveles de Educacion','color'=>'bgc-primary'])
          @slot('titleCard')
        Boleta de notas - Alumno
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
                    <label for="state">
                        Alumno
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control " data-placeholder="Seleccione" id="alumno" name="alumno" onchange="getGrades($(this).val());">
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="state">
                        Grado
                    </label>
                </div>
                <div class="col-sm-9 col-12 tag-input-style">
                    <select class="select2 form-control" data-placeholder="Seleccione" id="matricula" name="matricula">
                        <option value="">
                        </option>
                    </select>
                </div>
            </div>
            <input hidden="" name="estado" type="text" value="Activo">
                @endslot

          @slot('cardButtons')
               
                <button class="btn btn-block btn-bold btn-success">
                   Generar reporte
                    <i class="fa fa-arrow-right ml-2">
                    </i>
                </button>
                @endslot
          @endcomponent
            </input>
        </input>
    </div>
</div>
@stop



@section('script')
<script src="{{ asset('assets/js/moment.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/venobox.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
<script type="text/javascript">
    var myTable;   
    var routeUpdate;  
    jQuery(function($) {
            
  $('#menu-reporte').addClass('active open');
  $('#menu-reporte').children('.submenu').addClass('show');
  $('#menu-reporte-boleta').addClass('active');
  

   
       @component('components.js.select-search',['name'=>'#alumno','ruta'=>route('Secretaria.Alumno.SearchAll')])

        @endcomponent
            
        @component('components.js.b-table',['route'=>route('Director.Nivel.Retrieve')])
        @endcomponent



    @component('components.js.validate-form')
      @slot('formId')
        '#form-create'
      @endslot
      
      @slot('rules')
        alumno: {required: true }, 
        matricula: {required: true },
      
       @endslot

       @slot('submitHandler')
            var formData = new FormData($("#form-create")[0]);

        @component('components.js.ajax')
        
            @slot('url')
                '{!! route('Secretaria.Boleta.Url') !!}'
            @endslot
            @slot('data')
                formData
            @endslot

            @slot('beforeSend')
                $('#widget').aceWidget('startLoading');
            @endslot

            @slot('success')
                 $('#widget').aceWidget('stopLoading');
Swal.fire({
  title: '',
  icon: 'success',
  html:
    '<a href="'+message.url+'" target="_blank" class="btn btn-app btn-warning radius-1 my-1"><i class="d-block h-6 fa fa-file-pdf text-190"></i>Boleta de notas</a>',
  showCloseButton: false,
  showCancelButton: false,
  focusConfirm: false,
   showConfirmButton: false,
})
            @endslot

        @endcomponent
    
      @endslot

    @endcomponent

    
   

    })

   

    function getGrades(alumno) {
       $("#matricula").empty();
         $.ajax({
        url: '{{ route('Secretaria.Alumno.Grados') }}',
        data:{persona:alumno},
        dataType:'json',
        beforeSend: function(){ 
         $('#widget-update').aceWidget('startLoading');
        },
        success:function(message) {
          

 message.data.forEach(function (grado) {
  
     var newOption = new Option(grado.text, grado.id, true, true);
           $("#matricula").append(newOption).trigger('change');
        })

        } ,

        error : function(xhr, status) {
            $("#matricula").empty();
        }
        });
    }
</script>
@stop
