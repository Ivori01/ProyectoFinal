<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Matricula;
use App\Notas;
use App\Observaciones;
use App\SeccionDocenteCurso;
use Illuminate\Http\Request;
use PDF;
use Barryvdh\DomPDF\Facade as DOMPDF;
use App;
use App\CuentaPorCobrar;
use Illuminate\Support\Facades\View;
use App\Repositories\GradoRepository;
class NotasController extends Controller
{
    private $equiv;
    private $m_equi;
    public function __construct()
    {

        $this->equiv  = collect(['AD' => 4, 'A' => 3, 'B' => 2, 'C' => 1]);
        $this->m_equi = [4 => 'AD', 3 => 'A', 2 => 'B', 1 => 'C'];
    }
    

    public function boleta(Request $request, $id){  
        $matricula = Matricula::findOrFail($id);
        $this->authorize('sinDeudas', $matricula->datosAlumno);
        $seccion       = $matricula->id_seccion;
        $cursos        = SeccionDocenteCurso::where(["seccion" => $seccion, ["docente", "<>", null]])->get();
        $grado         = $matricula->datosSeccion->datosGrado;
        $anioNivel     = $matricula->datosSeccion->datosAnioNivel;
        $planGrado     = $anioNivel->planAcademico->grados->where('grado', $grado->id)->first();
        $tipo_cal      = $planGrado->tipo_cal;
        $modo_criterio = $planGrado->modo_criterio;
        if ($planGrado->trimestres) {
            $trimestres = $planGrado->trimestres->sortBy('datosTrimestre.numero');
        }

        $promedio_curso=[];
        $notas_trimestre=[];
        $promedio_trimestre=[];
        $comentario=[];
        foreach ($cursos as $curso) {
         
            $notaCurso = 0;
            $gCurso = $curso->gradoCurso;
          
          $nro_notas=0;
            foreach ($trimestres as $trimestre) {
                $notaTrim       = 0;
                $peso_indicador = 0;
                $notas          = 0;
                $criterios=$trimestre->criterios->where('curso', $gCurso->id);
                $has_notas_trimestre=Notas::where('id_matricula',$matricula->id)->whereIn('criterio',$criterios->pluck('id'))
                ->where('trimestre',$trimestre->id)->count();
                if($has_notas_trimestre<1){
                 $nro_notas++;
                }

                foreach ($criterios as $criterio) {
                   
                    $existsnota = Notas::where(["id_matricula" => $matricula->id, "criterio" => $criterio->id, "trimestre" => $trimestre->id])->first();
                   $nota='';
                   $class='#3D42A1  ';
                    if ($existsnota) {
                        $peso_indicador = $peso_indicador + $existsnota->datosCursoCriterio->peso;
                        
                        if ($tipo_cal == 'Literal') {
                            if ($existsnota->nota == 'AD' || $existsnota->nota == 'A' || $existsnota->nota == 'B' || $existsnota->nota == 'C') {
                                $notas = $notas + ($this->equiv[$existsnota->nota] * $existsnota->datosCursoCriterio->peso);
                                $nota=$existsnota->nota;

                                if($this->equiv[$existsnota->nota]<=1){
                                    $class='red';
                                }
                               
                               // $class = $this->color2($this->equiv[$existsnota->nota]) . ' literal';
                            }
                        }
                        if ($tipo_cal == 'Numerica') {
                            $notas = $notas + ($existsnota->nota * $existsnota->datosCursoCriterio->peso);
                            $nota=$existsnota->nota;
                           // $class = $this->color($existsnota->nota);
                            if($existsnota->nota<=10){
                                $class='red';
                            }
                        }
                    }

                    


                    $notas_trimestre[]=['nota'=>$nota,'criterio'=>$criterio->id,'trimestre'=>$trimestre->id,'curso'=>$gCurso->id,'class'=>$class];
                }  

                $class='#3D42A1';
                if($notas>0){
                    $notaTrim   = round($notas / $peso_indicador, 0, PHP_ROUND_HALF_UP);
                    if(is_numeric($notaTrim)){
                        $notaCurso += $notaTrim;
                    }
                    if ($tipo_cal == 'Literal') {
                        if($notaTrim<=1){
                            $class='red';
                        }
                        //  $class   = $this->color2($promCurso);
                         // $thpromC = "<td class='text-center align-middle text-md font-bold " . $class . "' style='background-color:#fbfaec;'>" . $this->m_equi[$promCurso] . "</td>";
                         $notaTrim=$this->m_equi[$notaTrim];
                      }else{
                        if($notaTrim<=10){
                            $class='red';
                        }
                      }

                      
                }else{
                    $notaTrim='';
                }
              

             
               
                $promedio_trimestre[]=['nota'=>$notaTrim,'trimestre'=>$trimestre->id,'curso'=>$gCurso->id,'class'=>$class];
                
               
            }
            $div = 1;
            if (count($trimestres) > 0) {
                $div = count($trimestres)-$nro_notas;
            }
            if($div==0){
                $div=1;
            }
            $promCurso = round($notaCurso / $div, 0, PHP_ROUND_HALF_UP);
            $class='#3D42A1';
           if($promCurso>0){
            if ($tipo_cal == 'Literal') {
                //  $class   = $this->color2($promCurso);
                 // $thpromC = "<td class='text-center align-middle text-md font-bold " . $class . "' style='background-color:#fbfaec;'>" . $this->m_equi[$promCurso] . "</td>";
                 if( $promCurso<=1){
                    $class='red';
                }
                 $promCurso=$this->m_equi[ $promCurso];
              }else{
                if($promCurso<=10){
                    $class='red';
                }
              }
           }
           
            
            $promedio_curso[]=['nota'=>$promCurso,'curso'=>$gCurso->id,'class'=>$class];
            
            $last_coment = Observaciones::where(["alumno" => $matricula->id_alumno, "curso" => $curso->id])->oldest()->get()->first();
            if(!$last_coment){
                
                $last_coment='';
              
            }else{
                $last_coment=$last_coment->descripcion;
            }
          
           $comentario[]=['comentario'=>$last_coment,'curso'=>$gCurso->id];
           // array_push($comentario,['comentario'=>$last_coment,'curso'=>$gCurso->id]);

            //$data[]=['curso'=>$gCurso,'notas'=>$notas_trimestres];
          
         
        }


         
              
            return PDF::loadView('alumno.boleta-notas', [ 
                'matricula'=>$matricula,
                'gr'=>new GradoRepository(),
                'data' =>collect( $notas_trimestre),
                'grado'=> $planGrado,
                'promedioT'=>collect($promedio_trimestre),
                'promedioC'=>collect($promedio_curso),
                'comentario'=>collect($comentario)
              ])->setOption('enable-javascript',true)
              ->setOption('encoding', 'UTF-8')
              ->setOption('no-print-media-type',true)->stream('boleta.pdf');
       
         
            $dompdf =  DOMPDF::loadView('alumno.boleta-notas1', [ 
                'matricula'=>$matricula,
                'gr'=>new GradoRepository(),
                'data' =>collect( $notas_trimestre),
                'grado'=> $planGrado,
                'promedioT'=>collect($promedio_trimestre),
                'promedioC'=>collect($promedio_curso),
                'comentario'=>collect($comentario)
              ]);
              $dompdf->setPaper('A4', 'portait');
    return $dompdf->stream();



         
        return PDF::loadView('alumno.boleta-notas', [ 
            'matricula'=>$matricula,
            'gr'=>new GradoRepository(),
            'data' =>collect( $notas_trimestre),
            'grado'=> $planGrado,
            'promedioT'=>collect($promedio_trimestre),
            'promedioC'=>collect($promedio_curso),
            'comentario'=>collect($comentario)
          ])->setOption('enable-javascript',true)
          ->setOption('encoding', 'UTF-8')
          ->setOption('no-print-media-type',true)->stream('boleta.pdf');
        //return view('alumno.pago.reportes.invoice', ['pago' => null]);
    return view('alumno.boleta-notas', [
        'matricula'=>$matricula,
            'gr'=>new GradoRepository(),
            'data' =>collect( $notas_trimestre),
            'grado'=> $planGrado,
            'promedioT'=>collect($promedio_trimestre),
            'promedioC'=>collect($promedio_curso),
            'comentario'=>collect($comentario)
     ]);
    }

