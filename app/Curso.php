<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
class Curso extends Model
{
    protected $table   = 'curso';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'nivel',
        'estado',
        'imagen',
    ];

    protected $appends = ['estados'];

    public function setImagenAttribute($imagen)
    {
        if (is_string($imagen)) {
            $this->attributes['imagen'] = $imagen;
        } else {

            try {
                $nombre = md5(uniqid(mt_rand())) . "." . $imagen->getClientOriginalExtension();
                $imagen = Image::make($imagen); 
                /* $imagen->resize(180, 250);
                $imagen->fit(210, 260);*/
            
                $imagen->save('storage/sistem/photos/curso/' . $nombre);
                $this->attributes['imagen'] = $nombre;
            } catch (\Exception $e) {
                return response()->json(['messages' => 'No se puede subir la imagen'], 422);
            }

            //Storage::disk('imagengrafias')->put($nombre,\File::get($imagen));

        }

    }

    public function setNombreAttribute($nombre)
    {

        $this->attributes['nombre'] = title_case($nombre);

    }

    public function setDescripcionAttribute($descripcion)
    {

        $this->attributes['descripcion'] = title_case($descripcion);
    }

    public function getEstadosAttribute()
    {
        return array('Activo', 'Inactivo');
    }

    public function planGradoCurso()
    {
        return $this->hasMany('App\PlanAcademicoGradoCurso', 'curso');
    }

    public function DatosNivel()
    {

        return $this->belongsTo('App\Nivel', 'nivel');

    }

}
