<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeccionDocenteCurso extends Model
{
    protected $table = 'seccion_docente_curso';

    public $timestamps = false;

    protected $fillable = [

        'curso',
        'seccion',
        'docente',
        'anio',

    ];

    public function cursoInfo()
    {
        return $this->belongsTo('App\PlanAcademicoGradoCurso', 'curso');
    }

    public function docenteInfo()
    {
        return $this->belongsTo('App\Docente', 'docente');
    }

    public function seccionInfo()
    {
        return $this->belongsTo('App\Seccion', 'seccion');
    }

    public function contenidos()
    {
        return $this->hasMany('App\Contenido', 'curso');
    }

    public function gradoCurso()
    {
        return $this->belongsTo('App\PlanAcademicoGradoCurso', 'curso');
    }

}
