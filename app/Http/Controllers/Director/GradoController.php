<?php

namespace App\Http\Controllers\Director;
  
use App\Grado;
use App\Http\Controllers\Controller;
use App\Nivel;
use App\Repositories\GradoRepository;
use Illuminate\Http\Request;

class GradoController extends Controller
{

    protected $grado;

    protected $niveles;
  
    public function __construct(GradoRepository $grado)
    {
        $this->grado   = $grado;
        $this->niveles = Nivel::All();
    }

    public function getAll()
    {
        $Grados = $this->grado->all();
        $output = array('rows' => array());
        foreach ($Grados as $Grado) {
            $actionButton = '<div class=" action-buttons">

        <a class="text-success" data-target="#modal-update" href="#" data-toggle="modal"  onclick="edit(' . "'" . route("Director.Grado.Edit", ["id" => $Grado]) . "'" . ')">
        <i class="ace-icon fa fa-pen bigger-130"></i>
        </a>

        <a class="text-danger" data-target="#modal-destroy" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Grado.Destroy', ['id' => $Grado]) . "'" . ')" >
        <i class="ace-icon fa fa-trash bigger-130"></i>
        </a>
        </div>
        ';

            $output['rows'][] = array(
                $Grado->nombre,
              $Grado->numero,
                '<span class="badge badge-lg text-white" style=" background-color: ' . $Grado->DatosNivel['color'] . '">' . $Grado->DatosNivel['nombre'] . '</span>',
                $this->grado->estado($Grado->estado),
                $actionButton,
            );
        }

        return response()->json($output);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.grado.index', ['niveles' => $this->niveles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->grado->save($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $grado = $this->grado->find($id);

        $estadogrado = "";
        foreach ($grado->estados as $estado) {
            $selected = "";
            if ($estado == $grado->estado) {
                $selected = '<option value=' . $estado . ' selected=""> ' . $estado . '</option>';
            } else {
                $selected = '<option value=' . $estado . ' > ' . $estado . '</option>';
            }
            $estadogrado .= $selected;
        }
        $estadogrado = ' <select name="estado" class="select2" data-placeholder="Estado" >' . $estadogrado . '</select>  ';

        $ruta = route("Director.Grado.Update", ["id" => $grado]);

        return response()->json(['ruta' => $ruta, 'estado' => $estadogrado]);

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
        return $this->grado->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->grado->destroy($id);
    }
}
