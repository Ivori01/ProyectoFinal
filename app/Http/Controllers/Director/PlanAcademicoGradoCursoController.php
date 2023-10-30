<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\PlanAcademico;
use App\Repositories\GradoRepository;
use App\Repositories\PlanAcademicoGradoCursoRepository;
use App\Repositories\PlanAcademicoGradoRepository;
use App\Repositories\PlanAcademicoRepository;
use Illuminate\Http\Request;

class PlanAcademicoGradoCursoController extends Controller
{
    protected $PlanAcademico;
    protected $PlanAcademicoGradoCurso;
    protected $PlanAcademicoGrado;
    protected $grado;

    public function __construct(PlanAcademicoRepository $PlanAcademico, GradoRepository $grado, PlanAcademicoGradoCursoRepository $PlanAcademicoGradoCurso, PlanAcademicoGradoRepository $PlanAcademicoGrado)
    {
        $this->PlanAcademico           = $PlanAcademico;
        $this->PlanAcademicoGrado      = $PlanAcademicoGrado;
        $this->PlanAcademicoGradoCurso = $PlanAcademicoGradoCurso;
        $this->grado                   = $grado;

    }

    public function getAll($grado_curso)
    {

        $Cursos = $this->PlanAcademicoGrado->find($grado_curso)->cursos()->with('datosCurso')->get();

        $output = array('rows' => array());
        foreach ($Cursos as $Curso) {

            $actionButton = ' <div class=" action-buttons center">



        <a class="text-danger"  href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.PlanAcademicoGradoCurso.Destroy', ['id' => $Curso]) . "'" . ')" >
        <i class="ace-icon fa fa-trash bigger-130"></i>
        </a>
        </div>
        ';

            $output['rows'][] = array(

                $Curso->datosCurso->nombre,
                $Curso->datosCurso->DatosNivel->nombre,
                '<a class="btn btn-sm btn-yellow" href="' . route('Director.PlanAcademico.CursoCriterio', ['curso' => $Curso->id]) . '">Criterios de evaluacion</a>',
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
        return $this->PlanAcademicoGradoCurso->save($request);
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
        return $this->PlanAcademicoGradoCurso->destroy($id);
    }
}
