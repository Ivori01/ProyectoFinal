<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $table   = 'texto';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'cuerpo',
        'sub_cont',
    ];

    public function subContenido()
    {

        return $this->belongsTo('App\SubContenido', 'sub_cont');

    }
}
