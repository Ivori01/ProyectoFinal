<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantillaPago extends Model
{
    protected $table = 'plantilla_pago';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'pago_id',
        'grado_id',
        'anio'
    ];

 

    public function pagos()
    {
       return $this->hasMany(PagoPlantilla::class,'plantilla_id');
    }

    public function grado()
    {
       return $this->belongsTo(Grado::class,'grado_id');
    }
}
