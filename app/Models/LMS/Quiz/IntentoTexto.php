<?php

namespace App\Models\LMS\Quiz;

use Illuminate\Database\Eloquent\Model;

class IntentoTexto extends Model
{

    protected $table   = 'respuesta_text';
    public $timestamps = false;

    protected $fillable = [
        'id_pregunta',
        'texto',

    ];
}
