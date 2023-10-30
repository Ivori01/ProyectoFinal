<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table   = 'evaluacion';
    public $timestamps = false;

    protected $dates = [
        'fecha_inicio',
        'fecha_fin',
    ];

    protected $fillable = [
        'nombre',
        'indicaciones',
        'fecha_inicio',
        'fecha_fin',
        'duracion',
        'intentos',
        'subcontenido_id',
        'calificacion_max',
        'modo_calificacion',
        'aleatorio',
        'n_preguntas',
        'correccion',
    ];

    protected $casts = [
        'aleatorio'  => 'boolean',
        'correccion' => 'boolean',
    ];

    public function setFechaInicioAttribute($value)
    {
        $this->attributes['fecha_inicio'] = Carbon::parse($value);
    }
    public function setFechaFinAttribute($value)
    {
        $this->attributes['fecha_fin'] = Carbon::parse($value);
    }

    public function subContenido()
    {
        return $this->belongsTo('App\SubContenido', 'subcontenido_id');
    }

    public function preguntas()
    {
        return $this->hasMany('App\Models\LMS\Quiz\Pregunta', 'evaluacion_id');
    }

    public function grupoPreguntas()
    {
        return $this->hasMany('App\Models\GrupoPreguntas', 'id_examen');
    }
   public function intentosRealizados()
    {
        return $this->hasMany('App\Models\LMS\Quiz\Intento', 'evaluacion_id');
    }

}
