<?php

namespace App\Http\Controllers\Director;

use App\AnioAcademico;
use App\AnioAcademicoNivel;
use App\Http\Controllers\Controller;
use App\Nivel;
use App\Repositories\AnioAcademicoRepository;

use App\Repositories\PlanAcademicoRepository;
use Illuminate\Http\Request;

class AnioAcademicoNivelController extends Controller
{

    protected $AnioAcademico;
    protected $PlanAcademico;
    protected $HorarioConfig;
    protected $niveles;

    public function __construct(AnioAcademicoRepository $AnioAcademico, PlanAcademicoRepository $PlanAcademico)
    {
        $this->AnioAcademico = $AnioAcademico;
        $this->PlanAcademico = $PlanAcademico;
        $this->niveles       = Nivel::All();

    }

    public function getAll($anio)
    {

        $anio_acad = $this->AnioAcademico->find($anio);

        $output = array('rows' => array());
        foreach ($anio_acad->niveles as $nivel) {
            $actionButton = '<div class=" action-buttons">
            <a class="text-danger" onclick="deleteS(' . "'" . route('Director.AnioAcademicoNivel.Destroy', ['id' => $nivel]) . "'" . ')" >
            <i class="ace-icon fa fa-trash bigger-130"></i>
            </a>
            </div>
            ';

            $output['rows'][] = array(
                $nivel->DatosNivel->nombre,
                $nivel->planAcademico->nombre,  
                '
                <a class="btn btn-sm btn-secondary btn-h-purple btn-a-purple mb-2px" href="'.route('Director.AnioAcademico.Trimestre',['anio'=>$nivel]).'"><i class="fa fa-pencil-alt text-110 mr-1"></i> Inicio / Fin Periodo academico</a>',
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
        $plan  = $this->PlanAcademico->find($request->plan);
        $nivel = Nivel::find($request->nivel);

        if ($plan->nivel == $nivel->id) {
            AnioAcademicoNivel::firstOrCreate($request->only('anio', 'nivel'), $request->only('plan'));
            return response()->json(['message' => 'Registro agregado correctamente']);
        } else {
            return response()->json(['message' => 'Debe elegir un plan academico adecuado para el nivel "' . $nivel->nombre . '"'], 422);
        }
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
            AnioAcademicoNivel::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }
    }

}
