<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
     protected $table ='matricula';

   public $timestamps=false;
   public $incrementing=false;

       protected $fillable=[
     
      'id_alumno',
      'id_seccion',
      'costo',
      'fecha',
      'anio'
    ];
 

      public function datosalumno()
    {
       
       return $this->belongsTo('App\Alumno', 'id_alumno');

    }

       public function datosSeccion()
    {
       
       return $this->belongsTo('App\Seccion', 'id_seccion');

    }
}
