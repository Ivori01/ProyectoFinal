<?php
namespace App\Http\Controllers\Director;

use App\Alumno;
use App\AnioAcademico;
use App\Http\Controllers\Controller;
use App\Matricula;
use App\Repositories\AlumnoRepository;
use App\Repositories\GradoRepository;
use App\Repositories\MatriculaRepository;
use App\Repositories\SeccionRepository;
use App\Seccion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class MatriculaController extends Controller
{

    protected $seccion;
    protected $alumno;
    protected $matricula;
    protected $grado;

    public function __construct(AlumnoRepository $alumno, SeccionRepository $seccion, MatriculaRepository $matricula, GradoRepository $grado)
    {
        $this->seccion   = $seccion;
        $this->alumno    = $alumno;
        $this->matricula = $matricula;
        $this->grado     = $grado;

    }

    public function getAll()
    { 
        $anio       = AnioAcademico::where('estado', 'Activo')->first();
        $matriculas = Matricula::with(['datosalumno', 'datosSeccion.datosGrado'])->get();
        $output     = array('rows' => array());
        foreach ($matriculas->sortBy('fecha') as $matricula) {
            $datosmatricula = $matricula->datosalumno;

            $actionButton = '<div class=" action-buttons center">
                               <a class="text-danger"  data-target="#modal-destroy" href="" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Matricula.Destroy', ['id' => $matricula->id]) . "'" . ')">
                    <i class="ace-icon fa fa-trash bigger-130"></i>
                    </a></div>';

            $output['rows'][] = array(

                $matricula->datosalumno->persona->nrodocumento,
                $matricula->datosalumno->persona->apellidos . ' ' . $matricula->datosalumno->persona->nombres,
                $matricula->datosSeccion->datosGrado->DatosNivel['nombre'],
             $matricula->datosSeccion->datosGrado->nombre . $this->seccion->letra($matricula->datosSeccion->letra),

                date("Y/m/d h:i:s a ", strtotime($matricula['fecha'])),
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

        return view('director.matricula.index', ['secciones' => Seccion::all(), 'repo_grado' => $this->grado]);
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
        return $this->matricula->save($request);
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

        try {
            Matricula::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }
    }
}
