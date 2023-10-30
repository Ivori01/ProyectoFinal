<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Persona extends Model
{

    protected $table   = 'persona';
    public $timestamps = false;

    protected $dates = [
        'fechanacimiento',
    ];
    protected $fillable = [
        'tipodocumento',
        'nrodocumento',
        'nombres',
        'apellidos',
        'genero',
        'fechanacimiento',
        'direccion',
        'celular',
        'telefono',
        'correo',
        'foto',
        'descripcion',
        'facebook',
        'whatsapp',
        'twitter',
        'instagram'

    ];

    protected $appends = ['ApellidosNombres', 'NombresApellidos'];

    public function setFotoAttribute($foto)  
    {
        if (is_string($foto)) {
            $this->attributes['foto'] = $foto;
        } else {

            try {
                $nombre = md5(uniqid(mt_rand())) . "." . $foto->getClientOriginalExtension();
                $imagen = Image::make($foto);
                $imagen->resize(180, 250);
                $imagen->fit(210, 260);
                $imagen->save('storage/sistem/photos/' . $nombre);
                $this->attributes['foto'] = $nombre;
            } catch (\Exception $e) {
                return response()->json(['messages' => 'No se puede subir la imagen'], 422);
            }

            //Storage::disk('fotografias')->put($nombre,\File::get($foto));

        }

    }

    public function setNombresAttribute($nombres)
    {

        $this->attributes['nombres'] = title_case($nombres);
    }

    public function setFechaNacimientoAttribute($fechanacimiento)
    {

        $this->attributes['fechanacimiento'] = date("Y", strtotime($fechanacimiento)) . '-' . date("m", strtotime($fechanacimiento)) . '-' . date("d", strtotime($fechanacimiento));
        //date('H:i:s')
    }

    public function setApellidosAttribute($apellidos)
    {

        $this->attributes['apellidos'] = title_case($apellidos);
    }

    public function getApellidosNombresAttribute()
    {
        return "{$this->apellidos} {$this->nombres}";
    }

    public function getNombresApellidosAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }

    public function docente()
    {
        return $this->belongsTo('App\Docente', 'id');
    }
   
    public function alumno()
    {
        return $this->hasOne('App\Alumno', 'persona_id');
    }
    public function usuario()
    {
        return $this->hasOne('App\User', 'user');
    }
}
