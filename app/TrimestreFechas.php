<?php
namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TrimestreFechas extends Model
{
    protected $table   = 'plangradtrim_anio_fechas';
    public $timestamps = false;

    protected $dates = [
        'fechainicio',
        'fechafin',
    ];

    protected $fillable = [
        'fechainicio',
        'fechafin',
        'anio_nivel',
        'plangrad_trim',

    ];

    public function setDescripcionAttribute($descripcion)
    {

        $this->attributes['descripcion'] = title_case($descripcion);
    }

    public function setFechaInicioAttribute($inicio)
    {
        $this->attributes['fechainicio'] = Carbon::parse($inicio);
    }
    public function setFechaFinAttribute($fin)
    {
        $this->attributes['fechafin'] = Carbon::parse($fin);
    }

}
