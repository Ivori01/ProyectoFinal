<?php

namespace App\Models\LMS\Quiz;

use App\Traits\DatesTranslator;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;

class Intento extends Model
{

    use DatesTranslator;

    protected $table   = 'intentos';
    public $timestamps = false;

    protected $fillable = [
        'alumno_id',
        'evaluacion_id',
        'hora_inicio',
        'numero',

    ];

    protected $dates = [

        'hora_inicio',
        'hora_fin'];
    protected $appends = ['duracion'];

    public function getDuracionAttribute()
    {
        // years, months, weeks, days, hours, minutes, seconds, microseconds
        $years  = $this->hora_fin->diffInYears($this->hora_inicio);
        $months = $this->hora_fin->diffInMonths($this->hora_inicio);
        $weeks  = $this->hora_fin->diffInWeeks($this->hora_inicio);
        $days   = $this->hora_fin->diffInDays($this->hora_inicio);
        $hours  = $this->hora_fin->diffInHours($this->hora_inicio);
        $minutes = $this->hora_fin->diffInMinutes($this->hora_inicio);
        $seconds= $this->hora_fin->diffInSeconds($this->hora_inicio);

        return CarbonInterval::seconds($seconds)->cascade()->forHumans();
    }
    public function preguntas()
    {
        return $this->hasMany('App\Models\LMS\Quiz\IntentoPregunta', 'id_intento');
    }

    public function datosEvaluacion()
    {
        return $this->belongsTo('App\Evaluacion', 'evaluacion_id');
    }

     public function datosAlumno()
    {
        return $this->belongsTo('App\Alumno', 'alumno_id');
    }

    public function resultados()
    {
        return $this->hasManyThrough('App\Models\LMS\Quiz\ResultadoPregunta', 'App\Models\LMS\Quiz\IntentoPregunta', 'id_intento', 'pregunta_id');
    }

}
