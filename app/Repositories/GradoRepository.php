<?php
namespace App\Repositories;

use App\Grado;
use Illuminate\Http\Request;

/**
 *
 */
class GradoRepository
{

    public function all()
    {
        return Grado::orderBy('nivel')->orderBy('numero')->get();
    }

    public function save(Request $request)
    {

        Grado::firstOrCreate($request->only('nombre','numero', 'nivel'), $request->only('estado'));
        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function find($id)
    {

        return Grado::findOrFail($id);
    }

    public function findWhere(array $wheres = [])
    {
        return Grado::where($wheres)->get();
    }

    public function update(Request $request, $id)
    {

        $Grado = Grado::findOrFail($id);
        $Grado->update($request->all());
        return response()->json(['message' => 'Registro actualizado correctamente']);

    }

    public function destroy($id)
    {

        try {
            Grado::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function Estado($estado)
    {
        $estadoGrado = "";
        switch ($estado) {

            case 'Activo':
                $estadoGrado = '<span class="badge badge-success arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

            case 'Inactivo':
                $estadoGrado = '<span class="badge badge-danger arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

        }

        return $estadoGrado;
    }

 

}
