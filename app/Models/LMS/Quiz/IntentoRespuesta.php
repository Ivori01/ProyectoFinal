<?php

namespace App\Models\LMS\Quiz;

use Illuminate\Database\Eloquent\Model;

class IntentoRespuesta extends Model
{
   
    protected $table   = 'intento_respuestas';
    public $timestamps = false;

    protected $fillable = [
        'pregunta_id',
        'respuesta_id',
      

    ];

        public function datosPregunta()
    {
        return $this->belongsTo('App\Models\LMS\Quiz\PreguntaFija', 'id_pregunta');
    }
}
