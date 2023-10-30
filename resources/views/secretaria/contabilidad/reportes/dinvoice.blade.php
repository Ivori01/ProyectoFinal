@extends('layouts.print',['title'=>'Director | Caja - Comprobante de pago'])


@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-12 col-lg-10 offset-lg-1">
           {{--  <div class="row">
                <div class="col-12">
                    <div class="text-center text-150">
                        <i class="fa fa-leaf fa-2x text-success-m2 mr-1">
                        </i>
                        <span class="text-default-d3">
                            Ace Company
                        </span>
                        <span class="text-grey-m1 text-60 align-bottom">
                            Since 1995
                        </span>
                    </div>
                </div>
            </div> --}}
            <!-- .row -->
            <hr class="row brc-default-l1 mx-n1 mb-4">
                <div class="row ">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-600 text-110 text-blue align-middle">
                                {{$pago->deudaInfo->alumnoInfo->persona->NombresApellidos}}
                            </span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                {{$pago->deudaInfo->alumnoInfo->persona->direccion}}
                            </div>
                            <div class="my-1">
                                {{$pago->deudaInfo->alumnoInfo->persona->correo}}
                            </div>
                            <div class="my-1">
                                <i class="fa fa-phone fa-flip-horizontal text-secondary">
                                </i>
                                <b class="text-600">
                                    {{$pago->deudaInfo->alumnoInfo->persona->celular}}
                                </b>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="text-95 col-sm-6 align-self-start  justify-content-end">
                        <hr class="d-sm-none">
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Comprobante de pago {{$pago->deudaInfo->pagoInfo->descripcion}}
                                </div>
                                <div class="my-2">
                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1">
                                    </i>
                                    <span class="text-600 text-90">
                                        NRO:
                                    </span>
                                    # {{$pago->id}}
                                </div>
                                <div class="my-2">
                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1">
                                    </i>
                                    <span class="text-600 text-90">
                                        Fecha pago:
                                    </span>
                                    {{$pago->fecha->format('Y/m/d h:i:s a')}}
                                </div>
                                {{--
                                <div class="my-2">
                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1">
                                    </i>
                                    <span class="text-600 text-90">
                                        Status:
                                    </span>
                                    <span class="badge badge-warning badge-pill px-25">
                                        Unpaid
                                    </span>
                                </div>
                                --}}
                            </div>
                        </hr>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="mt-4 mb-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none bgc-default-tp1">
                                <tr class="text-white">
                                    <th class="opacity-2">
                                        #
                                    </th>
                                    <th class="text-left">
                                        Detalle
                                    </th>
                                    <th class="text-right">
                                        Monto
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-95 text-secondary-d3">
                                @php
                        $cont=1; 
                    @endphp
                                <tr>
                                    <td>
                                        {{$cont}}
                                    </td>
                                    <td>
                                        {{$pago->deudaInfo->pagoInfo->descripcion}}
                                    </td>
                                    <td class="text-right">
                                        {{$pago->deudaInfo->pagoInfo->cantidad}}
                                    </td>
                                </tr>
                                @php
                    $cantidad=$pago->deudaInfo->pagoInfo->cantidad;
                    $fechavencimiento = optional($pago->deudaInfo->pagoInfo->fechavencimiento)->lessThanOrEqualTo($pago->fecha);
                    $mora="";
                    if ($fechavencimiento==true) {
                    $cont++;
                    $diasmora=$pago->deudaInfo->pagoInfo->fechavencimiento->diffInDays($pago->fecha);
                    $totaldiasmora=$diasmora*$pago->deudaInfo->pagoInfo->mora_dia;
                    $cantidad += $totaldiasmora;
                    $dias= ($diasmora==1) ? "dia de pago atrasado" : "dias de pago atrasados";
                    echo    '
                                <tr>
                                    <td>
                                        '.$cont.'
                                    </td>
                                    <td>
                                        Mora por '.$diasmora." ".$dias.'
                                    </td>
                                    <td class="text-right">
                                        '.$totaldiasmora.'
                                    </td>
                                </tr>
                                ';
                    }
                    @endphp
                    @php

                    $descuentos=$pago->descuentos;
                    $odd='';
                    foreach ($descuentos as $descuento) {
                    $cont ++;
                    if ($cont%2==0) {
                    $odd='bgc-default-l4';
                    } else {
                    $odd='';
                    }

                    echo '
                                <tr>
                                    <td>
                                        '.$cont.'
                                    </td>
                                    <td>
                                        '.$descuento->descuentoInfo->descripcion.'
                                    </td>
                                    <td class="text-right">
                                        - '.$descuento->descuentoInfo->cantidad.'
                                    </td>
                                </tr>
                                ';

                    $cantidad-=$descuento->descuentoInfo->cantidad;

                    }
                    @endphp
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-0  ml-0">
                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            {{--
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1">
                                        $2,250
                                    </span>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Tax (10%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">
                                        $225
                                    </span>
                                </div>
                            </div>
                            --}}
                            <div class="row text-right mr-0" style="margin-left:550px">
                               
                                    <table class=" table table-bordered invoice-table-total">
                                        <tbody>
                                          
                                            <tr >
                                                <td class="text-bold text-right unborder" >
                                                    Total 
                                                </td>
                                                <td class="text-bold text-right text-success-d3" width="150">
                                                     {{$school_info->simbolo_moneda}} {{$cantidad}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                               
                             
                            </div>
                        </div>
                    </div>
                    <hr>
                        <div>
                            <span class="text-secondary-d1 text-105">
                                Gracias
                            </span>
                            {{--
                            <a class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" href="#">
                                Pay Now
                            </a>
                            --}}
                        </div>
                    </hr>
                </div>
            </hr>
        </div>
    </div>
</div>
@if (isset($_GET["print"]) )
{{  $_GET["print"]}}
@endif


@endsection



@section('script')
@if (isset($_GET["print"]) )
<script type="text/javascript">
    window.print();
</script>
@endif
<script src="{{ asset('assets/js/jquery-ui.min.js')}}">
</script>
<script src="{{ asset('assets/js/wizard.min.js')}}">
</script>
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
<script type="text/javascript">
    var myTable;   
  var routeUpdate;  
  jQuery(function($) {

    $('.footer').html('');


  


  $('#menu-caja').addClass('active open');        
  $('#menu-caja-boleta').addClass('active').removeClass('hide');   
 

  })
</script>



@stop
