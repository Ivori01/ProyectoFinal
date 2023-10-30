<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeudaDescuento extends Model
{
   protected $table ='deuda_descuento';
   
    public $timestamps=false;
   

    protected $fillable=[
     
      'deuda',
      'descuento',
      'caja'
   
   
    ];   


        public function descuentoInfo()
    {
      return $this->belongsTo('App\Descuento','descuento');
    }

}
