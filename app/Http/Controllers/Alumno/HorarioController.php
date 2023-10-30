<?php

namespace App\Http\Controllers\Alumno;

use App\Alumno;
use App\AnioAcademico;
use App\Horario;
use App\Http\Controllers\Controller;
use App\Matricula;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\SeccionDocenteCurso;
use Carbon\Carbon;
use Illuminate\Http\Response;
use PDF;

class HorarioController extends Controller
{

    protected $grado;
    protected $seccion;
    public function __construct(GradoRepository $grado, SeccionRepository $seccion)
    {
        $this->grado   = $grado;
        $this->seccion = $seccion;

    }

    public $datesForDay = [
        'Monday'    => '2020-08-17',
        'Tuesday'   => '2020-08-18',
        'Wednesday' => '2020-08-19',
        'Thursday'  => '2020-08-20',
        'Friday'    => '2020-08-21',
        'Saturday'  => '2020-08-22',
        'Sunday'    => '2020-08-23',
    ];
    public $dayForDay = [
        'Monday'    => 'Lunes',
        'Tuesday'   => 'Martes',
        'Wednesday' => 'Miercoles',
        'Thursday'  => 'Jueves',
        'Friday'    => 'Viernes',
        'Saturday'  => 'Sabado',
        'Sunday'    => 'Domingo',
    ];

    public function getAll()
    {
        $alumno = Alumno::find(auth()->user()->persona->nrodocumento);

        $output     = array('data' => array());
        $matriculas = [];

        if ($alumno) {
            $matriculas = $alumno->matriculas;
        }
        foreach ($matriculas as $matricula) {
            $actionButton = '<div class=" action-buttons">


        <a class="green" data-target="#modal-destroy" href="' . route('Alumno.Horario.Show', ['id' => $matricula->id]) . '"  >
        <i class="ace-icon fa fa-eye bigger-130"></i>
        </a>
        </div>
        ';

            $nivel = '<span class="label   label-lg" style=" background-color: ' . $matricula->DatosNivel['color'] . '">' . $matricula->DatosNivel['nombre'] . '</span>';

            $output['data'][] = array(
               $matricula->datosSeccion->datosGrado->nombre,
                '<span class="label   label-lg" style=" background-color: ' . $matricula->datosSeccion->datosGrado->DatosNivel->color . '">' . $matricula->datosSeccion->datosGrado->DatosNivel->nombre . '</span>',
                $matricula->datosSeccion->datosAnio->anio,
                $actionButton,
            );
        }

        return response()->json($output);
    }

    public function index()
    {
        $alumno = Alumno::find(auth()->user()->persona->id);
        $anio   = AnioAcademico::where('estado', 'Activo')->first();

        $output   = array('data' => array());
        $horarios = [];

        if ($alumno&&$anio) {

            if ($alumno->matriculas) {
                $matricula = $alumno->matriculas->where('datosSeccion.datosAnioNivel.datosAnio.id', $anio->id)->first();
                if ($matricula) {

                    $horarios = $matricula->datosSeccion->horarios;
                }
            }

        }
 

        return view('alumno.horario', ['horarios' => $horarios, 'datesForDay' => $this->datesForDay, 'gradoRepo' => $this->grado, "seccionRepo" => $this->seccion, 'dayForDay' => $this->dayForDay]);
    }

    public function show($id)
    {

        $matricula = Matricula::find($id);

        if (!empty($matricula)) {

            $seccion = $matricula->datosSeccion;
            $anio    = $seccion->datosAnio;
            $config  = $anio->datosHorarioConfig;

            $horarioinicio = Carbon::parse($config->horainicio);
            $horariofin    = Carbon::parse($config->horafin);
            $duracion      = $config->duracionclase;

            $finalizar = 0;

            $horaActual = $horarioinicio;
            $array      = array();
            $array2     = array();

            while ($finalizar == 0) {
                if ($horaActual <= $horariofin) {
                    array_push($array, date('h:i a', strtotime($horaActual)));

                    if ($horalibre = $this->horaslibre->findwhere(['idconfig' => $config->id, 'horainicio' => $horaActual])->first()) {
                        $horaActual->addMinutes($horalibre->duracion);

                    } else {
                        $horaActual->addMinutes($duracion);
                    }

                } else {
                    $finalizar = 1;
                }
            }

            $tableRow     = '';
            $f            = 1;
            $contadorHora = 1;

            for ($j = 0; $j < count($array) - 1; $j++) {

                $td                = '';
                $i                 = 1;
                $contadorHoraLibre = 0;
                foreach ($this->dias as $dia) {
                    $hlibre = $this->horaslibre->findwhere(['idconfig' => $config->id, 'horainicio' => date('H:i:s', strtotime($array[$j]))])->first();

                    if ($config[strtolower($dia)] == 'true') {

                        if ($hlibre) {
                            $td = '<td class="matriculaseccion" colspan="7">

                        <div class="center">
                        <h5 class="blue">' . $hlibre->descripcion . '</h5>
                        </div>
                        </td>';
                            if ($j == $i) {
                                $contadorHora--;
                            }
                            $contadorHoraLibre = 1;

                        } else {
                            $seccion_docente_matriculas = [];
                            if ($seccion) {
                                $seccion_docente_matriculas = SeccionDocenteCurso::where(["seccion" => $seccion->id])->get();
                            }

                            $td2 = null;
                            foreach ($seccion_docente_matriculas as $seccion_docente_matricula) {
                                $hora_matricula = Horario::where(["seccion_docente_curso" => $seccion_docente_matricula->id, "horainicio" => date('H:i:s', strtotime($array[$j])), "dia" => $dia])->first();

                                if (!empty($hora_matricula)) {
                                    $td2 = $hora_matricula;
                                }

                                # code...
                            }

                            if ($td2 != null) {
                                $td .= '<td class="alert red">







                        <span> <p class="text-primary"> ' . $td2->info->cursoinfo->datosCurso->nombre . '</p> <p class="text-success"> ' . $td2->info->docenteinfo->persona->nombres . ' ' . $td2->info->docenteinfo->persona->apellidos . '</p></span>








                       </td>';
                            } else {
                                $td .= '<td class="red"><div >
                        <label>


                        </label>
                        </div></td>';
                            }

                        }

                    } else {
                        if ($contadorHoraLibre == 0) {
                            $td .= '<td class="matriculaseccion"><div class="center">
                    <label>
            ---
                    </label>
                    </div></td>';
                        }

                    }

                }

                $contadorHora++;

                $tableRow .= "<tr><td> $array[$j] -
            $array[$f]</td>" . $td . "</tr>";
                $f++;
            }
        } else {
            $tableRow = "<tr><td colspan='8'>
           </td></tr>";
        }

        return view('alumno.horario-show', ['tabla' => $tableRow]);
    }

}
