<?php
namespace App\Http\Controllers\Secretaria;

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

        $matriculas = Matricula::with(['datosalumno', 'datosSeccion.datosGrado'])->latest('fecha')->get();
        $output     = array('rows' => array());
        foreach ($matriculas as $matricula) {
            $datosmatricula = $matricula->datosalumno;

            $output['rows'][] = array(

               $matricula->datosalumno->persona->nrodocumento,
                $matricula->datosalumno->persona->apellidos . ' ' . $matricula->datosalumno->persona->nombres,
                $matricula->datosSeccion->datosGrado->DatosNivel->nombre,
                $matricula->datosSeccion->datosGrado->nombre . $this->seccion->letra($matricula->datosSeccion->letra) . ' ' . $matricula->datosSeccion->datosAnioNivel->datosAnio->anio,

                date("Y/m/d h:i:s a ", strtotime($matricula['fecha'])),

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

        return view('secretaria.matricula.index', ['anios' => AnioAcademico::all(), 'repo_grado' => $this->grado]);
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

}
