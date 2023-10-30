@php
    $marqueds=$intento_question->respuestasMarcadas;
   
@endphp

<div btn-id="#btn-tab-{{ $idCard }}" class="card bgc-primary-m1" id="card-{{ $idCard }}">
    <div class="card-header ">
        <h5 class="card-title text-white">
            Pregunta {{ $numero}}
        </h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body bgc-white p-0 collapse show">
        <!-- to have smooth .card toggling, it should have zero padding mk-->
        <div class="p-3">
            <form id="form-{{ $idCard}}">
                <input name="question_attemp" type="hidden" value="{{ $idCard }}"/>
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
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
                        ( {{ $pregunta->puntos }} Puntos )
                    </b>
                </p>
                <li class="mb-2">
                            <i class="w-3 text-center fa fa-asterisk text-100 text-success"></i>
                           Seleccione {{ $pregunta->opciones->where('respuesta','1')->count() }}
                </li>
                
                <div class="alert bgc-blue-l3 brc-blue-l1 text-dark-tp2" role="alert">
                    @if ($pregunta->tipo==3)
                    <div class="form-group row">
                        <div class="col-12">
                            <textarea class="form-control descripcion" name="text_{{ $idCard}}">
                               
                                    {{ $intento_question->respuestaTexto->texto }}
                               
                            </textarea>
                        </div>
                    </div>
                    @endif

                    @if ($pregunta->opciones->where('respuesta','1')->count() >1)
                        @foreach ($pregunta->opciones as $opcion)

                          @php
                          
                          $check="";
                          foreach ($marqueds as $marqued) {
                              if ($marqued->respuesta_id==$opcion->id) {
                                  $check='checked=""';
                              }
                          }
                          @endphp
                            <p>
                                <label class="mt-1 mt-sm-0 ml-sm-3">
                                    <input class="mr-1 bgc-success" name="opt_{{ $idCard }}[]" onchange="checkCBox(this);" type="checkbox" value="{{ $opcion->id }}" {{ $check }} />
                                    <b>
                                        {{strtolower(chr($loop->index+65))  }})
                                    </b>
                                    {{ $opcion->detalle }}
                                </label>
                            </p>
                        @endforeach

                    @else

                        @foreach ($pregunta->opciones as $opcion)
                         @php
                          $check="";
                          foreach ($marqueds as $marqued) {
                              if ($marqued->respuesta_id==$opcion->id) {
                                  $check='checked=""';
                              }
                          }
                          @endphp
                            <p>
                                <label class="mt-1 mt-sm-0 ml-sm-3">
                                    <input class="mr-1 bgc-success" name="opt_{{ $idCard }}[]" onchange="checkRadio(this);" type="radio" value="{{ $opcion->id }}" {{ $check }} />
                                    <b>
                                        {{strtolower(chr($loop->index+65))  }})
                                    </b>
                                    {{ $opcion->detalle }}
                                </label>
                            </p>
                        @endforeach

                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.card-body -->
