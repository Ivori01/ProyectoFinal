<?php

namespace App\Http\Controllers\Docente;

use App\Docente;
use App\Http\Controllers\Controller;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\RevisionTarea;
use App\SeccionDocenteCurso;
use App\Tarea;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Storage;

class RevisionTareaController extends Controller
{
    protected $seccion;
    protected $grados;

    public function __construct(SeccionRepository $seccion, GradoRepository $grados)
    {

        $this->grados  = $grados;
        $this->seccion = $seccion;

    }
    public function getAll(Request $request)
    {

        $output = array('data' => array());

        $curso = SeccionDocenteCurso::findOrFail($request->id);

        foreach ($curso->contenidos as $contenido) {

            foreach ($contenido->tareas as $tarea) {

                $output['data'][] = array(

                    $tarea->nombre,
                    $tarea->fecha_ap->format('Y/m/d g:i:s A'),
                    $tarea->fecha_ven->format('Y/m/d g:i:s A'),
                    $tarea->entregas->count() . ' Enviados',

                    '<div class="action-buttons center" style="text-align: center; width: 140px; ">    
                    <a class="text-success mx-2px" href="' . route('Docente.RevisionTarea.Show', ['id' => $tarea->id]) . '">      
                    <i class="fa fa-eye text-105"></i>              </a>        
                    </div>',
                );

            }

        }

        return response()->json($output);
    }

    public function index(Request $request)
    {

        //$curso = SeccionDocenteCurso::findOrFail($request->id);
        $this->authorize('owner', $curso);
        return view('docente.aula-virtual.tarea-entrega', ['curso' => $curso, 'repo_grado' => $this->grados]);
    }
    public function show($id)
    {
        $tarea         = Tarea::findOrFail($id);
        $seccion_curso = $tarea->subContenido->datosContenido->datosCurso;
        $seccion       = $tarea->subContenido->datosContenido->datosCurso->seccionInfo;

        $this->authorize('owner', $seccion_curso);

        return view('docente.aula-virtual.tarea-entrega-show', ['seccion' => $seccion, 'tarea' => $tarea, 't_entrega' => new RevisionTarea, 'repo_grado' => $this->grados]);

    }
    public function store(Request $request)
    {

        //dd($request->request);
        $archivo = RevisionTarea::updateOrCreate(
            $request->only(['alumno', 'tarea']), $request->only(['nota', 'comentario'])
        );

        return response()->json(['message' => 'Actualizado correctamente']);
    }

    public function download($file)
    {

        $tfile = RevisionTarea::findOrFail($file);
        return Storage::disk('files')->download($tfile->archivo, Str::ascii($tfile->archivo_name));
    }

    public function contenido($cont)
    {
        $contenido = RevisionTarea::findOrFail($cont);
        return response()->json(['contenido' => $contenido->contenido]);
    }

    public function destroy($id)
    {
        try {
            $archivo       = RevisionTarea::findOrFail($id);
            $nombrearchivo = $archivo->ruta;
            $archivo->delete();
            Storage::disk('files')->delete($nombrearchivo);
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }
}
