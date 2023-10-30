@php
    $marqueds=$intento_question->respuestasMarcadas;
    $class='';
    $puntajeObtenido=$intento_question->resultado->puntaje;
    $puntosPregunta=$pregunta->puntos;
if ($puntajeObtenido==$puntosPregunta) {
    $class='success';
} 
if ($puntajeObtenido<$puntosPregunta) {
    $class='warning';
} 

  if ($puntajeObtenido==0) {
    $class='danger';
} 
   
@endphp

<div btn-id="#btn-tab-{{ $idCard }}" class="card bgc-{{ $class}}-m1" id="card-{{ $idCard }}">
    <div class="card-header ">
        <h5 class="card-title text-white">
            Pregunta {{ $numero}}
        </h5>

        @if($intento_question->datosPregunta->tipo == 3)
          <div class="card-toolbar d-flex ">
                        <div class="form-row d-flex flex-row-reverse">
                        
                          <input type="number" name="" value="{{ $puntajeObtenido }}" class="form-control" onchange="updateNota(this,'{{ route('Docente.Evaluacion.UpdateResult',['id'=>$intento_question->id]) }}',{{ $numero }});" min="0" max="{{ $pregunta->puntos }}">
                          
                        </div>
        </div>
        @endif
      
    </div>
    <!-- /.card-header -->
    <div class="card-body bgc-white p-0 collapse show">
        <!-- to have smooth .card toggling, it should have zero padding mk-->
        <div class="p-3">
            <form id="form-{{ $idCard}}">
                <input name="question_attemp" type="hidden" value="{{ $idCard }}"/>
                <input name="_token" type="hidden" id="token" value="{{ csrf_token() }}"/>
                <p>
                    <h5 class="card-title text-110 text-primary-d2 pt-0">
                        {{ $pregunta->nombre }}
                    </h5>
                </p>
                <p class="mb-0 text-110 text-black-d2 pb-3">
                    {!! $pregunta->descripcion !!}
                </p>
                <p class="text-brown">
                    <b>
                        ( {{ $puntajeObtenido }} de {{ $pregunta->puntos }} Puntos )
                    </b>
                </p>
                <div class="alert bgc-blue-l3 brc-blue-l1 text-dark-tp2" role="alert">
                    @if ($pregunta->tipo==3)
                    <div class="form-group row">

                        <div class="col-12">
                            
                               
                                    {!! $intento_question->respuestaTexto->texto !!}
                               
                           
                        </div>
                    </div>
                    @endif

                    @if ($pregunta->opciones->where('respuesta','1')->count() >1)
                        @foreach ($pregunta->opciones as $opcion)

                          @php
                          
                          $check="";
                          $isMarqued=false;
                          $assert='danger';
                          $icon='frown';
                          foreach ($marqueds as $marqued) {
                              if ($marqued->respuesta_id==$opcion->id) {
                                if ($opcion->respuesta==1) {
                                  $assert='success';  
                                  $icon='smile';
                                }
                                  $isMarqued=true;
                              }
                          }
                          @endphp

                          @if ($isMarqued)
                          <div class="mt-3 alert bgc-{{ $assert }}-d2 text-white border-0 shadow-sm radius-2px py-3 shadow">
                  <div class="position-tl w-100 h-100 bgc-black-tp10 radius-2px"></div>
                  <div class=" d-flex align-items-start pos-rel">
                    <div class=" opacity-1">
                      <i class="fas fa-{{$icon  }} fa-4x text-white "></i>
                    </div>

                    <div class="text-white">
                            <p >
                                        <label class="mt-1 mt-sm-0 ml-sm-3">
                                            <input class="mr-1 bgc-success" name="opt_{{ $idCard }}[]" onchange="checkCBox(this);" type="checkbox" value="{{ $opcion->id }}" checked="" disabled="" />
                                            <b>
                                            {{strtolower(chr($loop->index+65))  }})
                                            </b>
                                            {{ $opcion->detalle }}
                                        </label>
                                    </p> 
                    </div>

             
                  </div>
                </div>
                   
                           
                          @else
                                    <p >
                                <label class="mt-1 mt-sm-0 ml-sm-3">
                                    <input class="mr-1 bgc-success" name="opt_{{ $idCard }}[]" onchange="checkCBox(this);" type="checkbox" value="{{ $opcion->id }}"  disabled="" />
                                    <b>
                                        {{strtolower(chr($loop->index+65))  }})
                                    </b>
                                    {{ $opcion->detalle }}
                                </label>
                            </p>
                          @endif
                          
                      
                        @endforeach

                    @else

                        @foreach ($pregunta->opciones as $opcion)
                        @php
                          
                          $check="";
                          $isMarqued=false;
                          $assert='danger';
                          $icon='frown';
                          foreach ($marqueds as $marqued) {
                              if ($marqued->respuesta_id==$opcion->id) {
                                if ($opcion->respuesta==1) {
                                  $assert='success';  
                                  $icon='smile';
                                }
                                  $isMarqued=true;
                              }
                          }
                          @endphp
                          @if ($isMarqued)
                                         <div class="mt-3 alert bgc-{{ $assert }}-d2 text-white border-0 shadow-sm radius-2px py-3 shadow">
                  <div class="position-tl w-100 h-100 bgc-black-tp10 radius-2px"></div>
                  <div class=" d-flex align-items-start pos-rel">
                    <div class=" opacity-1">
                      <i class="fas fa-{{$icon  }} fa-4x text-white "></i>
                    </div>

                    <div class="text-white">
                                                               <p>
                                <label class="mt-1 mt-sm-0 ml-sm-3">
                                    <input class="mr-1 bgc-success" name="opt_{{ $idCard }}[]" onchange="checkRadio(this);" type="radio" value="{{ $opcion->id }}" checked="" disabled="" />
                                    <b>
                                        {{strtolower(chr($loop->index+65))  }})
                                    </b>
                                    {{ $opcion->detalle }}
                                </label>
                            </p>
                    </div>

             
                  </div>
                </div>
                          @else
                                                                      <p>
                                <label class="mt-1 mt-sm-0 ml-sm-3">
                                    <input class="mr-1 bgc-success" name="opt_{{ $idCard }}[]" onchange="checkRadio(this);" type="radio" value="{{ $opcion->id }}" disabled="" />
                                    <b>
                                        {{strtolower(chr($loop->index+65))  }})
                                    </b>
                                    {{ $opcion->detalle }}
                                </label>
                            </p>
                          @endif
                         
                        @endforeach

                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer px-4 py-3 brc-dark-l3 d-flex justify-content-between">
         <p class="pr-2 mr-2 text-bold font-weight-bold text-white">Comentarios</p>
        <textarea class="form-control" onchange="updateFeedback(this,'{{ route('Docente.Evaluacion.UpdateResult',['id'=>$intento_question->id]) }}',{{ $numero }});">{{ $intento_question->resultado->comentario }}</textarea>
    </div>
</div>
<!-- /.card-body -->
