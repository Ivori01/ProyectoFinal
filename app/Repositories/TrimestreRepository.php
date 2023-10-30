<?php
namespace App\Repositories;

use App\Trimestre;
use Illuminate\Http\Request;

/**
 *
 */
class TrimestreRepository
{

    public function all()
    {
        return Trimestre::orderBy('nivel')->orderBy('numero')->get();
    }

    public function save(Request $request)
    {

        Trimestre::create($request->all());

        return response()->json(['message' => 'Registro agregado correctamente ']);
    }

    public function find($id)
    {

        return Trimestre::findOrFail($id);
    }

    public function findWhere(array $wheres = [])
    {
        return Trimestre::where($wheres)->get();
    }

    public function update(Request $request, $id)
    {

        $Trimestre = Trimestre::findOrFail($id);
        $Trimestre->update($request->all());
        return response()->json(['message' => 'Registro actualizado correctamente']);

    }

    public function destroy($id)
    {

        try {
            Trimestre::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

}
