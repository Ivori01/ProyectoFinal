<table class="table table-striped table-bordered table-hover dataTable no-footer">
    <thead>
        <tr>
            <th>
                Curso
            </th>
            <th>
                Criterios  de evaluacion
            </th>
            @foreach($grado->trimestres->sortBy('datosTrimestre.numero') as $trimestre)
            <td>
                {{$trimestre->datosTrimestre->numero}} °
            </td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($grado->cursos as $curso)
        @php
        $c=count($curso->criterios);
        @endphp
        <tr class=" align-middle">
            <td rowspan="{{count($curso->criterios->where('trimestre',$trimestre->id)) +3 }}">
                {{$curso->datosCurso->nombre}}
            </td>
        </tr>
        @foreach($curso->criterios->where('trimestre',$trimestre->id) as $criterio)
        <tr>
            <td>
                {{$criterio->datosCriterio->nombre}}
            </td>
            @foreach($curso->criterios as $criterio)
            @foreach($grado->trimestres as $trimestre)
            
            <td>
               
               {{  $existsnota = optional($notas::where(["alumno" => $matricula->alumno, "criterio" => $criterio->id,'trimestre'=>$trimestre->id])->first())->nota }}
            </td>
            @endforeach
            @endforeach
        
        @endforeach
        </tr>
        <tr>
            <td style="background-color: #6a94b1;">
                Promedio trimestre
            </td>
            @foreach($grado->trimestres as $trimestre)
            <td style="background-color: #cee0ec;">
                20
            </td>
            @endforeach
        </tr>
        <tr class=" align-middle">
            <td style="background-color: #bfa03b;">
                Promedio final curso
            </td>
            <td class=" align-middle" colspan="{{ count($grado->trimestres) }}" style="background-color: #dec373;text-align: center;">
                20
            </td>
        </tr>
        @endforeach
    </tbody>
</table>