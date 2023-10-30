<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    protected $table='opciones';
    public $timestamps=false;

    protected $fillable=[
    	'pregunta_id',
    	'respuesta',
    	'detalle'
    ];

      public function pregunta()
    {

        return $this->belongsTo('App\Models\LMS\Quiz\PreguntaFija', 'pregunta_id');

    }
}
