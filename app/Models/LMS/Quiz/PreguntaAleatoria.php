<?php

namespace App\Models\LMS\Quiz;

use Illuminate\Database\Eloquent\Model;

class PreguntaAleatoria extends Model
{
    protected $table   = 'preguntas_aleatoria';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'puntaje',

    ];

   public function preguntas()
    {
        return $this->hasMany('App\Models\LMS\Quiz\GrupoPreguntas','grupo_id');  
    }

    public function pregunta()
    {
        return $this->morphOne('App\Models\LMS\Quiz\Pregunta', 'preguntable');
    }
}
