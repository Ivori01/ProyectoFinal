<?php

namespace App\Http\Controllers\Alumno;

use App\Evaluacion;
use App\Http\Controllers\Controller;
use App\Models\LMS\Quiz\Intento;
use App\Models\LMS\Quiz\IntentoPregunta;
use App\Models\LMS\Quiz\IntentoRespuesta;
use App\Models\LMS\Quiz\IntentoTexto;
use App\Models\LMS\Quiz\ResultadoPregunta;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use Carbon\Carbon;
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
    public function index()
    {

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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluacion $evaluacion)
    {

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluacion $evaluacion)
    {

    }

    public function preview(Evaluacion $evaluacion)
    {
        $intentos = auth()->user()->persona->alumno->intentosEvaluacion->where('evaluacion_id', $evaluacion->id);
       
       
        return view('alumno.aula-virtual.quiz.start-preview', ['evaluacion' => $evaluacion]);
    }

    public function showQuestion(Evaluacion $evaluacion)
    {
        $this->authorize('onTime', $evaluacion);
        $preguntasEvaluacion = $evaluacion->preguntas;

        if ($evaluacion->aleatorio) {
            $preguntasEvaluacion = $evaluacion->preguntas->shuffle();
        }

        $intentosPermitidos = $evaluacion->intentos;
        $intentosAlumno     = auth()->user()->persona->alumno->intentosEvaluacion->where('evaluacion_id', $evaluacion->id);

        $intentoActual = $intentosAlumno->where('estado', 'En proceso')->first();

        if ($intentoActual == null && $intentosAlumno->count() <= $intentosPermitidos) {

            //Crear un intento nuevo
            $intento                = new Intento;
            $intento->alumno_id     = auth()->user()->persona->alumno->id;
            $intento->hora_inicio   = Carbon::now();
            $intento->evaluacion_id = $evaluacion->id;
            $intento->numero        = $intentosAlumno->count() + 1;
            $intento->estado        = 'En proceso';
            $intento->save();

            $i = 1;

            //Crear preguntas para el intento
            foreach ($preguntasEvaluacion as $pregunta) {

                $preguntaActual = $pregunta->preguntable;
                if (class_basename($pregunta->preguntable) == 'PreguntaAleatoria') {
                    $preguntaActual = $preguntaActual->preguntas->random()->datosPregunta;
                }

                $preguntaIntento                 = new IntentoPregunta;
                $preguntaIntento->id_intento     = $intento->id;
                $preguntaIntento->id_pregunta    = $preguntaActual->id;
                $preguntaIntento->orden_pregunta = $i;
                $preguntaIntento->save();

                $i++;
            }

            $intentoActual = $intento;
        }

        return view('alumno.aula-virtual.quiz.start', ['intento' => $intentoActual]);
    }

    public function saveAnswer(Request $request)
    {

        $attemp_question = IntentoPregunta::find($request->question_attemp);
        $question_info   = $attemp_question->datosPregunta;
        $tipo            = $question_info->tipo;

        $intento     = $attemp_question->datosIntento;
        $evaluacion  = $intento->datosEvaluacion;
        $timeElapsed = Carbon::now()->diffInMinutes($intento->hora_inicio);
        $this->authorize('onTime', $evaluacion);
        if ($timeElapsed <= $evaluacion->duracion) {
            //Eliminar respuestas anteriores
            //$attemp_question->respuestasMarcadas()->delete();
            $actualMarqueds = $attemp_question->respuestasMarcadas;
            $newMarqueds    = new Collection;
            if ($tipo == 1 || $tipo == 2) {
                $nameInput = 'opt_' . $attemp_question->id;
                $marqueds  = $request->$nameInput;
                if ($marqueds != null) {
                    foreach ($marqueds as $marqued) {
                        $intentoRespuesta = IntentoRespuesta::FirstOrCreate(['pregunta_id' => $attemp_question->id, 'respuesta_id' => $marqued]);
                        $newMarqueds->push($intentoRespuesta);

                    }

                }

            }

            $toDelete = $actualMarqueds->diff($newMarqueds);
            foreach ($toDelete as $answer) {
                $answer->delete();
            }

            if ($tipo == 3) {
                $nameInput = 'text_' . $attemp_question->id;

                IntentoTexto::UpdateOrCreate(['id_pregunta' => $attemp_question->id], ['texto' => $request->$nameInput]);
            }
        }

        return response()->json(['respuestas' => $attemp_question->respuestasMarcadas]);
    }

    public function saveAttemp(Intento $intento)
    {
        if ($intento->estado != 'Finalizado') {
            $intento->estado   = 'Finalizado';
            $intento->hora_fin = Carbon::now();
            $intento->save();

            $preguntas = $intento->preguntas;
            foreach ($preguntas as $pregunta) {
                $this->qualifyQuestion($pregunta);
            }
        }

        $evaluacion=$intento->datosEvaluacion;
        return redirect()->route('Alumno.Evaluacion.StartPreview', ['evaluacion' => $evaluacion]);

    }
    public function qualifyQuestion($pregunta)
    {

        //$collect_reviews = new Collection;

        $question = $pregunta->datosPregunta;
        $tipo     = $question->tipo;
        $opciones = $question->opciones;
        $marqued  = null;

        if ($tipo == 1 || $tipo == 2) {

            $marqueds       = $pregunta->respuestasMarcadas;
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

                        if ($marqued->respuesta_id == $respuesta->id) {
                            $puntajeObtenido += $puntosPorOpcion;

                        }
                    }
                }

            }

            $resultadoPregunta = ResultadoPregunta::UpdateOrCreate(['pregunta_id' => $pregunta->id], ['puntaje' => $puntajeObtenido]);

        }

        if ($tipo == 3) {

            $puntajeObtenido   = 0;
            $resultadoPregunta = ResultadoPregunta::UpdateOrCreate(['pregunta_id' => $pregunta->id], ['puntaje' => $puntajeObtenido]);

        }

        $final_review = new Collection;

        return $final_review;
    }

    public function reviewAttemp(Intento $intento)
    {

 
        $this->authorize('review', $intento->datosEvaluacion);
        
        return view('alumno.aula-virtual.quiz.review', ['intento' => $intento]);
    }
}
