<?php
namespace App\Repositories;

use App\Persona;
use App\User;
use Illuminate\Http\Request;

/**
 *
 */
class UserRepository
{

    public function save(Request $request)
    {

        try {
            $persona = Persona::findOrFail($request->persona);
            $user    = User::create(
                ['id' => $persona->id, 'user' => $persona->nrodocumento, 'password' => $persona->nrodocumento, "activo" => 1]
            );
            return response()->json(['message' => 'Registro agregado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Registro duplicado', 'success' => true], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return response()->json(['message' => 'Registro actualizado correctamente', 'success' => true]);
    }

    public function destroy($id)
    {

        try {
            User::destroy($id);

            return response()->json(['message' => 'Registro agregado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function addRole(Request $request)
    {

        try {

            $user = User::find($request->user);

            $user->assignRole($request->rol);

            return response()->json(['message' => 'Registro agregado correctamente', "ruta" => route("Director.User.Roles", ["id" => $user])]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Registro  duplicado'], 422);
        }

    }

    public function removeRole(Request $request, $rol)
    {

        # code...

        $user = User::find($request->user);

        $user->removeRole($rol);

        return response()->json(['message' => 'Registro eliminado correctamente', "ruta" => route("Director.User.Roles", ["id" => $user])]);

    }

}
