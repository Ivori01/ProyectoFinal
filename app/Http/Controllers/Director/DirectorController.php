<?php
namespace App\Http\Controllers\Director;

use App\Director;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Repositories\DirectorRepository;
use App\Repositories\PersonaRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class DirectorController extends Controller
{

    protected $persona;
    protected $Director;

    public function __construct(PersonaRepository $persona, DirectorRepository $Director)
    {

        $this->persona  = $persona;
        $this->Director = $Director;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.director.index');
    }

    public function getAll()
    {

        $Directors = Director::with('persona')->get();

        $output = array('rows' => array());
        foreach ($Directors as $Director) {
            $datosDirector = $Director->persona;
            $actionButton  = '<div class=" action-buttons">
            <a class="text-blue"  href="' . route("Director.Director.Show", ["id" => $datosDirector->id]) . '">
            <i class="ace-icon fa fa-search-plus bigger-130"></i>
            </a>

            <a class="text-success"  href="' . route("Director.Director.Edit", ["id" => $datosDirector->id]) . '" >
            <i class="ace-icon fa fa-pen bigger-130"></i>
            </a>

            <a class="text-danger" data-target="#modal-destroy" href="" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Director.Destroy', ['id' => $datosDirector->id]) . "'" . ')" >
            <i class="ace-icon fa fa-trash bigger-130"></i>
            </a>
            </div>
            ';

            $output['rows'][] = array(
                $datosDirector->id,
                $datosDirector['nrodocumento'],
                $datosDirector->ApellidosNombres,
                $datosDirector->fechanacimiento->toDateString(),
                '
                <a class="venobox" href="' . url(Storage::url('sistem/photos/' . $datosDirector['foto'])) . '"><img class="thumbnail border border-secondary rounded-circle" height="40" width="40" src="' . url(Storage::url('sistem/photos/' . $datosDirector['foto'])) . '"/></a>',
                $this->persona->Estado($Director->estado),
                $actionButton,

            );
        }

        return response()->json($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('director.director.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $persona = $this->persona->save($request);
        return $this->Director->save($request, $persona);

    }

    public function store2(Request $request)
    {

        return $this->Director->save2($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Persona  = Persona::findOrFail($id);
        $Director = Director::findOrFail($id);

        return view('director.director.show', ['Persona' => $Persona, 'director' => $Director]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('director.director.edit', ['Persona' => $this->persona->find($id), 'director' => $this->Director->find($id)]);

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
        $this->persona->update($request, $id);
        $this->Director->update($request, $id);

        return response()->json(['message' => 'Registro actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->Director->destroy($id);
    }

    public function Check(Request $request)
    {

        return $this->Director->Check($request);

    }

}
