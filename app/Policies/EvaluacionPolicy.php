<?php

namespace App\Policies;

use App\Evaluacion;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvaluacionPolicy
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
    
    
    
  
    public function onTime(User $user, Evaluacion $evaluacion)
    {
        if ((Carbon::now())->between($evaluacion->fecha_inicio, $evaluacion->fecha_fin)) {
            return true;
        }

        $this->deny('Acceso denegado, Evaluacion no disponible.');

    }
    
    public function review(User $user, Evaluacion $evaluacion)
    {
        if ($evaluacion->correccion) {
            return true;
        }

        $this->deny('Acceso denegado, Revision no permitida.');

    }

}