    public function index(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);

        $this->authorize('owner', $matricula);
    
        $this->authorize('sinDeudas', $matricula->datosAlumno);
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
                        <td><a data-target="#modal-detalle" href="#" data-toggle="modal"  onclick="detalles(' . "'" . route("Alumno.Notas.Detalle", ["id" => $curso]) . "'" . ')">
                        <i class="fa fa-plus text-blue-m2 mr-3px"></i>
                        </a></td>
                        <td>' . $curso->cursoInfo->datosCurso->nombre . '</td>'
                . $thnota . $thpromC .
                '</tr>';

        }

        foreach ($trimestres as $trimestre) {

            $thead2 .= "<td class='text-center border border-light' >" . $trimestre->datosTrimestre->numero . " °</td>";
        }

        $table = '<table class="table table-hover table-bordered"  >
        <thead class="bgc-grey text-white">
        <tr >
        <td  rowspan="2" class="border border-light text-center" width="15"></td>
        <td rowspan="2" class="border border-light text-center align-middle" width="18%">Curso</td>
        <td class="text-center center border border-light" colspan="' . (count($trimestres)) . '">Periodo</td>
         <td rowspan="2" class="text-center white" style="background-color:#748c98;">Prom <br>Final</td>
         </tr>
         <tr>' . $thead2 . '</tr>
      </thead>
