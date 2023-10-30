<?php

namespace App\Http\Controllers\Alumno;

use App\ArchivoTarea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Storage;

class ArchivoTareaController extends Controller
{

    public function store(Request $request)
    {

        $archivo = ArchivoTarea::create($request->all());
        $text    = '  <tr class="bgc-h-primary-l5">

                          <td><a href="' . route('Docente.ArchivoTarea.Download', ['id' => $archivo->id]) . '"><span class="text-success-m1 font-bolder">' . $archivo->nombre . '</span></a>

                          </td>
                          <td>
                            <a href="#" data-action="toggle" class="card-toolbar-btn text-grey text-110" onclick="deleteArchivo(' . "'" . route('Docente.ArchivoTarea.Destroy', ['id' => $archivo->id]) . "'" . ',this)"><i class="fa fa-trash-alt text-danger"></i></a>
                          </td>
                        </tr>';
        return response()->json(['message' => 'Registro agregado correctamente', 'ArchivoTarea' => $text]);
    }

    public function download($file)
    {

        $tfile = ArchivoTarea::findOrFail($file);

        $this->authorize('enroled', $tfile->datosTarea->subContenido->datosContenido->datosCurso);
        return Storage::disk('files')->download($tfile->ruta, Str::ascii($tfile->nombre));
    }

    public function destroy($id)
    {
        try {
            $archivo       = ArchivoTarea::findOrFail($id);
            $nombrearchivo = $archivo->ruta;
            $archivo->delete();
            Storage::disk('files')->delete($nombrearchivo);
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }
}
