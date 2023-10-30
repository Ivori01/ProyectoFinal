<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAcademicoGrado extends Model
{
    protected $table   = 'planacad_grado';
    public $timestamps = false;

    protected $fillable = [
        'grado',
        'plan',
        'tipo_cal',
        'modo_criterio',
    ];

    public function datosGrado()
    {
        return $this->belongsTo('App\Grado', 'grado');
    }

    public function datosPlan()
    {
        return $this->belongsTo('App\PlanAcademico', 'plan');
    }
    public function cursos()
    {
        return $this->hasMany('App\PlanAcademicoGradoCurso', 'plan_grado');
    }

    public function trimestres()
    {
        return $this->hasMany('App\PlanAcademicoTrimestre', 'plan_grado');
    }



}
