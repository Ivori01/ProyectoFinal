<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubContenido extends Model
{
    protected $table   = 'sub_contenido';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'orden',
        'contenido',
    ];

    public function textos()
    {
        return $this->hasMany('App\Texto', 'sub_cont');
    }

    public function tareas()
    {
        return $this->hasMany('App\Tarea', 'sub_cont');
    }

    public function archivos()
    {
        return $this->hasMany('App\Multimedia', 'subcont');
    }

    public function examenes()
    {
        return $this->hasMany('App\Evaluacion', 'subcontenido_id');
    }

    public function datosContenido()
    {
        return $this->belongsTo('App\Contenido', 'contenido');
    }
}
