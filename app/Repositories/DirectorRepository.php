<?php
namespace App\Repositories;

use App\Director;
use App\Persona;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;

/**
 *
 */
class DirectorRepository
{

    public function all()
    {
        return Director::All();
    }

    public function save(Request $request, $persona)
    {
        $request->request->add(['id' => $persona->id]);

        $Director     = Director::create($request->all());
        $nrodocumento = $request->input('nrodocumento');
        $user         = User::create(
            ['id' => $persona->id, 'user' => $nrodocumento, 'password' => $nrodocumento, "activo" => 1]
        );
        $user = User::findOrFail($persona->id);
        if (!$user->hasRole('Director')) {
            $user->assignRole('Director');
        }

        return response()->json(['message' => 'Registro agregado correctamente']);

    }

    public function save2(Request $request)
    {
        $persona = Persona::where('nrodocumento', $request->nrodocumento)->first();

        $request->request->add(['id' => $persona->id]);
        Director::create($request->all());

        $nrodocumento = $request->input('nrodocumento');
        $user         = User::firstOrCreate(['id' => $persona->id, "user" => $nrodocumento], ['password' => $nrodocumento, "activo" => 1]);
        $user         = User::findOrFail($persona->id);
        if (!$user->hasRole('Director')) {
            $user->assignRole('Director');
        }

        return response()->json(['message' => 'Registro agregado correctamente']);

    }

    public function find($id)
    {
        return Director::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Director = Director::findOrFail($id);

        return $Director->update($request->all());
    }

    public function destroy($id)
    {

        try {

            Director::find($id)->delete();

            $user = User::findOrFail($id);

            $user->removeRole("Director");
            $roles = $user->hasAnyRole(Role::where("name", "<>", "Director")->get());

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
