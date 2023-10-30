<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table ='grado';
    public $timestamps=false;
  

    protected $fillable=[
      'nombre',
      'numero',
      'nivel',
      'estado'
    ];

    protected $appends = ['estados'];

        public function setNombreAttribute($nombre)
    {
          
           $this->attributes['nombre']= title_case($nombre);
         
    }

       public function getEstadosAttribute()
    {
        return array('Activo','Inactivo');
    }

       public function planGrado()
    {
      return $this->hasMany('App\PlanAcademicoGrado','grado');
    }

    
   public function datosNivel()
    {
       
       return $this->belongsTo('App\Nivel','nivel');

    }


}
