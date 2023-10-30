<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Nivel;
use App\PlanAcademico;
use App\Repositories\CriterioEvaluacionRepository;
use App\Repositories\CursoRepository;
use App\Repositories\GradoRepository;
use App\Repositories\PlanAcademicoGradoCursoRepository;
use App\Repositories\PlanAcademicoGradoRepository;
use App\Repositories\PlanAcademicoRepository;
use App\Trimestre;
use Illuminate\Http\Request;
use PDF;
use Storage;  
use App\Info;
class PlanAcademicoController extends Controller
{
    protected $PlanAcademico;
    protected $PlanAcademicoGrado;
    protected $PlanAcademicoGradoCurso;
    protected $grado;
    protected $curso;
    protected $criterio;

    protected $niveles;

    private $tipo_cal  = array("Literal", "Numerica");
    private $modo_crit = array("same" => "Igual para cada trimestre", "different" => "Diferente para cada trimestre");
    public function __construct(PlanAcademicoRepository $PlanAcademico, GradoRepository $grado, PlanAcademicoGradoRepository $PlanAcademicoGrado, CursoRepository $curso, PlanAcademicoGradoCursoRepository $PlanAcademicoGradoCurso, CriterioEvaluacionRepository $criterio)
    {
        $this->PlanAcademico           = $PlanAcademico;
        $this->PlanAcademicoGrado      = $PlanAcademicoGrado;
        $this->PlanAcademicoGradoCurso = $PlanAcademicoGradoCurso;
        $this->grado                   = $grado;
        $this->curso                   = $curso;
        $this->criterio                = $criterio;
        $this->niveles                 = Nivel::All();

    }

    public function getAll()
    {
        $PlanAcademicos = $this->PlanAcademico->all();
        $output         = array('rows' => array());
        foreach ($PlanAcademicos as $PlanAcademico) {
            $actionButton = '<div class=" action-buttons">
     <a class="text-blue"  href="' . route("Director.PlanAcademico.Show", ["id" => $PlanAcademico]) . '" >
                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
        <a class="text-success" data-target="#modal-update" href="#" data-toggle="modal"  onclick="edit(' . "'" . route("Director.PlanAcademico.Edit", ["id" => $PlanAcademico]) . "'" . ')">
        <i class="ace-icon fa fa-pen bigger-130"></i>
        </a>

        <a class="text-danger" data-target="#modal-destroy" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.PlanAcademico.Destroy', ['id' => $PlanAcademico]) . "'" . ')" >
        <i class="ace-icon fa fa-trash bigger-130"></i>
        </a>

 <a class="text-purple"  href="' . route('Director.PlanAcademico.Print', ['id' => $PlanAcademico]) . '"   >
        <i class="ace-icon fa fa-print bigger-130"></i>
        </a>
        </div>
        ';
            $asignarButton = '
                                                <a class="btn btn-sm btn-yellow" href="' . route('Director.PlanAcademico.Grado', ['plan' => $PlanAcademico]) . '">Grados</a>

                                           ';

            $output['rows'][] = array(
                $PlanAcademico->nombre,
                '<span class="bage   badge-lg text-white" style=" background-color: ' . $PlanAcademico->DatosNivel['color'] . '">' . $PlanAcademico->DatosNivel['nombre'] . '</span>',
                $this->PlanAcademico->estado($PlanAcademico->estado),
                $asignarButton,

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

        return view('director.plan-academico.index', ['niveles' => $this->niveles, 'trimestres' => Trimestre::all()]);
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(Request $request)
    {
        return $this->PlanAcademico->save($request);

    }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
        return view('director.plan-academico.show', ['plan' => $this->PlanAcademico->find($id), 'repo_grado' => $this->grado]);
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        $PlanAcademico = $this->PlanAcademico->find($id);

        $estadoPlanAcademico = "";
        foreach ($PlanAcademico->estados as $estado) {
            $selected = "";
            if ($estado == $PlanAcademico->estado) {
                $selected = '<option value=' . $estado . ' selected=""> ' . $estado . '</option>';
            } else {
                $selected = '<option value=' . $estado . ' > ' . $estado . '</option>';
            }
            $estadoPlanAcademico .= $selected;
        }
        $estadoPlanAcademico = ' <select name="estado" class="select2" data-placeholder="Estado" >' . $estadoPlanAcademico . '</select>  ';

        $ruta = route("Director.PlanAcademico.Update", ["id" => $PlanAcademico]);

        return response()->json(['nombre' => $PlanAcademico->nombre, 'ruta' => $ruta, 'estado' => $estadoPlanAcademico]);
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
        return $this->PlanAcademico->update($request, $id);
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        return $this->PlanAcademico->destroy($id);
    }

    public function grado($plan)
    {
        $plan = $this->PlanAcademico->find($plan);
        return view('director.plan-academico.grado', ['modos' => $this->modo_crit, 'plan' => $plan, 'grados' => $this->grado->findWhere(['estado' => 'Activo', 'nivel' => $plan->nivel])->sortBy('numero'), 'repo_grado' => $this->grado, 'trimestres' => Trimestre::orderBy('periodo')->orderBy('numero')->get(), 'tipos' => $this->tipo_cal]);
    }

    public function gradoCurso($plan)
    {
        $plan = $this->PlanAcademicoGrado->find($plan);
        return view('director.plan-academico.grado-curso', ['plan' => $plan, 'cursos' => $this->curso->findWhere(['estado' => 'Activo', 'nivel' => $plan->datosGrado->nivel]), 'repo_grado' => $this->grado]);
    }

    public function gradoCursoCriterio($plan)
    {
        $plan      = $this->PlanAcademicoGradoCurso->find($plan);
        $curso=$plan->datosCurso;
       
        $modo_crit = $plan->PlanGrado->modo_criterio;
        if ($modo_crit == 'same') {
            return view('director.plan-academico.grado-curso-criterio', ['plan' => $plan, 'criterios' => $this->criterio->findWhere(['estado' => 'Activo','curso'=>$curso->id]), 'trimestres' => $plan->trimestres, 'repo_grado' => $this->grado]);
        } else {
            if ($modo_crit = 'different') {
                return view('director.plan-academico.grado-curso-criterio2', ['plan' => $plan, 'criterios' => $this->criterio->findWhere(['estado' => 'Activo','curso'=>$curso->id]), 'trimestres' => $plan->trimestres, 'repo_grado' => $this->grado]);
            }
        }

    }

    function print($plan) {
        /*return PDF::loadView('director.plan-academico.show', ['plan' => $this->PlanAcademico->find($plan), 'repo_grado' => $this->grado])->setOrientation('landscape')->stream('github.pdf');*/
   $school_info = Info::find(1);
        $header      = view('components.pdf.header',['school_info',$school_info])->render();

        $footer = view('components.pdf.footer')->render();
        
                $options = [
            'footer-html' => $footer,
            'header-html' => $header,
        ];
        return PDF::loadView('director.plan-academico.print', ['plan' => $this->PlanAcademico->find($plan), 
        'repo_grado' => $this->grado])->setOption('footer-html', $footer)->setOption('footer-right', 'Página [page] de [topage]')->stream('plan.pdf');
        //return $pdf->inline();
    }
}
