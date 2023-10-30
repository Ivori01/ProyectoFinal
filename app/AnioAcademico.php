<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnioAcademico extends Model
{

    protected $table   = 'anio_academico';
    public $timestamps = false;

    protected $fillable = [

        'descripcion',
        'anio',
        'estado',

    ];

    public function niveles()
    {

        return $this->hasMany('App\AnioAcademicoNivel', 'anio');

    }

    public function datosPlanAcademico()
    {
        return $this->belongsTo('App\PlanAcademico', 'planacad');
    }
    public function datosHorarioConfig()
    {
        return $this->belongsTo('App\HorarioConfig', 'conf_horario');
    }

    public function trimestres()
    {

        return $this->hasMany('App\Trimestre', 'anio_acad');

    }

    public function DatosNivel()
    {

        return $this->belongsTo('App\Nivel', 'nivel');

    }

    public function secciones()
    {
        return $this->hasManyThrough('App\Seccion', 'App\AnioAcademicoNivel', 'anio', 'anio_nivel');
    }

}
