<div class="card" id="card-{{ $idCard }}"  btn-id="#btn-tab-{{ $idCard }}">
    <div class="card-header">
        <h5 class="card-title">
            Pregunta {{ $numero}}
        </h5>
        
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0 collapse show">
        <!-- to have smooth .card toggling, it should have zero padding -->
        <div class="p-3">
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
            <div class="alert bgc-blue-l3 brc-blue-l1 text-dark-tp2" role="alert">
              <input type="hidden" name="question[]" value="{{ $pregunta->id }}">
            

                @if ($pregunta->tipo==3)
                <div class="form-group row">
                    <div class="col-12">
                        <textarea class="form-control descripcion" name="text_{{ $pregunta->id}}" >
                        </textarea>
                    </div>
                </div>
                @endif

                    @if ($pregunta->opciones->where('respuesta','1')->count() >1)
                        @foreach ($pregunta->opciones as $opcion)

                     
                            <p>
                                <label class="mt-1 mt-sm-0 ml-sm-3">
                                    <input class="mr-1 bgc-success"  type="checkbox" onchange="checkCBox(this)" name="opt_{{ $pregunta->id }}[]" value="{{ $opcion->id }}" />
                                     <b>{{strtolower(chr($loop->index+65))  }})</b> {{ $opcion->detalle }}
                                </label>
                            </p>
                            

                        @endforeach

                    @else

                        @foreach ($pregunta->opciones as $opcion)

                      
                            <p>
                                <label class="mt-1 mt-sm-0 ml-sm-3">
                                    <input class="mr-1 bgc-success" name="opt_{{ $pregunta->id }}[]" type="radio" value="{{ $opcion->id }}" onchange="checkRadio(this)" />
                                     <b>{{strtolower(chr($loop->index+65))  }})</b> {{ $opcion->detalle }}
                                </label>
                            </p>
                 

                        @endforeach

                    @endif
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
