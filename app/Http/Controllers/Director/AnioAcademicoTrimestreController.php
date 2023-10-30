<?php

namespace App\Http\Controllers\Director;

use App\AnioAcademico;
use App\AnioAcademicoNivel;
use App\Grado;
use App\Http\Controllers\Controller;
use App\PlanAcademicoGrado;
use App\Repositories\AnioAcademicoRepository;
use App\Repositories\GradoRepository;
use App\Repositories\PlanAcademicoRepository;
use App\TrimestreFechas;
use Illuminate\Http\Request;

class AnioAcademicoTrimestreController extends Controller
{

    protected $AnioAcademico;
    protected $PlanAcademico;
    protected $HorarioConfig;
    protected $grados;

    public function __construct(AnioAcademicoRepository $AnioAcademico, PlanAcademicoRepository $PlanAcademico, GradoRepository $grado)
    {
        $this->AnioAcademico = $AnioAcademico;
        $this->PlanAcademico = $PlanAcademico;

        $this->grados = grado::All();
        $this->grado  = $grado;

    }

    public function getAll($anio)
    {

        $aniogrado     = AnioAcademicoNivel::findOrFail($anio);
        $planAcademico = $aniogrado->planAcademico;
        $grados        = $planAcademico->grados;
        $output        = array('rows' => array());
        foreach ($grados as $grado) {

            $output['rows'][] = array(
               $grado->Datosgrado->nombre,
                '<a type="button" data-target="#modal-grados" href="#" data-toggle="modal" onclick="editHConf(' . "'" . route('Director.AnioAcademicoTrimestre.Get', ['planGrado' => $grado->id, 'anioNivel' => $aniogrado]) . "'" . ')" class="btn btn-sm btn-default btn-wide">Fecha de Inicio/Fin Periodo academico</a> ',
            );
        }

        return response()->json($output);
    }

    public function getTrimestres($planGrado, $anioNivel)
    {

        $pGrado     = PlanAcademicoGrado::findOrFail($planGrado);
        $trimestres = $pGrado->trimestres;
        $inputs     = '<input type="hidden" value="' . $anioNivel . '" name="anio_nivel"> <input type="hidden" value="' . $planGrado . '" name="plan_grado">';

        foreach ($trimestres->sortBy('datosTrimestre.numero') as $trimestre) {
            $fInicio = null;
            $fFin    = null;
            $fecha   = TrimestreFechas::where(['anio_nivel' => $anioNivel, 'plangrad_trim' => $trimestre->id])->first();
            if ($fecha) {
                $fInicio = $fecha->fechainicio->format('d-m-Y');
                $fFin    = $fecha->fechafin->format('d-m-Y');
            }

            $inputs .= '<div class="form-group row">
                    <input type="hidden" name="" value="">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                      <label for="id-form-field-5" class="mb-0">
                        ' . $trimestre->datosTrimestre->periodo . ' - ' . $trimestre->datosTrimestre->nombre . '
                      </label>
                    </div>

                    <div class="col-sm-9">
                    <div class="d-inline-flex align-items-center ml-sm-0 mb-1">
                
                        <div class="input-group datetimepicker">
                        <input type="text" class="form-control form-control" name="inicio-' . $trimestre->id . '-' . $anioNivel . '" value="' . $fInicio . '">
                        <div class="input-group-addon input-group-append">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="far fa-calendar mr-1"></i>
                            Inicio
                          </button>
                        </div>
                      </div>
                      </div>

                      <div class="d-inline-flex align-items-center ml-sm-0 mb-1">
                        <div class="input-group datetimepicker">
                        <input type="text" class="form-control form-control" name="fin-' . $trimestre->id . '-' . $anioNivel . '" value="' . $fFin . '">
                        <div class="input-group-addon input-group-append">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="far fa-calendar mr-1"></i>
                            &nbsp;&nbsp;&nbsp;Fin
                          </button>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>';
        }
        return response()->json(['trimestres' => $inputs]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($anio)
    {

        $aniogrado     = AnioAcademicoNivel::findOrFail($anio);
        $planAcademico = $aniogrado->planAcademico;
        $grados        = $planAcademico->grados;
        return view('director.anio-academico.trimestre', ['anio' => $aniogrado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $anioNivel  = $request->anio_nivel;
        $pGrado     = PlanAcademicoGrado::findOrFail($request->plan_grado);
        $trimestres = $pGrado->trimestres;
        foreach ($trimestres as $trimestre) {
            $inicio = 'inicio-' . $trimestre->id . '-' . $anioNivel;
            $fin    = 'fin-' . $trimestre->id . '-' . $anioNivel;

            TrimestreFechas::updateOrCreate(['anio_nivel' => $anioNivel, 'plangrad_trim' => $trimestre->id],
                ['fechainicio' => $request->$inicio, 'fechafin' => $request->$fin]);

        }

        return response()->json(['message'=>'Registro agregado correctamente']);

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
            AnioAcademicoTrimestre::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }
    }

}
