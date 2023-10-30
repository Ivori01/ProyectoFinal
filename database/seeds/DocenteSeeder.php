<?php

use Illuminate\Database\Seeder;
use App\Persona;
use App\Docente;
use App\User;
class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona                  = new Persona();
        $persona->nrodocumento    = '33333333';
        $persona->tipodocumento   = 'dni';
        $persona->nombres         = 'docente';
        $persona->apellidos       = 'docente';
        $persona->genero          = '';
        $persona->fechanacimiento = '';
        $persona->direccion       = '';
        $persona->telefono        = '';
        $persona->celular         = '';
        $persona->correo          = '';
        $persona->foto            ='b3295b3af3f114f4e3e87e397a9446b4.jpg';
        $persona->save();

        $alumno         = new Docente();
        $alumno->id     = $persona->id;
        $alumno->especialidad = 'Estudiando';
        $alumno->estado='Activo';
        $alumno->save();

        /* $user           = new User;
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

        $user->assignRole('Docente');


        for ($i=0; $i < 30; $i++) { 
            $persona                  = new Persona();
            $persona->nrodocumento    = '33333333'.$i;
            $persona->tipodocumento   = 'dni';
            $persona->nombres         = 'docente'.$i;
            $persona->apellidos       = 'docente'.$i;
            $persona->genero          = '';
            $persona->fechanacimiento = '';
            $persona->direccion       = '';
            $persona->telefono        = '';
            $persona->celular         = '';
            $persona->correo          = '';
            $persona->foto            ='b3295b3af3f114f4e3e87e397a9446b4.jpg';
            $persona->save();
    
            $alumno         = new Docente();
            $alumno->id     = $persona->id;
            $alumno->especialidad = 'Estudiando';
            $alumno->estado='Activo';
            $alumno->save();
    
            /* $user           = new User;
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
    
            $user->assignRole('Docente');
        }
    }
}
