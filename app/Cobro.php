<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{

    protected $table = 'cobro';

    public $timestamps = false;

    protected $dates = [
        'fecha',
    ];

    protected $fillable = [
        'fecha',
        'importe',
        'cajero',
        'cliente'

    ];

    public function deudaInfo()
    {
        return $this->belongsTo('App\CuentaPorCobrar', 'id_deuda')->withDefault();
    }



    public function detalles()
    {
        return $this->hasMany('App\CobroDetalle', 'id_cobro');
    }

}
