<?php

namespace App\Http\Controllers\Docente;

use App\AnioAcademico;
use App\Http\Controllers\Controller;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use Illuminate\Http\Request;

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


    public function index(Request $request)
    {
        $docente  = auth()->user()->persona->docente;
        $anio     = AnioAcademico::where('estado', 'Activo')->first();
        $horarios = [];
        if ($docente&&$anio) {

            $horarios = $docente->horarios->where('info.seccionInfo.datosAnioNivel.datosAnio.id', $anio->id);
        }

        return view('docente.horario', ['horarios' => $horarios, 'datesForDay' => $this->datesForDay, 'gradoRepo' => $this->grado, "seccionRepo" => $this->seccion, 'dayForDay' => $this->dayForDay]);
    }

}
