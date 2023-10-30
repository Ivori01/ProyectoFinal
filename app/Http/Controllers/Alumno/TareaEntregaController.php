<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\SeccionDocenteCurso;
use App\Tarea;
use App\TareaEntrega;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Storage;

class TareaEntregaController extends Controller
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
        $request->request->add(['alumno' => auth()->user()->persona->id]);
        $Secretaria = Tarea::findOrFail($request->tarea);


        if ((Carbon::now())->between($Secretaria->fecha_ap, $Secretaria->fecha_ven)) {
            $tarea    = TareaEntrega::updateOrCreate($request->only('alumno', 'tarea'), $request->except('alumno', 'tarea'));
            $archivos = '';

            foreach ($tarea->datosTarea->archivos as $archivo) {
                $archivos .= '<p class=" text-warning">
                                  <a href="' . route('Alumno.ArchivoTarea.Download', ['id' => $archivo->id]) . '"><span class="text-warning-m1 font-bolder">' . $archivo->nombre . '</a>
                                  </p>';
            }

            $text = '
                    <div class="position-tl h-102 m-n1px rounded-left t-submited">
                        <div class="bgc-success p-14 text-center m-n1px radius-l-1">
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-xs radius-round position-tr btn-success text-white px-1 pt-0 pb-1 text-150 m-1" href="#" role="button">
                            <i aria-hidden="true" class="fa fa-check text-sm w-2 mx-1px">
                            </i>
                        </a>
                    </div>
                    <!-- the big red line on left -->
                    <h5 class="alert-heading text-info-m1 font-bolder text-wrap">
                        <i class="far fa-calendar-check text-purple text-140 w-3 mr-2px">
                        </i>
                        TAREA :
                        <a href="' .
                                route('Alumno.TareaEntrega.Edit', ['id' => $tarea->id])
                                . '
                                                        ">
                            ' . $tarea->datosTarea->nombre . '
                        </a>
                    </h5>
                    <div class="col-12 border border-info">
                        <p class="text-blue font-weight-bold mb-0">
                            Indicaciones :
                        </p>
                        ' . $tarea->datosTarea->indicaciones . '
                    </div>
                    <div class="col-12 border border-info mt-3">
                        <p class="text-blue font-weight-bold mb-0">
                            Archivos :
                        </p>
                        ' . $archivos . '
                    </div>
                    <p class="mt-3 mb-0">
                        <button class="btn btn-link text-success font-bolder py-0 px-2">
                            <i class="fas fa-lock-open">
                            </i>
                            Disponible : ' . $tarea->datosTarea->fecha_ap->diffForHumans() . '
                        </button>
                    </p>
                    <p class="my-1">
                        <button class="btn btn-link text-danger-d1 font-bolder py-0 px-2">
                            <i class="fas fa-lock text-red">
                            </i>
                            Vence : ' . $tarea->datosTarea->fecha_ven->diffForHumans() . '
                        </button>
                    </p>
  ';
            return response()->json(['message' => 'Registro agregado correctamente', 'tarea' => $text]);
        } else {
            return response()->json(['message' => 'Entrega de tarea Fuera de Tiempo'], 422);
        }
    }

    public function edit($id)
    {
        $tarea_e = TareaEntrega::findOrFail($id);
        //$tarea   = $tarea_e->datosTarea;
        $this->authorize('owner', $tarea_e);
        return view('alumno.aula-virtual.tarea-edit', ['tarea_e' => $tarea_e, 'repo_grado' => $this->grados]);

    }
    public function download($file)
    {

        $tfile = TareaEntrega::findOrFail($file);
        $this->authorize('owner', $tfile);
        //$this->authorize('owner', $tfile->datosTarea->subContenido->datosContenido->datosCurso);
        return Storage::disk('files')->download($tfile->archivo, Str::ascii($tfile->archivo_name));
    }

    public function update(Request $request, $id)
    {

        $Secretaria = TareaEntrega::findOrFail($id);
        $this->authorize('owner', $Secretaria);
        if ((Carbon::now())->between($Secretaria->datosTarea->fecha_ap, $Secretaria->datosTarea->fecha_ven)) {

            if ($request->hasFile('archivo')) {

                $imagenantigua = $Secretaria->archivo;
                Storage::disk('files')->delete($imagenantigua);

            }
            $Secretaria->update($request->all());
            $te = '   <tr class="bgc-h-primary-l5">

                          <td><a  href="' . route('Alumno.TareaEntrega.Download', ['id' => $Secretaria->id]) . '"><span class="text-success-m1 font-bolder">' . $Secretaria->archivo_name . '</span></a>

                          </td>
                          <td>
   <a href="#" data-action="toggle" class="card-toolbar-btn text-grey text-110" onclick="deleteArchivo(' . "'" . route('Alumno.TareaEntrega.Destroy', ['id' => $Secretaria->id]) . "'" . ',this)"><i class="fa fa-trash-alt text-danger"></i></a>
                          </td>
                        </tr>';

            return response()->json(['message' => 'Registro actualizado correctamente', 'success' => true, 'te' => $te]);
        } else {
            return response()->json(['message' => 'Edicion Fuera de Tiempo'], 422);
        }
    }

    public function destroy($id)
    {
        try {
            $te = TareaEntrega::findOrFail($id);
            $this->authorize('owner', $tarea_e);
            if ((Carbon::now())->between($te->datosTarea->fecha_ap, $te->datosTarea->fecha_ven)) {
                Storage::disk('files')->delete($te->archivo);
                $te->archivo      = null;
                $te->ext          = null;
                $te->archivo_name = null;
                $te->save();

                return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
            } else {
                return response()->json(['message' => 'Edicion Fuera de Tiempo'], 422);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function revisiones($curso)
    {
        $curso = SeccionDocenteCurso::findOrFail($curso);
        return view('alumno.aula-virtual.tarea-entrega-show', ['curso' => $curso]);

    }
}
