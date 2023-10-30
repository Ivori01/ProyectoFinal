<?php
namespace App;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
   protected $table ='nivel';
    public $timestamps=false;
    public $increment=false;
    protected $keyType = 'string';
    protected $fillable=[
      'nombre'	,
      'descripcion',
      'color',
      
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' =>'nivel', 'length' => 6, 'prefix' =>'0']);
        });
    }

   

   


    public function setNombreAttribute($nombre)
    {
          
           $this->attributes['nombre']= title_case($nombre);
         
    }

    
    public function setDescripcionAttribute($descripcion)
    {
           
            $this->attributes['descripcion']= title_case($descripcion);
    }

     

   

    public function planGradoCurso()
    {
      return $this->hasMany('App\PlanAcademicoGradoCurso','curso'); 
    }

}
