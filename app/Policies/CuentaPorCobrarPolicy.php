<?php

namespace App\Policies;

use App\Alumno;
use App\User;
use App\CuentaPorCobrar;
use App\Info;
use Illuminate\Auth\Access\HandlesAuthorization;

class CuentaPorCobrarPolicy
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

    public function owner(User $user, Deuda $deuda)
    {
        return $user->persona->alumno->id == $deuda->alumno;
    }


}
