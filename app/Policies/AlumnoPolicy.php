<?php

namespace App\Policies;

use App\Alumno;
use App\User;
use App\Info;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlumnoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function hijo(User $user, Alumno $alumno)
    { 

        return $user->persona->apoderado->id == $alumno->apoderado;

    }

    public function sinDeudas(User $user,Alumno $alumno)
    {
       
        $school_info = Info::find(1);
        $opt=$school_info->restringir_notas;
      
        if ($opt==1) {
            $deudas=$alumno->deudas->where('estado','<>','Pagado')->count();

            return $deudas==0;
        }

        return true;
    }
}
