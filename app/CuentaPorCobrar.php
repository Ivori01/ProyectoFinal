<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaPorCobrar extends Model
{
    protected $table = 'cuenta_por_cobrar';

    public $timestamps = false;

    protected $fillable = [
        'id_concepto',
        'alumno',
        'estado',
    ];

    public function conceptoPagoInfo() 
    {
        return $this->belongsTo('App\Concepto', 'id_concepto')->withDefault();
    }
    public function alumnoInfo()
    {
        return $this->belongsTo('App\Alumno', 'alumno')->withDefault();
    }

    public function descuentos()
    {
        return $this->hasMany('App\CuentaPorCobrarDescuento', 'id_cta_cobrar');
    }

    public function cajaInfo()
    {
        return $this->hasOne('App\Caja', 'deuda');
    }

}
