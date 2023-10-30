<?php

namespace App\Policies;

use App\User;
use App\Matricula;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatriculaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function view(User $user, Matricula $matricula)
    {
        //
    }

    /**
     * Determine whether the user can create matriculas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function update(User $user, Matricula $matricula)
    {
        //
    }

    /**
     * Determine whether the user can delete the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function delete(User $user, Matricula $matricula)
    {
        //
    }

     public function owner(User $user, Matricula $matricula)
    {
       return $user->persona->alumno->id == $matricula->id_alumno;
    }
}
