<?php

namespace App\Policies;

use App\TrimestreFechas;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrimestreFechasPolicy
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

    public function onTime(User $user, TrimestreFechas $TrimestreFechas)
    {

        return (Carbon::today())->between($TrimestreFechas->fechainicio, $TrimestreFechas->fechafin);
    }
}
