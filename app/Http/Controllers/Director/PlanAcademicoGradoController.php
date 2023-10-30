<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Nivel;
use App\PlanAcademico;
use App\PlanAcademicoGrado;
use App\PlanAcademicoTrimestre;
use App\Repositories\GradoRepository;
use App\Repositories\PlanAcademicoGradoRepository;
use App\Repositories\PlanAcademicoRepository;
use Illuminate\Http\Request;

class PlanAcademicoGradoController extends Controller
{

    protected $PlanAcademicoGrado;
    protected $PlanAcademico;
    protected $grado;

    private $modo_crit = array("same" => "Igual para cada trimestre", "different" => "Diferente para cada trimestre");
    private $tipo_cal  = array("Literal", "Numerica");
    public function __construct(PlanAcademicoGradoRepository $PlanAcademicoGrado, PlanAcademicoRepository $PlanAcademico, GradoRepository $grado)
    {
        $this->PlanAcademicoGrado = $PlanAcademicoGrado;
        $this->PlanAcademico      = $PlanAcademico;
        $this->grado              = $grado;
        $this->niveles            = Nivel::All();
    }

    public function getAll($plan)
    {

        $Grados = $this->PlanAcademico->find($plan)->grados()->with('datosGrado')->get();

        $output = array('rows' => array());
        foreach ($Grados as $Grado) {

            $actionButton = '<div class=" action-buttons center">

     <a class="text-success" data-target="#modal-update" href="#" data-toggle="modal"  onclick="edit(' . "'" . route("Director.PlanAcademicoGrado.Edit", ["id" => $Grado]) . "'" . ')">
        <i class="ace-icon fa fa-pen bigger-130"></i>
        </a>

        <a class="text-danger" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.PlanAcademicoGrado.Destroy', ['id' => $Grado]) . "'" . ')" >
        <i class="ace-icon fa fa-trash bigger-130"></i>
        </a>
        </div>
        ';

            $output['rows'][] = array(

              $Grado->datosGrado->nombre,
                $Grado->datosGrado->DatosNivel->nombre,
                $Grado->tipo_cal,
                $retVal = (isset($this->modo_crit[$Grado->modo_criterio])) ? $this->modo_crit[$Grado->modo_criterio] : '-',

                '<a class="btn btn-sm btn-yellow" href="' . route('Director.PlanAcademico.GradoCurso', ['grado' => $Grado]) . '">Curso</a>
                <a class="btn btn-xs btn-brown" onclick="editTrimestre(' . "'" . route("Director.PlanAcademicoGrado.Trimestre", ["id" => $Grado]) . "'" . ')" data-target="#modal-update-trimestre" href="#" data-toggle="modal">Periodo Academico</a>',
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->PlanAcademicoGrado->save($request);
    }

    public function edit($id)
    {
        $PlanAcademico = $this->PlanAcademicoGrado->find($id);

        $tipocal = "";
        foreach ($this->tipo_cal as $tipo) {
            $selected = "";
            if ($tipo == $PlanAcademico->tipo_cal) {
                $selected = '<option value=' . $tipo . ' selected=""> ' . $tipo . '</option>';
            } else {
                $selected = '<option value=' . $tipo . ' > ' . $tipo . '</option>';
            }
            $tipocal .= $selected;
        }
        $tipocal = ' <select name="tipo_cal" class="select2" data-placeholder="Seleccione" >' . $tipocal . '</select>  ';

        $modo = "";
        foreach ($this->modo_crit as $mod => $descrip) {
            $selected = "";
            if ($mod == $PlanAcademico->modo_criterio) {
                $selected = '<option value=' . $mod . ' selected=""> ' . $descrip . '</option>';
            } else {
                $selected = '<option value=' . $mod . ' > ' . $descrip . '</option>';
            }
            $modo .= $selected;
        }
        $modo = ' <select name="modo_criterio" class="select2" data-placeholder="Seleccione" >' . $modo . '</select>  ';

        $ruta = route("Director.PlanAcademicoGrado.Update", ["id" => $PlanAcademico]);

        return response()->json(['modo' => $modo, 'ruta' => $ruta, 'tipo' => $tipocal]);
    }

    public function update(Request $request, $id)
    {
        $grado = PlanAcademicoGrado::findOrFail($id);
        $grado->update($request->all());
        return response()->json(['message' => 'Registro actualizado correctamente', 'success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->PlanAcademicoGrado->destroy($id);
    }

    public function trimestre($id)
    {

        $trimestres = "";

        $plan = PlanAcademicoGrado::find($id);

        $i = 0;

        foreach ($plan->trimestres->sortBy('datosTrimestre.numero') as $trimestre) {
            $selected = "";

            $i++;

            $selected = '<tr role="row" class="odd">
                             <td>' . $trimestre->datosTrimestre->periodo . ' </td>
                            <td>' . $trimestre->datosTrimestre->nombre . ' </td>
                            <td >
                                <a class="text-danger" href="#" data-toggle="modal" onclick="destroyTrimestre(' . "'" . route('Director.PlanAcademicoGrado.Trimestre.Remove', ['trimestre' => $trimestre->id]) . "'" . ')" >
                                <i class="ace-icon fa fa-trash bigger-130"></i>
                                </a>
                            </td>
                        </tr>';

            $trimestres .= $selected;
        }
        if ($i == 0) {
            $trimestres = '<tr> <td class="center" colspan="3" >Trimestres no asignados</td></tr>';
        }
        $trimestres = '
                <table  class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample-table-2_info">
                <thead>
                    <th>Periodo</th>
                    <th>Nombre</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <input type="hidden" name="plan_grado" id="plan" value="' . $plan->id . '">
                    ' . $trimestres .
            '</tbody>
                </table>';

        return response()->json(['trimestres' => $trimestres]);
    }

    public function addTrimestre(Request $request)
    {

        try {
            $plan = PlanAcademicoGrado::find($request->plan_grado);
            PlanAcademicoTrimestre::firstOrCreate($request->only('plan_grado', 'trimestre'));

            return response()->json(['message' => 'Registro agregado correctamente', "ruta" => route("Director.PlanAcademicoGrado.Trimestre", ["id" => $plan->id])]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Registro  duplicado'], 422);
        }

    }

    public function removeTrimestre($id)
    {

        try {
            $plantrim = PlanAcademicoTrimestre::findOrFail($id);
            $plan     = $plantrim->datosGrado->id;
            $plantrim->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', "ruta" => route("Director.PlanAcademicoGrado.Trimestre", ["id" => $plan])]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

        /*  return response()->json(['message' => 'Registro eliminado correctamente', "ruta" => route("Director.User.Roles", ["id" => $user])]);*/

    }
}
