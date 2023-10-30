@extends('layouts.ace',['title'=>'Alumno | Grados'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 

@section('navbar-menu')
@component('components.alumno.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.alumno.sidebar-menu') 
@endcomponent
@endsection
@endcomponent
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Grados
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
<div class="row">
    <div class="col-12">
        @component('components.ace-table',['title'=>'Cursos'])
        <th>
            Grado
        </th>
        <th data-sortable="true">
            Letra
        </th>
        <th data-sortable="true">
            Nivel
        </th>
        <th data-sortable="true">
            Año
        </th>
        <th>
            Notas
        </th>
        @endcomponent
    </div>
</div>
@stop
@section('footer')
@component('components.footer')
@endcomponent
@endsection

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
<script type="text/javascript">
    jQuery(function($) {				
		

		$('#menu-grado').addClass('active open');
  $('#menu-grado').children('.submenu').addClass('show');

  $('#menu-grado-todos').addClass('active');

		@component('components.js.b-table',['route'=>route('Alumno.Grado.Retrieve')])
		@endcomponent
		
	})
</script>
@stop
