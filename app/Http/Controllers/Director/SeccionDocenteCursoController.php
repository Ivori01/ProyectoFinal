<?php

namespace App\Http\Controllers\Director;

use App\AnioAcademico;
use App\Docente;
use App\DocenteNivel;
use App\Http\Controllers\Controller;
use App\PlanAcademicoGrado;
use App\Repositories\CursoRepository;
use App\Repositories\DocenteRepository;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\Seccion;
use App\SeccionDocenteCurso;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeccionDocenteCursoController extends Controller
{

    protected $seccion;
    protected $curso;
    protected $docente;
    protected $grado;

    public function __construct(DocenteRepository $docente, SeccionRepository $seccion, CursoRepository $curso, GradoRepository $grado)
    {

        $this->docente = $docente;
        $this->seccion = $seccion;
        $this->curso   = $curso;
        $this->grado   = $grado;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.seccion.docentecurso',['anio' => AnioAcademico::where(['estado' => 'Activo'])->first()]); 
    }

    public function getAll()
    {

       $anio=AnioAcademico::where(['estado' => 'Activo'])->first();

        $output = array('rows' => array());
        foreach ($anio->niveles as $nivel) { 
        
        foreach ($nivel->secciones->sortBy('letra')->sortBy('datosGrado.numero') as $seccion) {

                $grad = PlanAcademicoGrado::Where(['grado' => $seccion->datosGrado->id, 'plan' => $nivel->planAcademico->id])->first();

                if ($grad) {
                    $countcursos = $grad->cursos->count();

                    $count      = SeccionDocenteCurso::Where(["seccion" => $seccion->id, ["docente", "<>", "null"]])->count();
                    $labelcount = '';
                    if ($count == 0) {
                        $labelcount = '<span class="badge badge badge-danger arrowed-in radius-0">Sin asignar</span>';
                    } elseif ($count == $countcursos) {
                        $labelcount = '<span class="badge badge badge-success arrowed-in radius-0 "> Asignado</span>';
                    } else {
                        $labelcount = '<span class="badge badge badge-warning arrowed-in radius-0">
                                                <i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
                                                ' . $count . ' Asignados
                                            </span>';
                    }

                    $output['rows'][] = array(

                        $seccion->datosGrado->DatosNivel['nombre'],
                      $seccion->datosGrado->nombre,
                        $this->seccion->letra($seccion->letra),
                        $anio->anio,
                        '<button class="border-2 btn btn-smd btn-outline-black btn-bold radius-0 waves-effect waves-light" data-target="#modal-registro" data-toggle="modal" onclick="createcursodocente(' . "'" . route('Director.SeccionDocenteCurso.Create', ['id' => $seccion]) . "'" . ')"   >Asignar</button>',

                        $labelcount,

                    );
                }

            }
        }

        return response()->json($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request->ajax()) {

            $idseccion = $request->id;
            $seccion   = $this->seccion->find($idseccion);

            $cursos = PlanAcademicoGrado::Where(['grado' => $seccion->datosGrado->id, 'plan' => $seccion->datosAnioNivel->planAcademico->id])->first()->cursos;

            $docentes = DocenteNivel::where(["nivel" => $seccion->datosGrado->DatosNivel->id])->get();

            $count = SeccionDocenteCurso::Where('seccion', $idseccion)->count();
            if ($count == 0) {

                $option = '';
               

                 foreach ($docentes as $docente) {
                if ($docente->datosDocente->estado == 'Activo') {
                    $option .= '<option value="' . $docente->datosDocente->id . '"  > ' . $docente->datosDocente->persona->nombres . ' ' . $docente->datosDocente->persona->apellidos . '</option>';
                }
            }

                $form = '<input type="text" name="seccion" value="' . $seccion->id . '" hidden="" >';

                foreach ($cursos as $curso) {
                    $form .= '
<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label for="state">' . $curso->datosCurso->nombre . ' :</label>
  </div>

  <div class="col-sm-9 col-12 tag-input-style">
    <select  class="select2 form-control " data-placeholder="Seleccione" name="docente[]" >
      <option value=""></option>
      ' . $option . '

    </select>
<input type="text" name="curso[]" value="' . $curso->id . '" hidden="" >
  </div>
</div>

                 ';

                }

                return response()->json(['curso' => $form]);

            } else {

                $form = '<input type="text" name="seccion" value="' . $seccion->id . '" hidden="" >';

                foreach ($cursos as $curso) {

                    $count2 = SeccionDocenteCurso::Where(['curso' => $curso->id, "seccion" => $seccion->id])->count();

                    if ($count2 == 1) {

                        $option = '';
                        foreach ($docentes as $docente) {

                            $count3 = SeccionDocenteCurso::Where(['curso' => $curso->id, "seccion" => $seccion->id, "docente" => $docente->datosDocente->id])->count();
                            if ($count3 == 1) {
                                $docCurso = SeccionDocenteCurso::Where(['curso' => $curso->id, "seccion" => $seccion->id, "docente" => $docente->datosDocente->id]);

                                $option .= '<option value="' . $docente->datosDocente->id . '" selected="" >' . $docente->datosDocente->persona->nombres . ' ' . $docente->datosDocente->persona->apellidos . ' </option>';

                            } else {
                                $option .= '<option value="' . $docente->datosDocente->id . '"  >' . $docente->datosDocente->persona->nombres . ' ' . $docente->datosDocente->persona->apellidos . ' </option>';
                            }

                        }

                        $form .= '
<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label for="state">' . $curso->datosCurso->nombre . ' :</label>
  </div>

  <div class="col-sm-9 col-12 tag-input-style">
    <select  class="select2 form-control " data-placeholder="Seleccione" name="docente[]" >
      <option value=""></option>
      ' . $option . '

    </select>
<input type="text" name="curso[]" value="' . $curso->id . '" hidden="" >
  </div>
</div>

                   ';

                    } else {

                        $option = '';
                        foreach ($docentes as $docente) {
                            $option .= '<option value="' . $docente->datosDocente->id . '" >' . $docente->datosDocente->persona->nombres . ' ' . $docente->datosDocente->persona->apellidos . ' </option>';
                        }
                        $form .= '
<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label for="state">' . $curso->datosCurso->nombre . ' :</label>
  </div>

  <div class="col-sm-9 col-12 tag-input-style">
    <select  class="select2 form-control " data-placeholder="Seleccione" name="docente[]" >
      <option value=""></option>
      ' . $option . '

    </select>
<input type="text" name="curso[]" value="' . $curso->id . '" hidden="" >
  </div>
</div>

';

                    }

                }

                return response()->json(['curso' => $form]);

            }

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
        $docentes = $request->docente;

        $i = 0;
        foreach ($request->get('curso') as $curso) {

            SeccionDocenteCurso::updateOrCreate(
                ['curso'  => $curso,

                    "seccion" => $request->seccion,

                ],
                ["docente" => $docentes[$i]]
            );

            $i++;
        }

        return response()->json(['message' => 'Registro agregado correctamente', 'success' => true]);

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
