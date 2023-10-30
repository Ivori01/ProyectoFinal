<div class="card 
@if ($pregunta->tipo==1)
bgc-yellow-m3
@endif
@if ($pregunta->tipo==2)
bgc-primary-m3
@endif

@if ($pregunta->tipo==3)
bgc-success-m3
@endif 
 shadow-sm mb-2 collapsed" draggable="false" id="">
    <div class="card-header card-header-sm">
        <h5 class="card-title text-dark-tp3 text-600 text-90 align-self-center">
            {{ $pregunta->nombre }}
        </h5>
        <div class="card-toolbar">
            @if ($pregunta->tipo==1)
            <a class="card-toolbar-btn btn btn-sm radius-1 btn-light-blue btn-brc-tp mx-2px" href="#" data-target="#modal-update-pMultipleOpt" data-toggle="modal" onclick="editOptionsMultiple('{{ route('Docente.Pregunta.GetOpciones',['pregunta'=>$pregunta->id]) }}',this)">
                Alternativas
                
            </a> 
            @endif
            @if ($pregunta->tipo==2)
            <a class="card-toolbar-btn btn btn-sm radius-1 btn-light-blue btn-brc-tp mx-2px" href="#" data-target="#modal-update-pTrueFalseOpt" data-toggle="modal" onclick="editOptionsMultiple('{{ route('Docente.Pregunta.GetOpciones',['pregunta'=>$pregunta->id]) }}',this)">
                Alternativas
                
            </a>
            @endif

            <a class="card-toolbar-btn text-success" data-target="#modal-update-pMultiple" data-toggle="modal" href="#" onclick="editPregunta('{{ route('Docente.Pregunta.Edit',['pregunta'=>$pregunta->id]) }}',this)">
                <i class="fa fa-pen">
                </i>
            </a>
            <a class="card-toolbar-btn text-grey-d3 d-style collapsed" data-action="toggle" draggable="false" href="#">
                <i class="fa fa-minus d-n-collapsed">
                </i>
                <i class="fa fa-plus d-collapsed">
                </i>
            </a>
            @if (isset($isFromGroup))
                <a class="card-toolbar-btn text-danger-d3"  data-toggle="modal" href="#" onclick="deletePregunta('{{ route('Docente.PreguntaAleatoria.DestroyQuestion',['pregunta'=>$pregunta->id]) }}',$(this))" >
                <i class="fa fa-times">
                </i>
            </a>
            @else
                <a class="card-toolbar-btn text-danger-d3"  data-toggle="modal" href="#" onclick="deletePregunta('{{ route('Docente.Pregunta.Destroy',['pregunta'=>$pregunta->id]) }}',$(this))" >
                <i class="fa fa-times">
                </i>
            </a>
            @endif
           
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body bgc-white p-0 collapse {{ $show ?? '' }}" style="">
        <form>
            <div class="p-3">
                <p>
                    <h5 class="card-title text-110 text-primary-d2 pt-0">
                        {{ $pregunta->nombre }}
                    </h5>
                </p>
                <p class="mb-0 text-110 text-black-d2 pb-3">
                    {!! $pregunta->descripcion !!}
                </p>

                 @if (isset($isFromGroup))
                 <p class="text-brown"> <b> ( {{ $pregunta->grupo->datosPreguntaAleatoria->puntaje }} Puntos )</b></p>
                 @else
                <p class="text-brown"> <b>( {{ $pregunta->puntos }} Puntos )</b></p>
                @endif
                <div class="alert bgc-blue-l3 brc-blue-l1 text-dark-tp2" role="alert">

                    @if ($pregunta->tipo==3)
                     <div class="form-group row">
              
                <div class="col-12">
                    <textarea class="form-control descripcion" name="descripcion" ></textarea>
                </div>
            </div>
                        {{-- expr --}}
                    @endif

                    @if ($pregunta->opciones->where('respuesta','1')->count() >1)
                        @foreach ($pregunta->opciones as $opcion)

                            @if ($opcion->respuesta==1)
                            <div class="alert d-flex bgc-green-l1 brc-green-m4 border-1 pl-3 radius-l-0" role="alert">
                                <p>
                                    <label class="mt-1 mt-sm-0 ml-sm-3">
                                        <input checked="" class="mr-1 bgc-success" type="checkbox"/>
                                        <b>{{strtolower(chr($loop->index+65))  }})</b> {{ $opcion->detalle }}
                                    </label>
                                </p>
                            </div>
                            @else
                            <p>
                                <label class="mt-1 mt-sm-0 ml-sm-3">
                                    <input class="mr-1 bgc-success"  type="checkbox"/>
                                     <b>{{strtolower(chr($loop->index+65))  }})</b> {{ $opcion->detalle }}
                                </label>
                            </p>
                            @endif  

                        @endforeach

                    @else

                        @foreach ($pregunta->opciones as $opcion)

                        @if ($opcion->respuesta==1)
                            <div class="alert d-flex bgc-green-l1 brc-green-m4 border-1 pl-3 radius-l-0" role="alert">
                                <p>
                                    <label class="mt-1 mt-sm-0 ml-sm-3">
                                        <input checked="" class="mr-1 bgc-success" name="opcion{{ $pregunta->id }}" type="radio" value="{{ $opcion->id }}"/>
                                         <b>{{strtolower(chr($loop->index+65))  }})</b> {{ $opcion->detalle }}
                                    </label>
                                </p>
                            </div>
                        @else
                            <p>
                                <label class="mt-1 mt-sm-0 ml-sm-3">
                                    <input class="mr-1 bgc-success" name="opcion{{ $pregunta->id }}" type="radio" value="{{ $opcion->id }}"/>
                                     <b>{{strtolower(chr($loop->index+65))  }})</b> {{ $opcion->detalle }}
                                </label>
                            </p>
                        @endif

                        @endforeach

                    @endif
                </div>
                <div class="alert bgc-grey-l4 border-none border-l-4 brc-green radius-0 text-dark-tp2">
                      <h4 class="text-purple text-130">La respuesta correcta es </h4>
                      @foreach ($pregunta->opciones as $opcion)
                          @if ($opcion->respuesta==1)
                           <li class="text-primary">  <b>{{strtolower(chr($loop->index+65))  }})</b>  {{ $opcion->detalle }}</li>
                          @endif
                      @endforeach
                     {{ $pregunta->retroalimentacion }}
                    </div>
            </div>
        </form>
    </div>
</div>
