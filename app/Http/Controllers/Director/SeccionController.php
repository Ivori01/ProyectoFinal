<?php
namespace App\Http\Controllers\Director;

use App\AnioAcademico;
use App\AnioAcademicoNivel;
use App\DocenteNivel;
use App\Http\Controllers\Controller;
use App\Nivel;
use App\Repositories\AnioAcademicoRepository;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\Seccion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;

class SeccionController extends Controller
{
    protected $seccion;
    protected $grados;
    protected $AnioAcademico;

    private $letras = array("A", "B", "C", "D", "E");
    private $niveles;

    public function __construct(SeccionRepository $seccion, GradoRepository $grados, AnioAcademicoRepository $AnioAcademico)
    {
        $this->grados        = $grados;
        $this->seccion       = $seccion;
        $this->AnioAcademico = $AnioAcademico;
        $this->niveles       = Nivel::All();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.seccion.index', ['letras' => $this->letras, 'anios' => AnioAcademico::all(), 'grado_repo' => $this->grados]);
    }

    public function Retrieve()
    {
        $anio   = $this->AnioAcademico->findwhere(['estado' => 'Activo'])->first();
        $output = array('rows' => array());

        $anios=AnioAcademico::orderBy('estado')->get();
        foreach ($anios as $anio) {
            foreach ($anio->niveles as $nivel) {
                foreach ($nivel->secciones->sortBy('letra')->sortBy('datosGrado.numero') as $seccion) {
                    $buttons='<a href="'.route("alumnosPdf", ['id'=>$seccion]).'" class="btn btn-sm btn-outline-default shadow-sm radius-2px px-25 py-1">
                    Alumnos
                  </a>
                  <a href="'.route("padresPdf", ['id'=>$seccion]).'" class="btn btn-sm btn-outline-default shadow-sm radius-2px px-25 py-1">
                                      Padres
                                     
                                    </a>';
    
                    $actionButton = '<div class=" action-buttons">
            <a class="text-blue"  href="' . route("Director.Seccion.Show", ["id" => $seccion->id]) . '">
            <i class="ace-icon fa fa-search-plus bigger-130"></i>
            </a>
    
            <a class="text-success" data-target="#modal-update" href="#" data-toggle="modal"  onclick="editseccion(' . "'" . route("Director.Seccion.Edit", ["id" => $seccion->id]) . "'" . ')">
            <i class="ace-icon fa fa-pen bigger-130"></i>
            </a>
            <a class="text-danger" data-target="#modal-destroy" href="#" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Seccion.Destroy', ['id' => $seccion->id]) . "'" . ')" >
            <i class="ace-icon fa fa-trash bigger-130"></i>
            </a>
            </div>
            ';
    
                    $output['rows'][] = array(
    
                        $seccion->datosGrado->DatosNivel['nombre'],
                       $seccion->datosGrado->nombre,
                        $this->seccion->letra($seccion->letra),
                        $seccion['capacidad'],
                        $seccion->capacidad - $seccion->alumnos->count(),
                        optional($seccion->datosAnioNivel)->datosAnio->anio,
                        $buttons,
    
    
                        $actionButton,
    
                    );
                }
            }
        }

       

        return response()->json($output);
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $anio_nivel = AnioAcademicoNivel::findOrFail($request->anio_nivel);
            $grados     = $anio_nivel->planAcademico->grados;

            $select = "";

            foreach ($grados->sortBy('datosGrado.numero') as $grado) {
                $select .= '<option value="' . $grado->datosGrado->id . '"  > ' .$grado->datosGrado->nombre . '</option>';
            }

            $docentes = DocenteNivel::where('nivel', $anio_nivel->nivel)->get();
            $mydoc    = "";
            foreach ($docentes as $docente) {
                if ($docente->datosDocente->estado == 'Activo') {
                    $mydoc .= '<option value="' . $docente->datosDocente->id . '"  > ' . $docente->datosDocente->persona->nombres . ' ' . $docente->datosDocente->persona->apellidos . '</option>';
                }
            }

            $mygrados = '<select name="grado" class="select2" data-placeholder="Grado" ><option value=""></option>' . $select . '</select>';
            $mydocs   = '<select name="tutor" class="select2" data-placeholder="Grado" ><option value=""></option>' . $mydoc . '</select>';

            return response()->json(['grados' => $mygrados, 'tutores' => $mydocs]);
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->seccion->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('director.seccion.show', ['Seccion' => $this->seccion->find($id), 'grado_repo' => $this->grados]);
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
            $seccion = $this->seccion->find($id);

            $letraseccion = "";
            foreach ($this->letras as $letra) {
                $selected = "";
                if ($letra == $seccion['letra']) {
                    $selected = '<option value=' . $seccion['letra'] . ' selected=""> ' . $seccion['letra'] . '</option>';
                } else {
                    $selected = '<option value=' . $letra . ' > ' . $letra . '</option>';
                }
                $letraseccion .= $selected;
            }

            $anio_nivel = $seccion->datosAnioNivel;
            $docentes   = DocenteNivel::where('nivel', $anio_nivel->nivel)->get();
            $mydoc      = "";
            foreach ($docentes as $docente) {
                if ($docente->datosDocente->estado == 'Activo') {
                    if ($docente->datosDocente->id == $seccion->tutor) {
                        $mydoc .= '<option value="' . $docente->datosDocente->id . '"  selected > ' . $docente->datosDocente->persona->nombres . ' ' . $docente->datosDocente->persona->apellidos . '</option>';
                    } else {
                        $mydoc .= '<option value="' . $docente->datosDocente->id . '"  > ' . $docente->datosDocente->persona->nombres . ' ' . $docente->datosDocente->persona->apellidos . '</option>';
                    }
                }
            }

            $letraseccion = ' <select name="letra" class="select2" data-placeholder="Letra" >' . $letraseccion . '</select>  ';
            $mydocs       = '<select name="tutor" class="select2" data-placeholder="Seleccione" ><option value=""></option>' . $mydoc . '</select>';

            $ruta         = route("Director.Seccion.Update", ["id" => $seccion->id]);

            return response()->json(['letra' => $letraseccion, 'capacidad' => $seccion['capacidad'], 'anio' => $seccion->anio,'tutor'=>$mydocs, 'ruta' => $ruta]);
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
        return $this->seccion->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->seccion->destroy($id);
    }

    public function alumnosPDF($id)
    {
        $seccion=Seccion::find($id);
        $alumnos=$seccion->alumnos;
        return PDF::loadView(
            'template-pdf.alumnos',
            [
           'alumnos' => $alumnos,
         
       ]
        )
      
       ->stream('Alumnos.pdf');
    }


    public function padresPDF($id)
    {
        $seccion=Seccion::find($id);
        $alumnos=$seccion->alumnos;
        return PDF::loadView(
            'template-pdf.padres',
            [
            'alumnos' => $alumnos,
          
        ]
        )
       
        ->stream('Padres.pdf');
    }
}
