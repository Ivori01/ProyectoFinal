<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAcademico extends Model
{

    protected $table   = 'plan_academico';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'nivel',
        'estado',
    ];
    protected $appends = ['estados'];

    public function setNombreAttribute($nombre)
    {

        $this->attributes['nombre'] = title_case($nombre);

    }

    public function getEstadosAttribute()
    {
        return array('Activo', 'Inactivo');
    }

    public function grados()
    {
        return $this->hasMany('App\PlanAcademicoGrado', 'plan');
    }

    public function trimestres()
    {
        return $this->hasMany('App\PlanAcademicoTrimestre', 'plan');
    }

    public function DatosNivel()
    {

        return $this->belongsTo('App\Nivel', 'nivel');

    }

}
