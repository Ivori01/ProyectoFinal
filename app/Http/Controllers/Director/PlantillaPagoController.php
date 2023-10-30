<?php

namespace App\Http\Controllers\Director;

use App\c;
use App\Concepto;
use App\Grado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PlantillaPago;

class PlantillaPagoController extends Controller
{

    public function getAll()
    {
        $deudas =PlantillaPago ::all();
        $output = array('rows' => array());
        foreach ($deudas as $deuda) {
          

            $actionButton = '<div class=" action-buttons">
            <a class="text-info"  data-target="#modal-pagos" href="#" data-toggle="modal" onclick="getPagos(' . "'" . route('Director.PlantillaPago.Show', ['id' => $deuda->id]) . "'" . ')">
            <i class="ace-icon fa fa-eye bigger-130"></i>
            </a>
                    <a class="text-danger"  data-target="#modal-destroy" href="" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.PlantillaPago.Destroy', ['id' => $deuda->id]) . "'" . ')">
                    <i class="ace-icon fa fa-trash bigger-130"></i>
                    </a>
                    </div>
        ';

            $output['rows'][] = array(
               $deuda->id,
               $deuda->nombre,
               $deuda->grado->nombre.' - ( '. $deuda->grado->datosNivel->nombre .' )',
               $deuda->anio,
               $deuda->pagos->count(),

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
        return  view('director.contabilidad.plantilla.index', ['conceptos' => Concepto::all(),'grados'=>Grado::all()]);
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
        $conceptos=$request->concepto??[];

        $plantilla=  PlantillaPago::create([
            'nombre'=>$request->nombre,
            'anio'=>$request->anio,
            'grado_id'=>$request->grado_id

        ]);

        if(count($conceptos)>=1){
            foreach($conceptos as $concepto){


                $plantilla->pagos()->create([
                    'pago_id'=>$concepto
                ]);
              

            }
        }

        return response()->json(['message'=>'Pantilla creada']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plantilla=PlantillaPago::find($id);
        $pagos=$plantilla->pagos;
        $table='';
        foreach($pagos as  $pago){
            $table.='<tr>
            <td>'.$pago->conceptoPagoInfo->descripcion.'</td>
            <td>'.  number_format($pago->conceptoPagoInfo->importe,2).'</td>
            </tr>';

        }

        return response()->json(['table'=>$table]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
           PlantillaPago::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }
    }


    public function getConceptos()
    {
        $conceptos =Concepto::all();
        $output = array('rows' => array());
        foreach ($conceptos as $concepto) {
            $output['rows'][] = array(
                    '<div class="form-group">
                    <div class="col-xs-12 col-sm-6">
                        <label class="position-relative">
                            <input type="checkbox" class="ace alum" value="' . $concepto->id . '" name="concepto[]" />
                            <span class="lbl"></span>
                        </label>
                    </div>
                    <span class="block input-icon input-icon-right">
                    </span>
                </div>

                           ',

                   $concepto->descripcion,
                   number_format($concepto->importe,2)
                   
                );
        }

        return response()->json($output);
    }
}
