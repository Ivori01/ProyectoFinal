<?php
namespace App\Repositories;

use App\PlanAcademicoGradoCurso;
use Illuminate\Http\Request;

/**
 *
 */
class PlanAcademicoGradoCursoRepository
{

    public function all()
    {
        return PlanAcademicoGradoCurso::All();
    }

    public function save(Request $request)
    {
        PlanAcademicoGradoCurso::firstOrCreate($request->only('plan_grado', 'curso'));
        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function find($id)
    {

        return PlanAcademicoGradoCurso::findOrFail($id);
    }

    public function destroy($id)
    {

        try {
            PlanAcademicoGradoCurso::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

}
