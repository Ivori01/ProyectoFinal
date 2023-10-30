<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAcademicoGradoCurso extends Model
{

    protected $table    = 'planacad_grado_curso';
    public $timestamps  = false;
    protected $fillable = [
        'curso',
        'plan_grado',
    ];

    public function datosCurso()
    {
        return $this->belongsTo('App\Curso', 'curso');
    }

    public function planGrado()
    {
        return $this->belongsTo('App\PlanAcademicoGrado', 'plan_grado');
    }

    public function criterios()
    {
        return $this->hasMany('App\CursoCriterio', 'curso'); 
    }


      public function docCursos()
    {
        return $this->hasMany('App\SeccionDocenteCurso', 'curso');
    }



}
