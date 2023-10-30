<?php
namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Repositories\AnioAcademicoRepository;
use App\Repositories\TrimestreRepository;
use App\Trimestre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrimestreController extends Controller
{

    protected $trimestre;
    protected $AnioAcademico;

    public function __construct(TrimestreRepository $trimestre, AnioAcademicoRepository $AnioAcademico)
    {
        $this->trimestre     = $trimestre;
        $this->AnioAcademico = $AnioAcademico;

    }

    public function getAll()
    {
        $trimestres = Trimestre::orderBy('periodo')->orderBy('numero')->get();
        $output     = array('rows' => array());

        foreach ($trimestres as $trimestre) {
            $actionButton = '<div class=" action-buttons">

        <a class="text-success" data-target="#modal-update" href="#" data-toggle="modal"  onclick="edittrimestre(' . "'" . route("Director.Trimestre.Edit", ["id" => $trimestre]) . "'" . ')">
        <i class="ace-icon fa fa-pen bigger-130"></i>
        </a>

        <a class="text-danger" data-target="#modal-destroy" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Trimestre.Destroy', ['id' => $trimestre]) . "'" . ')" >
        <i class="ace-icon fa fa-trash bigger-130"></i>
        </a>
        </div>
        ';

            $output['rows'][] = array(

                $trimestre->periodo,
                $trimestre->numero . '°',
                $trimestre->nombre,
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
        return view('director.trimestre.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->trimestre->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $trimestre = Trimestre::find($id);

            $ruta = route("Director.Trimestre.Update", ["id" => $trimestre->id]);

            return response()->json(['trimestre' => $trimestre, 'ruta' => $ruta]);
        } else {
            abort(404);
        }
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
        $Curso = Trimestre::findOrFail($id);
        $Curso->update($request->all());
        return response()->json(['message' => 'Registro actualizado correctamente', 'success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Trimestre::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }
}
