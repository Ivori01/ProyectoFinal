<?php
namespace App\Repositories;

use App\Persona;
use App\Secretaria;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;

/**
 *
 */
class SecretariaRepository
{

    public function all()
    {
        return Secretaria::All();
    }

    public function save(Request $request, $persona)
    {
        $request->request->add(['id' => $persona->id]);
        $Secretaria   = Secretaria::create($request->all());
        $nrodocumento = $request->input('nrodocumento');
        $user         = User::create(
            ['id' => $persona->id, 'user' => $nrodocumento, 'password' => $nrodocumento, "activo" => 1]
        );
        $user = User::findOrFail($persona->id);
        if (!$user->hasRole('Secretaria')) {
            $user->assignRole('Secretaria');
        }

        return response()->json(['message' => 'Registro agregado correctamente']);

    }

    public function save2(Request $request)
    {
        $persona = Persona::where('nrodocumento', $request->nrodocumento)->first();
        $request->request->add(['id' => $persona->id]);
        Secretaria::create($request->all());

        $nrodocumento = $request->input('nrodocumento');
        $user         = User::firstOrCreate(['id' => $persona->id, "user" => $nrodocumento], ['password' => $nrodocumento, "activo" => 1]);
        $user         = User::findOrFail($persona->id);
        if (!$user->hasRole('Secretaria')) {
            $user->assignRole('Secretaria');
        }

        return response()->json(['message' => 'Registro agregado correctamente']);

    }

    public function find($id)
    {

        return Secretaria::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Secretaria = Secretaria::findOrFail($id);

        return $Secretaria->update($request->all());
    }

    public function destroy($id)
    {

        try {

            Secretaria::find($id)->delete();
            $user = User::findOrFail($id);
            $user->removeRole("Secretaria");
            $roles = $user->hasAnyRole(Role::where("name", "<>", "Secretaria")->get());

            if (!$roles) {
                $user->delete();
            }

            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);

        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function Check(Request $request)
    {

        $persona = Persona::where('nrodocumento', $request->nrodocumento)->first();
        if ($persona) {
            $validator = Validator::make(['id' => $persona->id], [
                'id' => 'unique:' . $request->model,

            ]);

            if ($validator->fails()) {
                return 'false';
            } else {
                return 'true';
            }
        } else {
            return 'true';
        }

    }

}
