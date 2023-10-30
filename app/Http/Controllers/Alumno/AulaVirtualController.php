<?php

namespace App\Http\Controllers\Alumno;

use App\AnioAcademico;
use App\Contenido;
use App\Http\Controllers\Controller;
use App\Matricula;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\SeccionDocenteCurso;
use Illuminate\Http\Request;

class AulaVirtualController extends Controller
{

    protected $seccion;
    protected $grados;

    public function __construct(SeccionRepository $seccion, GradoRepository $grados)
    {

        $this->grados  = $grados;
        $this->seccion = $seccion;

    }

    public function index(Request $request)
    {
        $cursos = [];

        $anio = AnioAcademico::where('estado', 'Activo')->first();

        $matriculas = Matricula::where('id_alumno', auth()->user()->persona->id)->get();

        $act_mat = null;
        foreach ($matriculas as $matricula) {

            if ($matricula->datosSeccion->datosAnioNivel->datosAnio->id == $anio->id) {
                $act_mat = $matricula;
            }

        }

        if ($act_mat != null) {
            $cursos = $matricula->datosSeccion->cursos;
        }

        return view('alumno.aula-virtual.index', ['cursos' => $cursos, 'rep_grado' => $this->grados, 'rep_seccion' => $this->seccion]);
    }

    public function curso($id)
    {
        $seccion_curso = SeccionDocenteCurso::findOrFail($id);

        $this->authorize('enroled', $seccion_curso);

        $contenidos = Contenido::where('curso', $id)->orderBy('orden')->get();

        $contenidos = Contenido::where('curso', $id)->get();
        return view('alumno.aula-virtual.show-contenido', ['contenidos' => $contenidos, 'curso' => $seccion_curso, 'repo_grado' => $this->grados]);
    }

}
