<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    protected $table   = 'observaciones';
    public $timestamps = false;

    protected $fillable = [
        'trimestre',
        'descripcion',
        'curso',
        'alumno',

    ];

    public function setDescripcionAttribute($descripcion)
    {

        $this->attributes['descripcion'] = title_case($descripcion);
    }

}
