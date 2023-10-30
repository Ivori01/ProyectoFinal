<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use App\Models\LMS\Quiz\Pregunta;
use App\Models\LMS\Quiz\PreguntaAleatoria;
use App\Models\LMS\Quiz\PreguntaFija;
use App\Opcion;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $pregunta = null;
        if ($request->main == 'Aleatorio') {
            $pregunta = PreguntaAleatoria::create($request->all());
        } else {
            $pregunta = PreguntaFija::create($request->all());
        }
     
        $pregunta->pregunta()->create(['evaluacion_id' => $request->quiz_id]);
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

        $slot = '';
        if ($request->main == 'Aleatorio') {
            $slot = view('components.docente.a-virtual.sub-contenido.quiz.pregunta-aleatoria', ['pregunta' => $pregunta, 'show' => 'show'])->render();
        } else {
            $slot = view('components.docente.a-virtual.sub-contenido.quiz.pregunta', ['pregunta' => $pregunta, 'show' => 'show'])->render();
        }

        return response()->json(['message' => 'Registro agregado correctamente', 'pregunta' => $slot]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(PreguntaFija $pregunta)
    {

        $ruta = route('Docente.Pregunta.Update', ['pregunta' => $pregunta]);
        return response()->json(['pregunta' => $pregunta, 'ruta' => $ruta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreguntaFija $pregunta)
    {
        $pregunta->update($request->all());

        $slot = view('components.docente.a-virtual.sub-contenido.quiz.pregunta', ['pregunta' => $pregunta, 'show' => 'show'])->render();
        return response()->json(['message' => 'Registro actualizado correctamente', 'pregunta' => $slot]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreguntaFija $pregunta)
    {
        try {
            $pregunta->delete();
            $pregunta->pregunta->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Registro eliminado correctamente'], 422);
        }
    }

    public function getOpciones(PreguntaFija $pregunta)
    {
        $opciones = $pregunta->opciones;

        $inputs = '<input type="text" value="' . $pregunta->id . '" name="pregunta_id" hidden="">';
        $i      = 1;
        $j      = 2;
        foreach ($opciones as $opcion) {
            $checked = '';
            if ($opcion->respuesta == 1) {
                $checked = 'checked=""';
            }
            if ($pregunta->tipo == 1) {
                $inputs .= '<div class="form-group row clone" id="copy">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0" for="id-disable-me" id="name-label">
                        Opción
                    </label>
                </div>
                <div class="col-sm-9">
                <input type="text" value="' . $opcion->id . '" hidden="" name="opt[]">
                    <input class="form-control col-12 d-inline-block" id="id-disable-me" name="opcion[]" value="' . $opcion->detalle . '"  type="text">
                        <label class="mt-0 mt-sm-0 ml-sm-3">
                            <input class="mr-1" id="checkbox-respuesta" name="respuestau' . $i . '" type="checkbox" ' . $checked . '>
                                Respuesta
                            </input>
                            <a class="card-toolbar-btn btn btn-sm radius-1 btn-light-danger btn-brc-tp mx-2px" href="#"  data-toggle="modal" onclick="deleteOption(' . "'" . route('Docente.Pregunta.DeleteOptions', ['opcion' => $opcion->id]) . "'" . ',this)">
              <i class="fas fa-trash"></i>  Eliminar
            </a>
                        </label>
                    </input>
                </div>
            </div>';
            }
            if ($pregunta->tipo == 2) {
                $inputs .= '<div class="form-group row clone" id="copy">
                <div class="col-sm-3  text-sm-right pr-0">
                    <label class="mb-0" for="id-disable-me" id="name-label">
                     <b>  ' . $opcion->detalle . '</b>
                    </label>
                </div>
                <div class="col-sm-9">
                <input type="text" value="' . $opcion->id . '" hidden="" name="opt[]">

                        <label class="mt-0 mt-sm-0 ml-sm-3">
                            <input class="mr-1"  name="respuesta" type="radio" ' . $checked . ' value="' . ($j - 1) . '">

                            </input>

                        </label>
                    </input>
                </div>
            </div>';
            }
            $j--;
            $i++;
        }
        return response()->json(['options' => $inputs]);
    }

    public function updateOptions(Request $request)
    {

        $i = 1;

        if ($request->tipo == 1) {
            foreach ($request->opt as $opcion) {
                $name = 'respuestau' . $i;

                $opt            = Opcion::find($opcion);
                $opt->detalle   = $request->opcion[$i - 1];
                $opt->respuesta = ($request->$name) ? 1 : 0;
                $opt->save();
                $i++;
            }

        }
        if ($request->tipo == 2) {

            $opt            = Opcion::find($request->opt[0]);
            $opt->detalle   = 'Verdadero';
            $opt->respuesta = ($request->respuesta == 1) ? 1 : 0;
            $opt->save();

            $opt            = Opcion::find($request->opt[1]);
            $opt->detalle   = 'Falso';
            $opt->respuesta = ($request->respuesta == 0) ? 1 : 0;
            $opt->save();

        }

        $pregunta = Opcion::find($request->opt[0])->pregunta;
        $slot     = view('components.docente.a-virtual.sub-contenido.quiz.pregunta', ['pregunta' => $pregunta, 'show' => 'show'])->render();

        return response()->json(['message' => 'Registro actualizado correctamente', 'pregunta' => $slot]);
    }

    public function saveOptions(Request $request)
    {
        $opcion              = new Opcion;
        $opcion->pregunta_id = $request->pregunta_id;
        $opcion->detalle     = $request->detalle;
        $opcion->respuesta   = ($request->respuesta) ? 1 : 0;
        $opcion->save();

        $pregunta = PreguntaFija::find($request->pregunta_id);
        $slot     = view('components.docente.a-virtual.sub-contenido.quiz.pregunta', ['pregunta' => $pregunta, 'show' => 'show'])->render();
        return response()->json(['message' => 'Registro agregado correctamente', 'pregunta' => $slot]);

    }

    public function deleteOptions(Opcion $opcion)
    {
        try {

            $opcion->delete();
            $pregunta = $opcion->pregunta;
            $slot     = view('components.docente.a-virtual.sub-contenido.quiz.pregunta', ['pregunta' => $pregunta, 'show' => 'show'])->render();
            return response()->json(['message' => 'Registro eliminado correctamente', 'pregunta' => $slot]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }
    }
}
