<?php

namespace App\Http\Controllers\Director;

use App\AnioAcademico;
use App\Horario;
use App\Http\Controllers\Controller;
use App\Nivel;
use App\Repositories\CursoRepository;
use App\Repositories\DocenteRepository;
use App\Repositories\GradoRepository;
use App\Repositories\HorarioRepository;
use App\Repositories\SeccionRepository;
use App\Seccion;
use App\SeccionDocenteCurso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HorarioController extends Controller
{

    protected $grado;
    protected $docente;
    protected $curso;
    protected $seccion;
    protected $Horario;

    private $grados = array(1, 2, 3, 4, 5, 6);
    private $letras = array("A", "B", "C", "D", "E");
    protected $niveles;
    public $colors = ['bgc-info', 'bgc-success', 'bgc-danger', 'bgc-warning', 'bgc-default', 'bgc-secondary', 'bgc-purple', 'bgc-pink', 'bgc-brown', 'bgc-yellow', 'bgc-dark', 'bgc-white', 'bgc-light', 'bgc-grey', 'bgc-lightgrey', 'bgc-blue', 'bgc-green', 'bgc-red'];
    private $dias  = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");

    public $datesForDay = [
        'Monday'    => '2020-08-17',
        'Tuesday'   => '2020-08-18',
        'Wednesday' => '2020-08-19',
        'Thursday'  => '2020-08-20',
        'Friday'    => '2020-08-21',
        'Saturday'  => '2020-08-22',
        'Sunday'    => '2020-08-23',
    ];

    public function __construct(GradoRepository $grado, DocenteRepository $docente, SeccionRepository $seccion, CursoRepository $curso, HorarioRepository $Horario)
    {
        $this->grado   = $grado;
        $this->docente = $docente;
        $this->seccion = $seccion;
        $this->curso   = $curso;
        $this->Horario = $Horario;
        $this->niveles = Nivel::All();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('director.horario.index', ['anio' => AnioAcademico::where('estado', 'Activo')->first()]);
    }

    public function getAll()
    {

        $anio   = AnioAcademico::where('estado', 'Activo')->first();
        $output = array('rows' => array());
        foreach ($anio->secciones->sortBy('datosGrado.numero') as $seccion) {

            $output['rows'][] = array(
                $seccion->datosGrado->DatosNivel->nombre,
               $seccion->datosGrado->nombre,
                $this->seccion->letra($seccion->letra),

                '<a class="btn btn-success" href="' . route('Director.Horario.Create', ['seccion' => $seccion->id]) . '"   >Asignar</a>',

            );
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

        $seccion = $this->seccion->find($request->seccion);

        return view('director.horario.set', ['seccion' => $seccion, 'repo_grado' => $this->grado, 'colors' => $this->colors]);

        return view('director.horario.edit', ['seccion' => $seccion, 'dias' => $this->dias, 'config' => $config, 'horas' => $array, "hlibre" => $hlibre, 'repo_grado' => $this->grado]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $start      = Carbon::parse($request->start, 'UTC')->format('H:i:s');
        $end        = Carbon::parse($request->end, 'UTC')->format('H:i:s');
        $day        = Carbon::parse($request->start, 'UTC')->format('l');
        $secciondoc = SeccionDocenteCurso::findOrfail($request->secciondoc);
        $seccion    = $secciondoc->seccionInfo;

        $class = '';
        foreach ($request->color as $color) {
            $class .= $color . ' ';
        }

        $counthorarios = 0;
        $horarios_sec  = Horario::where(['seccion' => $seccion->id, 'dia' => $day])->get();
        $error1        = [];
        foreach ($horarios_sec as $horario) {

            if ((Carbon::parse($start)->addMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin)) || (Carbon::parse($end)->subMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin))) {
                $error1[] = 'Conflicto dia "' . $horario->dia . '"  Hora "' . $horario->horainicio . ' - ' . $horario->horafin . '"';
            }
        }
        $showE = 'Errores <br>';
        foreach ($error1 as $error) {
            $showE .= $error;
        }

        $counthorarios2 = 0;
        $horarios_doc   = $secciondoc->docenteInfo->horarios;

        $error2 = [];
        foreach ($horarios_doc->where('info.seccionInfo.datosAnioNivel.datosAnio.id', $seccion->datosAnioNivel->datosAnio->id)->where('dia', $day) as $horario) {

            if ((Carbon::parse($start)->addMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin)) || (Carbon::parse($end)->subMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin))) {
                $error2[] = '[*] Conflicto de horario docente "' . $horario->info->docenteInfo->persona->NombresApellidos . '" dia"' . $horario->dia . '"  Hora "' . $horario->horainicio . ' - ' . $horario->horafin . '"';
            }
        }

        $showE2 = 'Errores <br>';

        foreach ($error2 as $error) {
            $showE2 .= $error;
        }

        if (count($error1) == 0 && count($error2) == 0) {
            $Horario                        = new Horario;
            $Horario->dia                   = $day;
            $Horario->horainicio            = $start;
            $Horario->horafin               = $end;
            $Horario->seccion_docente_curso = $secciondoc->id;
            $Horario->color                 = $class;
            $Horario->seccion               = $seccion->id;
            $Horario->save();
            return response()->json(['message' => 'Registro agregado correctamente', 'event' => $Horario]);
        } else {
            if (count($error1) != 0) {
                return response()->json(['message' => $showE], 422);
            }
            if (count($error2) != 0) {
                return response()->json(['message' => $showE2], 422);
            }
        }
        //return $this->Horario->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $seccion)
    {

        $seccio   = $this->seccion->find($seccion);
        $horarios = $seccio->horarios;
        $output   = [];
        foreach ($horarios as $horario) {
            $output[] = [
                "id"            => $horario->idhorario,
                "title"         => $horario->info->cursoInfo->datosCurso->nombre,
                "start"         => $this->datesForDay[$horario->dia] . ' ' . $horario->horainicio,
                "end"           => $this->datesForDay[$horario->dia] . ' ' . $horario->horafin,
                "classNames"    => $horario->color,
                /*'url' => url('transaksi/'),*/
                "extendedProps" => [
                    'urlUpdate' => route('Director.Horario.Update', ['id' => $horario->idhorario]),
                    'urlResize' => route('Director.Horario.Resize', ['id' => $horario->idhorario]),
                    'urlDelete' => route('Director.Horario.Destroy', ['id' => $horario->idhorario]),
                ],

            ];
        }
        return response()->json($output);
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
        $Horario    = Horario::findOrfail($id);
        $start      = Carbon::parse($request->start, 'UTC')->format('H:i:s');
        $end        = Carbon::parse($request->end, 'UTC')->format('H:i:s');
        $day        = Carbon::parse($request->start, 'UTC')->format('l');
        $secciondoc = $Horario->seccion_docente_curso;
        $seccion    = $Horario->info->seccionInfo;

        $class = '';
        foreach ($request->color as $color) {
            $class .= $color . ' ';
        }

        $counthorarios = 0;
        $horarios_sec  = Horario::where(['seccion' => $seccion->id, 'dia' => $day])->where('idhorario', '<>', $id)->get();
        $error1        = [];
        foreach ($horarios_sec as $horario) {

            if ((Carbon::parse($start)->addMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin)) || (Carbon::parse($end)->subMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin))) {
                $error1[] = 'Conflicto dia "' . $horario->dia . '"  Hora "' . $horario->horainicio . ' - ' . $horario->horafin . '"';
            }
        }
        $showE = 'Errores <br>';
        foreach ($error1 as $error) {
            $showE .= $error;
        }

        $counthorarios2 = 0;
        $horarios_doc   = $Horario->info->docenteInfo->horarios;

        $error2 = [];
        foreach ($horarios_doc->where('info.seccionInfo.datosAnioNivel.datosAnio.id', $seccion->datosAnioNivel->datosAnio->id)->where('dia', $day)->where('idhorario', '<>', $id) as $horario) {

            if ((Carbon::parse($start)->addMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin)) || (Carbon::parse($end)->subMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin))) {
                $error2[] = '[*] Conflicto de horario docente "' . $horario->info->docenteInfo->persona->NombresApellidos . '" dia"' . $horario->dia . '"  Hora "' . $horario->horainicio . ' - ' . $horario->horafin . '"';
            }
              if ((Carbon::parse($horario->horainicio)->addMinute())->between(Carbon::parse($start), Carbon::parse($end)) || (Carbon::parse($horario->horafin)->subMinute())->between(Carbon::parse($start), Carbon::parse($end))) {
                $error2[] = '[**] Conflicto de horario docente "' . $horario->info->docenteInfo->persona->NombresApellidos . '" dia"' . $horario->dia . '"  Hora "' . $horario->horainicio . ' - ' . $horario->horafin . '"';
            }
        }

        $showE2 = 'Errores <br>';

        foreach ($error2 as $error) {
            $showE2 .= $error;
        }

        if (count($error1) == 0 && count($error2) == 0) {
            $Horario->dia                   = $day;
            $Horario->horainicio            = $start;
            $Horario->horafin               = $end;
            $Horario->seccion_docente_curso = $secciondoc;
            $Horario->color                 = $class;
            $Horario->seccion               = $seccion->id;
            $Horario->save();
            return response()->json(['message' => 'Registro actualizado correctamente', 'event' => $Horario]);
        } else {
            if (count($error1) != 0) {
                return response()->json(['message' => $showE], 422);
            }
            if (count($error2) != 0) {
                return response()->json(['message' => $showE2], 422);
            }
        }
    }

    public function update2(Request $request, $id)
    {
        $Horario    = Horario::findOrfail($id);
        $start      = Carbon::parse($request->start, 'UTC')->format('H:i:s');
        $end        = Carbon::parse($request->end, 'UTC')->format('H:i:s');
        $day        = Carbon::parse($request->start, 'UTC')->format('l');
        $secciondoc = $Horario->seccion_docente_curso;
        $seccion    = $Horario->info->seccionInfo;

        $class = '';
        foreach ($request->color as $color) {
            $class .= $color . ' ';
        }

        $counthorarios = 0;
        $horarios_sec  = Horario::where(['seccion' => $seccion->id, 'dia' => $day])->where('idhorario', '<>', $id)->get();
        $error1        = [];
        foreach ($horarios_sec as $horario) {

            if ((Carbon::parse($start)->addMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin)) || (Carbon::parse($end)->subMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin))) {
                $error1[] = 'Conflicto dia "' . $horario->dia . '"  Hora "' . $horario->horainicio . ' - ' . $horario->horafin . '"';
            }
        }
        $showE = 'Errores <br>';
        foreach ($error1 as $error) {
            $showE .= $error;
        }

        $counthorarios2 = 0;
        $horarios_doc   = $Horario->info->docenteInfo->horarios;

        $error2 = [];
        foreach ($horarios_doc->where('info.seccionInfo.datosAnioNivel.datosAnio.id', $seccion->datosAnioNivel->datosAnio->id)->where('dia', $day)->where('idhorario', '<>', $id) as $horario) {

            if ((Carbon::parse($start)->addMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin)) || (Carbon::parse($end)->subMinute())->between(Carbon::parse($horario->horainicio), Carbon::parse($horario->horafin))) {
                $error2[] = '[*] Conflicto de horario docente "' . $horario->info->docenteInfo->persona->NombresApellidos . '" dia"' . $horario->dia . '"  Hora "' . $horario->horainicio . ' - ' . $horario->horafin . '"';
            }
            if ((Carbon::parse($horario->horainicio)->addMinute())->between(Carbon::parse($start), Carbon::parse($end)) || (Carbon::parse($horario->horafin)->subMinute())->between(Carbon::parse($start), Carbon::parse($end))) {
                $error2[] = '[**] Conflicto de horario docente "' . $horario->info->docenteInfo->persona->NombresApellidos . '" dia"' . $horario->dia . '"  Hora "' . $horario->horainicio . ' - ' . $horario->horafin . '"';
            }

        }

        $showE2 = 'Errores <br>';

        foreach ($error2 as $error) {
            $showE2 .= $error;
        }

        if (count($error1) == 0 && count($error2) == 0) {
            $Horario->dia                   = $day;
            $Horario->horainicio            = $start;
            $Horario->horafin               = $end;
            $Horario->seccion_docente_curso = $secciondoc;
            $Horario->color                 = $class;
            $Horario->seccion               = $seccion->id;
            $Horario->save();
            return response()->json(['message' => 'Registro actualizado correctamente', 'event' => $Horario]);
        } else {
            if (count($error1) != 0) {
                return response()->json(['message' => $showE], 422);
            }
            if (count($error2) != 0) {
                return response()->json(['message' => $showE2], 422);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        try {
            Horario::find($id)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

    public function dayName($value = '')
    {
        # code...
    }
}
