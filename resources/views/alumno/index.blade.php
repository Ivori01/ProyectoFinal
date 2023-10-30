@extends('layouts.ace',['title'=>'Alumno | Home','bg_body'=>'content-bg1'])

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

@section('content')
@component('components.brand')
@endcomponent
<div class="row px-2">
    <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
        <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
            <div class="mb-1">
                <a href="{{route('Alumno.Grado.Index')}}">
                    <span class="d-inline-block bgc-success-l2 p-3 radius-round">
                        <i class="fa fa-list-ol text-success-m1 text-180 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                </div>
                <div class="text-dark-tp5 text-110">
                    Grados
                </div>
            </div>
            <div class="text-blue-m2 font-bolder position-tr m-2">
                {{--  8% --}}
                <i class="fas fa-caret-up text-120">
                </i>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
        <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
            <div class="mb-1">
                <a href="{{route('Alumno.Horario.Index')}}">
                    <span class="d-inline-block bgc-purple-l2 p-3 radius-round">
                        <i class="fas fa-calendar-day text-purple-m1 text-180 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                </div>
                <div class="text-dark-tp5 text-110">
                    Horario
                </div>
            </div>
            <div class="text-blue-m2 font-bolder position-tr m-2">
                {{--  8% --}}
                <i class="fas fa-caret-up text-120">
                </i>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
        <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
            <div class="mb-1">
                <a href="{{route('Alumno.Deuda.Index')}}">
                    <span class="d-inline-block bgc-pink-l3 p-3 radius-round">
                        <i class="fas fa-money-bill-alt text-pink-m2 text-170 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                </div>
                <div class="text-dark-tp5 text-110">
                    Deudas
                </div>
            </div>
            <div class="text-orange-d1 pr-1 font-bolder position-tr m-2">
                {{--   1% --}}
                <i class="fa fa-caret-up">
                </i>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
        <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
            <div class="mb-1">
                <a href="{{route('Alumno.AulaVirtual.Index')}}">
                    <span class="d-inline-block bgc-blue-l3 p-3 radius-round">
                        <i class="fas fa-graduation-cap text-blue-m2 text-170 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                </div>
                <div class="text-dark-tp5 text-110">
                    Aula Virtual
                </div>
            </div>
            <div class="text-orange-d1 pr-1 font-bolder position-tr m-2">
                {{--   1% --}}
                <i class="fa fa-caret-up">
                </i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card transparent mt-4">
             <div class="card-header bg-transparent border-0 pl-1">
                            <h5 class="card-title mb-2 mb-md-0 text-120">
                                <i class="fa fa-star mr-1 text-warning text-90">
                                </i>
                                <span class="text-105">
                                   Mis  deudas pendientes
                                </span>
                            </h5>
                            <div class="card-toolbar align-self-center">
                                <a class="card-toolbar-btn text-grey text-110" data-action="toggle" href="#">
                                    <i class="fa fa-chevron-up">
                                    </i>
                                </a>
                            </div>
                        </div>
            <div class="card-body">
                <div class="widget-main no-padding">
                    <table class="table table-bordered table-striped">
                        <thead class="thin-border-bottom">
                            <tr>
                                <th>
                                    <i class="ace-icon fa fa-caret-right blue">
                                    </i>
                                    Deuda
                                </th>
                                <th>
                                    <i class="ace-icon fa fa-caret-right blue">
                                    </i>
                                    Cantidad
                                </th>
                                <th class="hidden-480">
                                    <i class="ace-icon fa fa-caret-right blue">
                                    </i>
                                    Estado
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->get('deudas') as $deuda)
                            <tr>
                                <td>
                                    {{$deuda->conceptoPagoInfo->descripcion}}
                                </td>
                                <td>
                                    {{$deuda->conceptoPagoInfo->importe}}
                                </td>
                                <td>
                                    <span class="label label-danger arrowed-in">
                                        {{ $deuda->estado }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.widget-main -->
            </div>
            <!-- /.widget-body -->
        </div>
        <!-- /.widget-box -->
    </div>
    <!-- /.col -->
    <div class="vspace-12-sm">
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
    jQuery(function($) {

				$('#alumno-home').addClass('active');	

			
			
			
			
	
			
			
			
			})
</script>
@stop
