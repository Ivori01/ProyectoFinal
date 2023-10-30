<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteNivel extends Model
{
    protected $table = 'docente_nivel';

    public $timestamps = false;

    protected $fillable = [

        'id',
        'docente',
        'nivel',

    ];

    public function datosNivel()
    {

        return $this->belongsTo('App\Nivel', 'nivel');

    }

    public function datosDocente()
    {

        return $this->belongsTo('App\Docente', 'docente');

    }
}
