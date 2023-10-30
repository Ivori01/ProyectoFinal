<?php
namespace App\Http\Controllers\Director;

use App\Docente;
use App\Http\Controllers\Controller;
use App\Nivel;
use App\Persona;
use App\Repositories\DocenteRepository;
use App\Repositories\PersonaRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;
use PDF;
use App\Repositories\ApoderadoRepository;
class DocenteController extends Controller
{

    protected $persona;
    protected $docente;
    protected $niveles;
    protected $apoderado;

    public function __construct(PersonaRepository $persona, DocenteRepository $docente,ApoderadoRepository $apoderado)
    {

        $this->persona = $persona;
        $this->docente = $docente;
        $this->niveles = Nivel::All();
        $this->apoderado = $apoderado;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.docente.index');
    }

    public function getAll()
    {

        $docentes = Docente::with('persona')->get();

        $output = array('rows' => array());
        foreach ($docentes as $docente) {
            $datosdocente = $docente->persona;
            $actionButton = '<div class=" action-buttons">
            <a class="text-blue"  href="' . route("Director.Docente.Show", ["id" => $datosdocente->id]) . '">
            <i class="ace-icon fa fa-search-plus bigger-130"></i>
            </a>

            <a class="text-success"  href="' . route("Director.Docente.Edit", ["id" => $datosdocente->id]) . '" >
            <i class="ace-icon fa fa-pen bigger-130"></i>
            </a>

            <a class="text-danger" data-target="#modal-destroy" href="" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Docente.Destroy', ['id' => $datosdocente->id]) . "'" . ')" >
            <i class="ace-icon fa fa-trash bigger-130"></i>
            </a>
            </div>
            ';

            $niveles=null;
            foreach ($docente->niveles as $nivel) {
                $niveles.='<li>'.$nivel->datosNivel->nombre.'</li>';
            }

            $output['rows'][] = array(
                $datosdocente->id,
                $datosdocente['nrodocumento'],
                $datosdocente['nombres'],
                $datosdocente['apellidos'],
                '
                <a class="venobox" href="' . url(Storage::url('sistem/photos/' . $datosdocente['foto'])) . '"><img class="thumbnail border border-secondary rounded-circle" height="40" width="40" src="' . url(Storage::url('sistem/photos/' . $datosdocente['foto'])) . '"/></a>',
                $niveles,
                $docente->especialidad,
                $this->persona->Estado($docente->estado),
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

        return view('director.docente.create', ["niveles" => $this->niveles]);
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
        return $this->docente->save($request, $persona);

    }

    public function store2(Request $request)
    {

        return $this->docente->save2($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Persona = Persona::findOrFail($id);
        $docente = Docente::findOrFail($id);

        return view('director.docente.show', ['Persona' => $Persona, 'Docente' => $docente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('director.docente.edit', ['Persona' => $this->persona->find($id), 'docente' => $this->docente->find($id), "niveles" => $this->niveles]);

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
        $this->docente->update($request, $id);

        return response()->json(['message' => 'Registro Actualizado Correctamente', 'success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->docente->destroy($id);
    }

    public function Check(Request $request)
    {

        return $this->docente->Check($request);

    }


    public function docentesPDF(){
       
        $alumnos=Docente::all();
        return PDF::loadView('template-pdf.docentes',
        [
            'alumnos' => $alumnos,
          
        ])
       
        ->stream('Padres.pdf');
        
     }

}
