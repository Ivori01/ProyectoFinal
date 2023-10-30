<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table = 'concepto';

    public $timestamps    = false;
    //protected $dateFormat = 'd-m-Y';
    protected $dates      = [
        'fechavencimiento',
    ];
    protected $fillable = [

        'descripcion',
        'importe',
        'anio',
        'fechavencimiento',
        'mora_dia',

    ];
    public function setFechaVencimientoAttribute($value)
    {
        $this->attributes['fechavencimiento'] = Carbon::parse($value);
    }
}
