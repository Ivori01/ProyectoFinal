<?php

namespace App;
use Storage;
use Image;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'direccion',
        'telefono',
        'mail',
        'logo',
        'logo_i',
        'logo_d',
        'restringir_notas',
        'simbolo_moneda'

    ];

    public function setLogoAttribute($logo)
    {
        if (is_string($logo)) {
            $this->attributes['logo'] = $logo;
        } else {

            try {
                $nombre = md5(uniqid(mt_rand())) . "." . $logo->getClientOriginalExtension();
                $imagen = Image::make($logo);
                //$imagen->resize(180, 250);
               // $imagen->fit(210, 260);
                $imagen->save('storage/sistem/photos/' . $nombre);
                $this->attributes['logo'] = $nombre;
            } catch (\Exception $e) {
                return response()->json(['messages' => 'No se puede subir la imagen'], 422);
            }

            //Storage::disk('logografias')->put($nombre,\File::get($logo));

        }

    }

    public function setLogoIAttribute($logo)
    {
        if (is_string($logo)) {
            $this->attributes['logo_i'] = $logo;
        } else {

            try {
                $nombre = md5(uniqid(mt_rand())) . "." . $logo->getClientOriginalExtension();
                $imagen = Image::make($logo);
                //$imagen->resize(180, 250);
               // $imagen->fit(210, 260);
                $imagen->save('storage/sistem/photos/' . $nombre);
                $this->attributes['logo_i'] = $nombre;
            } catch (\Exception $e) {
                return response()->json(['messages' => 'No se puede subir la imagen'], 422);
            }

            //Storage::disk('logografias')->put($nombre,\File::get($logo));

        }

    }

    public function setLogoDAttribute($logo)
    {
        if (is_string($logo)) {
            $this->attributes['logo_d'] = $logo;
        } else {

            try {
                $nombre = md5(uniqid(mt_rand())) . "." . $logo->getClientOriginalExtension();
                $imagen = Image::make($logo);
                //$imagen->resize(180, 250);
               // $imagen->fit(210, 260);
                $imagen->save('storage/sistem/photos/' . $nombre);
                $this->attributes['logo_d'] = $nombre;
            } catch (\Exception $e) {
                return response()->json(['messages' => 'No se puede subir la imagen'], 422);
            }

            //Storage::disk('logografias')->put($nombre,\File::get($logo));

        }

    }
}
