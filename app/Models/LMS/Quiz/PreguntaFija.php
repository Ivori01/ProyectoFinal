<?php

namespace App\Models\LMS\Quiz;

use Illuminate\Database\Eloquent\Model;

class PreguntaFija extends Model
{
    protected $table   = 'pregunta_fija';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'retroalimentacion',
        'puntos',
        'tipo',

    ];

    public function opciones()
    {
        return $this->hasMany('App\Opcion', 'pregunta_id');
    }

    public function pregunta()
    {
        return $this->morphOne('App\Models\LMS\Quiz\Pregunta', 'preguntable');
    }

     public function grupo()
    {
        return $this->hasOne('App\Models\LMS\Quiz\GrupoPreguntas', 'pregunta_id');
    }
}
