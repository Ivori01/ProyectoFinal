<?php

namespace App\Http\Controllers\Docente;

use App\Evaluacion;
use App\Http\Controllers\Controller;
use App\Models\LMS\Quiz\Intento;
use App\Models\LMS\Quiz\IntentoPregunta;
use App\Models\LMS\Quiz\PreguntaFija;
use App\Models\LMS\Quiz\ResultadoPregunta;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\SeccionDocenteCurso;
use App\TipoPregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EvaluacionController extends Controller
{

    protected $seccion;
    protected $grados;

    public function __construct(SeccionRepository $seccion, GradoRepository $grados)
    {

        $this->grados  = $grados;
        $this->seccion = $seccion;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $curso = SeccionDocenteCurso::findOrFail($request->curso);

        return view('docente.aula-virtual.evaluacion.index', ['curso' => $curso, 'repo_grado' => $this->grados]);
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

        $evaluacion = Evaluacion::create($request->all());
        $slot       = view('components.docente.a-virtual.sub-contenido.quiz.alert', ['examen' => $evaluacion])->render();

        return response()->json(['message' => 'Registro agregado correctamente', 'evaluacion' => $slot]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {

        $numberAttemps = $evaluacion->intentos;

        $attemps = $evaluacion->intentosRealizados;

        $promedios = [];

        $seccion = $evaluacion->subContenido->datosContenido->datosCurso->seccionInfo;
        $alumnos = $seccion->alumnos;
        foreach ($alumnos as $alumno) {
            $nota = $this->getPromedio($evaluacion, $alumno->id_alumno);
            array_push($promedios, ['nota' => strval(round($nota, 0, PHP_ROUND_HALF_UP)), 'alumno' => $alumno->id_alumno]);
            //$promedios->push();

        }

        $collection = collect([
            ['account_id' => 'account-x10', 'product' => 1],
            ['account_id' => 'account-x10', 'product' => 0],
            ['account_id' => 'account-x11', 'product' => 20],
        ]);

        $p = collect($promedios);

        //dd($p->sortBy('nota')->groupBy('nota'),$collection->sortBy('product'));

        $grouped = $collection->groupBy('account_id');

        //return response()->json($attemps);

        return view('docente.aula-virtual.evaluacion.show', ['evaluacion' => $evaluacion, 'repo_grado' => $this->grados, 'promedios' => $p]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluacion $evaluacion)
    {

        return view(
            'docente.aula-virtual.evaluacion.edit',
            [
                'examen'         => $evaluacion,
                'repo_grado'     => $this->grados,
                'tipos_pregunta' => TipoPregunta::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluacion $evaluacion)
    {
        if (!$request->has('aleatorio')) {
            $request->request->add(['aleatorio' => '0']);
        }
        if (!$request->has('correccion')) {
            $request->request->add(['correccion' => '0']);
        }

        $evaluacion->update($request->all());
        return response()->json(['message' => 'Registro actualizado correctamente']);
    }

    public function attemps(Request $request, Evaluacion $evaluacion)
    {

        $intentos = $evaluacion->intentosRealizados->where('alumno_id', $request->alumno);
        $proms    = [];
        foreach ($intentos as $intento) {
            array_push($proms, ['intento' => $intento->id, 'prom' => round($this->getAttempProm($intento, $evaluacion), 0, PHP_ROUND_HALF_UP)]);
        }
        $proms = collect($proms);
        $prom = round($this->getPromedio($evaluacion, $request->alumno), 0, PHP_ROUND_HALF_UP);
        return view('docente.aula-virtual.evaluacion.attemps', ['intentos' => $intentos, 'evaluacion' => $evaluacion, 'proms' => $proms, 'prom' => $prom]);
    }

    public function updateResult(Request $request, IntentoPregunta $id)
    {
        $pregunta = $id->datosPregunta;
        if ($request->has('puntaje')) {
            if ($request->puntaje > $pregunta->puntos || $request->puntaje < 0) {
                return response()->json(['message' => 'El puntaje debe estar en el rango : 0 - ' . $pregunta->puntos], 422);
            }
        }

        $resultados = ResultadoPregunta::updateOrCreate(['pregunta_id' => $id->id], $request->all());

        $slot       = view('components.docente.a-virtual.sub-contenido.quiz.question.review', ['pregunta' => $id->datosPregunta, 'numero' => $request->numero, 'idCard' => $id->id, 'intento_question' => $id])->render();
        $attemp = $id->datosIntento;
        $alumno = $attemp->alumno_id;
        $evaluacion = $attemp->datosEvaluacion;
        $prom_attemp = round($this->getAttempProm($attemp, $evaluacion), 0, PHP_ROUND_HALF_UP);
        $prom = round($this->getPromedio($evaluacion, $alumno), 0, PHP_ROUND_HALF_UP);
        return response()->json(['message' => 'Registro actualizado correctamente', 'slot' => $slot, 'prom_attemp' => $prom_attemp, 'prom' => $prom]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluacion $evaluacion)
    {
        try {

            $evaluacion->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', $evaluacion]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede eliminar el registro'], 422);
        }
    }

    public function preview(Evaluacion $evaluacion)
    {
        return view('docente.aula-virtual.evaluacion.start-preview', ['evaluacion' => $evaluacion]);
    }

    public function showQuestion(Evaluacion $evaluacion)
    {
        return view('docente.aula-virtual.evaluacion.start', ['evaluacion' => $evaluacion]);
    }

    public function getPromedio(Evaluacion $evaluacion, $alumno)
    {
        $modoCalificacion = $evaluacion->modo_calificacion;
        $intentos         = $evaluacion->intentosRealizados->where('alumno_id', $alumno);
        $prom             = null;
        if ($intentos->count() > 0) {
            switch ($modoCalificacion) {
                case 1:
                    $lastAttemp = $intentos->last();
                    return $this->getAttempProm($lastAttemp, $evaluacion);
                    break;

                case 2:
                    $prom = 0;
                    foreach ($intentos as $intento) {
                        $prom += $this->getAttempProm($intento, $evaluacion);
                    }

                    return $prom / $intentos->count();
                    break;
                case 3:
                    $notes = new Collection;
                    foreach ($intentos as $intento) {
                        $notes->push($this->getAttempProm($intento, $evaluacion));
                    }
                    return $notes->max();
                    break;
            }
        }
        return 0;
    }

    public function getAttempProm(Intento $intento, Evaluacion $evaluacion)
    {
        $puntosEvaluacion = 0;
        $puntMax          = $evaluacion->calificacion_max;

        foreach ($evaluacion->preguntas as $pregunta) {
            $nameClase = class_basename($pregunta->preguntable);
            if ($nameClase == 'PreguntaFija') {
                $puntosEvaluacion += $pregunta->preguntable->puntos;
            } else {
                $puntosEvaluacion += $pregunta->preguntable->puntaje;
            }
        }
        if ($puntosEvaluacion < 1) { 
            return 0;
        }


        return ($puntMax * $intento->resultados->sum('puntaje')) / $puntosEvaluacion;
    }

    public function qualifyQuestion(Evaluacion $evaluacion, Request $request)
    {

        $collect_reviews = new Collection;
        $nota            = 0;
        foreach ($request->question as $id) {
            $question = PreguntaFija::find($id);
            $tipo     = $question->tipo;
            $opciones = $question->opciones;
            $marqued  = null;
            if ($tipo == 1 || $tipo == 2) {
                $nameInput      = 'opt_' . $id;
                $marqueds       = $request->$nameInput;
                $respuestas     = $opciones->where('respuesta', 1);
                $puntosPregunta = $question->puntos;

                $puntosPorOpcion = ($respuestas->count() >= 1) ? $puntosPregunta / $respuestas->count() : 1;
                $puntajeObtenido = 0;
                $calificado      = collect();
                $corrects        = [];
                $incorrects      = [];

                if ($marqueds != null) {
                    foreach ($marqueds as $marqued) {
                        foreach ($respuestas as $respuesta) {

                            if ($marqued == $respuesta->id) {
                                $puntajeObtenido += $puntosPorOpcion;
                                array_push($corrects, $marqued);
                            }
                        }
                    }
                    $incorrects = array_diff($marqueds, $corrects);
                }

                $collect_reviews->push(collect(['question' => $question, 'puntos' => $puntajeObtenido, 'corrects' => $corrects, 'incorrects' => $incorrects]));
            }

            if ($tipo == 3) {
                $nameInput       = 'text_' . $id;
                $puntajeObtenido = 0;
                $collect_reviews->push(collect(['question' => $question, 'puntos' => $puntajeObtenido]));
            }

            $nota += $puntajeObtenido;
        }

        $final_review = new Collection;
        $final_review->push(collect(['nota' => $nota, 'detalles' => $collect_reviews]));

        return $final_review;
    }
}
