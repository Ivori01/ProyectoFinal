<?php

namespace App\Http\Controllers\Docente;

use App\Docente;
use App\Http\Controllers\Controller;
use App\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Storage;

class MultimediaController extends Controller
{

    public function store(Request $request)
    {

        $archivo = Multimedia::create($request->all());
        $text    = ' <div class="col-12 col-sm-6 col-md-3 px-2 mb-1 mb-md-0 pt-2">
                <div class="pos-rel d-flex flex-column text-center bgc-white px-2 py-3 radius-1 shadow-sm h-100 border-t-4 border-b-1 w-100 brc-success-tp2 radius-t-1">
                  <div class="mb-1">
                    <span class="d-inline-block bgc-success-l2 p-3 radius-round">
             <a href=" ' . route('Docente.Multimedia.Download', ['id' => $archivo->id]) . ' "><i class="fa fa-download text-success-m1 text-180 w-4"></i></a>
            </span>
                  </div>

                  <div class="mt-2px">
                    <div class="text-dark-tp4 text-180">' . $archivo->ext . '</div>
                    <div class="text-dark-tp5 text-110">' . $archivo->nombre . '</div>
                  </div>

                  <div class="text-blue-m2 font-bolder position-tr m-2">
                    <a href="#" onclick="deleteMultimedia(' . "'" . route('Docente.Multimedia.Destroy', ['id' => $archivo->id]) . "'" . ',this)"><i class="fas fa-trash text-danger text-120" ></i></a>

                  </div>
                </div>
              </div>';
        return response()->json(['message' => 'Registro agregado correctamente', 'Multimedia' => $text]);
    }

    public function download($file)
    {

        $tfile = Multimedia::findOrFail($file);

        $this->authorize('owner', $tfile->subCont->datosContenido->datosCurso);
        return Storage::disk('files')->download($tfile->ruta, Str::ascii($tfile->nombre));
    }

    public function destroy($id)
    {
        try {
            $archivo       = Multimedia::findOrFail($id);
            $nombrearchivo = $archivo->ruta;
            $archivo->delete();
            Storage::disk('files')->delete($nombrearchivo);
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }
}
