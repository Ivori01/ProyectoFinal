<div class="card bgc-purple-m3 shadow-sm mb-2 collapsed" draggable="false" id="">
    <div class="card-header card-header-sm">
        <h5 class="card-title text-dark-tp3 text-600 text-90 align-self-center">
            {{ $pregunta->nombre }}
        </h5>
        <div class="card-toolbar">
            <a class="card-toolbar-btn text-success" data-target="#modal-update-pRandom" data-toggle="modal" href="#" onclick="editPreguntaRand('{{ route('Docente.PreguntaAleatoria.Edit',['pregunta_aleatoria'=>$pregunta->id]) }}',this)">
                <i class="fa fa-pen">
                </i>
            </a>
            <a class="card-toolbar-btn text-grey-d3 d-style collapsed" data-action="toggle" draggable="false" href="#">
                <i class="fa fa-minus d-n-collapsed">
                </i>
                <i class="fa fa-plus d-collapsed">
                </i>
            </a>
            <a class="card-toolbar-btn text-danger-d3" data-toggle="modal" href="#" onclick="deletePregunta('{{ route('Docente.PreguntaAleatoria.Destroy',['pregunta'=>$pregunta->id]) }}',$(this))">
                <i class="fa fa-times">
                </i>
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body bgc-white p-0 collapse {{ $show ?? '' }}" style="">
        <form>
            <div class="p-3">
                <div class="row btn-group-sm">
                    <button class="col-sm btn btn-outline-warning text-break m-1" data-target="#modal-registro-pregunta1" data-toggle="modal" type="button" onclick="routeCreateQuestion='{{ route('Docente.PreguntaAleatoria.addQuestion',['pregunta'=>$pregunta->id]) }}';container=this;">
                        Pregunta opción múltiple
                        <i class="fa fa-plus ml-2 f-n-hover ">
                        </i>
                    </button>
                    <button class="col-sm btn btn-outline-primary text-break m-1" data-target="#modal-registro-pregunta2" data-toggle="modal" type="button" onclick="routeCreateQuestion='{{ route('Docente.PreguntaAleatoria.addQuestion',['pregunta'=>$pregunta->id]) }}';container=this;">
                        Pregunta Verdadero / Falso
                        <i class="fa fa-plus ml-2 f-n-hover">
                        </i>
                    </button>
                    <button class="col-sm btn btn-outline-success text-break m-1" data-target="#modal-registro-pregunta3" data-toggle="modal" type="button" onclick="routeCreateQuestion='{{ route('Docente.PreguntaAleatoria.addQuestion',['pregunta'=>$pregunta->id]) }}';container=this;">
                        Pregunta abierta
                        <i class="fa fa-plus ml-2 f-n-hover">
                        </i>
                    </button>
                </div> 
                <h5 class="card-title text-120 pt-2 pb-0 ">
                  <u>Grupo de preguntas</u> 
                </h5>
                <p class="text-brown"> <b>( {{ $pregunta->puntaje }} Puntos)</b></p>
                <div class="random-options">
                     @foreach ($pregunta->preguntas as $question)  
                   <div>
                                @component('components.docente.a-virtual.sub-contenido.quiz.pregunta',['pregunta'=>$question->datosPregunta,'isFromGroup'=>true])
                                @endcomponent  
                            </div>
                @endforeach
                </div>
               
            </div>
        </form>
    </div>
</div>
