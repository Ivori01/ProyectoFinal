<?php

namespace App\Models\LMS\Quiz;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{

    protected $table    = 'preguntas';
    public $timestamps  = false;
    protected $fillable = [
        'evaluacion_id',
        

    ];

    public function preguntable()
    {
        return $this->morphTo();
    }
}
