<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">   </meta>
    <title>
        Example 2
    </title>
    <style type="text/css">
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
        
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 11px;
            font-family: SourceSansPro;
        }


    </style>
 
</head>

<body style='margin-bottom: 2pt;'>


<main>

    <style>
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }
        .tg td {
            font-family: Arial, sans-serif;
            font-size: 11px;
            padding: 2px 2px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
        }
    
        .tg th {
            font-family: Arial, sans-serif;
            font-size: 11px;
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
    <div class="containerinfo">
        <div class="medio">

            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            <div id="logo" style="margin-bottom:40px;">
                                <img
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Escudo_nacional_del_Per%C3%BA.svg/1792px-Escudo_nacional_del_Per%C3%BA.svg.png" width="90">
                                </img>
                            </div>
                        </td>
                        <td>
                            <table class="tg" style="undefined;table-layout: fixed; width: 600px; margin-left: 50px; margin-right: 50px;margin-bottom: 40px; " cellpadding="0" cellspacing="0">
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
                                        <td style="text-align: center;"> {{$gr->onlyName($matricula->datosSeccion->datosGrado->numero)}} </td>
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
            </table>
        </div>
       
    </div>
    <table class="tg" style="table-layout: fixed; width:900px" cellpadding="0" cellspacing="0">
    
        <colgroup>
            <col style="width: 110px">
            <col style="width:200px">
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
                    <tr class=" align-middle " >
                        <td class="report-content-cell" style="text-transform: uppercase;text-align: center;"
                            rowspan="{{ count($curso->criterios->where('trimestre', $trimestre->id)) + 2 }}">
                         
                            <div class="main">   {{ $curso->datosCurso->nombre }}</div>
                         
                          
                        </td>
                    </tr>
                    @foreach ($curso->criterios->groupBy('criterio') as $grupocriterios)
    
                        @php
                            $tds = '<td class="tg-031e ">' . $grupocriterios->first()->datosCriterio->nombre . '</td>';
                            $criterio = [];
                            
                            foreach ($grupocriterios->sortBy('trimestre.datosTrimestre.numero') as $criterio) {
                                $nota = $data
                                    ->where('criterio', $criterio->id)
                                    ->where('trimestre', $criterio->trimestre)
                                    ->where('curso', $curso->id)
                                    ->first();
                            
                                $tds .= '<td   style="text-align: center;font-weight: bold;">' . $nota['nota'] . '</td>';
                            }
                            $coment = $comentario->where('curso', $curso->id)->first()['comentario'];
                            
                            if (!property_exists($coment, 'descripcion')) {
                                $coment = '';
                            } else {
                                $coment = $coment['descripcion'];
                            }
                            if ($loop->first) {
                                $tds .=
                                    ' <td   style="text-align: center;font-weight: bold;"
                                                                                        rowspan="' .
                                    (count($curso->criterios->where('trimestre', $trimestre->id)) + 1) .
                                    '">         ' .
                                    $promedioC->where('curso', $curso->id)->first()['nota'] .
                                    '
                                                                                    </td>
                                                                                    <td   rowspan="' .
                                    (count($curso->criterios->where('trimestre', $trimestre->id)) + 1) .
                                    '">' .
                                    $coment .
                                    '</td>';
                            }
                            
                        @endphp
                        <tr >{!! $tds !!}
    
                        </tr>
    
                    @endforeach
                    <tr >
                        <td style="text-transform: uppercase;font-weight: bold;
                        background-color: #efefef; letter-spacing: 1px;">
                            CALIFICATIVO DE ÁREA
                        </td>
                        @foreach ($grado->trimestres as $trimestre)
                            <td class="tg-wr85"
                                style=" background-color: #efefef;text-align: center;font-weight: bold;">
                                {{ $promedioT->where('trimestre', $trimestre->id)->where('curso', $curso->id)->first()['nota'] }}
                            </td>
    
                        @endforeach
                    </tr>
                  
              
                @endforeach
            </tbody>
        </table>
    <div id="thanks">
        Thank you!
    </div>
   
</main>

</body>
</html>