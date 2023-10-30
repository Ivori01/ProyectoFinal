<?php

namespace App\Http\Controllers\Docente;

use App\AnioAcademico;
use App\Contenido;
use App\Docente;
use App\Http\Controllers\Controller;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContenidoController extends Controller
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

        $last  = Contenido::where('curso', $request->curso)->orderby('orden', 'DESC')->count();
        $orden = 0;
        if ($last >= 1) {
            $last  = Contenido::where('curso', $request->curso)->orderby('orden', 'DESC')->first();
            $orden = $last->orden + 1;
        }
        $contenido         = new Contenido;
        $contenido->nombre = $request->nombre;
        $contenido->curso  = $request->curso;
        $contenido->orden  = $orden + 1;
        $contenido->save();

        $card = ' <div class="card mb-3" data-index="{{ $contenido->id }}" data-position="{{ $contenido->orden }}" style="">
            <div class="card-header card-header-lg">
                <h5 class="card-title text-130">
                    ' . $contenido->nombre . '
                </h5>
                <div class="card-toolbar">
                    <button class="btn btn-sm border-0 radius-0 text-100 btn-yellow ml-1" data-target="#modal-registro-sc" data-toggle="modal" onclick="addSubCont(' . "'" . $contenido->id . "'" . ',this)" type="button">
                        Contenido
                        <i class="fas fa-plus text-90">
                        </i>
                    </button>
                    <a class="card-toolbar-btn text-grey-m2" data-action="toggle" draggable="false" href="#">
                        <i class="fa fa-chevron-up">
                        </i>
                    </a>
                    <a class="card-toolbar-btn text-danger-m2" href="#" onclick="deleteCont(' . "'" . route('Docente.Contenido.Destroy', ['id' => $contenido->id]) . "'" . ',this)">
                        <i class="fa fa-times">
                        </i>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-white p-0 collapse " style="">

            </div>
            <!-- /.card-body -->
        </div>';
        return response()->json(['message' => 'Registro agregado correctamente', 'content' => $card]);
    }

    public function updateOrder(Request $request)
    {

        foreach ($request->positions as $position) {
            $index            = $position[0];
            $newPosition      = $position[1];
            if ($index >= 1 ) {
              $contenido        = Contenido::findOrFail($index);
            $contenido->orden = $newPosition;
            $contenido->save();  # code...
            }
            

        }

        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function destroy($id)
    {
        try {
            Contenido::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }
}
