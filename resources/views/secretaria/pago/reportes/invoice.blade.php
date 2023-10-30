 @extends('layouts.secretaria',['title'=>'Secretaria | Caja - Boleta','headertitle'=>'Boleta','viewtitle'=>'ver','page'=>'Caja'])
 

@section('content')


  <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="space-6"></div>

                <div class="row">
                  <div class="col-sm-10 col-sm-offset-1">
                    <!-- #section:pages/invoice -->
                    <div class="widget-box transparent">
                      <div class="widget-header widget-header-large">
                        <h3 class="widget-title grey lighter">
                          <i class="ace-icon fa fa-leaf green"></i>
                   Boleta de pago - {{$pago->deudaInfo->pagoInfo->descripcion}}
                        </h3>

                        <!-- #section:pages/invoice.info -->
                        <div class="widget-toolbar no-border invoice-info">
                          <span class="invoice-info-label">Boleta:</span>
                          <span class="red"># {{$pago->id}}</span>

                          <br />
                          <span class="invoice-info-label">Fecha:</span>
                        <span class="blue">{{$pago->fecha->format('Y/m/d h:i:s a')}}</span>
                        </div>

                        <div class="widget-toolbar hidden-480">
                          <a href="#">
                            <i class="ace-icon fa fa-print"></i>
                          </a>
                        </div>

                        <!-- /section:pages/invoice.info -->
                      </div>

                      <div class="widget-body">
                        <div class="widget-main padding-24">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="row">
                                <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                  <b>Informacion colegio</b>
                                </div>
                              </div>

                              <div>
                                <ul class="list-unstyled spaced">
                                  <li>
                                    <i class="ace-icon fa fa-caret-right blue"></i>Street, City
                                  </li>

                                  <li>
                                    <i class="ace-icon fa fa-caret-right blue"></i>Zip Code
                                  </li>

                                  <li>
                                    <i class="ace-icon fa fa-caret-right blue"></i>State, Country
                                  </li>

                                  <li>
                                    <i class="ace-icon fa fa-caret-right blue"></i>
Phone:
                                    <b class="red">111-111-111</b>
                                  </li>

                                

                                
                                </ul>
                              </div>
                            </div><!-- /.col -->

                            <div class="col-sm-6">
                              <div class="row">
                                <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                  <b>Informacion alumno</b>
                                </div>
                              </div>

                              <div>
                                <ul class="list-unstyled  spaced">
                                  <li>
                                    <i class="ace-icon fa fa-caret-right green"></i>{{$pago->deudaInfo->alumnoInfo->persona->NombresApellidos}}
                                  </li>

                                  <li>
                                    <i class="ace-icon fa fa-caret-right green"></i>{{$pago->deudaInfo->alumnoInfo->persona->direccion}}
                                  </li>

                                  <li>
                                    <i class="ace-icon fa fa-caret-right green"></i>{{$pago->deudaInfo->alumnoInfo->persona->correo}}
                                  </li>

                                 

                                  <li>
                                    <i class="ace-icon fa fa-caret-right green"></i>
                                    {{$pago->deudaInfo->alumnoInfo->persona->celular}}
                                  </li>
                                </ul>
                              </div>
                            </div><!-- /.col -->
                          </div><!-- /.row -->

                          <div class="space"></div>

                          <div>
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th class="center">#</th>
                                  <th>Deuda</th>
                                  <th >Total</th>
                                 
                                </tr>
                              </thead>

                              <tbody>
@php $cont=1; @endphp
                                <tr>
                                  <td class="center">{{$cont}}</td>

                                  <td>
                                   {{$pago->deudaInfo->pagoInfo->descripcion}}
                                  </td>
                                  <td class="align-right" >
                                    {{$pago->deudaInfo->pagoInfo->cantidad}}.00
                                  </td>
                                  
                                </tr>
@php 
       $cantidad=$pago->deudaInfo->pagoInfo->cantidad;
$fechavencimiento = $pago->deudaInfo->pagoInfo->fechavencimiento->lessThanOrEqualTo($pago->fecha);

$mora="";
if ($fechavencimiento==true) {
  $cont++;
    $diasmora=$pago->deudaInfo->pagoInfo->fechavencimiento->diffInDays($pago->fecha);
    $totaldiasmora=$diasmora*$pago->deudaInfo->pagoInfo->mora_dia;
    $cantidad += $totaldiasmora;
$dias= ($diasmora==1) ? "dia de pago atrasado" : "dias de pago atrasados";

 echo    ' <tr role="row" ><td class="center">'.$cont.'</td>
                                                       <td class="align-left">Mora por '.$diasmora." ".$dias.'  </td>
                                                       <td class="align-right">'.$totaldiasmora.'.00</td>

                                                      
                                                    </tr>';
}

@endphp

@php

                   $descuentos=$pago->descuentos;
              
                   foreach ($descuentos as $descuento) {
                     $cont ++;
                                                      echo '<tr >
                                                      <td class="center">'.$cont.'</td>
                                                       <td class="align-left">'.$descuento->descuentoInfo->descripcion.'</td>
                                                       <td class="align-right"> - '.$descuento->descuentoInfo->cantidad.'.00</td>


                                                      
                                                    </tr>';
                                                 

                                                    $cantidad-=$descuento->descuentoInfo->cantidad;
                                                   
                                                    } 
@endphp
                          
                              </tbody>
                            </table>
                          </div>

                          <div class="hr hr8 hr-double hr-dotted"></div>

                          <div class="row">
                            <div class="col-sm-5 pull-right">
                              <h4 class="pull-right">
                                Total  :
                                <span class="red">S/{{$cantidad}}.00</span>
                              </h4>
                            </div>
                            <div class="col-sm-7 pull-left">  </div>
                          </div>

                          <div class="space-6"></div>
                          <div class="well">
                        Gracias por  elegirnos.
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- /section:pages/invoice -->
                  </div>
                </div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->

@stop



@section('script')
<script src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>

  <script src="{{ asset('assets/js/wizard.min.js')}}"></script>  <script src="{{ asset('assets/js/initinput.js')}}"></script>

  <script type="text/javascript">
  var myTable;   
  var routeUpdate;  
  jQuery(function($) {

    $('.footer').html('');


  


  $('#menu-caja').addClass('active open');        
  $('#menu-caja-boleta').addClass('active').removeClass('hide');   
 

  })

  


  </script>
@if (isset($_GET["print"]) )
<script type="text/javascript">

  window.print();


</script>

 @endif
@stop