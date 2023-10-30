<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $table   = 'contenido';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'orden',
        'curso',
    ];

    public function subContenidos()
    {

        return $this->hasMany('App\SubContenido', 'contenido');

    }

    public function tareas()
    {
        return $this->hasManyThrough('App\Tarea', 'App\SubContenido', 'contenido', 'sub_cont');
    }
    public function examenes()
    {
        return $this->hasManyThrough('App\Evaluacion', 'App\SubContenido', 'contenido', 'subcontenido_id');
    }
    public function datosCurso()
    {

        return $this->BelongsTo('App\SeccionDocenteCurso', 'curso');

    }
}
