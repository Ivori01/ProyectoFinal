@extends('layouts.ace',['title'=>'Docente | Cursos'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 


@section('navbar-menu')
@component('components.docente.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.docente.sidebar-menu') 
@endcomponent
@endsection
@endcomponent
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Cursos
@endslot
@slot('subpage_name')
 
        Todos
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        @component('components.ace-table',['title'=>'Cursos'])
        <th data-sortable="true">
            Curso
        </th>
        <th data-sortable="true">
            Seccion
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
<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
</script>
<script type="text/javascript">
    var myTable;       
	jQuery(function($) {
$('#menu-curso').addClass('active open');
  $('#menu-curso').children('.submenu').addClass('show');

  $('#menu-curso-index').addClass('active');




@component('components.js.b-table',['route'=>route('Docente.Curso.Retrieve')])
        @endcomponent
	




	})
</script>
@stop
