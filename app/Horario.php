<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    
     protected $table ='horario';
    protected $primaryKey='idhorario';
    public $timestamps=false;
    

   protected $fillable=[
     
     
      'dia',
      'horainicio',
      'horafin',
      'seccion_docente_curso',
      'seccion',
      'color'
   
    ];


     public function persona()
    {
       
       return $this->belongsTo('App\Persona','nrodocumento'); 

    }


    public function info()
    {
      return $this->belongsTo('App\SeccionDocenteCurso','seccion_docente_curso'); 
    }
}
