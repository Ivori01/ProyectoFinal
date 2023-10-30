<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table ='seccion';
    public $timestamps=false;
   


    protected $fillable=[
   
      'grado',
      'letra',
      'anio_nivel',
      'capacidad',
      'tutor',
    ];


     public function cursos()
    {
       
       return $this->hasMany('App\SeccionDocenteCurso','seccion'); 

    }
 
    public function alumnos()
    {
        return $this->hasMany('App\Matricula','id_seccion');
    }

      public function horarios()
    {
        return $this->hasMany('App\Horario','seccion');
    }

   /*  public function docentes()
    {
        return $this->belongsTo('App\Docente','docente');
    }*/

    public function datosGrado()
    {

      return $this->belongsTo('App\Grado','grado');
  
    }

    public function datosTutor()
    {

      return $this->belongsTo('App\Docente','tutor');
  
    }

    public function datosAnioNivel() 
    {

      return $this->belongsTo('App\AnioAcademicoNivel','anio_nivel'); 
  
    }
    
}
