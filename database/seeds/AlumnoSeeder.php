<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Persona;
use App\Alumno;


class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona                  = new Persona();
        $persona->nrodocumento    = '22222222';
        $persona->tipodocumento   = 'dni';
        $persona->nombres         = 'alumno';
        $persona->apellidos       = 'alumno';
        $persona->genero          = '';
        $persona->fechanacimiento = '';
        $persona->direccion       = '';
        $persona->telefono        = '';
        $persona->celular         = '';
        $persona->correo          = '';
        $persona->foto            ='b3295b3af3f114f4e3e87e397a9446b3.jpg';
        $persona->save();

        $alumno         = new Alumno();
        $alumno->persona_id     = $persona->id;
        $alumno->estadoacademico = 'Estudiando';
        $alumno->nivel_id='000001';
        
        $alumno->save();

        
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
           $user->save(); */


       $user->assignRole('Alumno');

      

       for ($i=0; $i < 50 ; $i++) { 
        $persona                  = new Persona();
        $persona->nrodocumento    = '22222222'.$i;
        $persona->tipodocumento   = 'dni';
        $persona->nombres         = 'alumno'.$i;
        $persona->apellidos       = 'alumno'.$i;
        $persona->genero          = '';
        $persona->fechanacimiento = '';
        $persona->direccion       = '';
        $persona->telefono        = '';
        $persona->celular         = '';
        $persona->correo          = '';
        $persona->foto            ='b3295b3af3f114f4e3e87e397a9446b3.jpg';
        $persona->save();

        $alumno         = new Alumno();
        $alumno->persona_id    = $persona->id;
        $alumno->nivel_id='000001';
        $alumno->estadoacademico = 'Estudiando';
       
        $alumno->save();

        
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
           $user->save(); */


       $user->assignRole('Alumno');
       }
    }
}
