<?php
namespace App\Repositories;

use App\Seccion;
use Illuminate\Http\Request;

/**
 *
 */
class SeccionRepository
{

    public function all()
    {
        return Seccion::orderBy('grado', 'asc')->orderBy('letra', 'asc')->get();
    }

    public function save(Request $request)
    {

        Seccion::firstOrCreate($request->only('anio_nivel', 'grado', 'letra'), $request->only('capacidad','tutor'));

        return response()->json(['message' => 'Seccion Registrada Correctamente', 'success' => true]);

    }

    public function find($id)
    {

        return Seccion::findOrFail($id);
    }

    public function update(Request $request, $id)
    {

        $seccion = Seccion::find($id);

        $validacion = Seccion::where(['grado' => $seccion->grado, 'letra' => $request->letra, 'anio_nivel' => $seccion->anio_nivel])->whereKeyNot($id)->count();

        if ($validacion == 0) {
            $Seccion = Seccion::findOrFail($id);

            $matriculas = $Seccion->Alumnos->count();
            $capacidad  = $request->capacidad;
            if ($capacidad < $matriculas) {
                return response()->json(['message' => 'La capacidad  debe ser mayor ó igual a ' . $matriculas], 422);
            }

            $Seccion->update($request->all());
            return response()->json(['message' => 'Seccion Actualizada Correctamente', 'success' => true]);
        } else {
            return response()->json(['message' => 'Seccion Duplicada '], 422);
        }

    }

    public function destroy($id)
    {

        try {
            Seccion::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }
    }

    public function letra($sLetra)
    {

        $letra = "";
        switch ($sLetra) {

            case 'A':
                $letra = '<span class="badge badge-lg btn-yellow arrowed">A</span>';
                break;
            case 'B':
                $letra = '<span class="badge badge-lg badge-info  arrowed">B</span>';
                break;
            case 'C':
                $letra = '<span class="badge badge-lg badge-warning  arrowed">C</span>';
                break;
            case 'D':
                $letra = '<span class="badge badge-lg bgc-purple brc-purple text-white arrowed">D</span>';
                break;
            case 'E':
                $letra = '<span class="badge badge-lg bgc-dark text-white brc-dark arrowed">E</span>';
                break;
        }
        return $letra;
    }

}
