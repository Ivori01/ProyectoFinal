<?php

namespace App\Http\Controllers\Director;
use Storage;
use App\Http\Controllers\Controller;
use App\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {

        $info = Info::firstOrCreate(['id' => 1]);

        return view('director.info', ['info' => $info]);
    }

    public function update(Request $request, $info)
    {
        $info = Info::findOrFail(1);
        if ($request->hasFile('logo')) {

            $imagenantigua = $info->logo;
            Storage::disk('fotografias')->delete($imagenantigua);

        }
            if ($request->hasFile('logo_i')) {

            $imagenantigua = $info->logo_i;
            Storage::disk('fotografias')->delete($imagenantigua);

        }
        if ($request->hasFile('logo_d')) {

            $imagenantigua = $info->logo_d;
            Storage::disk('fotografias')->delete($imagenantigua);

        }
       if(!$request->has('restringir_notas')){
        $request->request->add(['restringir_notas' => '0']);
       }
        $info->update($request->all());
        return response()->json(['message' => 'Registro actualizado correctamente']);

    }
}
