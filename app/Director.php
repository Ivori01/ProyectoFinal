<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{

    protected $table = 'director';

    public $timestamps = false;

    protected $fillable = [

        'id',
        'estado',

    ];
    protected $appends = ['estados'];

    public function getEstadosAttribute()
    {
        return array('Activo', 'Inactivo');
    }

    public function persona()
    {

        return $this->belongsTo('App\Persona', 'id');

    }

}
