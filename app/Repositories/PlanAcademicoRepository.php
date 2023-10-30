<?php
namespace App\Repositories;

use App\PlanAcademico;
use Illuminate\Http\Request;

/**
 *
 */
class PlanAcademicoRepository
{

    public function all()
    {
        return PlanAcademico::All();
    }

    public function save(Request $request)
    {
        PlanAcademico::create($request->all());
        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function find($id)
    {

        return PlanAcademico::findOrFail($id);
    }

    public function findWhere(array $wheres = [])
    {
        return PLanAcademico::where($wheres)->get();
    }

    public function update(Request $request, $id)
    {

        $PlanAcademico = PlanAcademico::findOrFail($id);
        $PlanAcademico->update($request->all());
        return response()->json(['message' => 'Registro actualizado correctamente']);

    }

    public function destroy($id)
    {

        try {
            PlanAcademico::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function Estado($estado)
    {
        $estadoPlanAcademico = "";
        switch ($estado) {

            case 'Activo':
                $estadoPlanAcademico = '<span class="badge badge-success arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

            case 'Inactivo':
                $estadoPlanAcademico = '<span class="badge badge-danger arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

        }

        return $estadoPlanAcademico;
    }

    public function nivel($nivel)
    {

        $nivelPlan = "";
        switch ($nivel) {
            case 'Primaria':
                $nivelPlan = '<span class="badge badge-lg  ">Primaria</span>';
                break;
            case 'Secundaria':
                $nivelPlan = '<span class="badge badge-lg badge-info  ">Secundaria</span>';
                break;

        }
        return $nivelPlan;
    }

}
