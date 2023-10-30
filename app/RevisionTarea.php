<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevisionTarea extends Model
{
    protected $table   = 'revision_tarea';
    public $timestamps = false;

    protected $fillable = [
        'tarea',
        'alumno',
        'comentario',
        'nota',
    ];

    public function revision()
    {

        return $this->hasMany('App\RevisionTarea', 'tarea');

    }

}
