<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoCriterio extends Model
{
    protected $table = 'curso_criterio';

    public $timestamps = false;

    protected $fillable = [
        'curso',
        'criterio',
        'trimestre',
    ];

    public function datosCriterio()
    {
        return $this->belongsTo('App\CriterioEvaluacion', 'criterio');
    }

    public function trimestre()
    {
        return $this->belongsTo('App\PlanAcademicoTrimestre', 'trimestre');
    }



}
