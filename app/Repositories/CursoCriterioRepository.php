<?php
namespace App\Repositories;

use App\CursoCriterio;
use Illuminate\Http\Request;

/**
 *
 */
class CursoCriterioRepository
{

    public function all()
    {
        return CursoCriterio::All();
    }

    public function save(Request $request)
    {

        CursoCriterio::firstOrCreate($request->only('criterio', 'curso', 'trimestre'));
        return response()->json(['message' => 'Registro agregado correctamente', 'ruta' => route("Director.PlanAcademicoCursoCriterio.Retrieve.CriterioTrimestre", ["curso" => $request->curso, "trimestre" => $request->trimestre])]);
    }

    public function find($id)
    {

        return CursoCriterio::findOrFail($id);
    }

    public function destroy($id)
    {

        try {
            $criterio = CursoCriterio::find($id);

            $ruta = route("Director.PlanAcademicoCursoCriterio.Retrieve.CriterioTrimestre", ["curso" => $criterio->curso, "trimestre" => $criterio->trimestre]);
            $criterio->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', "ruta" => $ruta]);

        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

}
