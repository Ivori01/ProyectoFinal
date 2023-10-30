<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{

    protected $table      = 'notas';
    protected $primaryKey = 'idnota';
    public $timestamps    = false;
    public $incrementing  = false;

    protected $fillable = [

        'id_matricula',
        'nota',
        'criterio',
        'trimestre',

    ];

    public function persona()
    {

        return $this->belongsTo('App\Persona', 'nrodocumento');

    }

    public function datosCursoCriterio()
    {
        return $this->belongsTo('App\CursoCriterio', 'criterio');
    }

}
