<?php
namespace App\Repositories;


use App\Persona;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;

/**
 *
 */
class ApoderadoRepository
{

    

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
