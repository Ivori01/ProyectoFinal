<?php

namespace App\Http\Controllers\Secretaria;

use App\Apoderado;
use App\Http\Controllers\Controller;
use App\Http\Response;
use App\Persona;
use App\Repositories\ApoderadoRepository;
use App\Repositories\PersonaRepository;
use Illuminate\Http\Request;
use Storage;

class ApoderadoController extends Controller
{

    protected $apoderado;
    protected $persona;

    public function __construct(ApoderadoRepository $apoderado, PersonaRepository $persona)
    {
        $this->apoderado = $apoderado;
        $this->persona   = $persona;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('secretaria.apoderado.index');
    }

    public function Retrieve()
    {

        $apoderados = Apoderado::with('persona')->get();
        $output     = array('rows' => array());
        foreach ($apoderados as $apoderado) {
            $datosapoderado = $apoderado->persona;

            $actionButton = '<div class=" action-buttons">
                    <a class="blue"  href="' . route("Secretaria.Apoderado.Show", ["apoderado" => $datosapoderado->id]) . '" >
                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>

                    <a class="text-success" href="' . route("Secretaria.Apoderado.Edit", ["apoderado" => $datosapoderado->id]) . '" >
                    <i class="ace-icon fa fa-pen bigger-130"></i>
                    </a>


                    </div>
            ';

            $output['rows'][] = array(
$datosapoderado->id,
                $datosapoderado['nrodocumento'],
                $datosapoderado->ApellidosNombres,
                $datosapoderado['direccion'],
                '
<a class="venobox" href="' . url(Storage::url('sistem/photos/' . $datosapoderado['foto'])) . '"><img class="thumbnail border border-secondary rounded-circle" height="40" width="40" src="' . url(Storage::url('sistem/photos/' . $datosapoderado['foto'])) . '"/></a>',
                $this->persona->Estado($apoderado->estado),
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
        return view('secretaria.apoderado.create');
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
        return $this->apoderado->save($request, $persona);

    }

    public function store2(Request $request)
    {

        return $this->apoderado->save2($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('secretaria.apoderado.show', ['Persona' => $this->persona->find($id), 'Apoderado' => $this->apoderado->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('secretaria.apoderado.edit', ['Persona' => $this->persona->find($id), 'Apoderado' => $this->apoderado->find($id)]);
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

        $this->apoderado->update($request, $id);  

        return response()->json(['message' => 'Registro actualizado correctamente']);
    }

    public function SearchLive(Request $request)
    {

        $tags = Persona::where('nrodocumento', 'like', '%' . $request->q . "%")->limit(100)->get();
        /*$tags = Apoderado::where('nrodocumento', 'like', '%' . $request->q . "%")->where('estado', 'Activo')->limit(5)->get();*/

        $formatted_tags = [];
/*->where('estado', 'Activo')*/
        foreach ($tags as $tag) {

            if ($tag->apoderado) {

                if ($tag->apoderado->count() > 0) {
                    $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->nombres . ' ' . $tag->apellidos, 'nrodocumento' => $tag->nrodocumento, 'img' => $tag->foto];
                }
            }

        }

        $arrayName = array('data' => $formatted_tags, 'pagination' => array("more" => 'true'));

        return response()->json($arrayName);

    }

    public function Check(Request $request)
    {

        return $this->apoderado->Check($request);

    }

}
