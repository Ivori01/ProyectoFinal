<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Matricula;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GradoController extends Controller
{

    protected $seccion;
    protected $grado;

    public function __construct(SeccionRepository $seccion, GradoRepository $grado)
    {
        $this->seccion = $seccion;
        $this->grado   = $grado;
    }

    public function index()
    {
        return view('alumno.grado.index');
    }

    public function getAll()
    {

        $matriculas = Matricula::where(["id_alumno" => request()->user()->user])->with(["datosseccion"])->get();
        $alumno = auth()->user()->persona->alumno;
        $output = array('rows' => array());
        foreach ($alumno->matriculas as $matricula) {

            $output['rows'][] = array(
              $matricula->datosSeccion->datosGrado->nombre,
                $this->seccion->letra($matricula->datosSeccion->letra),
                $matricula->datosSeccion->datosGrado->DatosNivel['nombre'],
                $matricula->datosSeccion->datosAnioNivel->datosAnio->anio,
                '<a class="btn btn-xs btn-success" href="' . route('Alumno.Notas.Index', ['id' => $matricula]) . '"   >ver <i class="ace-icon fa fa-eye align-top bigger-125 icon-on-right"></i></a>
                <a class="btn btn-xs btn-success" href="' . route('Alumno.Notas.Boleta', ['id' => $matricula]) . '"   >Boleta <i class="ace-icon fa fa-eye align-top bigger-125 icon-on-right"></i></a>'
                ,
            );
        }

        return response()->json($output);
    }

}
