<?php
namespace App\Repositories;

use App\Nivel;
use Illuminate\Http\Request;

/**
 *
 */
class NivelRepository
{

    public function save(Request $request)
    {
        Nivel::create($request->all());
        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function findWhere(array $wheres = [])
    {
        return Nivel::where($wheres)->get();
    }
    public function update(Request $request, $id)
    {
        $Seccion = Nivel::findOrFail($id);
        $Seccion->update($request->all());

        return response()->json(['message' => 'Registro actualizado correctamente']);
    }

    public function destroy($id)
    {
        try {

            Nivel::find($id)->delete();

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
