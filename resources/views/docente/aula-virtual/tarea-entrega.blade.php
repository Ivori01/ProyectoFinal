@extends('layouts.ace',['title'=>'Docente | Aula Virtual'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('Docente.AulaVirtual.Index')])
@endcomponent
@endsection

@section('navbar-menu')
@component('components.docente.a-virtual.navbar-menu')
@endcomponent
@endsection



@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
<a href="{{ route('Docente.AulaVirtual.Index')}}">Aula virtual</a>
@endslot
@slot('subpage_name')

<a href="{{ route('Docente.AulaVirtual.Curso.Index',['id'=>$curso->id]) }}">
 
{{ $curso->cursoinfo->datosCurso->nombre }} | {{$curso->seccionInfo->datosGrado->nombre }} {{ $curso->seccionInfo->letra }} | {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }}</a>

 <i class="fa fa-angle-double-right text-80">
        </i> Tareas
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap">

@endsection

@section('content')

@component('components.ace-table',['title'=>'Tareas'])
  <th>Nombre</th>
  <th>Disponible</th>
  <th>Vence</th>
  <th>Enviados</th>
  <th style="text-align: center; width: 140px; "><div class="th-inner "><i class="fa fa-cog text-secondary-d1 text-130"></i></div></th>
@endcomponent

            
@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection


@section('script')

 <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}">
        </script>
  <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}">

  </script>
       <script src="{{ asset('assets/js/dataTables.select.min.js')}}">

  </script>    
<script type="text/javascript">
    var myTable; 
    jQuery(function($) {
          

  @component('components.js.table',['route'=>route('Docente.TareaEntrega.GetAll',['id'=>$curso->id])])
   

  @endcomponent
        });
</script>
@endsection
