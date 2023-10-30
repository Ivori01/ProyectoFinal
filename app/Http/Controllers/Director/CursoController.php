<?php
namespace App\Http\Controllers\Director;

use App\Curso;
use App\Http\Controllers\Controller;
use App\Nivel;
use App\Repositories\CursoRepository;
use Illuminate\Http\Request;
use Storage;

class CursoController extends Controller
{

    protected $curso;

    protected $niveles;

    public function __construct(CursoRepository $curso)
    {
        $this->curso   = $curso;
        $this->niveles = Nivel::All();

    }

    public function getAll()
    {
        $cursos = Curso::orderBy('nivel')->get();
        $output = array('rows' => array());
        foreach ($cursos as $curso) {

          
            $actionButton = '<div class=" action-buttons">

        <a class="text-success" data-target="#modal-update" href="#" data-toggle="modal"  onclick="editcurso(' . "'" . route("Director.Curso.Edit", ["id" => $curso]) . "'" . ')">
        <i class="ace-icon fa fa-pen text-130"></i>
        </a>

        <a class="text-danger" data-target="#modal-destroy" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Curso.Destroy', ['id' => $curso]) . "'" . ')" >
        <i class="ace-icon fa fa-trash text-130"></i>
        </a>
        </div>
        ';

            $nivel = '<span class="badge badge-lg text-white " style=" background-color: ' . $curso->DatosNivel['color'] . '">' . $curso->DatosNivel['nombre'] . '</span>';

            $output['rows'][] = array(
                $curso->nombre,
                $nivel,
                $this->curso->estado($curso->estado),
                '<a class="venobox" href="' . url(Storage::url('sistem/photos/curso/' . $curso['imagen'])) . '"><img class="thumbnail border border-secondary rounded-circle" height="40" width="40" src="' . url(Storage::url('sistem/photos/curso/' . $curso['imagen'])) . '"/></a>',
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
        return view('director.curso.index', ['niveles' => $this->niveles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->curso->save($request);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $curso = $this->curso->find($id);

        $estadocurso = "";
        foreach ($curso->estados as $estado) {
            $selected = "";
            if ($estado == $curso->estado) {
                $selected = '<option value=' . $estado . ' selected=""> ' . $estado . '</option>';
            } else {
                $selected = '<option value=' . $estado . ' > ' . $estado . '</option>';
            }
            $estadocurso .= $selected;
        }
        $estadocurso = ' <select name="estado" class="select2" data-placeholder="Estado" >' . $estadocurso . '</select>  ';

        $ruta = route("Director.Curso.Update", ["id" => $curso]);

        return response()->json(['nombre' => $curso->nombre, 'ruta' => $ruta, 'estado' => $estadocurso, 'foto' => $curso->imagen]);

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
        return $this->curso->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->curso->destroy($id);
    }

}
