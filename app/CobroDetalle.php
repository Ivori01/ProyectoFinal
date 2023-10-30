<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CobroDetalle extends Model
{

    protected $table = 'cobro_detalle';

    public $timestamps = false;

    protected $dates = [
        'fecha',
    ];

    protected $fillable = [
        'id_cobro',
        'id_deuda'
    ];

    public function deudaInfo()
    {
        return $this->belongsTo('App\CuentaPorCobrar', 'id_deuda')->withDefault();
    }

   

}
