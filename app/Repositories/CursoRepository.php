<?php
namespace App\Repositories;

use App\Curso;
use Illuminate\Http\Request;
use Storage;

/**
 *
 */
class CursoRepository
{

    public function save(Request $request)
    {
        if ($request->hasFile('imagen')) {
            Curso::create($request->all());
        } else {
            $Curso         = Curso::create($request->all());
            $Curso->imagen = 'curso.jpg';
            $Curso->save();

        }

        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function find($id)
    {

        return Curso::findOrFail($id);
    }

    public function findWhere(array $wheres = [])
    {
        return Curso::where($wheres)->get();
    }

    public function update(Request $request, $id)
    {

        $Curso = Curso::findOrFail($id);
        if ($request->hasFile('imagen')) {
            if ($Curso->foto != 'curso.jpg') {
                $imagenantigua = $Curso->imagen;
                Storage::disk('fotografias')->delete('curso/' . $imagenantigua);
            }

        }
        $Curso->update($request->all());
        return response()->json(['message' => 'Registro actualizado correctamente']);

    }

    public function destroy($id)
    {

        try {
            Curso::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function Estado($estado)
    {
        $estadocurso = "";
        switch ($estado) {

            case 'Activo':
                $estadocurso = '<span class="badge badge-success arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

            case 'Inactivo':
                $estadocurso = '<span class="badge badge-danger arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

        }

        return $estadocurso;
    }

}
