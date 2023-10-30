<?php

namespace App\Models\LMS\Quiz;

use Illuminate\Database\Eloquent\Model;

class GrupoPreguntas extends Model
{

    protected $table   = 'preguntas_grupo';
    public $timestamps = false;

    protected $fillable = [
        'grupo_id',
        'pregunta_id',

    ];

      public function datosPregunta()
    {
        return $this->belongsTo('App\Models\LMS\Quiz\PreguntaFija', 'pregunta_id');
    }

    public function datosPreguntaAleatoria()
    {
        return $this->belongsTo('App\Models\LMS\Quiz\PreguntaAleatoria', 'grupo_id');
    }
}
