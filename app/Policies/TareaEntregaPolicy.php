<?php

namespace App\Policies;

use App\TareaEntrega;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TareaEntregaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\TareaEntrega  $tarea_entrega
     * @return mixed
     */
    public function view(User $user, TareaEntrega $tarea_entrega)
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
     * @param  \App\TareaEntrega  $tarea_entrega
     * @return mixed
     */
    public function update(User $user, TareaEntrega $tarea_entrega)
    {
        //
    }

    /**
     * Determine whether the user can delete the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\TareaEntrega  $tarea_entrega
     * @return mixed
     */
    public function delete(User $user, TareaEntrega $tarea_entrega)
    {
        //
    }

    public function owner(User $user, TareaEntrega $tarea_entrega)
    {
        return $user->persona->id == $tarea_entrega->alumno;
    }
}
