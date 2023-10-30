<?php

namespace App\Http\Controllers;

use App\Director;
use App\Info;
use App\Persona;
use App\User;
use Spatie\Permission\Models\Role;
class InitController extends Controller
{
    public function initData()
    {

        $role = Role::create(['name' => 'Director']);
        $role = Role::create(['name' => 'Docente']);
        $role = Role::create(['name' => 'Alumno']);

        $role = Role::create(['name' => 'Secretaria']);


        $persona                  = new Persona();
        $persona->nrodocumento    = '00000000';
        $persona->tipodocumento   = 'dni';
        $persona->nombres         = 'admin';
        $persona->apellidos       = 'admin';
        $persona->genero          = '';
        $persona->fechanacimiento = '';
        $persona->direccion       = '';
        $persona->telefono        = '';
        $persona->celular         = '';
        $persona->correo          = '';
        $persona->save();

        $director         = new Director;
        $director->id     = $persona->id;
        $director->estado = 'Activo';
        $director->save();

        $user           = new User;
        $user->id       = $persona->id;
        $user->user     = $persona->nrodocumento;
        $user->password = $persona->nrodocumento;
        $user->activo   = 1;
        $user->save();


        User::find(1)->assignRole('Director');
        
        $info=new Info();
        $info->save();

        return 'ok';
    }
}
