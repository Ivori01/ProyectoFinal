<?php

use Illuminate\Database\Seeder;
use App\Persona;
use App\User;
use App\Secretaria;
class SecretariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona                  = new Persona();
        $persona->nrodocumento    = '44444444';
        $persona->tipodocumento   = 'dni';
        $persona->nombres         = 'secretaria';
        $persona->apellidos       = 'secretaria';
        $persona->genero          = '';
        $persona->fechanacimiento = '';
        $persona->direccion       = '';
        $persona->telefono        = '';
        $persona->celular         = '';
        $persona->correo          = '';
        $persona->foto            ='b3295b3af3f114f4e3e87e397a9446b5.jpg';
        $persona->save();

        $alumno         = new Secretaria();
        $alumno->id     = $persona->id;
        $alumno->estado='Activo';
        $alumno->save();

    /*     $user           = new User;
        $user->id       = $persona->id;
        $user->user     = $persona->nrodocumento;
        $user->password = $persona->nrodocumento;
        $user->activo   = 1;
        $user->save(); */
        $user=User::create([
            'id'      => $persona->id,
            'user'    => $persona->nrodocumento,
            'password' => $persona->nrodocumento,
            'activo'   => 1,
          ]);

        $user->assignRole('Secretaria');
    }
}
