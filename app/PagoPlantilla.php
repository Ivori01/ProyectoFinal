<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoPlantilla extends Model
{
    protected $table = 'plantilla_pagos';

    public $timestamps = false;

    protected $fillable = [
       
        'pago_id',
        'plantilla_id',
      
    ];

    public function conceptoPagoInfo() 
    {
        return $this->belongsTo('App\Concepto', 'pago_id')->withDefault();
    }

}
