<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use App\Notas;
use App\Observaciones;
use App\PlanAcademicoTrimestre;
use App\Repositories\GradoRepository;
use App\SeccionDocenteCurso;
use App\Trimestre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotasController extends Controller
{
    protected $grado;

    private $nombres = array("Primero", "Segundo", "Tercero", "Cuarto", "Quinto", "Sexto", "2 Años", "3 Años", "4 Años", "5 Años");
    private $equiv;
    private $m_equi;
    public function __construct(GradoRepository $grado)
    {
        $this->grado  = $grado;
        $this->equiv  = collect(['AD' => 4, 'A' => 3, 'B' => 2, 'C' => 1]);
        $this->m_equi = [4 => 'AD', 3 => 'A', 2 => 'B', 1 => 'C'];
    }

    public function index(SeccionDocenteCurso $id)
    {

        $this->authorize('owner', $id);
        $this->authorize('active', $id->seccionInfo->datosAnioNivel->datosAnio);

        return view('docente.notas', ['seccion' => $id, 'repoGrado' => $this->grado]);
    }

    public function getAll(Request $request, $id)
    {

        $curso = SeccionDocenteCurso::find($id);
        $this->authorize('owner', $curso);
        $seccion    = $curso->seccionInfo;
        $anio       = $seccion->datosAnioNivel;
        $tipo_cal   = $curso->cursoInfo->planGrado->tipo_cal;
        $tipo_input = '';

        switch ($tipo_cal) {
            case 'Literal':
                $tipo_input = 'type="text" pattern="A|AD|B|C" onkeyup="javascript:this.value=this.value.toUpperCase();"';
                break;
            case 'Numerica':
                $tipo_input = 'type="number" min="0" max="20" ';
                break;
        }

        $trimestre = $request->trimestre;

        $indicadores = $curso->cursoInfo->criterios->where('trimestre', $trimestre);

        if (count($indicadores) < 1) {
            return response()->json(["table" => '
              <div class="alert d-flex bgc-danger-l4 text-dark-tp3 radius-0 text-120 brc-danger-l3" role="alert">
                          <div class="position-tl h-102 ml-n1px border-l-4 brc-danger-tp3 m-n1px"></div>
                          <i class="fas fa-exclamation-circle mr-3 fa-2x text-warning-d2 opacity-1"></i>
                          <span class="align-self-center"> No se han asignado criterios de evaluacion!</span>
                        </div>']);
        }

        $matriculas = $seccion->Alumnos;

        $pgtrim = PlanAcademicoTrimestre::findOrfail($trimestre);

        $fechas = $pgtrim->fechas->where('anio_nivel', $anio->id)->first();
        if ($fechas) {
            try {
                $this->authorize('onTime', $fechas);
            } catch (\Exception $e) {

                return response()->json(['message' => 'Fuera de tiempo de edicion'], 422);
            }
        }

        $body           = '';
        $peso_indicador = 0;

        foreach ($matriculas as $matricula) {

            $bodyalumno = "<th class='font-normal'>" . $matricula->datosalumno->persona->apellidos . " " . $matricula->datosalumno->persona->nombres . "</th>";

            $thnota    = '';
            $notafinal = 0;
            $notas     = 0;

            foreach ($indicadores as $indicador) {

                $peso_indicador = $peso_indicador + $indicador->peso;
                $existsnota     = Notas::where(["id_matricula" => $matricula->id,
                    "criterio"                                     => $indicador->id,
                    "trimestre"                                    => $trimestre])
                    ->first();

                $class = '';
                if ($existsnota) {

                    if ($tipo_cal == 'Literal') {
                        if ($existsnota->nota == 'AD' || $existsnota->nota == 'A' || $existsnota->nota == 'B' || $existsnota->nota == 'C') {
                            $notas = $notas + ($this->equiv[$existsnota->nota] * $existsnota->datosCursoCriterio->peso);
                            $class = $this->color2($this->equiv[$existsnota->nota]) . ' literal';
                        }
                    }
                    if ($tipo_cal == 'Numerica') {
                        $notas = $notas + ($existsnota->nota * $existsnota->datosCursoCriterio->peso);
                        $class = $this->color($existsnota->nota);
                    }

                    $thnota .= '<th class="center"><div>
                        <input ' . $tipo_input . ' class="form-control form-control-sm text-center lighter ' . $class . '"  name="' . $trimestre . "-" . $indicador->id ."-" . $matricula->id . '" value="' . $existsnota->nota . '"></div></th>';

                } else {
                    $thnota .= '<th class="center"><div>
                        <input ' . $tipo_input . ' class="form-control form-control-sm center lighter"  name="' . $trimestre . "-" . $indicador->id . "-". $matricula->id. '" value=""></div></th>';
                }

            }

            $comentario = Observaciones::where(["alumno" => $matricula->id_alumno, "trimestre" => $trimestre, "curso" => $curso->id])->first();

            if ($comentario) {
                $thnota .= '<th class="center"><textarea class="form-control limited autosize-transition"  style="font-size: 12px;" name="d' . $curso->id . '-' . $matricula->id_alumno . '-' . $trimestre . '">' . $comentario->descripcion . '</textarea></th>';
            } else {
                $thnota .= '<th class="center"><textarea class="form-control limited autosize-transition"  style="font-size: 12px;" name="d' . $curso->id . '-' . $matricula->id_alumno . '-' . $trimestre . '"  ></textarea></th>';
            }

            $nfinal = round($notas / $peso_indicador, 0, PHP_ROUND_HALF_UP);
            if ($nfinal >= 1) {
                if ($tipo_cal == 'Literal') {
                    $class = $this->color2($nfinal);
                    $body .= "<tr>" . $bodyalumno . $thnota . "<th class='text-center " . $class . "' style='background-color:#e2dfc1;'>" . $this->m_equi[$nfinal] . "</th></tr>";
                }
                if ($tipo_cal == 'Numerica') {
                    $class = $this->color($nfinal);
                    $body .= "<tr>" . $bodyalumno . $thnota . "<th class='text-center " . $class . "' style='background-color:#e2dfc1;'>" . $nfinal . "</th></tr>";
                }
            } else {
                $body .= "<tr>" . $bodyalumno . $thnota . "<th class='text-center red' style='background-color:#e2dfc1;'>--</th></tr>";
            }

            $peso_indicador = 0;
        }

        $th_criterios = "";
        $th_indicador = "";
        foreach ($indicadores as $criterio) {

            //$th_indicador.="<th class='white ' style='background-color:#748c98;'>Prom.</th>";
            $th_criterios .= '<th class="center" colspan="1">' . $criterio->datosCriterio->nombre . ' (' . $criterio->peso . ' %)</th>';
        }

        $table = '<thead><tr style="background-color:#748c98;" class="text-white"><th >Alumno</th>' . $th_criterios . '<th>Observaciones</th><th rowspan="3" class="text-white" style="background-color:#748c98;">Promedio</th></tr>' . '<tr>' . $th_indicador . '</tr>' . '</thead> <tbody  >' . $body . '


        </tbody><script>' . "
        $('textarea.limited').inputlimiter({
     limit: 150,
        remText: '%n caractere%s restantes.',
        limitText: 'Campo limitado a %n caractere%s.'
        });
          autosize($('textarea[class*=autosize]'));" .
            '</script>
        ';
        return response()->json(["table" => $table]);
    }

    public function store(Request $request, $id)
    {

        $curso = SeccionDocenteCurso::find($id);

        $seccion   = $curso->seccionInfo;
        $trimestre = $request->trimestre;

        //$criterios = CursoIndicadorBimestre::where(['curso' => $curso->id, 'bimestre' => $trimestre])->get();
        $criterios  = $curso->cursoInfo->criterios->where('trimestre', $trimestre);
        $matriculas = $seccion->Alumnos;
        //$trimestre  = Trimestre::find($trimestre);

        foreach ($matriculas as $matricula) {

            foreach ($criterios as $indicador) {

                $name = $trimestre . "-" . $indicador->id . "-" . $matricula->id;

                Notas::updateOrCreate(["id_matricula" => $matricula->id, "criterio" => $indicador->id, "trimestre" => $trimestre],
                    ["nota" => $request->$name]);  

            }
            $comentario = 'd' . $curso->id . '-' . $matricula->id_alumno . '-' . $trimestre;

            Observaciones::updateOrCreate(["alumno" => $matricula->id_alumno, "trimestre" => $trimestre, "curso" => $curso->id], ['descripcion' => $request->$comentario]);

        }

        return response()->json(['message' => 'Registro actualizado correctamente']);
    }

    public function color($nota)
    {
        $class = "";
        if ($nota >= 0 && $nota <= 10) {$class = "text-danger";}
        if ($nota >= 11 && $nota <= 12) {$class = "text-warning-d2";}
        if ($nota >= 13 && $nota <= 16) {$class = "text-blue";}
        if ($nota >= 17 && $nota <= 20) {$class = "text-success";}

        return $class;
    }
    public function color2($nota)
    {
        $class = "";
        if ($nota >= 0 && $nota <= 1) {$class = "text-danger";}
        if ($nota > 1 && $nota <= 2) {$class = "text-warning-d2";}
        if ($nota > 2 && $nota <= 3) {$class = "text-blue";}
        if ($nota > 3 && $nota <= 4) {$class = "text-success";}

        return $class;
    }
}
