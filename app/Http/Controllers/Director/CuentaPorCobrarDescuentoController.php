<?php

namespace App\Http\Controllers\Director;

use App\CuentaPorCobrar;
use App\CuentaPorCobrarDescuento;
use App\Descuento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Info;
class CuentaPorCobrarDescuentoController extends Controller
{
    protected $school_info;
    public function __construct() 
    {
        // Fetch the Site Settings object
        $this->school_info =Info::find(1);
       
    }
    public function getAll()
    {
        $deudas = CuentaPorCobrar::where('estado', 'Pendiente')->get();
        $output = array('rows' => array());
        foreach ($deudas as $deuda) {
            $actionButton = '
        <a  onclick="editDescuentos(' . "'" . route("Director.Cuenta.Descuentos", ["cuenta" => $deuda]) . "'" . ')" data-target="#modal-asignar" href="#" data-toggle="modal" class="btn px-45 btn-dark btn-sm radius-round mb-1">Asignar</a>  ';

            $descuentos = $deuda->descuentos;

            $total_descuentos = 0;
            foreach ($descuentos as $descuento) {
                $total_descuentos += $descuento->descuentoInfo->cantidad;
            }

            $output['rows'][] = array(
                $deuda->alumnoInfo->persona->nrodocumento,
                $deuda->alumnoInfo->persona->apellidos . " " . $deuda->alumnoInfo->persona->nombres,
                $deuda->conceptoPagoInfo->descripcion,
                $this->school_info->simbolo_moneda . $deuda->conceptoPagoInfo->importe,
                '<span class="badge bgc-success text-80 text-white mr-1">
            - '.$this->school_info->simbolo_moneda   . $total_descuentos . '
            </span>',
                $actionButton,

            );
        }
        return response()->json($output);
    }

    public function getDescuentos($cuenta)
    {
        $descuentos = "";
        $deuda      = CuentaPorCobrar::find($cuenta);

        $i = 0;

        foreach ($deuda->descuentos as $descuento) {
            $selected = "";

            $i++;

            $selected = '<tr descuento="row" class="odd">
                            <td>' . $i . '</td>
                            <td>' . $descuento->descuentoInfo->descripcion . '</td>
                            <td>'. $this->school_info->simbolo_moneda. $descuento->descuentoInfo->cantidad . '</td>
                            <td >
                                <a class="text-danger" href="#" data-toggle="modal" onclick="destroyDescuento(' . "'" . route('Director.CuentaDescuento.Destroy', ['id' => $descuento]) . "'" . ')" >
                                <i class="ace-icon fa fa-trash bigger-130"></i>
                                </a>
                            </td>
                        </tr>';

            $descuentos .= $selected;
        }
        if ($i == 0) {
            $descuentos = '<tr> <td class="center" colspan="4" >Sin descuentos asignados</td></tr>';
        }
        $descuentos = '
                    <table  class="table table-striped table-bordered table-hover dataTable no-footer" descuento="grid" aria-describedby="sample-table-2_info">
                        <thead>
                            <th>#</th>
                            <th>Descuento</th>
                            <th>Importe</th>
                            <th></th>
                        </thead>

                        <tbody>
                            <input type="hidden" name="id_cta_cobrar"  value="' . $deuda->id . '">
                            ' . $descuentos .
            '</tbody>
                    </table>';

        return response()->json(['descuentos' => $descuentos]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.contabilidad.descuento-asignar', ['descuentos' => Descuento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CuentaPorCobrarDescuento::firstOrCreate($request->only('descuento','id_cta_cobrar'));
        $ruta=route('Director.Cuenta.Descuentos',['cuenta'=>$request->id_cta_cobrar]);
        return response()->json(['message' => 'Registro agregado correctamente','ruta'=>$ruta]);
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
        $descuento=CuentaPorCobrarDescuento::find($id);
        $ruta=route('Director.Cuenta.Descuentos',['id'=>$descuento->cuentaInfo->id]);
        $descuento->delete();
        return response()->json(['message'=>'Registro eliminado correctamente','ruta'=>$ruta]);
    }
}
