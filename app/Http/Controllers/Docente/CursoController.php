<?php

namespace App\Http\Controllers\Docente;

use App\AnioAcademico;
use App\Http\Controllers\Controller;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CursoController extends Controller
{

    protected $seccion;
    protected $grados;

    public function __construct(SeccionRepository $seccion, GradoRepository $grados)
    {

        $this->grados  = $grados;
        $this->seccion = $seccion;

    }

    public function index()
    {
        return view('docente.curso.index');
    }

    public function getAll(Request $request)
    {

        $output = array('rows' => array()); 

        $anio = AnioAcademico::where('estado', 'Activo')->first();

        foreach ($anio->niveles as $nivel) {

            foreach ($nivel->secciones as $seccion) {

                foreach ($seccion->cursos->where('docente', auth()->user()->persona->id) as $curso) {
                    $output['rows'][] = array(

                        $curso->cursoInfo->datosCurso->nombre,
                       $seccion->datosGrado->nombre . $this->seccion->letra($seccion->letra),
                        $seccion->datosGrado->DatosNivel->nombre,
                        $seccion->datosAnioNivel->datosAnio->anio,
                        '<a class="btn btn-xs btn-success" href="' . route('Docente.Notas.Index', ['id' => $curso->id]) . '"   >Asignar</a>',

                    );
                }
            }

        }

        return response()->json($output);
    }

}
