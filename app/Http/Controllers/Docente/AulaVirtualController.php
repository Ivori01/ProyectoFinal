<?php

namespace App\Http\Controllers\Docente;

use App\AnioAcademico;
use App\Contenido;
use App\Docente;
use App\Http\Controllers\Controller;
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
        $cursos  = [];
        $docente = Docente::find($request->user()->persona->id);
        $anio    = AnioAcademico::where('estado', 'Activo')->first();

        if ($docente && $anio) {

            $cursos = $docente->cursos->where('seccionInfo.datosAnioNivel.datosAnio.id', $anio->id);

        }
   

        return view('docente.aula-virtual.index', ['cursos' => $cursos, 'rep_grado' => $this->grados, 'rep_seccion' => $this->seccion]);
    }

    public function curso($id)
    {
        $seccion_curso = SeccionDocenteCurso::findOrFail($id);
        $this->authorize('owner', $seccion_curso);
        $contenido = Contenido::where('curso', $id)->orderBy('orden')->get();

        return view('docente.aula-virtual.curso', ['curso' => $seccion_curso, 'contenidos' => $contenido, 'repo_grado' => $this->grados]);
    }

    public function cursoContenido($id)
    {
        $curso = SeccionDocenteCurso::findOrFail($id);
        $this->authorize('owner', $curso);
        $contenidos = Contenido::where('curso', $id)->get();
        return view('docente.aula-virtual.show-contenido', ['contenidos' => $contenidos, 'curso' => $curso, 'repo_grado' => $this->grados]);
    }
}
