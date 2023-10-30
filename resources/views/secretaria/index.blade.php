@extends('layouts.ace',['title'=>'Secretaria | Home','bg_body'=>'content-bg1'])

 
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

@section('content')

@component('components.brand')
@endcomponent
<div class="row px-2">
    <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0">
        <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100">
            <div class="mb-1">
                <a href="{{route('Secretaria.Alumno.Index')}}">
                    <span class="d-inline-block bgc-purple-l2 p-3 radius-round">
                        <i class="fas fa-user-graduate text-purple-m1 text-180 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
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
                <a href="{{route('Secretaria.Apoderado.Index')}}">
                    <span class="d-inline-block bgc-pink-l3 p-3 radius-round">
                        <i class="fas fa-user-tie text-pink-m2 text-170 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                </div>
                <div class="text-dark-tp5 text-110">
                    Padres
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
                <a href="{{route('Secretaria.Matricula.Index')}}">
                    <span class="d-inline-block bgc-blue-l3 p-3 radius-round">
                        <i class="fas fa-school text-blue-m2 text-170 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                </div>
                <div class="text-dark-tp5 text-110">
                    Matriculas
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
                <a href="{{route('Secretaria.Cobro.Index')}}">
                    <span class="d-inline-block bgc-yellow-l3 p-3 radius-round">
                        <i class="fas fa-cash-register text-yellow-m2 text-170 w-4">
                        </i>
                    </span>
                </a>
            </div>
            <div class="mt-2px">
                <div class="text-dark-tp4 text-180">
                </div>
                <div class="text-dark-tp5 text-110">
                    Caja
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
    <div class="col-12">
        <div class="card transparent mt-4">
            <div class="card-header bg-transparent border-0 pl-1">
                <h5 class="card-title mb-2 mb-md-0 text-120">
                    <i class="fa fa-star mr-1 text-warning text-90">
                    </i>
                    <span class="text-105">
                        Ultimos cobros
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
                                     @foreach ($pagado->detalles as $detalle)
                                                <li>{{$detalle->deudaInfo->conceptoPagoInfo->descripcion}}</li> 
                                                @endforeach
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
                <!-- /.widget-main -->
            </div>
            <!-- /.widget-body -->
        </div>
        <!-- /.widget-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@stop

@section('script')
<script type="text/javascript">
    jQuery(function($) {

                $('#secretaria-home').addClass('active');    

                $('.easy-pie-chart.percentage').each(function(){
                    var $box = $(this).closest('.infobox');
                    var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
                    var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
                    var size = parseInt($(this).data('size')) || 50;
                    $(this).easyPieChart({
                        barColor: barColor,
                        trackColor: trackColor,
                        scaleColor: false,
                        lineCap: 'butt',
                        lineWidth: parseInt(size/10),
                        animate: ace.vars['old_ie'] ? false : 1000,
                        size: size
                    });
                })
            
    
            
              //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
              //but sometimes it brings up errors with normal resize event handlers
              $.resize.throttleWindow = false;
            
              var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
              @if($data->get('alumnos')!=0)
              var data = [
                { label: "Estudiando",  data: {{round($data->get('alumnos.activo') *100/ $data->get('alumnos'),0,PHP_ROUND_HALF_UP)}} , color: "#68BC31"},
                { label: "Egresado",  data: {{round($data->get('alumnos.egresado') *100/ $data->get('alumnos'),0,PHP_ROUND_HALF_UP)}}, color: "#2091CF"},
                { label: "Retirado",  data: {{round($data->get('alumnos.retirado') *100/ $data->get('alumnos'),0,PHP_ROUND_HALF_UP)}}, color: "#AF4E96"},
                { label: "Suspendido",  data: {{round($data->get('alumnos.suspendido') *100/ $data->get('alumnos'),0,PHP_ROUND_HALF_UP)}}, color: "#DA5430"},
            
              ]
              @else
                  var data = [
                { label: "Estudiando",  data: 0, color: "#68BC31"},
                { label: "Egresado",  data: 0, color: "#2091CF"},
                { label: "Retirado",  data: 0, color: "#AF4E96"},
                { label: "Suspendido",  data: 0, color: "#DA5430"},
            
              ]
              @endif
              function drawPieChart(placeholder, data, position) {
                  $.plot(placeholder, data, {
                    series: {
                        pie: {
                            show: true,
                            tilt:0.8,
                            highlight: {
                                opacity: 0.25
                            },
                            stroke: {
                                color: '#fff',
                                width: 2
                            },
                            startAngle: 2
                        }
                    },
                    legend: {
                        show: true,
                        position: position || "ne", 
                        labelBoxBorderColor: null,
                        margin:[-30,15]
                    }
                    ,
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                 })
             }
             drawPieChart(placeholder, data);
            
             /**
             we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
             so that's not needed actually.
             */
             placeholder.data('chart', data);
             placeholder.data('draw', drawPieChart);
            
            
              //pie chart tooltip example
              var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
              var previousPoint = null;
            
              placeholder.on('plothover', function (event, pos, item) {
                if(item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent']+'%';
                        $tooltip.show().children(0).text(tip);
                    }
                    $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
                } else {
                    $tooltip.hide();
                    previousPoint = null;
                }
                
             });
            
                /////////////////////////////////////
                $(document).one('ajaxloadstart.page', function(e) {
                    $tooltip.remove();
                });
            
            
            
            
    
            
            
            
            })
</script>
@stop
