<?php

namespace App\Http\Controllers\Alumno;

use App\CuentaPorCobrar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use PDF;
use App\Info;
use Carbon\Carbon;

class DeudaController extends Controller
{
    protected $school_info;
    public function __construct() 
    {
        // Fetch the Site Settings object
        $this->school_info =Info::find(1);
       
    }

    public function getAll()
    {
        $deudas = CuentaPorCobrar::with(['conceptoPagoInfo'])->where(['alumno' => auth()->user()->persona->alumno->id])->orderBy('estado')->get();
        $output = array('rows' => array());
        $total=0;
        foreach ($deudas as $deuda) {
            $href = "#";
            switch ($deuda->estado) {
                case 'Pendiente':
                    $estado = '<span class="badge badge-danger arrowed-in">Pendiente</span>';
                    break;

                case 'Pagado':
                    $estado = '<span class="badge badge-success arrowed-in">Pagado</span>';
                    $href   = route('Alumno.Deuda.Invoice', ['id' => $deuda->id]);
                    break;
            }

     

            $output['rows'][] = array(
                $deuda->conceptoPagoInfo->descripcion,
                $this->school_info->simbolo_moneda . $deuda->conceptoPagoInfo->importe,
                 $this->school_info->simbolo_moneda  . $deuda->conceptoPagoInfo->mora_dia,
                $deuda->conceptoPagoInfo->fechavencimiento->format('Y/m/d h:i:s a'),
                $deuda->conceptoPagoInfo->anio,
                $estado,
             

            );
        }

        return response()->json($output);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deudas = CuentaPorCobrar::with(['conceptoPagoInfo'])->where(['alumno' => auth()->user()->persona->alumno->id])->orderBy('estado','desc')->get();
        $total=0;
        foreach($deudas->where('estado','Pendiente') as $deuda){
            $cantidad         = $deuda->conceptoPagoInfo->importe;
          
            $fechavencimiento = Carbon::parse($deuda->fechavencimiento)->lessThanOrEqualTo(new Carbon());
    
        
            if ($fechavencimiento == false) {
            
            } else {
                $diasmora      = Carbon::parse($deuda->fechavencimiento)->diffInDays(new Carbon());
                $totaldiasmora = $diasmora * $deuda->mora_dia;
                $cantidad += $totaldiasmora;

            }

            $total+=$cantidad;
        }
  
        return view('alumno.pago.deuda',['deudas'=>$deudas,'total'=>$total]);
    }

    public function invoice($deuda)
    {
        $deuda = Deuda::findOrFail($deuda);
        $this->authorize('owner', $deuda);

        if ($deuda->cajaInfo) {

        $header = '
<!DOCTYPE html>
<html>
  <head><style type="text/css">p { color: grey; }</style></head>
  <body  ><p><img src="' . asset('assets/texto.png') . '" style="width:100%;" height="70"> </p>
  </body>
</html>';

        $footer = '
<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
  <head><style type="text/css">p { color: grey; }</style></head>
  <body style=""><p>
Copyright © Todos los derechos reservados - Augenblick</p></body>
</html>';
        $options = [
            'footer-html' => $footer,
            'header-html' => $header,
        ];

        return PDF::loadView('alumno.pago.reportes.invoice', ['pago' => $deuda->cajaInfo])
        ->setOption('footer-html', $footer)->setOption('enable-javascript',true)
        ->setOption('footer-right', 'Página [page] de [topage]')->stream('githmub.pdf');
        //return $pdf->inline();
            return view('alumno.pago.reportes.invoice', ['pago' => $deuda->cajaInfo]);
        } else {
            abort(404);
        }
    }

}
