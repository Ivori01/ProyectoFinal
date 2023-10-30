<?php

namespace App\Http\Controllers\Docente;

use App\AnioAcademico;
use App\Docente;
use App\Http\Controllers\Controller;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\SubContenido;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubContenidoController extends Controller
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
        $docente = Docente::find($request->user()->user);
        $anios   = AnioAcademico::with(['secciones.datosGrado', 'datosPlanAcademico'])->where('estado', 'Activo')->get();
        if ($docente) {
            # code...

            foreach ($anios as $anio) {

                $secciones = $anio->secciones;

                foreach ($secciones as $seccion) {

                    if ($docente->cursos->where('seccion', $seccion->id)->count() > 0) {

                        array_push($cursos, $docente->cursos->where('seccion', $seccion->id));
                    }

                }

            }

        }

        return view('docente.aula-virtual.index', ['cursos' => $cursos, 'rep_grado' => $this->grados, 'rep_seccion' => $this->seccion]);
    }

    public function getAll($id)
    {

    }

    public function curso($id)
    {
    }

    public function store(Request $request)
    {

        $last  = SubContenido::where('contenido', $request->contenido)->orderby('orden', 'DESC')->count();
        $orden = 1;
        if ($last >= 1) {

            $last  = SubContenido::where('contenido', $request->contenido)->orderby('orden', 'DESC')->first();
            $orden = $last->orden + 1;
        }
        //$request->request->add(['plan' => $plan]);

        $SubContenido            = new SubContenido;
        $SubContenido->nombre    = $request->nombre;
        $SubContenido->contenido = $request->contenido;
        $SubContenido->orden     = $orden;
        $SubContenido->save();

        $card = ' <div class="">
                    <div class="col-12 cards-container" id="card-container-3">
                        <div class="card bgc-yellow-tp2 mb-3" draggable="false" id="card-3" style="">
                            <div class="card-header card-header-sm">
                                <h5 class="card-title text-dark-tp4 text-600 text-90 pt-2px">
                                    ' . $SubContenido->nombre . '
                                </h5>
                                <div class="card-toolbar">
                                     <a class="card-toolbar-btn text-danger-m2" onclick="deleteSubCont(' . "'" . route('Docente.SubContenido.Destroy', ['id' => $SubContenido->id]) . "'" . ',this)" href="#">
                        <i class="fa fa-times">
                        </i>
                    </a>
                                </div>
                            </div>
                            <div class="card-body bg-white p-0 collapse " style="">
                            </div>
                        </div>
                    </div>
                </div>';
        return response()->json(['message' => 'Registro agregado correctamente', 'subcontent' => $card]);
    }

    public function updateOrder(Request $request)
    {

        foreach ($request->positions as $position) {
            $index               = $position[0];
            $newPosition         = $position[1];
            $SubContenido        = SubContenido::findOrFail($index);
            $SubContenido->orden = $newPosition;
            $SubContenido->save();

        }

        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function destroy($id)
    {
        try {
            SubContenido::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }
}
