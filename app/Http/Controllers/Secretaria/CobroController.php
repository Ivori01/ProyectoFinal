<?php

namespace App\Http\Controllers\Secretaria;

use App\Alumno;
use App\Cobro;
use App\CobroDetalle;
use App\CuentaPorCobrar;
use App\Descuento;
use App\Http\Controllers\Controller;
use App\Info;
use App\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;  
use Storage;  

//use Knp\Snappy\Pdf;
class CobroController extends Controller
{
    protected $school_info;
    public function __construct() 
    {
        // Fetch the Site Settings object
        $this->school_info =Info::find(1);
       
    }
    public function getAll()
    {

        $cobros = Cobro::with(['deudaInfo'])->orderBy('fecha', 'desc')->get();
        $output = array('rows' => array());

        foreach ($cobros as $cobro) {

            $td_cobrados = '';
            foreach ($cobro->detalles as $deuda) {  
                $td_cobrados .= '<li>' . $deuda->deudaInfo->conceptoPagoInfo->descripcion . '</li>';

            }
            $actionButton = '<div class=" action-buttons center">

                     <a class="text-success" target="_blank" href="' . route('Secretaria.Cobro.Print', ['caja' => $cobro]) . '"   >
        <i class="fas fa-file-invoice text-150"></i>
        </a>

                    </div>
        ';
/*  <a class="blue"  href="' . route('Director.Cobro.Invoice', ['id' => $deuda]) . '">
<i class="ace-icon fa fa-search-plus bigger-110 blue"></i>
</a>
<a class="text-success" href="#" onclick="invoice(' . "'" . route('Director.Cobro.Invoice', ['id' => $deuda, 'print' => 1]) . "'" . ');return false;">
<i class="ace-icon fas fa-print bigger-110 "></i>
</a>*/
            $output['rows'][] = array(
                $deuda->id,
                $deuda->deudaInfo->alumnoInfo->persona->nrodocumento,
                $deuda->deudaInfo->alumnoInfo->persona->ApellidosNombres,
                $td_cobrados,
                $this->school_info->simbolo_moneda.round($cobro->importe, 2),
                $cobro->fecha->format("Y/m/d h:i:s a "),
                $actionButton,

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
        return view('secretaria.contabilidad.cobro.create', ['alumnos' => Alumno::all()]);
    }

 

    public function showTable(Request $request)
    {

        $total = 0;
        $i     = 1;
        $tr    = '';
        foreach ($request->deuda as $deuda) {
            $CuentaPorCobrar  = CuentaPorCobrar::find($deuda);
            $deuda            = $CuentaPorCobrar->conceptoPagoInfo;
            $cantidad         = $deuda->importe;
            $fechavencimiento = Carbon::parse($deuda->fechavencimiento)->lessThanOrEqualTo(new Carbon());

            $mora = "";
            if ($fechavencimiento == true) {

                $diasmora      = Carbon::parse($deuda->fechavencimiento)->diffInDays(new Carbon());
                $totaldiasmora = $diasmora * $deuda->mora_dia;
                $cantidad += $totaldiasmora;
                //$dias = ($diasmora == 1) ? "dia de pago atrasado" : "dias de pago atrasados";
                $mora = '<span class="badge badge-lg badge-danger ">Moras  '.$this->school_info->simbolo_moneda . $totaldiasmora . '</span>';
            }

            $descuentos = Descuento::find($request->descuento);

            $total_descuentos = 0;
            foreach ($CuentaPorCobrar->descuentos as $descuento) {

                $total_descuentos += $descuento->descuentoInfo->cantidad;

            }

            $cantidad -= $total_descuentos;
            $total += $cantidad;
            $td_desc = '<span class="badge badge-lg badge-success ">Descuentos  -'. $this->school_info->simbolo_moneda . $total_descuentos . '</span>';

            $tr .= '<tr role="row" >
                      <td>' . $i . '</td>
                      <td class="text-left">' . $deuda->descripcion . '</td>
                      <td>'.$this->school_info->simbolo_moneda . $deuda->importe . '</td>
                      <td>' . $mora . $td_desc . '</td>
                      <td> '.$this->school_info->simbolo_moneda . $cantidad . '</td>
                     </tr>';
            $i++;
        }

        $table = '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="center">Detalle</th>
                            <th>Importe</th>
                            <th>Otros</th>
                            <th>Deuda</th>
                        </tr>
                    </thead>

                    <tbody>
                      ' . $tr . '
                    </tbody>

                    <tfoot>
                      <tr>
                        <th class="text-right" colspan="4">Total</th>
                        <th class="text-left">'.$this->school_info->simbolo_moneda . $total . '</th>
                      </tr>
                    </tfoot>
                  </table>';

        return response()->json(['tabla' => $table, $fechavencimiento]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cobro = Cobro::create([
            'fecha'  => Carbon::now(),
            'cajero' => $request->user()->user,
        ]);

        $total     = 0;
        $apoderado = null;
        foreach ($request->deuda as $deuda) {

            $CuentaPorCobrar         = CuentaPorCobrar::find($deuda);
            $CuentaPorCobrar->estado = "Pagado";
            $CuentaPorCobrar->save();

            $apoderado = $CuentaPorCobrar->alumnoInfo->apoderado;
            $detalle   = CobroDetalle::create([
                'id_cobro' => $cobro->id,
                'id_deuda' => $CuentaPorCobrar->id,

            ]);

            $deuda            = $CuentaPorCobrar->conceptoPagoInfo;
            $cantidad         = $deuda->importe;
            $fechavencimiento = Carbon::parse($deuda->fechavencimiento)->lessThanOrEqualTo(new Carbon());

            if ($fechavencimiento == true) {

                $diasmora      = Carbon::parse($deuda->fechavencimiento)->diffInDays(new Carbon());
                $totaldiasmora = $diasmora * $deuda->mora_dia;
                $cantidad += $totaldiasmora;
            }

            $descuentos = Descuento::find($request->descuento);

            $total_descuentos = 0;
            foreach ($CuentaPorCobrar->descuentos as $descuento) {

                $total_descuentos += $descuento->descuentoInfo->cantidad;

            }
            $cantidad -= $total_descuentos;
            $total += $cantidad;

        }

        $cobro->importe = $total;
        $cobro->cliente=$apoderado;
        $cobro->save();

        return response()->json(['message' => 'Registro agregado correctamente', 'print' => ' <a class="btn btn-app btn-default my-1 text-white"  onclick="invoice(' . "'" . route('Secretaria.Cobro.Invoice', ['id' => $cobro->id, 'print' => 1]) . "'" . ')">
                    <i class="d-block h-6 fas fa-print text-190 red"></i>
                    </a>', ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdfg()
    {
//return view('admin.pago.reportes.pdf');

//return SnappyImage::loadView('admin.pago.reportes.pdf')->setOption('quality', 100)->inline();

        $pdf = PDFv::loadView('director.pago.reportes.pdf1');
        ///return $pdf->stream('document.pdf');

        $data = [
            'foo' => 'bar',
        ];

        header('Set-Cookie: fileDownload=true; path=/');
        header('Cache-Control: max-age=60, must-revalidate');

        return PDFv::loadView('director.pago.reportes.invoice')->setPaper('a4')->setOption('margin-bottom', 0)->download('github.pdf');
    }

    public function invoice(Request $request, $id)
    {
        $data = [
            'foo' => 'bar',
        ];

        return view('director.contabilidad.reportes.invoice', ['pago' => Cobro::find($id), 'info' => Info::find(1)]);

    }

    public function SearchLive(Request $request)
    {

        /*  $tags = Deuda::where('alumnoInfo.persona.nrodocumento', 'like', '%' . $request->q . "%")->where("estado", 'Pendiente')->limit(10)->get();*/

        $tags = Persona::where('nrodocumento', 'like', '%' . $request->q . "%")->limit(100)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            /*$formatted_tags[] = ['id' => $tag->alumnoInfo->persona->nrodocumento, 'text' => $tag->alumnoInfo->persona->nombres . ' ' . $tag->alumnoInfo->persona->apellidos, 'img' => $tag->alumnoInfo->persona->foto];*/

            if ($tag->alumno) {

                if ($tag->alumno->count() > 0) {
                    $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->nombres . ' ' . $tag->apellidos, 'nrodocumento' => $tag->nrodocumento, 'img' => $tag->foto];
                }
            }
        }

        $arrayName = array('data' => $formatted_tags, 'pagination' => array("more" => 'true'));

        return response()->json($arrayName);

    }

    public function printInvoice($caja)
    {
$school_info = Info::find(1);
$header      = view('components.pdf.header')->render();

$footer = view('components.pdf.footer')->render();
        $options = [
            'footer-html' => $footer,
            'header-html' => $header,
        ];

        return PDF::loadView('director.contabilidad.reportes.invoice', ['pago' => Cobro::find($caja), 
        'info' => Info::find(1)])->setOption('footer-html', $footer)->setOption('enable-javascript', true)->setOption('footer-right', 'Página [page] de [topage]')
            ->setOption('margin-top', '0mm')
            ->setOption('margin-right', '0mm')
            ->setOption('margin-left', '0mm')->stream('comprobante de pago.pdf');
        //return $pdf->inline();
    }
}
