<?php

namespace App\Http\Controllers\Docente;

use App\Docente;
use App\Http\Controllers\Controller;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\Tarea;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TareaController extends Controller
{

    protected $seccion;
    protected $grados;

    public function __construct(SeccionRepository $seccion, GradoRepository $grados)
    {

        $this->grados  = $grados;
        $this->seccion = $seccion;

    }

    public function store(Request $request)
    {

        $tarea = Tarea::create($request->all());
        $text  = '<div class="alert fade show bgc-white rounded text-break border-t-4 brc-info-tp1 " role="alert">

                                <div class="position-tl h-102 m-n1px rounded-left ">

                                </div>
                                <div>    <a href="#" role="button" class="btn btn-xs radius-round position-tr btn-info text-white px-1 pt-0 pb-1 text-150 m-1" >
                            <i class="fa fa-eye text-sm w-2 mx-1px" aria-hidden="true"></i>
                          </a></div>


                                <!-- the big red line on left -->
                                <h5 class="alert-heading text-info-m1 font-bolder text-wrap">
                                    <i class="far fa-calendar-check text-purple text-140 w-3 mr-2px">
                                    </i>
                                    TAREA :
                                    <a href="' . route('Docente.Tarea.Edit', ['id' => $tarea->id]) . '">
                                        ' . $tarea->nombre . '
                                    </a>
                                </h5>

                                ' . $tarea->indicaciones . '
                                <p class="mt-3 mb-0">
                                    <button class="btn btn-link text-success font-bolder py-0 px-2">
                                        <i class="fas fa-lock-open">
                                        </i>
                                        Disponible : ' . $tarea->fecha_ap->diffForHumans() . '
                                    </button>
                                </p>
                                <p class="my-1">
                                    <button class="btn btn-link text-danger-d1 font-bolder py-0 px-2">
                                        <i class="fas fa-lock text-red">
                                        </i>
                                        Vence : ' . $tarea->fecha_ven->diffForHumans() . '
                                    </button>
                                </p>
                                <p class=" col-12">

<button class="btn btn-warning border-b-2 col-12" onclick="deleteTarea(' . "'" . route('Docente.Tarea.Destroy', ['id' => $tarea->id]) . "'" . ',this)">
                    <i class="fa fa-trash-alt text-110 text-white mr-1"></i> Eliminar
                  </button>
                                </p>
                            </div>';
        return response()->json(['message' => 'Registro agregado correctamente', 'tarea' => $text]);
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);

        $this->authorize('owner', $tarea->subContenido->datosContenido->datosCurso);
        return view('docente.aula-virtual.tarea-edit', ['tarea' => $tarea, 'repo_grado' => $this->grados]);

    }

    public function update(Request $request, $id)
    {
        $Secretaria = Tarea::findOrFail($id);
        $Secretaria->update($request->all());

        return response()->json(['message' => 'Registro actualizado correctamente', 'success' => true]);
    }

    public function updateOrder(Request $request)
    {

        foreach ($request->positions as $position) {
            $index        = $position[0];
            $newPosition  = $position[1];
            $Tarea        = Tarea::findOrFail($index);
            $Tarea->orden = $newPosition;
            $Tarea->save();

        }

        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function destroy($id)
    {
        try {
            Tarea::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }
}
