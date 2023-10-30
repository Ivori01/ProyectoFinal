<?php
namespace App\Repositories;

use App\PlanAcademicoGrado;
use Illuminate\Http\Request;

/**
 *
 */
class PlanAcademicoGradoRepository
{

    public function all()
    {
        return PlanAcademicoGrado::All();
    }

    public function save(Request $request)
    {
        PlanAcademicoGrado::firstOrCreate($request->only('plan', 'grado'), $request->only('modo_criterio', 'tipo_cal'));
        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function find($id)
    {

        return PlanAcademicoGrado::findOrFail($id);
    }

    public function destroy($id)
    {

        try {
            PlanAcademicoGrado::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

}
