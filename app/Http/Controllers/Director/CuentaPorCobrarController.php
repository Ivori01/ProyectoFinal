<?php

namespace App\Http\Controllers\Director;

use App\Alumno;
use App\AnioAcademico;
use App\Concepto;
use App\CuentaPorCobrar;
use App\Http\Controllers\Controller;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\Seccion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Info;
use Carbon\Carbon;
use PDF;

class CuentaPorCobrarController extends Controller
{
    protected $seccion;

    protected $grado;
    protected $school_info;


    public function __construct(SeccionRepository $seccion, GradoRepository $grado)
    {
        $this->seccion = $seccion;
        $this->school_info =Info::find(1);
        $this->grado = $grado;
    }
    public function getAll()
    {
        $deudas = CuentaPorCobrar::with(['conceptoPagoInfo', 'alumnoInfo'])->orderBy('estado', 'desc')->get();
        $output = array('rows' => array());
        foreach ($deudas as $deuda) {
            switch ($deuda->estado) {
                case 'Pendiente':
                    $estado = '<span class="badge badge-danger arrowed-in">Pendiente</span>';
                    break;

                default:
                    $estado = '<span class="badge badge-success arrowed-in">Pagado</span>';
                    break;
            }

            $actionButton = '<div class=" action-buttons">
                    <a class="text-danger"  data-target="#modal-destroy" href="" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.CuentaPorCobrar.Destroy', ['id' => $deuda->id]) . "'" . ')">
                    <i class="ace-icon fa fa-trash bigger-130"></i>
                    </a>
                    </div>
        ';

            $output['rows'][] = array(
                $deuda->id,
                $deuda->alumnoInfo->persona->nrodocumento,
                $deuda->alumnoInfo->persona->apellidos . " " . $deuda->alumnoInfo->persona->nombres,
                $deuda->conceptoPagoInfo->descripcion,
                $this->school_info->simbolo_moneda. $deuda->conceptoPagoInfo->importe,
                $this->school_info->simbolo_moneda  . $deuda->conceptoPagoInfo->mora_dia,
                $deuda->conceptoPagoInfo->fechavencimiento->format('d-m-Y'),
                $deuda->conceptoPagoInfo->anio,
                $estado,
                $actionButton,

            );
        }

        return response()->json($output);
    }

    public function getAlumno()
    {
        $alumnos = Alumno::with('persona')->get();
        $output  = array('rows' => array());
        foreach ($alumnos as $alumno) {
            $output['rows'][] = array(
                '
<label>
                          <input type="checkbox" class="align-middle alum" autocomplete="off" value="' . $alumno->id . '"  name="alumno[]" >
                        </label>

                                                    ',
                $alumno->persona->nrodocumento,
                $alumno->persona->apellidos . " " . $alumno->persona->nombres,
                $alumno->estadoacademico,

            );
        }

        return response()->json($output);
    }

    public function getSeccion()
    {
        $anios  = AnioAcademico::with(['secciones.datosGrado', 'datosPlanAcademico'])->where('estado', 'Activo')->get();
        $output = array('rows' => array());
        foreach ($anios as $anio) {
            foreach ($anio->secciones as $seccion) {
                $output['rows'][] = array(
                    '
<div class="form-group">


<div class="col-xs-12 col-sm-6">
<label class="position-relative">
    <input type="checkbox" class="ace alum" value="' . $seccion->id . '"  name="seccion[]" />
    <span class="lbl"></span>
</label>
</div>
<span class="block input-icon input-icon-right">
</span>
</div>
                           ',

                  $seccion->datosGrado->nombre,
                    $this->seccion->letra($seccion->letra),
                    $seccion->datosGrado->DatosNivel['nombre'],
                    $anio->anio,
                );
            }
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
        return view('director.contabilidad.cuenta-por-cobrar', ['conceptos' => Concepto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CuentaPorCobrar::create($request->all());

        if (!empty($request->alumno)) {
            $alumnos = $request->alumno;

            foreach ($alumnos as $alumno) {
                $valid = CuentaPorCobrar::where(['id_concepto' => $request->concepto, 'alumno' => $alumno])->count();
                if ($valid == 0) {
                    CuentaPorCobrar::Create(
                        [
                            "id_concepto" => $request->concepto,
                            "alumno"      => $alumno,
                            "estado"      => "Pendiente",
                        ]
                    );
                }
            }
        } else {
            return response()->json(['message' => 'No se  ha  seleccionado  ningun alumno', 'success' => false], 422);
        }

        return response()->json(['message' => 'Registro agregado correctamente', 'success' => true]);
        // return response()->json(['message' =>'Registro agregado correctamente','success'=>true  ]);
    }

    public function store2(Request $request)
    {
        if (!empty($request->seccion)) {
            foreach ($request->seccion as $seccion) {
                $alumnos = Seccion::find($seccion)->Alumnos;

                foreach ($alumnos as $alumno) {
                    $valid = CuentaPorCobrar::where(['id_concepto' => $request->concepto, 'alumno' => $alumno->id_alumno])->count();
                    if ($valid == 0) {
                        CuentaPorCobrar::Create(
                            [
                                'id_concepto' => $request->concepto,

                                "alumno"      => $alumno->id_alumno,
                                "estado"      => "Pendiente",

                            ]
                        );
                    }
                }
            }
        } else {
            return response()->json(['message' => 'No se  ha  seleccionado  ninguna seccion', 'success' => false], 422);
        }

        //  $alumnos=$seccion['Alumnos'];

        return response()->json(['message' => 'Registro agregado correctamente', 'success' => $seccion]);
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

    public function alumnoCuentaPorCobrars(Request $request)
    {
        $deudas = Alumno::find($request->alumno)->deudas->where("estado", "Pendiente");

        $option = "<option></option>";
        foreach ($deudas as $deuda) {
            $option .= '<option value=' . $deuda->id . ' > ' . $deuda->conceptoPagoInfo->descripcion . '</option>';
        }
        $deudas = ' <select name="deuda[]" onchange="getTable();" class="select2" multiple="" id="deuda" data-placeholder="Seleccione ..." >' . $option . '</select>  ';

        return response()->json(['deudas' => $deudas]);
    }

    public function edit($id)
    {
        $Curso = CuentaPorCobrar::findOrFail($id);
        $ruta  = route("deuda.update", ["id" => $Curso["id"]]);

        return response()->json(["datos" => $Curso, "ruta" => $ruta]);
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
        $Seccion = CuentaPorCobrar::findOrFail($id);
        $Seccion->update($request->all());
        return response()->json(['message' => 'Registro actualizado correctamente', 'success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            CuentaPorCobrar::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }
    }

    
    public function deudoresPDF()
    {
        $alumnos=CuentaPorCobrar::where('estado', 'Pendiente')->get();
        $deudas=[];
        foreach ($alumnos->groupBy('alumno') as $grupo) {
            $total=0;
           
            foreach ($grupo as $deuda) {
                
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

            $deudas[]=collect(['alumno'=>$deuda->alumnoInfo->persona,'cantidad'=>$total]);

          
        }
       
        return PDF::loadView(
            'template-pdf.deudores',
            [
            'alumnos' => collect($deudas)->sortByDesc('cantidad'),
          
        ]
        )
       
        ->stream('Padres.pdf');
    }
}
