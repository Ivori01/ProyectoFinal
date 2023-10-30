<?php

namespace App\Http\Controllers\Secretaria;

use App\Alumno;
use App\Caja;
use App\Descuento;
use App\Deuda;
use App\DeudaDescuento;
use App\Http\Controllers\Controller;
use App\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Info;
class CajaController extends Controller
{
    protected $school_info;
    public function __construct() 
    {
        // Fetch the Site Settings object
        $this->school_info =Info::find(1);
       
    }
    public function getAll()
    {

        $deudas = Caja::with(['deudaInfo'])->orderBy('fecha', 'desc')->get();
        $output = array('rows' => array());

        foreach ($deudas as $deuda) {

            $actionButton = '<div class=" action-buttons center">
               <a class="blue"  href="' . route('Secretaria.Caja.Invoice', ['id' => $deuda]) . '">
                    <i class="ace-icon fa fa-search-plus bigger-110 blue"></i>
                    </a>
                    <a class="text-success"  onclick="invoice(' . "'" . route('Secretaria.Caja.Invoice', ['id' => $deuda, 'print' => 1]) . "'" . ')">
                    <i class="ace-icon fas fa-print bigger-110 red"></i>
                    </a>
                    </div>
        ';

            $output['rows'][] = array(
                $deuda->deudaInfo->alumnoInfo->persona->nrodocumento,
                $deuda->deudaInfo->alumnoInfo->persona->apellidos . " " . $deuda->deudaInfo->alumnoInfo->persona->nombres,
                $deuda->deudaInfo->pagoInfo->descripcion,

                date("Y/m/d h:i:s a ", strtotime($deuda->fecha)),

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
        return view('secretaria.pago.caja', ['alumnos' => Alumno::all(), 'descuentos' => Descuento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function showTable(Request $request)
    {
        $deuda = Deuda::find($request->deuda)->pagoInfo;

        $cantidad         = $deuda->cantidad;
        $fechavencimiento = Carbon::parse($deuda->fechavencimiento)->lessThanOrEqualTo(new Carbon());

        $mora = "";
        if ($fechavencimiento == false) {
            $mora = "";
            # code...
        } else {
            $diasmora      = Carbon::parse($deuda->fechavencimiento)->diffInDays(new Carbon());
            $totaldiasmora = $diasmora * $deuda->mora_dia;
            $cantidad += $totaldiasmora;
            $dias = ($diasmora == 1) ? "dia de pago atrasado" : "dias de pago atrasados";

            $mora = ' <tr role="row" >
                                                       <td class="align-left">Mora por ' . $diasmora . " " . $dias . '  </td>
                                                       <td>' . $totaldiasmora . '</td>


                                                    </tr>';
        }

        $tr = '<tr role="row" >
                                                       <td class="align-left">' . $deuda->descripcion . '</td>
                                                       <td>' . $deuda->cantidad . '</td>


                                                    </tr>

                                                    ' . $mora;

        if ($request->has('descuento')) {
            //

            $descuentos = Descuento::find($request->descuento);

            foreach ($descuentos as $descuento) {
                $tr .= '<tr >
                                                       <td class="align-left">' . $descuento->descripcion . '</td>
                                                       <td class="center"> -' . $descuento->cantidad . '</td>



                                                    </tr>';

                $cantidad -= $descuento->cantidad;
            }
        }
        $table = '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                                                    <thead>
                                                        <tr>
                                                            <th class="center">Deuda</th>
                                                            <th>Cantidad</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                      ' . $tr . '


                                                    </tbody>
                                                <tfoot>    <tr>
                                                            <th class="align-right">Total</th>
                                                            <th class="center">'.$this->school_info->simbolo_moneda . $cantidad . '</th>

                                                        </tr></tfoot></table>';

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
        $caja = Caja::firstOrCreate(['deuda' => $request->deuda], [
            'fecha'     => Carbon::now(),
            'operacion' => 'Pago',
            'cajero'    => $request->user()->user,
        ]);

        $deuda         = Deuda::find($request->deuda);
        $deuda->estado = "Pagado";
        $deuda->save();

        if ($request->has('descuento')) {
            foreach ($request->descuento as $descuento) {
                $obj = new DeudaDescuento;

                $obj->deuda     = $request->deuda;
                $obj->descuento = $descuento;
                $obj->caja      = $caja->id;

                $obj->save();
            }
        }

        return response()->json(['message' => 'Registro agregado correctamente', 'print' => ' <a class="btn btn-app btn-purple my-1 text-white"  onclick="invoice(' . "'" . route('Director.Caja.Invoice', ['id' => $caja->id, 'print' => 1]) . "'" . ')">
                    <i class="d-block h-6 fas fa-print text-190 red"></i>
                    </a>']);
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

    public function invoice(Request $request, $id)
    {
        $data = [
            'foo' => 'bar',
        ];

        return view('Secretaria.pago.reportes.invoice', ['pago' => Caja::find($id)]);

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
}
