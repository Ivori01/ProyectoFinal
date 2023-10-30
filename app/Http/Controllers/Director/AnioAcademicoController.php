<?php

namespace App\Http\Controllers\Director;

use App\AnioAcademico;
use App\Http\Controllers\Controller;
use App\Nivel;
use App\Repositories\AnioAcademicoRepository;

use App\Repositories\PlanAcademicoRepository;
use Illuminate\Http\Request;

class AnioAcademicoController extends Controller
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

    public function getAll()
    {
        $AnioAcademicos = AnioAcademico::with('datosPlanAcademico')->get();

        $output = array('rows' => array());
        foreach ($AnioAcademicos as $AnioAcademico) {
            $actionButton = '<div class=" action-buttons">

        <a class="text-danger" data-target="#modal-destroy" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.AnioAcademico.Destroy', ['id' => $AnioAcademico]) . "'" . ')" >
        <i class="ace-icon fa fa-trash bigger-130"></i>
        </a>
        </div>
        ';

            $output['rows'][] = array(
                $AnioAcademico->descripcion,
                $AnioAcademico->anio,
                '<a type="button"  href="' . route('Director.AnioAcademico.Nivel', ['id' => $AnioAcademico]) . '" class="btn btn-sm btn-grey btn-smd btn-bold radius-0">Niveles</a>',
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

        return view('director.anio-academico.index', ['niveles' => $this->niveles]);

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
        return $this->AnioAcademico->save($request);
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
        return $this->AnioAcademico->destroy($id);
    }

    public function activar()
    {
        return view('director.anio-academico.activar', ['niveles' => $this->niveles, 'anios' => $this->AnioAcademico->all()]);
    }

    public function updateEstado(Request $request) 
    {
        $Anios = AnioAcademico::where('id' ,'<>' ,$request->anio)->update(['estado' => 'Inactivo']);
        $Anio  = $this->AnioAcademico->find($request->anio);
        $Anio->update(['estado' => 'Activo']);
        return response()->json(['message' => 'Registro actualizado correctamente']);
    }

    public function nivel($anio)
    {
        $anio = $this->AnioAcademico->find($anio);

        return view('director.anio-academico.nivel', ['anio' => $anio, 'niveles' => $this->niveles, 'planes' => $this->PlanAcademico->findWhere(['estado' => 'Activo'])]);
    }
}
