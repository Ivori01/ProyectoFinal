<?php

namespace App\Models\LMS\Quiz;

use Illuminate\Database\Eloquent\Model;

class ResultadoPregunta extends Model
{
    protected $table   = 'resultado_pregunta';
    public $timestamps = false;

    protected $fillable = [
        'pregunta_id',
        'comentario',
        'puntaje',
    ];
}
