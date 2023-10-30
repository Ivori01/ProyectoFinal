<?php

namespace App\Http\Controllers\Docente;

use App\AnioAcademico;
use App\Asistencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parametro;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\SeccionDocenteCurso;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Info;
class AsistenciaController extends Controller
{
    protected $seccion;
    protected $grados;

    public function __construct(SeccionRepository $seccion, GradoRepository $grados)
    {
        $this->grados  = $grados;
        $this->seccion = $seccion;
    }
    public function getSecciones()
    {
        $anio = AnioAcademico::where('estado', 'Activo')->first();
        $data=[];

        foreach ($anio->niveles as $nivel) {
            foreach ($nivel->secciones as $seccion) {
                foreach ($seccion->cursos->where('docente', auth()->user()->persona->id) as $curso) {
                    $data['rows'][] = array(

                    $curso->cursoInfo->datosCurso->nombre,
                   $seccion->datosGrado->nombre . $this->seccion->letra($seccion->letra),
                    $seccion->datosGrado->DatosNivel->nombre,
                    $seccion->datosAnioNivel->datosAnio->anio,
                    '<a class="btn btn-xs btn-success" href="' . route('Docente.Asistencia.Create', ['id' => $curso->id]) . '"   >Registrar</a>',
                    '<a class="btn btn-xs btn-info" href="' . route('Docente.Asistencia.Reporte', ['id' => $curso->id]) . '"   >Reporte</a>',
                    

                );
                }
            }
        }

        return response()->json($data);
    }

    public function index()
    {
        return view('docente.asistencia.index');
    }

    public function create($id)
    {
        $seccion_d_c=SeccionDocenteCurso::find($id);
        $estados=Parametro::where('valor2', 'ESTADO ASISTENCIA')->get();
        $carbaoDay = Date::now();
        $days = [];
        $alumnos=$seccion_d_c->seccionInfo->alumnos->pluck('id');
        for ($i = 0; $i < 5; $i++) {
            $days[] = $carbaoDay
                ->startOfWeek()
                ->addDay($i)
                ->format('Y-m-d');
        }
      
        $asistencias=Asistencia::whereIn('fecha', $days)->where('curso_id', $seccion_d_c->id)->whereIn('alumno_id', $alumnos)->get();
        return view('docente.asistencia.create', ['seccion'=>$seccion_d_c,
        'repo'=>new $this->grados,'estados'=>$estados,'asistencias'=>$asistencias]);
    }

    public function store(Request $request)
    {
        $seccion=SeccionDocenteCurso::find($request->seccion);
        $alumnos=$seccion->seccionInfo->alumnos;
        $carbaoDay = Date::now();
        $days = [];
        for ($i = 0; $i < 5; $i++) {
            $days[] = $carbaoDay
               ->startOfWeek()
               ->addDay($i)
               ->format('Y-m-d');
        }
        foreach ($alumnos as $alumno) {
            foreach ($days as $day) {
                $input_name=$alumno->id.'_'.$day;
                $asistencia=Asistencia::updateOrCreate(['alumno_id'=>$alumno->id,'curso_id'=>$seccion->id,'fecha'=>$day], ['estado'=>$request->$input_name]);
            }
        }

        return back()->with('updated', 'l');
    }

    public function reporte($id)
    {
        $school_info = Info::find(1);

        $header      = view('components.pdf.header')->render();

        $footer = view('components.pdf.footer')->render();



        $seccion=SeccionDocenteCurso::find($id);
        $alumnos=$seccion->seccionInfo->alumnos;

        $asistencias=Asistencia::where('curso_id', $seccion->id)->whereIn('alumno_id', $alumnos->pluck('id'))->get();
       
        $estados=Parametro::where('valor2', 'ESTADO ASISTENCIA')->get();

        return PDF::loadView('docente.asistencia.reporte', ['alumnos'=>$alumnos,
    'estados'=>$estados,'asistencias'=>$asistencias])
    /* ->setOption('margin-top', '0mm')
    ->setOption('margin-right', '0mm')
    ->setOption('margin-left', '0mm')*/
        ->stream('Reporte de asistencia.pdf');
    }
}
