<?php 
namespace App\Traits;

use Jenssegers\Date\Date;

/**
 * summary
 */
trait DatesTranslator
{
    /**
     * summary
     */
    public function GetHoraInicioAttribute($hora_inicio)
    {
        return new Date($hora_inicio);
    }

     public function GetHoraFINAttribute($hora_fin)
    {
        return new Date($hora_fin);
    }
}