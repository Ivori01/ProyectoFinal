@extends('layouts.ace',['title'=>'Director | Niveles','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

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

@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/photoswipe.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/venobox.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Notas
@endslot
@slot('subpage_name')
 
    Año  academico {{optional($anio)->anio}}
@endslot
@endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        @component('components.ace-table',['title'=>'Secciones'])
			<th data-sortable="true">Nivel</th>
			<th data-sortable="true">Grado</th>
			<th data-sortable="true">Seccion</th>
			<th>Ver</th>
        @endcomponent
    </div>
</div>
    
@endsection


@section('footer')
@component('components.footer')
@endcomponent
@endsection

@section('script')

<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
    </script>
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
  <script type="text/javascript">
	var myTable;   
	var routeUpdate;
	
	jQuery(function($) {




  $('#menu-notas').addClass('active open');
  $('#menu-notas').children('.submenu').addClass('show');
  $('#menu-notas-index').addClass('active'); 



 @component('components.js.b-table',['route'=>route('Director.Notas.Retrieve')])
        @endcomponent




	})







  </script>

@stop