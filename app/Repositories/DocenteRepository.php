<?php
namespace App\Repositories;

use App\Docente;
use App\DocenteNivel;
use App\Persona;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;

/**
 *
 */
class DocenteRepository
{

    public function all()
    {
        return Docente::All();
    }

    public function save(Request $request, $persona)
    {
        $request->request->add(['id' => $persona->id]);
        Docente::create($request->all());
        foreach ($request->nivel as $nivel) {
            DocenteNivel::create(['docente' => $persona->id, 'nivel' => $nivel]);
        }

        $nrodocumento = $request->input('nrodocumento');
        $user         = User::create(
            ['id' => $persona->id, 'user' => $nrodocumento, 'password' => $nrodocumento, "activo" => 1]
        );
        $user = User::findOrFail($persona->id);
        if (!$user->hasRole('Docente')) {
            $user->assignRole('Docente');
        }

        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function save2(Request $request)
    {
        $persona = Persona::where('nrodocumento', $request->nrodocumento)->first();
        $request->request->add(['id' => $persona->id]);
        Docente::create($request->all());
        foreach ($request->nivel as $nivel) {
            DocenteNivel::create(['docente' => $persona->id, 'nivel' => $nivel]);
        }
        $nrodocumento = $request->input('nrodocumento');

        $user = User::firstOrCreate(['id' => $persona->id, "user" => $nrodocumento], ['password' => $nrodocumento, "activo" => 1]);
        $user = User::findOrFail($persona->id);
        if (!$user->hasRole('Docente')) {
            $user->assignRole('Docente');
        }

        return response()->json(['message' => 'Registro agregado correctamente']);

    }

    public function find($id)
    {

        return Docente::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $docente    = Docente::findOrFail($id);
        $collection = collect($request->nivel);

        foreach ($docente->niveles as $nivel) {
            if ($collection->contains($nivel->nivel)) {
                $collection->forget($nivel->nivel);
            } else {
                $nivel->delete();
            }

        }
        if ($request->nivel!= null) {
            foreach ($collection as $nivel) {
                DocenteNivel::firstOrCreate(['docente' => $docente->id, 'nivel' => $nivel]);
            }

        }

        return $docente->update($request->all());
    }

    public function destroy($id)
    {

        try {
            $user = User::findOrFail($id);
            Docente::find($id)->delete();
            $user = User::findOrFail($id);
            $user->removeRole("Docente");
            $roles = $user->hasAnyRole(Role::where("name", "<>", "Docente")->get());

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
