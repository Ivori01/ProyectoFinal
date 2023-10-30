<?php

namespace App\Http\Controllers\Director;

use App\CriterioEvaluacion;
use App\Curso;
use App\Http\Controllers\Controller;
use App\Repositories\CriterioEvaluacionRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CriterioEvaluacionController extends Controller
{

    protected $CriterioEvaluacion;

    public function __construct(CriterioEvaluacionRepository $CriterioEvaluacion)
    {
        $this->CriterioEvaluacion = $CriterioEvaluacion;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.criterio.index', ['cursos' => Curso::where('estado', 'Activo')->get()]);
    }

    public function getAll()
    {
        $criterios = CriterioEvaluacion::all();
        $output    = array('rows' => array());
        foreach ($criterios as $criterio) {

          
            $actionButton = '<div class=" action-buttons">

        <a class="text-success" data-target="#modal-update" href="#" data-toggle="modal"  onclick="editcriterio(' . "'" . route("Director.CriterioEvaluacion.Edit", ["id" => $criterio->id]) . "'" . ')">
        <i class="ace-icon fa fa-pen text-130"></i>
        </a>

        <a class="text-danger" data-target="#modal-destroy" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.CriterioEvaluacion.Destroy', ['id' => $criterio->id]) . "'" . ')" >
        <i class="ace-icon fa fa-trash text-130"></i>
        </a>
        </div>
        ';
      

            $output['rows'][] = array(

                $criterio['nombre'],
                $criterio['descripcion'],
                optional($criterio->datosCurso)->nombre,
                optional($criterio->datosCurso)->DatosNivel->nombre,
                $this->CriterioEvaluacion->Estado($criterio->estado),
                $actionButton,

            );
        }

        return response()->json($output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->CriterioEvaluacion->save($request);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $CriterioEvaluacion = CriterioEvaluacion::find($id);
        $cursos             = Curso::where('estado', 'Activo')->get();
        $selected           = '';
        $option             = '<option value=""></option> ';
        foreach ($CriterioEvaluacion->estados as $estado) {
            if ($estado == $CriterioEvaluacion->estado) {

                $option .= '<option value="' . $estado . '" selected="" >' . $estado . '</option>';
            } else {
                $option .= '<option value="' . $estado . '" >' . $estado . '</option>';
            }

        }

        $select = '
                <select class="select2  col-sm-6"   data-placeholder="Seleccione" name="estado">
                 ' . $option . '
                </select>';

        $curso     = '';
        $opt_curso = '<option value=""></option> ';
        foreach ($cursos as $curso) {
            if ($curso->id == $CriterioEvaluacion->curso) {

                $opt_curso .= '<option value="' . $curso->id . '" selected="" >' . $curso->nombre . ' - ' . $curso->DatosNivel->nombre . '</option>';
            } else {
                $opt_curso .= '<option value="' . $curso->id . '" >' . $curso->nombre . ' - ' . $curso->DatosNivel->nombre . '</option>';
            }

        }

        $select_curso = '
                <select class="select2  col-sm-6"   data-placeholder="Seleccione" name="curso">
                 ' . $opt_curso . '
                </select>';

        $CriterioEvaluacion['select']       = $select;
        $CriterioEvaluacion['select_curso'] = $select_curso;
        $CriterioEvaluacion['ruta']         = route("Director.CriterioEvaluacion.Update", ["id" => $CriterioEvaluacion]);

        return response()->json(['CriterioEvaluacion' => $CriterioEvaluacion]);

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
        return $this->CriterioEvaluacion->update($request, $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->CriterioEvaluacion->destroy($id);

    }
}
