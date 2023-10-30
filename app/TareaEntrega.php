<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TareaEntrega extends Model
{
    protected $table = 'entrega_tarea';
    //public $timestamps = false;

    protected $fillable = [
        'fecha',
        'alumno',
        'tarea',
        'ext',
        'archivo',
        'archivo_name',
        'contenido',

    ];

    public function setArchivoAttribute($archivo)
    {

        try {
            if (is_file($archivo)) {
                $nomb = 'archivo-ent-tarea' . md5(uniqid(mt_rand())) . "." . $archivo->getClientOriginalExtension();

                \Storage::disk('files')->put($nomb, \File::get($archivo));

                $this->attributes['archivo_name'] = $archivo->getClientOriginalName();
                $this->attributes['ext']          = $archivo->getClientOriginalExtension();
                $this->attributes['archivo']      = $nomb;
            }
        } catch (\Exception $e) {
            return response()->json(['messages' => 'No se puede subir el archivo'], 422);
        }

        //Storage::disk('fotografias')->put($nombre,\File::get($foto));

    }
    public function datosTarea()
    {

        return $this->belongsTo('App\Tarea', 'tarea');

    }

}
