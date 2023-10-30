@extends('layouts.ace',['title'=>'Director | Docentes'])

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
Docentes
@endslot
@slot('subpage_name')
 
         Todos
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
<a class="btn btn-default" target="_blank" href="{{route('docentesPdf')}}">Reporte pdf</a>
<div class="row">

  
    <div class="col">
        @component('components.ace-table',['title'=>'Docentes'])   
        	<th data-sortable="true">Documento</th>
		<th data-sortable="true">Apellidos Y Nombres</th>
		<th data-sortable="true">Direccion</th>
		<th>Imagen</th>
		<th data-sortable="true">Nivel</th>
		<th data-sortable="true">Especialidad</th>
		<th data-sortable="true">Estado</th>
		<th>Acciones</th>
        @endcomponent
    </div>
</div>
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>



@stop



@section('footer')
@component('components.footer')
@endcomponent
@endsection

@section('script')
    <script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/venobox.min.js')}}" type="text/javascript">
    </script>
  <script type="text/javascript">
   	var myTable;       
	jQuery(function($) {

  $('#menu-persona').addClass('active open');
  $('#menu-persona').children('.submenu').addClass('show');
  $('#menu-docente').addClass('active open');  
  $('#menu-docente').children('.submenu').addClass('show');
  $('#docente-todos').addClass('active');  

		@component('components.js.b-table',['route'=>route('Director.Docente.Retrieve')])
		@endcomponent
		  $('#dynamic-table').on('load-success.bs.table', function (data) {
   $('.venobox').venobox();})

	})

  </script>

@stop