<input type="hidden" value="' . $modo_criterio . '" />
      <tbody >' . $body . '


      </tbody></table>
      ';

        return view('alumno.notas', ['tabla' => $table, "seccion" => $matricula]);
    }

    public function detalle($id)
    {

        $curso         = SeccionDocenteCurso::findOrFail($id);
        $alumno        = auth()->user()->persona->alumno;
        $planGrado     = $curso->gradoCurso->planGrado;
        $tipo_cal      = $planGrado->tipo_cal;
        $modo_criterio = $planGrado->modo_criterio;
        $trimestres    = [];
        if ($planGrado->trimestres) {
            $trimestres = $planGrado->trimestres->sortBy('datosTrimestre.numero');
        }
        $matricula = Matricula::where(['id_alumno' => $alumno->id, 'id_seccion' => $curso->seccion])->first();
        $thead2    = "";
        $body      = "";

        $thnota    = '';
        $notaTrims = 0;
        $notas     = 0;
        $notaCurso = 0;
        $promCurso = 0;
        $thpromC   = '<td style="background-color:#fbfaec;"></td>';

        $gCurso    = $curso->gradoCurso;
        $tableTrim = '';

        $g = 1;
        foreach ($trimestres as $trimestre) {
            $tdNotas = '';

            $activ          = '';
            $notaTrim       = 0;
            $peso_indicador = 0;
            $notas          = 0;
            foreach ($trimestre->criterios->where('curso', $gCurso->id) as $criterio) {
                $class      = '';
                $existsnota = Notas::where(["id_matricula" => $matricula->id, "criterio" => $criterio->id, "trimestre" => $trimestre->id])->first();
                if ($existsnota) {
                    $peso_indicador = $peso_indicador + $existsnota->datosCursoCriterio->peso;
                    if ($tipo_cal == 'Literal') {
                        if ($existsnota->nota == 'AD' || $existsnota->nota == 'A' || $existsnota->nota == 'B' || $existsnota->nota == 'C') {
                            $notas = $notas + ($this->equiv[$existsnota->nota] * $existsnota->datosCursoCriterio->peso);
                            $class = $this->color2($this->equiv[$existsnota->nota]);

                        }
                    }
                    if ($tipo_cal == 'Numerica') {
                        $notas = $notas + ($existsnota->nota * $existsnota->datosCursoCriterio->peso);
                        $class = $this->color($existsnota->nota);
                    }

                    $tdNotas .= '<tr><td>' . $criterio->datosCriterio->nombre . '</td><td class="' . $class . '">' . $existsnota->nota . ' </td></tr>';
                } else {
                    $tdNotas .= '<tr><td>' . $criterio->datosCriterio->nombre . '</td><td ></td></tr>';
                }

            }

            if ($notas > 0) {
                $comentario = Observaciones::where(["alumno" => $alumno->id, "trimestre" => $trimestre->id, "curso" => $curso->id])->first();
                $notaTrim   = round($notas / $peso_indicador, 0, PHP_ROUND_HALF_UP);
                $notaCurso += $notaTrim;
                $tooltip = 'data-toggle="tooltip" data-placement="top" title="" data-original-title="' . optional($comentario)->descripcion . '" ';
                if ($tipo_cal == 'Literal') {
                    $class  = $this->color2($notaTrim);
                    $thnota = "<td style='background-color:#fbfaec;' class='text-center align-middle font-bold toolti " . $class . "' " . $tooltip . ">" . $this->m_equi[$notaTrim] . "</td>";
                }
                if ($tipo_cal == 'Numerica') {
                    $class  = $this->color($notaTrim);
                    $thnota = "<td style='background-color:#fbfaec;' class='text-center align-middle font-bold toolti " . $class . "'  " . $tooltip . ">" . $notaTrim . "</td>";
                }
            } else {
                $thnota = "<td style='background-color:#fbfaec;'></td>";
            }

            if ($g == 1) {
                $activ = 'active';
            }

            $comentario = Observaciones::where(["alumno" => $alumno->id, "trimestre" => $trimestre->id, "curso" => $curso->id])->first();
            $coment     = '';
            if ($comentario) {
                $coment = '<div class="alert d-flex bgc-white brc-success-m3 border-1 p-0" role="alert">
                          <div class="bgc-success p-25 text-center m-n1px radius-l-1">
                            <i class="fa fa-check text-150 text-white"></i>
                          </div>
                          <span class="ml-3 align-self-center text-success-d2 text-110">' . $comentario->descripcion . '</span>
                        </div>';
            }

            $tableTrim .= '<div aria-labelledby="trim' . $trimestre->datosTrimestre->numero . '-tab" class="tab-pane fade show ' . $activ . ' text-95" id="trim-' . $trimestre->datosTrimestre->numero . '" role="tabpanel"><table class="table table-hover table-bordered"  >
        <thead class="bgc-grey text-white">
        <tr >
        <td  class="border border-light text-center" >Criterio de evaluación  </td>
        <td class="border border-light text-center align-middle" width="18%">Nota</td>


         </tr>

      </thead>

      <tbody>' . $tdNotas . '
<tr><td style="background-color:#bbb295;" class="text-white ">Promedio</td>' . $thnota . '</tr>

      </tbody></table>' . $coment . '</div>';
            $g++;

        }

        $tableTrim = '<div class="tab-content rounded-bottom">' . $tableTrim . '<div>';

        if ($notaCurso > 0) {
            $div = 1;
            if (count($trimestres) > 0) {
                $div = count($trimestres);
            }
            $promCurso = round($notaCurso / $div, 0, PHP_ROUND_HALF_UP);

            if ($tipo_cal == 'Literal') {
                $class   = $this->color2($promCurso);
                $thpromC = "<b class='text-center align-middle text-lg font-bold " . $class . "' style='background-color:#fbfaec;'>" . $this->m_equi[$promCurso] . "</b>";
            }
            if ($tipo_cal == 'Numerica') {
                $class = $this->color($promCurso);
                $thpromC = "<b class='text-center align-middle text-lg font-bold " . $class . "' style='background-color:#fbfaec;'>" . $promCurso . "</b>";
            }
        }

        $body .= '<tr>
                        <td class="text-center align-middle"><a data-target="#modal-detalle" href="#" data-toggle="modal"  onclick="detalles(' . "'" . route("Alumno.Notas.Detalle", ["id" => $curso]) . "'" . ')">
                        <i class="fa fa-plus text-blue-m2 mr-3px"></i>
                        </a></td>
                        <td>' . $curso->cursoInfo->datosCurso->nombre . '</td>'
            . $thnota . $thpromC .
            '</tr>';

        $f = 1;
        foreach ($trimestres as $trimestre) {
            $active = '';
            if ($f == 1) {
                $active = 'active';
            }

            $thead2 .= '<li class="nav-item mr-1px">
                            <a aria-controls="home" aria-selected="true" class="nav-link ' . $active . ' text-left radius-0" data-toggle="tab" href="#trim-' . $trimestre->datosTrimestre->numero . '" id="trim' . $trimestre->datosTrimestre->numero . '-tab" role="tab">
                                <i class="fa fa-eye text-blue-m1 mr-3px">
                                </i>
                                ' . $trimestre->datosTrimestre->numero . '
                            </a>
                        </li>';
            $f++;
        }

        $thead2 = '<ul class="nav nav-tabs nav-justified" role="tablist">' . $thead2 . '</ul>';

        $table = '<div class="alert alert-light bgc-light brc-light" role="alert">
                         ' . $thpromC . '
                        </div> <div class="tabs-above"> ' . $thead2 . $tableTrim . '</div>';

        return response()->json(['tabla' => $table, 'curso' => $curso->cursoInfo->datosCurso->nombre]);
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
