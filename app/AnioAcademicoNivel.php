<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnioAcademicoNivel extends Model
{

    protected $table   = 'anio_nivel';
    public $timestamps = false;

    protected $fillable = [

        'anio',
        'nivel',
        'plan',
 
    ];

    public function planAcademico()
    {
        return $this->belongsTo('App\PlanAcademico', 'plan');
    }
    public function hConfigs()  
    {
        return $this->hasMany('App\AnioNivelHConf', 'anio_nivel');
    }

    public function secciones()
    {

        return $this->hasMany('App\Seccion', 'anio_nivel');

    }
    public function trimestres()
    {

        return $this->hasMany('App\Trimestre', 'anio_acad');

    }

    public function datosNivel()
    {

        return $this->belongsTo('App\Nivel', 'nivel');

    }

       public function datosAnio()
    {

        return $this->belongsTo('App\AnioAcademico', 'anio');

    }


}
