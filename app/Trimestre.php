<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    protected $table   = 'trimestre';
    public $timestamps = false;

    protected $dates = [
        'fechainicio',
        'fechafin',
    ];

    protected $fillable = [
        'nombre',
        'periodo',
        'numero',
    ];

    public function setFechaInicioAttribute($value)
    {
        $this->attributes['fechainicio'] = Carbon::parse($value);
    }

    public function setFechaFinAttribute($value)
    {
        $this->attributes['fechafin'] = Carbon::parse($value);
    }

 
}
