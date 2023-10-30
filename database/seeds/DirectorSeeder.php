<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Director;
use App\Persona;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
        $persona->foto            ='b3295b3af3f114f4e3e87e397a9446b1.jpg';
        $persona->save();

        $director         = new Director;
        $director->id     = $persona->id;
        $director->estado = 'Activo';
        $director->save();
        
        
        $user=User::create([
          'id'      => $persona->id,
          'user'    => $persona->nrodocumento,
          'password' => $persona->nrodocumento,
          'activo'   => 1,
        ]);

        /*    $user           = new User;
           $user->id       = $persona->id;
           $user->user     = $persona->nrodocumento;
           $user->password = $persona->nrodocumento;
           $user->activo   = 1;
           $user->save();
 */

        $user->assignRole('Director');
    }
}
