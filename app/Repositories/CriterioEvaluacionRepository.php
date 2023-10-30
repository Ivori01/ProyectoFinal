<?php
namespace App\Repositories;

use App\CriterioEvaluacion;
use Illuminate\Http\Request;

/**
 *
 */
class CriterioEvaluacionRepository
{

    public function save(Request $request)
    {
        CriterioEvaluacion::create($request->all());
        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function findWhere(array $wheres = [])
    {
        return CriterioEvaluacion::where($wheres)->get();
    }
    public function update(Request $request, $id)
    {
        $Seccion = CriterioEvaluacion::findOrFail($id);
        $Seccion->update($request->all());

        return response()->json(['message' => 'Registro actualizado correctamente']);
    }

    public function destroy($id)
    {
        try {

            CriterioEvaluacion::find($id)->delete();

            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function Estado($estado)
    {
        $estadoCriterio = "";
        switch ($estado) {

            case 'Activo':
                $estadoCriterio = '<span class="badge badge-success arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

            case 'Inactivo':
                $estadoCriterio = '<span class="badge badge-danger arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

        }

        return $estadoCriterio;

    }
}
