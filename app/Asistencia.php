<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table   = 'asistencia';
  

    protected $fillable = [
        'alumno_id',
        'curso_id',
        'fecha',
        'estado',

    ];
}
