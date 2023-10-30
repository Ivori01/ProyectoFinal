<?php

namespace App\Http\Controllers\Docente;

use App\AnioAcademico;
use App\Docente;
use App\Http\Controllers\Controller;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\Texto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TextoController extends Controller
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

        $texto = Texto::create($request->all());
        $text  = '  <div class="card bgc-purple-tp2 mt-4">
                                <div class="card-header">
                                    <h6 class="card-title text-white">
                                        ' . $texto->nombre . '
                                    </h6>
                                    <div class="card-toolbar">
                                        <button class="btn btn-sm border-0 radius-0 text-100 btn-light" onclick="editTexto(this)" type="button">
                                            <i class="fa fa-arrow-left text-90">
                                            </i>
                                            Editar
                                        </button>
                                        <button class="btn btn-sm border-0 radius-0 text-100 btn-yellow ml-1" onclick="updateText(this,' . "'" . route('Docente.Texto.Update', ['id' => $texto->id]) . "'" . ')" type="button">
                                            Guardar
                                            <i class="fa fa-chevron-down text-90">
                                            </i>
                                        </button>
                                        <a class="card-toolbar-btn text-danger-m2" href="#" onclick="deleteText(' . "'" . route('Docente.Texto.Destroy', ['id' => $texto->id]) . "'" . ',this)">
                                            <i class="fa fa-times">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body bg-white p-1">
                                   ' . $texto->cuerpo . '
                                </div>
                            </div>';
        return response()->json(['message' => 'Registro agregado correctamente', 'texto' => $text]);
    }

    public function update(Request $request, $id)
    {
        $Secretaria = Texto::findOrFail($id);
        $Secretaria->update($request->all());

        return response()->json(['messages' => 'Registro actualizado correctamente', 'success' => true]);
    }

    public function updateOrder(Request $request)
    {

        foreach ($request->positions as $position) {
            $index        = $position[0];
            $newPosition  = $position[1];
            $Texto        = Texto::findOrFail($index);
            $Texto->orden = $newPosition;
            $Texto->save();

        }

        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function destroy($id)
    {
        try {
            Texto::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }
}
