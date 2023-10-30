<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
       Boleta de notas 
    </title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />

</head>

<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 12px;
        padding: 2px 2px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-weight: normal;
        padding: 1px 1px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
    }

    

    .tg .tg-wr85 {
        font-weight: bold;
        background-color: #efefef;
        text-align: center
    }

    .tg .tg-s6z2 {
        text-align: center
    }

    .tg .tg-e3zv {
        font-weight: bold
    }

    .tg .tg-2sfh {
        font-weight: bold;
        background-color: #efefef
    }

    .tg .tg-mdvr {
        font-weight: bold;
        background-color: #efefef;
        color: #000000;
        text-align: center
    }

    .tg .tg-9hbo {
        font-weight: bold;
        vertical-align: top
    }

    .tg .tg-yw4l {
        vertical-align: top
    }

    .tg .tg-amwm {
        font-weight: bold;
        text-align: center;
        vertical-align: top
    }

    
    
</style>


<style>
   

    .medio {
        grid-area: medio;
    }

    .derecha {
        grid-area: derecha;
    }

    .izquierda {
        grid-area: izquierda;
    }






</style>

<body style='margin-bottom: 2pt;'>
   
        <div class="containerinfo">
            <div class="medio">

                <!-- <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>
                                <div id="logo" style="margin-bottom:40px;">
                                    <img
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Escudo_nacional_del_Per%C3%BA.svg/1792px-Escudo_nacional_del_Per%C3%BA.svg.png" width="90">
                                    </img>
                                </div>
                            </td>
                            <td >
                                <table class="tg" style="undefined;table-layout: fixed; width: 600px; margin-left: 50px; margin-right: 50px;margin-bottom: 40px; " cellpadding="0" cellspacing="0" border="2">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">DRE</td>
                                            <td style="text-align: center;">PUNO</td>
                                            <td style="text-align: center;">UGEL</td>
                                            <td style="text-align: center;">SAN ROMAN</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">NIVEL</td>
                                         
                                            <td style="text-align: center;" colspan="3">{{$grado->datosGrado->datosNivel->nombre}}</td>
                                       

                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Institución Educativa:
                                            </td>
                                         
                                            <td colspan="3" style="text-transform: uppercase;text-align: center;">{{$school_info->nombre}}</td>
                                       
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">GRADO</td>
                                            <td style="text-align: center;"> {{$matricula->datosSeccion->datosGrado->nombre}} </td>
                                            <td style="text-align: center;">SECCION</td>
                                            <td style="text-align: center;">{{$matricula->datosSeccion->letra}}</td>

                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Apellidos y nombres del
                                                estudiante:
                                                </td>
                                                <td style="text-align: center;" colspan="3">{{$matricula->datosalumno->persona->nombres_apellidos}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">DNI
                                                </td>
                                                <td style="text-align: center;" colspan="3">{{$matricula->datosalumno->persona->nrodocumento}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <div id="logo" style="margin-bottom: 40px;">
                                    <img
                                        src="{{ url(Storage::url('sistem/photos/' . $school_info->logo)) }}" width="90">
                                    </img>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table> -->
            </div>
           
        </div>

        <style type="text/css" media="screen,print">
            /* Page Breaks */
     
     /***Always insert a page break before the element***/
            .pb_before {
                page-break-before: always !important;
            }
     
     /***Always insert a page break after the element***/
            .pb_after {
                page-break-after: always !important;
            }
     
     /***Avoid page break before the element (if possible)***/
            .pb_before_avoid {
                page-break-before: avoid !important;
            }
     
     /***Avoid page break after the element (if possible)***/
            .pb_after_avoid {
                page-break-after: avoid !important;
            }
     
     /* Avoid page break inside the element (if possible) */
            .pbi_avoid {
                page-break-inside: avoid !important;
            }
        
     
        </style>

<style>
    tr.page-break-avoid {
    
        border: 1px solid;
        page-break-before: always;
      }
</style>
<div class="export-table" style="border-style: solid; border-width: 1px;">
    <table class="tg eble report-container" style="table-layout: fixed; width:100%;" cellpadding="0" cellspacing="0" border="1">
        <colgroup>
            <col style="width: 80px">
            <col style="width: 205.5px">
            @foreach ($grado->trimestres->sortBy('datosTrimestre.numero') as $trimestre)
                <col style="width: 30px;">
            @endforeach
            <col style="width: 35px">
            <col style="width: 95px">
        </colgroup>
        <thead class="report-header">
            <tr>
                <th class="tg-wr85 report-header-cell" rowspan="2">  <div class="header-info">ÁREA CURRICULAR</div></th>
                <th class="tg-wr85 report-header-cell" rowspan="2">  <div class="header-info">COMPETENCIAS</div></th>
                <th class="tg-wr85 report-header-cell" colspan="{{ $grado->trimestres->count() }}">  <div class="header-info">CALIFICATIVO POR PERIODO</div></th>
                <th class="tg-wr85 report-header-cell" rowspan="2">  <div class="header-info">Calific.<br>final del Área</div></th>
                <th class="tg-wr85 report-header-cell" rowspan="2">  <div class="header-info">Conclusión descriptiva de final del periodo lectivo</div>
                </th>
            </tr>
            <tr>
                @foreach ($grado->trimestres->sortBy('datosTrimestre.numero') as $trimestre)
                    <td class="tg-2sfh report-header-cell" style="text-align: center;">
                        <div class="header-info">{{ $trimestre->datosTrimestre->numero }}</div>
                    </td>
                @endforeach
            </tr>
        </thead>
        <tbody class="report-content">
       
            @foreach ($grado->cursos as $curso)
         
                @php
                    $c = count($curso->criterios);
                    
                @endphp
                <tr class="page-break-avoid align-middle " style=" outline: thin solid;">
                    <td class="report-content-cell" style="text-transform: uppercase;text-align: center;"
                        rowspan="{{ count($curso->criterios->where('trimestre', $trimestre->id)) + 2 }}">
                     
                        <div class="main">   {{ $curso->datosCurso->nombre }}</div>
                     
                      
                    </td>
                </tr>
                @foreach ($curso->criterios->groupBy('criterio') as $grupocriterios)

                    @php
                        $tds = '<td class="tg-031e " style="page-break-inside: avoid !important;
                        border: 1px solid;
                        page-break-before: avoid;">' . $grupocriterios->first()->datosCriterio->nombre . '</td>';
                        $criterio = [];
                        
                        foreach ($grupocriterios->sortBy('trimestre.datosTrimestre.numero') as $criterio) {
                            $nota = $data
                                ->where('criterio', $criterio->id)
                                ->where('trimestre', $criterio->trimestre)
                                ->where('curso', $curso->id)
                                ->first();
                        
                            $tds .= '<td   style="text-align: center;font-weight: bold;color:'.$nota['class'].';">' . $nota['nota'] . '</td>';
                        }
                        $coment = $comentario->where('curso', $curso->id)->first()['comentario'];
                   
                     
                     
                        if ($loop->first) {
                          
                            $tds .=
                                ' <td   style="text-align: center;font-weight: bold;  page-break-inside: avoid !important;
                              
                                page-break-before: avoid;color:'. $promedioC->where('curso', $curso->id)->first()['class'].';"
                                                                                    rowspan="' .
                                (count($curso->criterios->where('trimestre', $trimestre->id)) + 1) .
                                '">         ' .
                                $promedioC->where('curso', $curso->id)->first()['nota'] .
                                '
                                                                                </td>
                                                                                <td style="page-break-inside: avoid !important;
                                                                                border: 1px solid;
                                                                                page-break-before: avoid;"   rowspan="' .
                                (count($curso->criterios->where('trimestre', $trimestre->id)) + 1) .
                                '">' .
                                $coment .
                                '</td>';
                        }
                        
                    @endphp
                    <tr class="page-break-avoid">{!! $tds !!}

                    </tr>

                @endforeach
                <tr >
                    <td style="text-transform: uppercase;font-weight: bold;
                    background-color: #efefef; letter-spacing: 1px;">
                        CALIFICATIVO DE ÁREA
                    </td>
                    @foreach ($grado->trimestres as $trimestre)
                        <td class="tg-wr85"
                            style=" background-color: #efefef;text-align: center;font-weight: bold;color:{{$promedioT->where('trimestre', $trimestre->id)->where('curso', $curso->id)->first()['class']}};">
                            {{ $promedioT->where('trimestre', $trimestre->id)->where('curso', $curso->id)->first()['nota'] }}
                        </td>

                    @endforeach
                </tr>
              
          
            @endforeach
        </tbody>
    </table>
</div>
       

        <table style="width: 900px; margin-top:90px">
            <tr>
                <td style="text-align: center;"><p style="text-decoration: overline;">Firma y sello del Docente o Tutor(a)</p></td>
                <td><p style="text-decoration: overline;">Firma y sello del Director(a)</p></td>
            </tr>
        </table>
  
</body>
@if (isset($_GET['print']))
    <script type="text/javascript">
        window.print();
    </script>
@endif
</html>