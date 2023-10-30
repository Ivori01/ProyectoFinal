<?php

namespace App\Policies;

use App\User;
use App\AnioAcademico;

use Illuminate\Auth\Access\HandlesAuthorization;

class AnioAcademicoPolicy
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


public function active(User $user,AnioAcademico $anio)
{
    return $anio->estado == 'Activo';
}


}
