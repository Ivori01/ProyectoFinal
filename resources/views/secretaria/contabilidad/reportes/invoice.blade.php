<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>
            Comprobante de pago
        </title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <link href="{{ asset('assets/logo - copia.png')}}" rel="icon" type="image/x-icon"/>
        <link href="{{ asset('assets/css/invoice.css') }}" rel="stylesheet">
        </link>
    </head>
</html>
<style type="text/css">
    @if (isset($_GET["print"]) )

#container {
  font: normal 13px/1.4em 'Open Sans', Sans-serif;
  margin: 0 auto;
  min-height: 800px;
  position: relative;
}

.right-invoice {
  padding: 40px 30px 40px 130px;
  min-height: 1040px;
}

#invoice-title-number #title {
  display: inline-block;
  background: #415472;
  color: white;
  font-size: 30px;
  padding: 7px;
  font-family: Sanchez, Serif;
  line-height: 1em;
}

.left-stripes .circle.c-upper {
  top: 400px;
}
.left-stripes .circle.c-lower {
  top: 690px;
}

@endif
</style>
<body>
    <div id="container">
        <div class="left-stripes">
            <div class="circle c-upper">
            </div>
            <div class="circle c-lower">
            </div>
        </div>
        <div class="right-invoice">
            <section id="memo">
                <div class="company-info">
                    <div>
                        {{ $info->nombre }}
                    </div>
                    <br>
                        <span>
                            {{ $info->direccion }}
                        </span>
                        <span>
                            | Código Postal {{  $info->postal}}
                        </span>
                        <br>
                            <span>
                                {{ $info->telefono }}
                            </span>
                            <br>
                                <span>
                                    {{ $info->mail }}
                                </span>
                            </br>
                        </br>
                    </br>
                </div>
                <div class="logo">
                    <img height="60" src="{{ asset('assets/logo.png') }}" width="200"/>
                </div>
            </section>
            <section id="invoice-title-number">
                <div class="title-top">
                    {{--
                    <span class="x-hidden">
                        {issue_date_label}
                    </span>
                    --}}
                    <span>
                        {{ $pago->fecha }}
                    </span>
                    {{--
                    <span id="number">
                        {invoice_number}
                    </span>
                    --}}
                </div>
                <div id="title">
                    Comprobante de pago
                </div>
            </section>
            <section id="client-info">
                <span>
                    Cliente
                </span>
                @php
          $total=0;
              $cliente=$pago->clienteInfo->persona;
          @endphp
                <div class="client-name">
                    <span>
                        {{ $cliente->nombres }}  {{ $cliente->apellidos }}
                    </span>
                </div>
                {{--
                <div class="client-name">
                    <span>
                        {{ $cliente->apellidos }}
                    </span>
                </div>
                --}}
                <div>
                    <span>
                        {{ $cliente->direccion }}
                    </span>
                </div>
                <div>
                    <span>
                        {{ $cliente->celular }}
                    </span>
                </div>
                <div>
                    <span>
                        {{ $cliente->correo }}
                    </span>
                </div>
                {{--
                <div>
                    <span>
                        {client_other}
                    </span>
                </div>
                --}}
            </section>
            <div class="clearfix">
            </div>
            <section id="invoice-info">
                <div>
                    <span>
                        {{-- {net_term_label} --}}
                    </span>
                    <span>
                        {{-- {net_term} --}}
                    </span>
                </div>
                <div>
                    <span>
                        {{-- {due_date_label} --}}
                    </span>
                    <span>
                        {{-- {due_date} --}}
                    </span>
                </div>
                <div>
                    <span>
                        {{-- {po_number_label --}}
                    </span>
                    <span>
                        {{-- {po_number} --}}
                    </span>
                </div>
            </section>
            <div class="clearfix">
            </div>
            <div class="currency">
                {{--
                <span>
                    {currency_label}
                </span>
                <span>
                    {currency}
                </span>
                --}}
            </div>
            <section id="items">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th>
                            #
                        </th>
                        <!-- Dummy cell for the row number and row commands -->
                        <th>
                            Descripcion
                        </th>
                        <th>
                            Importe
                        </th>
                        <th>
                            Descuento
                        </th>
                        <th>
                            Moras
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                    @foreach ($pago->detalles as $deuda )

            @php
            $totalthis=0;

            $cantidad         = $deuda->deudaInfo->conceptoPagoInfo->importe ;
            $fechavencimiento = $deuda->deudaInfo->conceptoPagoInfo->fechavencimiento
                                     ->lessThanOrEqualTo($pago->fecha);
            $totaldiasmora=0;
            if ($fechavencimiento == true) {

                $diasmora      = $deuda->deudaInfo->conceptoPagoInfo->fechavencimiento->diffInDays($pago->fecha);
                $totaldiasmora = $diasmora * $deuda->deudaInfo->conceptoPagoInfo->mora_dia;
               
            }

            $total_descuentos = 0;
            foreach ($deuda->deudaInfo->descuentos as $descuento) {

                $total_descuentos += $descuento->descuentoInfo->cantidad;

            }
            $totalthis=$cantidad+$totaldiasmora-$total_descuentos;
            $total += $totalthis;
           
            @endphp
                    <tr data-iterate="item">
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <!-- Don't remove this column as it's needed for the row commands -->
                        <td>
                            {{ $deuda->deudaInfo->conceptoPagoInfo->descripcion }}
                        </td>
                        <td>
                            {{ $deuda->deudaInfo->conceptoPagoInfo->importe }}
                        </td>
                        <td>
                            - {{ $total_descuentos }}
                        </td>
                        <td>
                            + {{ $totaldiasmora }}
                        </td>
                        <td>
                            {{ $totalthis }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </section>
            <section id="sums">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th>
                            Subtotal
                        </th>
                        <td>
                            {{$school_info->simbolo_moneda}} {{ round($total*(100/118),2) }}
                        </td>
                    </tr>
                    <tr data-iterate="tax">
                        <th>
                            IGV
                        </th>
                        <td>
                            {{$school_info->simbolo_moneda}} {{round($total*(18/118),2)   }}
                        </td>
                    </tr>
                    <tr class="amount-total">
                        <!-- {amount_total_label} -->
                        <td colspan="2">
                            {{$school_info->simbolo_moneda}} {{ $total }}
                        </td>
                    </tr>
                    <!-- You can use attribute data-hide-on-quote="true" to hide specific information on quotes.
                 For example Invoicebus doesn't need amount paid and amount due on quotes  -->
                    {{--
                    <tr data-hide-on-quote="true">
                        <th>
                            {amount_paid_label}
                        </th>
                        <td>
                            {amount_paid}
                        </td>
                    </tr>
                    <tr class="due-amount" data-hide-on-quote="true">
                        <th>
                            {amount_due_label}
                        </th>
                        <td>
                            {amount_due}
                        </td>
                    </tr>
                    --}}
                </table>
            </section>
            <div class="clearfix">
            </div>
            {{--
            <section id="terms">
                <span>
                    {terms_label}
                </span>
                <div>
                    {terms}
                </div>
            </section>
            --}}
               {{--
            <div class="payment-info">
                <div>
                    {payment_info1}
                </div>
                <div>
                    {payment_info2}
                </div>
                <div>
                    {payment_info3}
                </div>
                <div>
                    {payment_info4}
                </div>
                <div>
                    {payment_info5}
                </div>
            </div>
            --}}
        </div>
    </div>
</body>
@if (isset($_GET["print"]) )
<script type="text/javascript">
    window.print();
</script>
@endif
