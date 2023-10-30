<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use App\Models\LMS\Quiz\GrupoPreguntas;
use App\Models\LMS\Quiz\PreguntaAleatoria;
use App\Models\LMS\Quiz\PreguntaFija;
use App\Opcion;
use Illuminate\Http\Request;

class PreguntaAleatoriaController extends Controller
{
    public function edit(PreguntaAleatoria $pregunta_aleatoria)
    {

        $ruta = route('Docente.PreguntaAleatoria.Update', ['pregunta_aleatoria' => $pregunta_aleatoria]);
        return response()->json(['pregunta' => $pregunta_aleatoria, 'ruta' => $ruta]);
    }

    public function update(Request $request, PreguntaAleatoria $pregunta_aleatoria)
    {
        $pregunta_aleatoria->update($request->all());

    foreach ($pregunta_aleatoria->preguntas as $pregunta) {
                $pregunta->datosPregunta->update(['puntos'=>$request->puntaje]);
               
            }
        $slot = view('components.docente.a-virtual.sub-contenido.quiz.pregunta-aleatoria', ['pregunta' => $pregunta_aleatoria, 'show' => 'show'])->render();
        return response()->json(['message' => 'Registro actualizado correctamente', 'pregunta' => $slot]);
    }

    public function storeQuestion(Request $request, PreguntaAleatoria $pregunta)
    {

        $pregunta_aleatoria = $pregunta;
        $pregunta           = PreguntaFija::create($request->all());

        $grupo              = new GrupoPreguntas;
        $grupo->grupo_id    = $pregunta_aleatoria->id;
        $grupo->pregunta_id = $pregunta->id;
        $grupo->save();
        // $pregunta->pregunta()->create(['evaluacion_id' => $request->quiz_id]);
        if ($request->tipo == 1) {
            $i = 1;
            foreach ($request->opcion as $opcion) {

                $respuesta = 0;
                $input     = 'respuesta' . $i;
                if ($request->has($input)) {
                    $respuesta = 1;
                }
                $opt              = new Opcion;
                $opt->pregunta_id = $pregunta->id;
                $opt->detalle     = $opcion;
                $opt->respuesta   = $respuesta;
                $opt->save();
                $i++;
            }
        }

        if ($request->tipo == 2) {

            $opt              = new Opcion;
            $opt->pregunta_id = $pregunta->id;
            $opt->detalle     = 'Verdadero';
            $opt->respuesta   = ($request->option == 1) ? 1 : 0;
            $opt->save();

            $opt              = new Opcion;
            $opt->pregunta_id = $pregunta->id;
            $opt->detalle     = 'Falso';
            $opt->respuesta   = ($request->option == 0) ? 1 : 0;
            $opt->save();

        }
 
        $slot ='<div>'. view('components.docente.a-virtual.sub-contenido.quiz.pregunta', ['pregunta' => $pregunta, 'show' => 'show','isFromGroup'=>true])->render().'</div>';

        return response()->json(['message' => 'Registro agregado correctamente', 'pregunta' => $slot]);

    }

    public function destroy(PreguntaAleatoria $pregunta_aleatoria)
    {
        try {

            foreach ($pregunta_aleatoria->preguntas as $pregunta) {
                $pregunta->datosPregunta->delete();
                $pregunta->delete();
            }
            $pregunta_aleatoria->delete();
            $pregunta_aleatoria->pregunta->delete();

            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Registro eliminado correctamente'], 422);
        }
    }

    public function destroyQuestion(PreguntaFija $pregunta)
    {
        try {

            $pregunta->delete();

            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Registro eliminado correctamente' . $e], 422);
        }
    }
}
