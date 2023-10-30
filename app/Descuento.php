<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
        protected $table ='descuento';
   
    public $timestamps=false;
   

    protected $fillable=[
     
      'descripcion',
      'cantidad'    
   
    ];
}
