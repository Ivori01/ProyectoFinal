<?php
namespace App\Repositories;

use App\AnioAcademico;
use Illuminate\Http\Request;

/**
 *
 */
class AnioAcademicoRepository
{

    public function all()
    {
        return AnioAcademico::All();
    }

    public function save(Request $request)
    {
        AnioAcademico::firstOrCreate($request->only('anio'), $request->only('descripcion'));
        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function find($id)
    {

        return AnioAcademico::findOrFail($id);
    }

    public function findWhere(array $wheres = [])
    {
        return AnioAcademico::where($wheres)->get();
    }

    public function destroy($id)
    {

        try {
            AnioAcademico::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

}
