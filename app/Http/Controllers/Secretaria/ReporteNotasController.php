<?php
namespace App\Http\Controllers\Secretaria;

use App\AnioAcademico;
use App\Http\Controllers\Controller;
use App\Matricula;
use App\Notas;
use App\Observaciones;
use App\Repositories\GradoRepository;
use App\Repositories\SeccionRepository;
use App\Seccion;
use App\SeccionDocenteCurso;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use PDF;
use Storage;  
use App\Info;
class ReporteNotasController extends Controller
{

    protected $seccion;
    protected $grados;
    private $equiv;
    private $m_equi;

    public function __construct(SeccionRepository $seccion, GradoRepository $grados)
    {
        $this->seccion = $seccion;
        $this->grados  = $grados;
        $this->equiv   = collect(['AD' => 4, 'A' => 3, 'B' => 2, 'C' => 1]);
        $this->m_equi  = [4 => 'AD', 3 => 'A', 2 => 'B', 1 => 'C'];

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function boletaNotas()
    {
        return view('secretaria.notas.boleta');
    }

    public function ranking()
    {
        $anio = AnioAcademico::where('estado', 'Activo')->first();
        return view('secretaria.notas.ranking', ['anio' => $anio]);
    }

    public function lista()
    {
        return view('secretaria.notas.lista');
    }

    public function generarUrlBoleta(Request $request)
    {
        $url = route('Secretaria.Boleta.Pdf', ['matricula' => $request->matricula]);
        return response()->json(['url' => $url]);
    }

    public function generarUrlRanking(Request $request)
    {
        $url = route('Secretaria.Ranking.Pdf', ['seccion' => $request->seccion]);
        return response()->json(['url' => $url]);
    }
    public function generarUrlLista(Request $request)
    {
        $url = route('Secretaria.Lista.Pdf', ['matricula' => $request->matricula]);
        return response()->json(['url' => $url]);
    }

    public function generarBoleta(Request $request, $matricula)
    {
        $school_info = Info::find(1);
        $header      = view('components.pdf.header')->render();

        $footer = view('components.pdf.footer')->render();

        $options = [
            'footer-html' => $footer,
            'header-html' => $header,
        ];

        $matricula = Matricula::findOrFail($matricula);

        $seccion       = $matricula->id_seccion;
        $cursos        = SeccionDocenteCurso::where(["seccion" => $seccion, ["docente", "<>", null]])->get();
        $grado         = $matricula->datosSeccion->datosGrado;
        $anioNivel     = $matricula->datosSeccion->datosAnioNivel;
        $planGrado     = $anioNivel->planAcademico->grados->where('grado', $grado->id)->first();
        $tipo_cal      = $planGrado->tipo_cal;
        $modo_criterio = $planGrado->modo_criterio;
        $trimestres    = [];
        if ($planGrado->trimestres) {
            $trimestres = $planGrado->trimestres->sortBy('datosTrimestre.numero');
        }

        $thead2 = "";
        $body   = "";

        foreach ($cursos as $curso) {
            $thnota    = '';
            $notaTrims = 0;
            $notas     = 0;
            $notaCurso = 0;
            $promCurso = 0;
            $thpromC   = '<td style="background-color:#fbfaec;"></td>';

            $gCurso = $curso->gradoCurso;

            foreach ($trimestres as $trimestre) {

                $notaTrim       = 0;
                $peso_indicador = 0;
                $notas          = 0;

                foreach ($trimestre->criterios->where('curso', $gCurso->id) as $criterio) {

                    $existsnota = Notas::where(["id_matricula" => $matricula->id, "criterio" => $criterio->id, "trimestre" => $trimestre->id])->first();

                    if ($existsnota) {
                        $peso_indicador = $peso_indicador + $existsnota->datosCursoCriterio->peso;
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
                    }

                }

                if ($notas > 0) {
                    $comentario = Observaciones::where(["alumno" => $matricula->id_alumno, "trimestre" => $trimestre->id, "curso" => $curso->id])->first();
                    $notaTrim   = round($notas / $peso_indicador, 0, PHP_ROUND_HALF_UP);
                    $notaCurso += $notaTrim;
                    $tooltip = 'data-toggle="tooltip" data-placement="top" title="" data-original-title="' . optional($comentario)->descripcion . '" ';
                    if ($tipo_cal == 'Literal') {
                        $class = $this->color2($notaTrim);
                        $thnota .= "<td class='text-center align-middle toolti " . $class . "' " . $tooltip . ">" . $this->m_equi[$notaTrim] . "</td>";
                    }
                    if ($tipo_cal == 'Numerica') {
                        $class = $this->color($notaTrim);
                        $thnota .= "<td class='text-center align-middle toolti " . $class . "'  " . $tooltip . ">" . $notaTrim . "</td>";
                    }
                } else {
                    $thnota .= "<td></td>";
                }

            }

            if ($notaCurso > 0) {
                $div = 1;
                if (count($trimestres) > 0) {
                    $div = count($trimestres);
                }
                $promCurso = round($notaCurso / $div, 0, PHP_ROUND_HALF_UP);

                if ($tipo_cal == 'Literal') {
                    $class   = $this->color2($promCurso);
                    $thpromC = "<td class='text-center align-middle text-md font-bold " . $class . "' style='background-color:#fbfaec;'>" . $this->m_equi[$promCurso] . "</td>";
                }
                if ($tipo_cal == 'Numerica') {
                    $class = $this->color($promCurso);
                    $thpromC = "<td class='text-center align-middle text-md font-bold " . $class . "' style='background-color:#fbfaec;'>" . $promCurso . "</td>";
                }
            }

            $body .= '<tr>

                        <td>' . $curso->cursoInfo->datosCurso->nombre . '</td>'
                . $thnota . $thpromC .
                '</tr>';

        }

        foreach ($trimestres as $trimestre) {

            $thead2 .= "<td class='text-center border border-light' >" . $trimestre->datosTrimestre->numero . " °</td>";
        }

        $table = '
                <table class="table table-bordered text-dark-m1"  >
                <thead class="bgc-grey text-white">
                <tr >

                <td rowspan="2" class="border border-light text-center align-middle" width="18%">Curso</td>
                <td class="text-center center border border-light" colspan="' . (count($trimestres)) . '">Periodo</td>
                <td rowspan="2" class="text-center white" style="background-color:#748c98;">Prom <br>Final</td>
                </tr>
                <tr>' . $thead2 . '</tr>
                </thead>
                <input type="hidden" value="' . $modo_criterio . '" />
                <tbody >'
            . $body . '

                </tbody>
                </table>';

        return PDF::loadView('template-pdf.notas', ['tabla' => $table, 'matricula' => $matricula])
        ->setOption('footer-html', $footer)->setOption('enable-javascript', true)->setOption('footer-right', 'Página [page] de [topage]')
        /* ->setOption('margin-top', '0mm')
        ->setOption('margin-right', '0mm')
        ->setOption('margin-left', '0mm')*/
            ->stream('comprobante de pago.pdf');
        //return $pdf->inline();
    }

    public function generarRanking(Request $request, $seccion)
    {
        $school_info = Info::find(1);

        $header      = view('components.pdf.header')->render();

        $footer = view('components.pdf.footer')->render();

        $options = [
            'footer-html' => $footer,
            'header-html' => $header,
        ];

        $seccion = Seccion::findOrFail($seccion);
        $cursos  = $seccion->cursos->where("docente", "<>", null);
        $grado   = $seccion->datosGrado;

        $anioNivel     = $seccion->datosAnioNivel;
        $planGrado     = $anioNivel->planAcademico->grados->where('grado', $grado->id)->first();
        $tipo_cal      = $planGrado->tipo_cal;
        $modo_criterio = $planGrado->modo_criterio;
        $trimestres    = [];
        if ($planGrado->trimestres) {
            $trimestres = $planGrado->trimestres->sortBy('datosTrimestre.numero');
        }

        $thead2            = "";
        $body              = "";
        $matriculas        = $seccion->alumnos;
        $collect_promedios = new Collection;
        foreach ($matriculas as $matricula) {
            $prom_general     = 0;
            $suma_prom_cursos = 0;

            foreach ($cursos as $curso) {
                $thnota    = '';
                $notaTrims = 0;
                $notas     = 0;
                $notaCurso = 0;
                $promCurso = 0;
                $thpromC   = '<td style="background-color:#fbfaec;"></td>';

                $gCurso = $curso->gradoCurso;

                foreach ($trimestres as $trimestre) {

                    $notaTrim       = 0;
                    $peso_indicador = 0;
                    $notas          = 0;

                    foreach ($trimestre->criterios->where('curso', $gCurso->id) as $criterio) {

                        $existsnota = Notas::where(["id_matricula" => $matricula->id, "criterio" => $criterio->id, "trimestre" => $trimestre->id])->first();

                        if ($existsnota) {
                            $peso_indicador = $peso_indicador + $existsnota->datosCursoCriterio->peso;
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
                        }

                    }

                    if ($notas > 0) {
                        $comentario = Observaciones::where(["alumno" => $matricula->id_alumno, "trimestre" => $trimestre->id, "curso" => $curso->id])->first();
                        $notaTrim   = round($notas / $peso_indicador, 0, PHP_ROUND_HALF_UP);
                        $notaCurso += $notaTrim;
                        $tooltip = 'data-toggle="tooltip" data-placement="top" title="" data-original-title="' . optional($comentario)->descripcion . '" ';
                        if ($tipo_cal == 'Literal') {
                            $class = $this->color2($notaTrim);
                            $thnota .= "<td class='text-center align-middle toolti " . $class . "' " . $tooltip . ">" . $this->m_equi[$notaTrim] . "</td>";
                        }
                        if ($tipo_cal == 'Numerica') {
                            $class = $this->color($notaTrim);
                            $thnota .= "<td class='text-center align-middle toolti " . $class . "'  " . $tooltip . ">" . $notaTrim . "</td>";
                        }
                    } else {
                        $thnota .= "<td></td>";
                    }

                }

                if ($notaCurso > 0) {
                    $div = 1;
                    if (count($trimestres) > 0) {
                        $div = count($trimestres);
                    }
                    $promCurso = round($notaCurso / $div, 0, PHP_ROUND_HALF_UP);

                    if ($tipo_cal == 'Literal') {
                        $class   = $this->color2($promCurso);
                        $thpromC = "<td class='text-center align-middle text-md font-bold " . $class . "' style='background-color:#fbfaec;'>" . $this->m_equi[$promCurso] . "</td>";
                    }
                    if ($tipo_cal == 'Numerica') {
                        $class = $this->color($promCurso);
                        $thpromC .= "<td class='text-center align-middle text-md font-bold " . $class . "' style='background-color:#fbfaec;'>" . $promCurso . "</td>";
                    }
                }

                $suma_prom_cursos += $promCurso;

                $body .= '<tr>

                        <td>' . $curso->cursoInfo->datosCurso->nombre . '</td>'
                    . $thnota . $thpromC .
                    '</tr>';

            }
if(count($cursos)>=1){
    $prom_general = $suma_prom_cursos / (count($cursos) );
}
            
            if ($tipo_cal == 'Literal') {
                $prom_general_lit = $this->m_equi[round($prom_general, 0, PHP_ROUND_HALF_UP)];

                $collect_promedios->push(collect(['matricula' => $matricula, 'prom' => $prom_general, 'literal' => $prom_general_lit]));
            } else {

                $collect_promedios->push(collect(['matricula' => $matricula, 'prom' => $prom_general]));
            }

            //$collect_promedios       = $collect_promedio->combine([$matricula, $prom_general]);
            //$collect_promedios[] = $combinar->all();

        }

        return PDF::loadView('template-pdf.ranking', ['promedios' => $collect_promedios->sortByDesc('prom'), 
        'califica' => $tipo_cal])->setOption('footer-html', $footer)->setOption('enable-javascript', true)->setOption('footer-right', 'Página [page] de [topage]')
        /* ->setOption('margin-top', '0mm')
        ->setOption('margin-right', '0mm')
        ->setOption('margin-left', '0mm')*/
            ->stream('comprobante de pago.pdf');
        //return $pdf->inline();
    }

    public function generarLista(Request $request, $matricula)
    {
        $school_info = Info::find(1);
        $header      = view('components.pdf.header')->render();

        $footer = view('components.pdf.footer')->render();

        $options = [
            'footer-html' => $footer,
            'header-html' => $header,
        ];

        $matricula = Matricula::findOrFail($matricula);

        $seccion       = $matricula->id_seccion;
        $cursos        = SeccionDocenteCurso::where(["seccion" => $seccion, ["docente", "<>", null]])->get();
        $grado         = $matricula->datosSeccion->datosGrado;
        $anioNivel     = $matricula->datosSeccion->datosAnioNivel;
        $planGrado     = $anioNivel->planAcademico->grados->where('grado', $grado->id)->first();
        $tipo_cal      = $planGrado->tipo_cal;
        $modo_criterio = $planGrado->modo_criterio;
        $trimestres    = [];
        if ($planGrado->trimestres) {
            $trimestres = $planGrado->trimestres->sortBy('datosTrimestre.numero');
        }

        $collect_promedios = new Collection;

        $prom_general     = 0;
        $suma_prom_cursos = 0;

        foreach ($cursos as $curso) {
            $thnota    = '';
            $notaTrims = 0;
            $notas     = 0;
            $notaCurso = 0;
            $promCurso = 0;

            $gCurso = $curso->gradoCurso;

            foreach ($trimestres as $trimestre) {

                $notaTrim       = 0;
                $peso_indicador = 0;
                $notas          = 0;

                foreach ($trimestre->criterios->where('curso', $gCurso->id) as $criterio) {

                    $existsnota = Notas::where(["id_matricula" => $matricula->id, "criterio" => $criterio->id, "trimestre" => $trimestre->id])->first();

                    if ($existsnota) {
                        $peso_indicador = $peso_indicador + $existsnota->datosCursoCriterio->peso;
                        if ($tipo_cal == 'Literal') {
                            if ($existsnota->nota == 'AD' || $existsnota->nota == 'A' || $existsnota->nota == 'B' || $existsnota->nota == 'C') {
                                $notas = $notas + ($this->equiv[$existsnota->nota] * $existsnota->datosCursoCriterio->peso);

                            }
                        }
                        if ($tipo_cal == 'Numerica') {
                            $notas = $notas + ($existsnota->nota * $existsnota->datosCursoCriterio->peso);

                        }
                    }

                }

                if ($notas > 0) {

                    $notaTrim = round($notas / $peso_indicador, 0, PHP_ROUND_HALF_UP);
                    $notaCurso += $notaTrim;

                }

            }

            if ($notaCurso > 0) {
                $div = 1;
                if (count($trimestres) > 0) {
                    $div = count($trimestres);
                }
                $promCurso = $notaCurso / $div;

                if ($tipo_cal == 'Literal') {

                    $prom_general_lit = $this->m_equi[round($promCurso, 0, PHP_ROUND_HALF_UP)];

                    $collect_promedios->push(collect(['curso' => $curso, 'matricula' => $matricula, 'prom' => $promCurso, 'literal' => $prom_general_lit]));

                }
                if ($tipo_cal == 'Numerica') {

                    $collect_promedios->push(collect(['curso' => $curso, 'matricula' => $matricula, 'prom' => $promCurso]));
                }
            }

        }

        return PDF::loadView('template-pdf.lista',
            [
                'promedios' => $collect_promedios,
                'califica'  => $tipo_cal,
            ])
            ->setOption('footer-html', $footer)
           
            ->setOption('footer-right', 'Página [page] de [topage]')
            ->stream('comprobante de pago.pdf');

    }

/* public function generarRanking(Request $request, $seccion)
{

$header = '
<!DOCTYPE html>
<html>
<body  >
<table style="border-bottom: 1px solid black; width: 100%">
<tr>
<td class="section" style="text-align:left">
<img src="' . asset('assets/logo.png') . '" style="width:50%;" height="70" width="180">
</td>
<td style="text-align:right">
<img src="' . asset('assets/logo-minedu.jpg') . '" style="width:50%;" height="70">
</td>
</tr>
</table>
</body>
</html>';

$footer = '
<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head><style type="text/css">p { color: grey; }</style></head>
<body style=""><p>
Copyright © Todos los derechos reservados - Augenblick</p></body>
</html>';

$options = [
'footer-html' => $footer,
'header-html' => $header,
];

$seccion = Seccion::findOrFail($seccion);
$cursos  = $seccion->cursos->where("docente", "<>", null);
$grado   = $seccion->datosGrado;

$anioNivel     = $seccion->datosAnioNivel;
$planGrado     = $anioNivel->planAcademico->grados->where('grado', $grado->id)->first();
$tipo_cal      = $planGrado->tipo_cal;
$modo_criterio = $planGrado->modo_criterio;
$trimestres    = [];
if ($planGrado->trimestres) {
$trimestres = $planGrado->trimestres->sortBy('datosTrimestre.numero');
}

$thead2            = "";
$body              = "";
$matriculas        = $seccion->alumnos;
$collect_promedios = [];
foreach ($matriculas as $matricula) {
$prom_general;

foreach ($cursos as $curso) {
$thnota    = '';
$notaTrims = 0;
$notas     = 0;
$notaCurso = 0;
$promCurso = 0;
$thpromC   = '<td style="background-color:#fbfaec;"></td>';

$gCurso = $curso->gradoCurso;

foreach ($trimestres as $trimestre) {

$notaTrim       = 0;
$peso_indicador = 0;
$notas          = 0;

foreach ($trimestre->criterios->where('curso', $gCurso->id) as $criterio) {

$existsnota = Notas::where(["id_matricula" => $matricula->id, "criterio" => $criterio->id, "trimestre" => $trimestre->id])->first();

if ($existsnota) {
$peso_indicador = $peso_indicador + $existsnota->datosCursoCriterio->peso;
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
}

}

if ($notas > 0) {
$comentario = Observaciones::where(["alumno" => $matricula->id_alumno, "trimestre" => $trimestre->id, "curso" => $curso->id])->first();
$notaTrim   = round($notas / $peso_indicador, 0, PHP_ROUND_HALF_UP);
$notaCurso += $notaTrim;
$tooltip = 'data-toggle="tooltip" data-placement="top" title="" data-original-title="' . optional($comentario)->descripcion . '" ';
if ($tipo_cal == 'Literal') {
$class = $this->color2($notaTrim);
$thnota .= "<td class='text-center align-middle toolti " . $class . "' " . $tooltip . ">" . $this->m_equi[$notaTrim] . "</td>";
}
if ($tipo_cal == 'Numerica') {
$class = $this->color($notaTrim);
$thnota .= "<td class='text-center align-middle toolti " . $class . "'  " . $tooltip . ">" . $notaTrim . "</td>";
}
} else {
$thnota .= "<td></td>";
}

}

if ($notaCurso > 0) {
$div = 1;
if (count($trimestres) > 0) {
$div = count($trimestres);
}
$promCurso = round($notaCurso / $div, 0, PHP_ROUND_HALF_UP);

if ($tipo_cal == 'Literal') {
$class   = $this->color2($promCurso);
$thpromC = "<td class='text-center align-middle text-md font-bold " . $class . "' style='background-color:#fbfaec;'>" . $this->m_equi[$promCurso] . "</td>";
}
if ($tipo_cal == 'Numerica') {
$class = $this->color($promCurso);
$thpromC .= "<td class='text-center align-middle text-md font-bold " . $class . "' style='background-color:#fbfaec;'>" . $promCurso . "</td>";
}
}

$body .= '<tr>

<td>' . $curso->cursoInfo->datosCurso->nombre . '</td>'
. $thnota . $thpromC .
'</tr>';

}

$collect_promedio    = collect(['matricula', 'prom']);
$combinar            = $collect_promedio->combine([$matricula, 29]);
$collect_promedios[] = $combinar->all();

}

foreach ($trimestres as $trimestre) {

$thead2 .= "<td class='text-center border border-light' >" . $trimestre->datosTrimestre->numero . " °</td>";
}

$table = '
<table class="table table-bordered text-dark-m1"  >
<thead class="bgc-grey text-white">
<tr >

<td rowspan="2" class="border border-light text-center align-middle" width="18%">Curso</td>
<td class="text-center center border border-light" colspan="' . (count($trimestres)) . '">Periodo</td>
<td rowspan="2" class="text-center white" style="background-color:#748c98;">Prom <br>Final</td>
</tr>
<tr>' . $thead2 . '</tr>
</thead>
<input type="hidden" value="' . $modo_criterio . '" />
<tbody >'
. $body . '

</tbody>
</table>';

return PDF::loadView('template-pdf.notas', ['tabla' => $table, 'matricula' => $matricula])->setOption('footer-html', $footer)->setOption('enable-javascript', true)->setOption(
'header-html', $header)->setOption('footer-right', 'Página [page] de [topage]')
->setOption('margin-top', '0mm')
->setOption('margin-right', '0mm')
->setOption('margin-left', '0mm')
->stream('comprobante de pago.pdf');
//return $pdf->inline();
}

 */
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
