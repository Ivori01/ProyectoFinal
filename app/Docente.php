<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docente';

    public $timestamps = false;

    protected $fillable = [

        'id',
        'especialidad',
        'estado',
       
    ];

    protected $appends = ['estados'];

    public function setEspecialidadAttribute($especialidad)
    {

        $this->attributes['especialidad'] = title_case($especialidad);
    }

    public function getEstadosAttribute()
    {
        return array('Activo', 'Inactivo');
    }

    public function persona()
    {

        return $this->belongsTo('App\Persona', 'id');

    }

    public function cursos()
    {
        return $this->hasMany('App\SeccionDocenteCurso', 'docente');
    }

    public function niveles()
    {

        return $this->hasMany('App\DocenteNivel', 'docente');

    }

      public function horarios()
    {
        return $this->hasManyThrough('App\Horario', 'App\SeccionDocenteCurso','docente','seccion_docente_curso','id','id');
    }

}
