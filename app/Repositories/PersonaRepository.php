<?php
namespace App\Repositories;

use App\Persona;
use Illuminate\Http\Request;
use Storage;
use Validator;

/**
 *
 */
class PersonaRepository
{

    public function save(Request $request)
    {
        $Persona = null;
        if ($request->hasFile('foto')) {
            $Persona = Persona::create($request->all());
        } else {
            $Persona       = Persona::create($request->all());
            $imgdefault    = ($request->input('genero') == 'M') ? 'boy.jpg' : 'girl.jpg';
            $Persona->foto = $imgdefault;
            $Persona->save();

        }
        return Persona::where('nrodocumento', $request->nrodocumento)->first();

    }

    public function find($id)
    {
        return Persona::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Persona = Persona::findOrFail($id);  

        if ($request->hasFile('foto')) {
            if ($Persona->foto != 'boy.jpg' && $Persona->foto != 'girl.jpg') {
                $imagenantigua = $Persona->foto;
                Storage::disk('fotografias')->delete($imagenantigua);
            }

        }
        //dd($Persona->nrodocumento   !==  $request->nrodocumento);
        if ('"'.$Persona->nrodocumento. '"' !=  '"'. $request->nrodocumento.'"') {
            $v = Persona::where('nrodocumento', $request->nrodocumento)->count();
           
            if ($v > 0) {
                abort(500, 'Numero de documento duplicado');
                /*return response()->json(['messages' => 'Numero de documento duplicado'], 422);*/
            }
        }
        return $Persona->update($request->all());
    }

    public function Check(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nrodocumento' => 'unique:' . $request->model,

        ]);

        if ($validator->fails()) {
            return 'false';
        } else {
            return 'true';
        }

    }

    public function SearchLive(Request $request)
    {

        $tags = Persona::where('nrodocumento', 'like', '%' . $request->q . "%")->limit(10)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->nombres . ' ' . $tag->apellidos, 'nrodocumento' => $tag->nrodocumento, 'img' => $tag->foto];
        }

        $arrayName = array('data' => $formatted_tags, 'pagination' => array("more" => 'true'));

        return response()->json($arrayName);

    }

    public function Estado($estado)
    {
        $estadoPersona = "";
        switch ($estado) {

            case 'Activo':
                $estadoPersona = '<span class="badge badge-sm badge-success arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

            case 'Inactivo':
                $estadoPersona = '<span class="badge badge-sm badge-danger arrowed-in arrowed-in-right">' . $estado . '</span>';
                break;

        }

        return $estadoPersona;
    }

}
