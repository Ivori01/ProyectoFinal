<?php

namespace App\Policies;

use App\SeccionDocenteCurso;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeccionDocenteCursoPolicy
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

    public function owner(User $user, SeccionDocenteCurso $seccion)
    {
        return $user->persona->id == $seccion->docente; 
    }

    public function enroled(User $user, SeccionDocenteCurso $seccion)
    {

        return optional($seccion->seccionInfo->Alumnos->where('id_alumno', $user->persona->id)->first())->exists();
    }

}
