<?php
namespace App\Repositories;

use App\Descuento;
use Illuminate\Http\Request;

/**
 *
 */
class DescuentoRepository
{

    public function save(Request $request)
    {
        Descuento::create($request->all());
        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function findWhere(array $wheres = [])
    {
        return Descuento::where($wheres)->get();
    }
    public function update(Request $request, $id)
    {
        $Seccion = Descuento::findOrFail($id);
        $Seccion->update($request->all());

        return response()->json(['message' => 'Registro actualizado correctamente']);
    }

    public function destroy($id)
    {
        try {

            Descuento::find($id)->delete();

            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

/*    public function Estado($estado)
{
$estadoCriterio="";
switch ($estado) {

case 'Activo':
$estadoCriterio= '<span class="label label-success arrowed-in arrowed-in-right">'.$estado.'</span>';
break;

case 'Inactivo':
$estadoCriterio= '<span class="label label-danger arrowed-in arrowed-in-right">'.$estado.'</span>';
break;

}

return $estadoCriterio;

}*/
}
