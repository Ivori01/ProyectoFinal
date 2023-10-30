<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAcademicoTrimestre extends Model
{

    protected $table   = 'plangrado_trimestre';
    public $timestamps = false;

    protected $fillable = [
        'trimestre',
        'plan_grado',
    ];

    public function datosTrimestre()
    {

        return $this->belongsTo('App\Trimestre', 'trimestre');

    }

    public function datosGrado()
    {

        return $this->belongsTo('App\PlanAcademicoGrado', 'plan_grado');

    }

   public function fechas()
    {

        return $this->hasMany('App\TrimestreFechas', 'plangrad_trim');

    }

    public function criterios()
    {
        return $this->hasMany('App\CursoCriterio', 'trimestre');
    }

}
