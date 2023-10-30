<?php

namespace App\Http\Controllers\Director;

use App\Alumno;
use App\Apoderado;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Nivel;
use App\Persona;
use App\Repositories\AlumnoRepository;
use App\Repositories\ApoderadoRepository;
use App\Repositories\PersonaRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;
use PDF;
class AlumnoController extends Controller
{

    protected $alumno;
    protected $persona;
    protected $apoderado;

    private $estados = array("Estudiando", "Egresado", "Suspendido", "Retirado");

    public function __construct(AlumnoRepository $alumno, PersonaRepository $persona,ApoderadoRepository $apoderado)
    {
        $this->alumno    = $alumno;
        $this->persona   = $persona;
        $this->apoderado = $apoderado;
        $this->helper    = new Helper;
        $this->middleware(['role:Director']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.alumno.index');
    }

    public function getAll()
    {

        $alumnos = Alumno::with('persona')->get();

        $output = array('rows' => array());
        foreach ($alumnos as $alumno) {
            $datosalumno  = $alumno->persona;
        
            $actionButton = '
             <div class=" action-buttons">
                    <a class="text-blue"  href="' . route("Director.Alumno.Show", ["id" => $alumno->id]) . '" >
                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>

                    <a class="text-success" href="' . route("Director.Alumno.Edit", ["id" => $alumno->id]) . '" >
                    <i class="ace-icon fa fa-pen bigger-130"></i>
                    </a>

                    <a class="text-danger" data-target="#modal-destroy" href="" data-toggle="modal"  onclick="deleteS(' . "'" . route('Director.Alumno.Destroy', ['id' => $alumno->id]) . "'" . ')">
                    <i class="ace-icon fa fa-trash bigger-130"></i>
                    </a>

            </div>';

            $output['rows'][] = array(
                $alumno->id,
                $datosalumno['nrodocumento'],
                $datosalumno['nombres'],
                $datosalumno['apellidos'],
                $datosalumno->direccion,
                '
                <a class="venobox" href="' . url(Storage::url('sistem/photos/' . $datosalumno['foto'])) . '"><img class="thumbnail border border-secondary rounded-circle" height="40" width="40" src="' . url(Storage::url('sistem/photos/' . $datosalumno['foto'])) . '"/></a>',
                $this->alumno->estadoacademico($alumno->estadoacademico),
                '<a class="btn btn-info btn-sm" href="'.route('Director.Carnet.Pdf',['id'=>$alumno]).'"> <i class="fas fa-id-card text-140 align-text-bottom mr-1"></i>Carnet </a>',
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

        return view('director.alumno.create',['niveles'=>Nivel::all()]);
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

        return $this->alumno->save($request, $persona);

    }

    public function store2(Request $request)
    {

        return $this->alumno->save2($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $alumno  = Alumno::findOrFail($id);
        $Persona = $alumno->persona;
        return view('director.alumno.show', ['Persona' => $Persona, 'Alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno  = Alumno::findOrFail($id);
        $Persona = $alumno->persona;
        return view('director.alumno.edit', ['Persona' => $Persona, 'alumno' => $alumno, "estados" => $this->estados
    ,'niveles'=>Nivel::all()]);

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
           $alumno=Alumno::find($id);
         
        $this->persona->update($request, $alumno->persona_id);
        $this->alumno->update($request, $id);

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
        return $this->alumno->destroy($id);
    }

    public function SearchLive(Request $request)
    {
        $tags = Persona::where('nrodocumento', 'like', '%' . $request->q . "%")->limit(100)->get();

        /* $tags = Alumno::where('nrodocumento', 'like', '%' . $request->q . "%")->where('estadoacademico', 'Estudiando')->limit(5)->get();*/

        $formatted_tags = [];

        foreach ($tags as $tag) {
            if ($tag->alumno) {
                if ($tag->alumno->estadoacademico == 'Estudiando') {
                    $formatted_tags[] = ['id' => $tag->alumno->id, 'text' => $tag->nombres . ' ' . $tag->apellidos, 'nrodocumento' => $tag->nrodocumento, 'img' => $tag->foto];
                }
            }
        }

        $arrayName = array('data' => $formatted_tags, 'pagination' => array("more" => 'true'));

        return response()->json($arrayName);

    }

    public function SearchLiveAll(Request $request)
    {
        $tags = Persona::where('nrodocumento', 'like', '%' . $request->q . "%")->limit(100)->get();

        /* $tags = Alumno::where('nrodocumento', 'like', '%' . $request->q . "%")->where('estadoacademico', 'Estudiando')->limit(5)->get();*/

        $formatted_tags = [];

        foreach ($tags as $tag) {
            if ($tag->alumno) {

                $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->nombres . ' ' . $tag->apellidos, 'nrodocumento' => $tag->nrodocumento, 'img' => $tag->foto];

            }
        } 

        $arrayName = array('data' => $formatted_tags, 'pagination' => array("more" => 'true'));

        return response()->json($arrayName);

    }

    public function getGrados(Request $request)
    {

        $persona         = Persona::findOrFail($request->persona);
        $alumno          = $persona->alumno;
        $matriculas      = $alumno->matriculas;
        $matriculas_tags = [];

        foreach ($matriculas as $matricula) {
            $grado = $matricula->datosSeccion->datosGrado;
            $anio  = $matricula->datosSeccion->datosAnioNivel->datosAnio->anio;

            $matriculas_tags[] = [
                "id"   => $matricula->id,
                "text" => $grado->numero . '° ' . $grado->datosNivel->nombre . ' - ' . $anio,

            ];

        }

        return response()->json(["data"=>$matriculas_tags]);

    }

    public function Check(Request $request)
    {

        return $this->apoderado->Check($request);

    }

    public function carnetPdf($id){
        $alumno=Alumno::findOrFail($id);
        return Pdf::loadView('alumno.carnet.pdf',['alumno'=>$alumno])->stream('comprobante de pago.pdf');
    }

}
