<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Nivel;
use App\Repositories\NivelRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NivelController extends Controller
{

    protected $Nivel;

    public function __construct(NivelRepository $Nivel)
    {
        $this->Nivel = $Nivel;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.nivel.index');
    }

    public function getAll()
    {
        $cursos = Nivel::all();
        $output = array('rows' => array());
        foreach ($cursos as $curso) {
            $actionButton = '<div class=" action-buttons">

        <a class="text-success" data-target="#modal-update" href="#" data-toggle="modal"  onclick="editNivel(' . "'" . route("Director.Nivel.Edit", ["id" => $curso->id]) . "'" . ')">
        <i class="ace-icon fa fa-pen bigger-130"></i>
        </a>

        <a class="text-danger" data-target="#modal-destroy" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Nivel.Destroy', ['id' => $curso->id]) . "'" . ')" >
        <i class="ace-icon fa fa-trash bigger-130"></i>
        </a>
        </div>
        ';

            $output['rows'][] = array(

                $curso['nombre'],
                $curso['descripcion'],
                $actionButton,

            );
        }

        return response()->json($output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Nivel->save($request);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $Nivel   = Nivel::find($id);
      

        $radio   = "";
        $cheched = "";
     

        $Nivel['ruta']  = route("Director.Nivel.Update", ["id" => $Nivel]);
      

        return response()->json(['Nivel' => $Nivel]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->Nivel->update($request, $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->Nivel->destroy($id);

    }
}
