<div class="alert bgc-white text-dark-tp3 border-1 brc-secondary-l2 shadow-sm radius-0 py-3 d-flex align-items-start ml-2">
    <div class="position-tl w-102 m-n1px border-t-4 brc-primary">
    </div>
    <div class=" px-2 py-25 radius-1px mr-4 shadow-sm border-1 brc-grey-m4">
        <img height="70" src="https://cdn4.iconfinder.com/data/icons/education-1-45/128/B-24-512.png">
            <p class="mb-0 border-3 brc-grey-m4">
                <b class="text-pink">
                    <i class="fas fa-clock text-warning-d1 text-140 w-3 mr-2px">
                    </i>
                    {{ $examen->duracion }} Min.
                </b>
            </p>
        </img>
    </div>
    <div class="text-dark-tp3">
        <h3 class="text-blue-d1 text-130">
            {{ $examen->nombre }}
        </h3>
        {{ $examen->indicaciones }}
        <p class="mt-0 mb-0 ">
            Disponible desde :
            <b class="text-success">
                {{ $examen->fecha_inicio->format('Y-m-d h:i a') }}
            </b>
        </p>
        <p class="mt-0 mb-0">
            Disponible hasta :
            <b class="text-danger">
                {{ $examen->fecha_fin->format('Y-m-d h:i a') }}
            </b>
        </p>
    </div>
    <a aria-label="Close" class="close align-self-start ml-auto mt-n25 mr-n2 text-blue-d2 text-150 opacity-2 bgc-h-blue-l2 radius-round px-15 pt-1px pb-3px"  href="{{ route('Docente.Evaluacion.StartPreview',['evaluacion'=>$examen]) }}">
        <span aria-hidden="true">
            <i class="fas fa-eye text-blue-d2 w-3 mr-2px">
            </i>
        </span>
    </a>
    <a class="close align-self-start ml-auto mt-n25 mr-n2 text-blue-d2 text-150 opacity-2 bgc-h-blue-l2 radius-round px-15 pt-1px pb-3px" href="{{ route('Docente.Evaluacion.Edit',['evaluacion'=>$examen->id]) }}">
        <i class="fas fa-edit text-success w-3 mr-1px">
        </i>
    </a>
    <a class="close align-self-start ml-auto mt-n25 mr-n2 text-blue-d2 text-150 opacity-2 bgc-h-blue-l2 radius-round px-15 pt-1px pb-3px" onclick="deleteExamen('{{ route('Docente.Evaluacion.Destroy',['evaluacion'=>$examen->id]) }}',this)">
        <span aria-hidden="true">
            <i class="fas fa-trash text-danger w-3 mr-2px">
            </i>
        </span>
    </a>
</div>