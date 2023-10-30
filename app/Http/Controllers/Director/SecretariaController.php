<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Persona;
use App\Repositories\PersonaRepository;
use App\Repositories\SecretariaRepository;
use App\Secretaria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class SecretariaController extends Controller
{

    protected $persona;
    protected $Secretaria;

    public function __construct(PersonaRepository $persona, SecretariaRepository $Secretaria)
    {

        $this->persona    = $persona;
        $this->Secretaria = $Secretaria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.secretaria.index');
    }

    public function getAll()
    {

        $Secretarias = Secretaria::with('persona')->get();

        $output = array('rows' => array());
        foreach ($Secretarias as $Secretaria) {
            $datosSecretaria = $Secretaria->persona;
            $actionButton    = '<div class=" action-buttons">
            <a class="blue"  href="' . route("Director.Secretaria.Show", ["id" => $datosSecretaria->id]) . '">
            <i class="ace-icon fa fa-search-plus bigger-130"></i>
            </a>

            <a class="text-success"  href="' . route("Director.Secretaria.Edit", ["id" => $datosSecretaria->id]) . '" onclick="editproduct(' . "'" . $Secretaria[0] . "'" . ')">
            <i class="ace-icon fa fa-pen bigger-130"></i>
            </a>

            <a class="text-danger" href="" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Secretaria.Destroy', ['id' => $datosSecretaria->id]) . "'" . ')" >
            <i class="ace-icon fa fa-trash bigger-130"></i>
            </a>
            </div>
            ';

            $output['rows'][] = array(
                 $datosSecretaria->id,
                $datosSecretaria['nrodocumento'],
                $datosSecretaria->ApellidosNombres,
                $datosSecretaria->fechanacimiento->toDateString(),
                '
                <a class="venobox" href="' . url(Storage::url('sistem/photos/' . $datosSecretaria['foto'])) . '"><img class="thumbnail border border-secondary rounded-circle" height="40" width="40" src="' . url(Storage::url('sistem/photos/' . $datosSecretaria['foto'])) . '"/></a>',
                $this->persona->Estado($Secretaria->estado),
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

        return view('director.secretaria.create');
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
        return $this->Secretaria->save($request, $persona);

    }

    public function store2(Request $request)
    {

        return $this->Secretaria->save2($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Persona    = Persona::findOrFail($id);
        $Secretaria = Secretaria::findOrFail($id);

        return view('director.secretaria.show', ['Persona' => $Persona, 'Secretaria' => $Secretaria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('director.secretaria.edit', ['Persona' => $this->persona->find($id), 'Secretaria' => $this->Secretaria->find($id)]);

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
        $this->Secretaria->update($request, $id);

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
        return $this->Secretaria->destroy($id);
    }

    public function Check(Request $request)
    {

        return $this->Secretaria->Check($request);

    }
}
