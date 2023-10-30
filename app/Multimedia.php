<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table   = 'multimedia';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'ruta',
        'subcont',
        'ext',

    ];

    public function setNombreAttribute($nombre)
    {

        try {
            $nomb = 'archivo-multimedia' . md5(uniqid(mt_rand())) . "." . $nombre->getClientOriginalExtension();

            \Storage::disk('files')->put($nomb, \File::get($nombre));

            $this->attributes['nombre'] = $nombre->getClientOriginalName();
            $this->attributes['ext']    = $nombre->getClientOriginalExtension();
            $this->attributes['ruta']   = $nomb;
        } catch (\Exception $e) {
            return response()->json(['messages' => 'No se puede subir el archivo'], 422);
        }

        //Storage::disk('fotografias')->put($nombre,\File::get($foto));

    }
    public function subCont()
    {

        return $this->belongsTo('App\SubContenido', 'subcont');

    }

}
