<?php
namespace App\Repositories;

use App\Alumno;
use App\Persona;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;

/**
 *
 */
class AlumnoRepository
{

    public function save(Request $request, $persona)
    {
        $request->request->add(['persona_id' => $persona->id]);

        $Alumno       = Alumno::create($request->all());
        $nrodocumento = $request->input('nrodocumento');

        $user = User::create(
            ['id' => $persona->id, 'user' => $nrodocumento, 'password' => $nrodocumento, "activo" => 1]
        );
        $user = User::findOrFail($persona->id);
        if (!$user->hasRole('Alumno')) {
            $user->assignRole('Alumno');
        }

        return response()->json(['message' => 'Registro agregado correctamente']);
    }

    public function save2(Request $request)
    {
        $persona = Persona::where('nrodocumento', $request->nrodocumento)->first();
        $request->request->add(['id' => $persona->id]);
        Alumno::create($request->all());
        $nrodocumento = $request->input('nrodocumento');

        $user = User::firstOrCreate(['id' => $persona->id, "user" => $nrodocumento], ['password' => $nrodocumento, "activo" => 1]);
        $user = User::findOrFail($persona->id);
        if (!$user->hasRole('Alumno')) {
            $user->assignRole('Alumno');
        }

        return response()->json(['message' => 'Registro agregado correctamente']);

    }

    public function find($id)
    {
        return Alumno::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Alumno = Alumno::findOrFail($id);
        return $Alumno->update($request->all());
    }

    public function destroy($id)
    {

        try {

            Alumno::find($id)->delete();
            $user = User::findOrFail($id);
            $user->removeRole("Alumno");
            $roles = $user->hasAnyRole(Role::where("name", "<>", "Alumno")->get());

            if (!$roles) {
                $user->delete();
            }

            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);

        } catch (\Exception $e) {

            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function EstadoAcademico($estado)
    {
        $estadoacademico = "";
        switch ($estado) {

            case 'Estudiando':
                $estadoacademico = '<span class="badge badge-success arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

            case 'Egresado':
                $estadoacademico = '<span class="badge badge-info arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

            case 'Suspendido':
                $estadoacademico = '<span class="badge badge-danger arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

            case 'Retirado':
                $estadoacademico = '<span class="badge badge-warning arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

        }

        return $estadoacademico;
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
