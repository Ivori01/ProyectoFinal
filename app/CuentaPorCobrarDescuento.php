<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaPorCobrarDescuento extends Model
{

    protected $table = 'cta_cobrar_descuento';

    public $timestamps = false;

    protected $fillable = [
        'id_cta_cobrar',
        'descuento',
    ];

    public function descuentoInfo()
    {
        return $this->belongsTo('App\Descuento', 'descuento');
    }
    public function cuentaInfo()
    {
        return $this->belongsTo('App\CuentaPorCobrar', 'id_cta_cobrar');
    }
    public function totalDescuentos()
    {
        return $this->belongsTo('App\Descuento', 'descuento')->sum('cantidad');
    }

}
