
<table class="table table-striped table-bordered table-hover dataTable no-footer">
    <thead>
        <tr>
            <th>
                Curso
            </th>
            <th>
                Trimestre
            </th>
            <th>Criterios  de evaluacion</th>
            <th>Nota</th>
        </tr>
    </thead>
    <tbody>
         
        @foreach($grado->cursos as $curso)
        <tr>
            <td rowspan="{{count($grado->trimestres)  + count($curso->criterios)+4}}" class="  align-middle font-weight-bold" >
                {{$curso->datosCurso->nombre}}
            </td>
        </tr>
        @foreach($grado->trimestres as $trimestre)
        <tr>
            <td rowspan=" {{  count($curso->criterios->where('trimestre',$trimestre->id))+2 }}" class="align-middle">
                {{$trimestre->datosTrimestre->numero}} ° Trimestre
            </td>
        </tr>

        @foreach($curso->criterios->where('trimestre',$trimestre->id) as $criterio)
        <tr>
            <td >
                {{$criterio->datosCriterio->nombre}}
            </td>
            <td>20</td>
        </tr>
        @endforeach
<tr>
            <td   style="background-color: #6a94b1;">
               Promedio trimestre
            </td>
            <td style="background-color: #cee0ec;">20</td>
        </tr>

        @endforeach
       {{--  @foreach($curso->criterios as $criterio)
        <tr>
            <td>
                {{$criterio->datosCriterio->nombre}}
            </td>
        </tr>
        @endforeach --}}
				<tr >
            <td  colspan="2" style="background-color: #bfa03b;" class="text-white">
               Promedio final del curso
            </td>
            <td style="background-color: #dec373;">20</td>
        </tr>
			@endforeach
    </tbody>
</table>


