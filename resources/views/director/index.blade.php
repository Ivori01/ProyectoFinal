@extends('layouts.ace',['title'=>'Director | Home','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home','bg_body'=>'content-bg1'])

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

@section('content')
<!-- @component('components.brand')
@endcomponent -->
<div class="row px-2">
    <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
        <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
            <div class="mb-1">
                <a href="{{route('Director.Alumno.Index')}}">
                    <span class="d-inline-block bgc-success-l2 p-3 radius-round">
                        <i class="fas fa-user-graduate text-success-m1 text-180 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                    {{($data->get('alumnos'))}}
                </div>
                <div class="text-dark-tp5 text-110">
                    Alumnos
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
                <a href="{{route('Director.Docente.Index')}}">
                    <span class="d-inline-block bgc-pink-l3 p-3 radius-round">
                        <i class="fas fa-chalkboard-teacher text-pink-m2 text-170 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                    {{($data->get('docentes'))}}
                </div>
                <div class="text-dark-tp5 text-110">
                    Docentes
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
                <a href="{{route('Director.Seccion.Index')}}">
                    <span class="d-inline-block bgc-pink-l3 p-3 radius-round">
                        <i class="fas fas fa-boxes text-blue-m2 text-170 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                    {{($data->get('secciones'))}}
                </div>
                <div class="text-dark-tp5 text-110">
                    Secciones
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

    <hr class="brc-white my-3 my-lg-4 pb-1">
        <div class="row">
            <div class="col-lg-7">
                <div class="row px-3 px-lg-4">
                    <div class="col-12 mb1-25">
                        <div class="row h-100 l5 border-2 border-b-0 bgc-white brc-default-l2 radius-t-1 d-flex py-35">
                            <div class="col-12 col-sm-4 px-lg-4 text-center text-sm-left">
                                <span class="text-95">
                                    Total de deudas
                                </span>
                                <div class="text-secondary-d3">
                                    <span class="text-180">
                                        {{($data->get('deuda.pendiente'))}}
                                    </span>
                                </div>
                                <a class="btn btn-blue btn-bold px-4 py-1 mt-45 text-white" href="{{ route('Director.CuentaPorCobrar.Index') }}" type="button">
                                    Ver
                                </a>
                            </div>
                            <div class="col-12 col-sm-4 px-4 pos-rel mt-3 mt-sm-0 pt-3 pt-sm-0 text-center">
                                <div class="d-none d-sm-block position-lc h-90 border-l-1 brc-default-l1">
                                </div>
                                <div class="d-sm-none position-tc w-90 border-t-1 brc-default-l1">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="d-flex text-center">
                                        <div class="flex-grow-1 mb-3">
                                            <div class="text-nowrap text-95">
                                                Deudas cobradas
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-self-center pos-rel text-blue">
                                        @if($data->get('deuda')!=0)
                                        <canvas class="info-pie" data-percent="{{round($data->get('deuda.pagado') *100/ $data->get('deuda'),0,PHP_ROUND_HALF_UP)}}" height="75" style="width: 150px; display: block;" width="150">
                                        </canvas>
                                        <span class="position-center text-95 font-bolder">
                                            {{round($data->get('deuda.pagado') *100/ $data->get('deuda'),0,PHP_ROUND_HALF_UP)}}%
                                        </span>
                                        @else
                                        <canvas class="info-pie" data-percent="0" height="75" style="width: 150px; display: block;" width="150">
                                        </canvas>
                                        <span class="position-center text-95 font-bolder">
                                            0%
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 px-4 pos-rel mt-3 mt-sm-0 pt-3 pt-sm-0 text-center">
                                <div class="d-none d-sm-block position-lc h-90 border-l-1 brc-default-l1">
                                </div>
                                <div class="d-sm-none position-tc w-90 border-t-1 brc-default-l1">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="d-flex text-center">
                                        <div class="flex-grow-1 mb-3">
                                            <div class="text-nowrap text-95">
                                                Deudas por cobrar
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-self-center pos-rel text-blue">
                                        @if($data->get('deuda')!=0)
                                        <canvas class="info-pie" data-percent="{{round($data->get('deuda.pendiente') *100/ $data->get('deuda'),0,PHP_ROUND_HALF_UP)}}" height="75" style="width: 150px; display: block;" width="150">
                                        </canvas>
                                        <span class="position-center text-95 font-bolder">
                                            {{round($data->get('deuda.pendiente') *100/ $data->get('deuda'),0,PHP_ROUND_HALF_UP)}}%
                                        </span>
                                        @else
                                        <canvas class="info-pie" data-percent="0" height="75" style="width: 150px; display: block;" width="150">
                                        </canvas>
                                        <span class="position-center text-95 font-bolder">
                                            0%
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row w-100 border-2 border-t-1 brc-default-l2 bgc-white mx-0 radius-b-1 overflow-hidden">
                        <div class="col-12 col-sm-6 px-0">
                            <div class="py-25 px-2 d-flex bgc-white border-1 brc-default-l2 m-n2px">
                                <div class="pl-1 align-self-center align-self-md-start">
                                    <i class="bgc-success-d1 py-25 px-3 radius-round icon-glossy brc-black-tp10 border-1">
                                        <i class="fa fa-child text-white w-3 mx-n3px mb-1 text-140">
                                        </i>
                                    </i>
                                </div>
                                <div class="flex-grow-1 pl-25">
                                    <div class="text-grey-d2 text-160">
                                        {{($data->get('alumnos'))}}
                                    </div>
                                    <div class="text-nowrap text-grey-d2">
                                        Alumnos
                                    </div>
                                </div>
                                <div class="text-success-m1 pr-1 font-bolder">
                                    Activos {{($data->get('alumnos.activo'))}}
                                    <i class="fas fa-level-up-alt">
                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 px-0">
                            <div class="py-25 px-2 d-flex bgc-white border-1 brc-default-l2 m-n2px">
                                <div class="pl-1 align-self-center align-self-md-start">
                                    <i class="bgc-blue-d1 py-25 px-3 radius-round icon-glossy brc-black-tp10 border-1">
                                        <i class="fa fa-book text-white w-3 mx-n3px mb-1 text-140">
                                        </i>
                                    </i>
                                </div>
                                <div class="flex-grow-1 pl-25">
                                    <div class="text-grey-d2 text-160">
                                        {{($data->get('cursos'))}}
                                    </div>
                                    <div class="text-nowrap text-grey-d2">
                                        Cursos
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 px-0">
                            <div class="py-25 px-2 d-flex bgc-white border-1 brc-default-l2 m-n2px">
                                <div class="pl-1 align-self-center align-self-md-start">
                                    <i class="bgc-purple-d1 py-25 px-3 radius-round icon-glossy brc-black-tp10 border-1">
                                        <i class="fa fa-school text-white w-3 mx-n3px mb-1 text-140">
                                        </i>
                                    </i>
                                </div>
                                <div class="flex-grow-1 pl-25">
                                    <div class="text-grey-d2 text-160">
                                        {{($data->get('matriculas'))}}
                                    </div>
                                    <div class="text-nowrap text-grey-d2">
                                        Matriculas
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 px-0">
                            <div class="py-25 px-2 d-flex bgc-white border-1 brc-default-l2 m-n2px">
                                <div class="pl-1 align-self-center align-self-md-start">
                                    <i class="bgc-pink-d1 py-25 px-3 radius-round icon-glossy brc-black-tp10 border-1">
                                        <i class="fa fa-chalkboard-teacher text-white w-3 mx-n3px mb-1 text-140">
                                        </i>
                                    </i>
                                </div>
                                <div class="flex-grow-1 pl-25">
                                    <div class="text-grey-d2 text-160">
                                        {{($data->get('docentes'))}}
                                    </div>
                                    <div class="text-nowrap text-grey-d2">
                                        Docentes
                                    </div>
                                </div>
                                <div class="text-success-m1 pr-1 font-bolder">
                                    Activos {{($data->get('docentes.activo'))}}
                                    <i class="fas fa-level-up-alt">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <div class="card border-0 h-100">
                    <div class="card-header border-0 bgc-primary-d1 card-header-sm">
                        <h6 class="card-title pt-0">
                            <i class="mr-1 fa fa-signal text-white-tp2">
                            </i>
                            <span class="text-110 text-white">
                                Estado de alumnos
                            </span>
                        </h6>
                    </div>
                    <div class="card-body px-0 bgc-white border-2 border-t-0 brc-primary-m4 pb-0 flex-grow-1 d-flex flex-column">
                        <div class="flex-grow-1 d-flex align-items-center px-2">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class="">
                                    </div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class="">
                                    </div>
                                </div>
                            </div>
                            <canvas class="mw-100 chartjs-render-monitor" height="150" id="piechart" style="display: block; width: 368px; height: 134px;" width="245">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="brc-white my-15 d-none d-lg-block pb-4">
            <div class="row">
                <div class="col order-last order-lg-first">
                    <div class="card border-0">
                        <div class="card-header bg-transparent border-0 pl-1">
                            <h5 class="card-title mb-2 mb-md-0 text-120">
                                <i class="fa fa-star mr-1 text-warning text-90">
                                </i>
                                <span class="text-105">
                                    Ultimos pagos
                                </span>
                            </h5>
                            <div class="card-toolbar align-self-center">
                                <a class="card-toolbar-btn text-grey text-110" data-action="toggle" href="#">
                                    <i class="fa fa-chevron-up">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0 border-t-2 brc-default-l2">
                            <table class="table brc-secondary-l4">
                                <thead class="border-1">
                                    <tr class="bgc-primary-tp2 text-white">
                                        <th>
                                            <i class="ace-icon fa fa-caret-right blue">
                                            </i>
                                            Pago
                                        </th>
                                        <th>
                                            <i class="ace-icon fa fa-caret-right blue">
                                            </i>
                                            Alumno
                                        </th>
                                        <th class="hidden-480">
                                            <i class="ace-icon fa fa-caret-right blue">
                                            </i>
                                            Fecha
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data->get('caja') as $pagado)
                                    <tr>  
                                        <td>
                                            <span class="label label-info arrowed-right arrowed-in">

                                                @foreach ($pagado->detalles as $detalle)
                                                <li>{{$detalle->deudaInfo->conceptoPagoInfo->descripcion}}</li> 
                                                @endforeach
                                               
                                            </span>
                                        </td>
                                        <td>
                                            {{$detalle->deudaInfo->alumnoInfo->persona->ApellidosNombres}}
                                        </td>
                                        <td>
                                            {{ date("Y/m/d h:i:s a ",strtotime($pagado->fecha))}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row --> 
            @stop
@section('footer')
@component('components.footer')
@endcomponent
@endsection
@section('script')
            <script src="{{ asset('assets/js/Chart.min.js')}}" type="text/javascript">
            </script>
            <script src="{{ asset('assets/js/Sortable.min.js')}}" type="text/javascript">
            </script>
            <script type="text/javascript">
                jQuery(function($) {
    	$('#admin-home').addClass('active');	
			
  if (!('ontouchstart' in window)) $('[data-toggle="tooltip"]').tooltip({container: 'body'});//show tooltips



  //draw charts
  var _animate = !AceApp.Util.isReducedMotion();//make sure no animation is displayed according to user preferences
  

  //the traffic sources pie chart
  var config = {
      type: 'doughnut',
  data: {
          datasets: [{
              label: 'Traffic Sources',
               @if($data->get('alumnos')!=0)
              data: [{{round($data->get('alumnos.activo') *100/ $data->get('alumnos'),0,PHP_ROUND_HALF_UP)}},{{round($data->get('alumnos.egresado') *100/ $data->get('alumnos'),0,PHP_ROUND_HALF_UP)}}, {{round($data->get('alumnos.retirado') *100/ $data->get('alumnos'),0,PHP_ROUND_HALF_UP)}},  {{round($data->get('alumnos.suspendido') *100/ $data->get('alumnos'),0,PHP_ROUND_HALF_UP)}}],
              @else
              data: [0,0, 0,0],
              @endif
              backgroundColor: [
                "#6dbb6d",
                "#4697ca",
                "#e5758f",
                "#a072b9"
              
              ],
          }],
          labels: [
              'Estudiando',
              'Egresado',
              'Retirado',
              'Suspendido'
              
          ]
      },
      
      options: {
          responsive: true,

          cutoutPercentage: 50,
          legend: {
              display: true,
              position: 'right',
              labels: {
                  usePointStyle: true
              }
          },
          animation: {
              animateRotate: true,
              duration: _animate ? 1000 : false
          },
          tooltips: {
              enabled: true,
              cornerRadius: 0,
              bodyFontColor: '#fff',
              bodyFontSize: 14,
              fontStyle: 'bold',
              
              backgroundColor: 'rgba(34, 34, 34, 0.73)',
              borderWidth: 0,
             
              caretSize: 5,

              xPadding: 12,
              yPadding: 12,
              
              callbacks: {
                label: function(tooltipItem, data) {
                  var label = data.labels[tooltipItem.index];
                  return ' ' + label + ": " + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                }
              }
          }
      }
  };

  var trafficPieChart = new Chart(document.getElementById('piechart'), config);


    ///////////
    //the pageview bar charts in infoboxes


 //infobox's circular progress bar
  $('canvas.info-pie, canvas.task-progress').each(function() {
    var color = $(this).css('color');

    new Chart(this.getContext('2d'), {
      type: 'doughnut',
      data: {
          datasets: [{
              data: [$(this).data('percent'), 100 - $(this).data('percent')],
              backgroundColor: [
                color,
                  "#e3e5ea"
              ],
              hoverBackgroundColor: [
                color,
                 "#e3e5ea"
              ],
              borderWidth: 0
          }]
      },
      
      options: {
          responsive: false,
          cutoutPercentage: 80,
          legend: {
              display: false
          },
          animation: {
              duration: _animate ? 500 : false,
              easing: 'easeInCubic'
          },
          tooltips: {
              enabled: false,
          }
      }
  });

});




			
			})
            </script>
            @stop
        </hr>
    </hr>
</hr>