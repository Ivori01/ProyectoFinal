<?php

namespace App\Http\Controllers\Director;

use App\CursoCriterio;
use App\Http\Controllers\Controller;
use App\Repositories\CursoCriterioRepository;
use App\Repositories\PlanAcademicoGradoCursoRepository;
use Illuminate\Http\Request;

class CursoCriterioController extends Controller
{

    protected $PlanAcademicoGradoCurso;

    protected $CursoCriterio;

    public function __construct(CursoCriterioRepository $CursoCriterio, PlanAcademicoGradoCursoRepository $PlanAcademicoGradoCurso)
    {

        $this->PlanAcademicoGradoCurso = $PlanAcademicoGradoCurso;
        $this->CursoCriterio           = $CursoCriterio;

    }

    public function getAll($grado_curso)
    {
        $gc = $this->PlanAcademicoGradoCurso->find($grado_curso);

        $criterios = $gc->criterios->groupBy('criterio');

        $output = array('rows' => array());
        foreach ($criterios as $criterio) {

            $output['rows'][] = array(

                $criterio->first()->datosCriterio->nombre,
                $criterio->first()->datosCriterio->descripcion,
                '
                <div class=" action-buttons">
                <a class="text-danger" data-target="#modal-destroy" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route("Director.CursoCriterio.Destroy", ["curso" => $criterio->first()->curso, "criterio" => $criterio->first()->criterio]) . "'" . ')" >
                <i class="ace-icon fa fa-trash bigger-130"></i>
                </a>
                </div>',

            );
        }

        return response()->json($output);
    }

    public function getAll2($grado_curso)
    {
        $gc = $this->PlanAcademicoGradoCurso->find($grado_curso);

        $trimestres = $gc->PlanGrado->trimestres;

        $output = array('rows' => array());
        foreach ($trimestres as $trimestre) {

            $output['rows'][] = array(

                '<b>' . $trimestre->datosTrimestre->numero . '°</b> ' . $trimestre->datosTrimestre->periodo,
                '<b>' . $gc->criterios->where('trimestre', $trimestre->id)->count() . '</b>' . ' Criterios de evaluacion',
                '<a class="btn btn-xs btn-brown" onclick="editCriterioTrimestre(' . "'" . route("Director.PlanAcademicoCursoCriterio.Retrieve.CriterioTrimestre", ["curso" => $gc->id, "trimestre" => $trimestre->id]) . "'" . ')" data-target="#modal-update-criteriotrimestre" href="#" data-toggle="modal">Criterios de evaluacion</a>',
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
        //
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
        return $this->CursoCriterio->save($request);
    }

    public function storeForAll(Request $request)
    {
        $curso      = $this->PlanAcademicoGradoCurso->find($request->curso);
        $trimestres = $curso->PlanGrado->trimestres;
        foreach ($trimestres as $trimestre) {
            CursoCriterio::firstOrCreate(['criterio' => $request->criterio, 'curso' => $request->curso, 'trimestre' => $trimestre->id]);
        }


        if (count($trimestres)<1) {
             return response()->json(['message' => 'Primero debe asignar periodos academicos para este grado'], 422);
        }

        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function storeMultiple(Request $request)
    {

        if (!empty($request->trimestre)) {
            $trimestres = $request->trimestre;

            foreach ($trimestres as $trimestre) {

                CursoCriterio::firstOrCreate(['criterio' => $request->criterio, 'curso' => $request->curso, 'trimestre' => $trimestre]);

            }
        } else {
            return response()->json(['message' => 'No se  ha  seleccionado  ningun periodo academico', 'success' => false], 422);
        }

        return response()->json(['message' => 'Registro agregado correctamente', 'success' => true]);

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
    public function destroy($id, Request $request)
    {
        $curso      = $this->PlanAcademicoGradoCurso->find($id);
        $trimestres = $curso->PlanGrado->trimestres;

        try {
            $criterio = CursoCriterio::where(['curso' => $curso->id, 'criterio' => $request->criterio])->delete();

            return response()->json(['message' => 'Registro eliminado correctamente']);

        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function destroy2($id)
    {
        return $this->CursoCriterio->destroy($id);
    }

    public function criterioTrimestre($curso, $trimestre)
    {
        $curso_criterio      = $this->PlanAcademicoGradoCurso->find($curso);
        $trimestre_criterios = $curso_criterio->criterios;

        $criterios = "";
        //$user  = User::find($id);
        $i = 0;

        foreach ($trimestre_criterios->where('trimestre', $trimestre) as $criterio) {
            $selected = "";

            $i++;

            $selected = '<tr role="row" class="odd">
                            <td>' . $i . '</td>
                            <td>' . $criterio->datosCriterio->nombre . '</td>
                            <td >
                               <a class="text-danger" href="#" data-toggle="modal" onclick="destroyCriterio(' . "'" . route('Director.CursoCriterio.Destroy2', ['id' => $criterio->id]) . "'" . ')" >
                                <i class="ace-icon fa fa-trash bigger-130"></i>
                                </a>
                            </td>
                        </tr>';

            $criterios .= $selected;
        }
        if ($i == 0) {
            $criterios = '<tr> <td class="center" colspan="3" >Criterios no asignados</td></tr>';
        }
        $criterios = '
                    <table  class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample-table-2_info">
                        <thead>
                            <th>#</th>
                            <th>Criterio</th>
                            <th>Eliminar</th>
                        </thead>

                        <tbody>
                        <input type="hidden"  name="trimestre" value="' . $trimestre . '" />
                            <input type="hidden" name="curso" id="user" value="' . $curso_criterio->id . '">
                            ' . $criterios .
            '</tbody>
                    </table>';

        return response()->json(['criterios' => $criterios]);
    }

    public function trimestres($grado_curso)
    {
        $plan = $this->PlanAcademicoGradoCurso->find($grado_curso)->PlanGrado;

        $output = array('rows' => array());
        foreach ($plan->trimestres as $trimestre) {

            $output['rows'][] = array(
                '<label>
                          <input type="checkbox" class="align-middle alum" autocomplete="off" value="' . $trimestre->id . '"  name="trimestre[]" >
                        </label>',
                $trimestre->datosTrimestre->numero . '° ' . $trimestre->datosTrimestre->periodo,

            );
        }

        return response()->json($output);
    }
}
