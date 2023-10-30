<?php

namespace App\Models\LMS\Quiz;

use Illuminate\Database\Eloquent\Model;

class IntentoPregunta extends Model
{

    protected $table   = 'intento_preguntas';
    public $timestamps = false;

    protected $fillable = [
        'id_intento',
        'id_pregunta',
        'orden_pregunta',

    ];

        public function datosPregunta()
    {
        return $this->belongsTo('App\Models\LMS\Quiz\PreguntaFija', 'id_pregunta');
    }
      public function datosIntento()
    {
        return $this->belongsTo('App\Models\LMS\Quiz\Intento', 'id_intento');
    }
           public function respuestasMarcadas()
    {
        return $this->hasMany('App\Models\LMS\Quiz\IntentoRespuesta', 'pregunta_id');
    }
         public function respuestaTexto()
    {
        return $this->hasOne('App\Models\LMS\Quiz\IntentoTexto', 'id_pregunta')->withDefault();
    }
        public function resultado()
    {
        return $this->hasOne('App\Models\LMS\Quiz\ResultadoPregunta', 'pregunta_id')->withDefault();
    }

}
