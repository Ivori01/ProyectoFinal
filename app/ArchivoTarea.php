<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoTarea extends Model
{
    protected $table   = 'archivo_tarea';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'ruta',
        'tarea',
        'ext',

    ];

    public function setNombreAttribute($nombre)
    {

        try {
            $nomb = 'archivo-tarea' . md5(uniqid(mt_rand())) . "." . $nombre->getClientOriginalExtension();

            \Storage::disk('files')->put($nomb, \File::get($nombre));

            $this->attributes['nombre'] = $nombre->getClientOriginalName();
            $this->attributes['ext']    = $nombre->getClientOriginalExtension();
            $this->attributes['ruta']   = $nomb;
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
