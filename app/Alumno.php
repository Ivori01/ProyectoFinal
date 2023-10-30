<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Alumno extends Model
{
    protected $table = 'alumno';

    public $timestamps = false;
    public $increment=false;
    protected $keyType = 'string';
    protected $fillable = [

        'id',
        'estadoacademico',
        'apoderado',
        'nivel_id',
        'persona_id',

        'dni_padre',
        'nombre_padre',
        'telefono_padre'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' =>'alumno', 'length' =>20, 'prefix' =>$model->nivel_id.'-'.date('Y').'-']);
        });
        self::updating(function ($model) {
            $model->id = IdGenerator::generate(['table' =>'alumno', 'length' =>20, 'prefix' =>$model->nivel_id.'-'.date('Y').'-']);
        });

        
    }

    public function persona()
    {

        return $this->belongsTo('App\Persona', 'persona_id')->withDefault();

    }

    public function deudas()
    {
        return $this->hasMany('App\CuentaPorCobrar', 'alumno');
    }



    public function matriculas()
    {
        return $this->hasMany('App\Matricula', 'id_alumno');
    }

       public function intentosEvaluacion()
    {
        return $this->hasMany('App\Models\LMS\Quiz\Intento', 'alumno_id');
    }

}