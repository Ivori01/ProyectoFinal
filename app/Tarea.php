<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table   = 'tarea';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'indicaciones',
        'fecha_ap',
        'fecha_ven',
        'sub_cont',
    ];  
    protected $dates = [
        'fecha_ap',
        'fecha_ven',
    ];
    public function setFechaApAttribute($value)
    {
        $this->attributes['fecha_ap'] = Carbon::parse($value);
    }
    public function setFechaVenAttribute($value)
    {
        $this->attributes['fecha_ven'] = Carbon::parse($value);
    }
    public function archivos()
    {

        return $this->hasMany('App\ArchivoTarea', 'tarea');

    }
    public function entregas()
    {

        return $this->hasMany('App\TareaEntrega', 'tarea');

    }

    public function subContenido()
    {

        return $this->belongsTo('App\SubContenido', 'sub_cont');

    }

    public function revision()
    {

        return $this->hasMany('App\RevisionTarea', 'tarea');

    }

}
