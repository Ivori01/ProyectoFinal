<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriterioEvaluacion extends Model
{
    protected $table   = 'criterioevaluacion';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'curso',
    ];

    protected $appends = ['estados'];

    public function getEstadosAttribute()
    {
        return array('Activo', 'Inactivo');
    }

    public function cursos()
    {

        return $this->hasMany('App\SeccionDocenteCurso', 'seccion');

    }

    public function datosCurso()
    {

        return $this->belongsTo('App\Curso', 'curso');

    }
}
