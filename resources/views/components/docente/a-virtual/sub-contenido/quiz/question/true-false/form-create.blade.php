<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade  modal-lg" id="modal-registro-pregunta2" role="dialog" tabindex="-1"> 
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form', ['cardId' => 'Widget-create-archivo', 'formId' => 'form-create-Ptruefalse'])
                    @slot('titleCard')
                        Agregar pregunta Verdadero / Falso
                    @endslot
                    @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
                    @slot('formInputs')
            <input hidden="hidden" id="examen" name="quiz_id" type="text" value="{{ $examen->id }}"/>
            <input  name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <input name="tipo" type="hidden" value="2"/>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0" for="id-form-field-1">
                        Nombre :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control" name="nombre" type="text"/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0" for="id-form-field-1">
                        Descripción :
                    </label>
                </div>
                <div class="col-sm-9">
                    <textarea class="form-control" name="descripcion" id="descripcion2">
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0" for="id-form-field-1">
                        Corrección :
                    </label>
                </div>
                <div class="col-sm-9">
                    <textarea class="form-control" name="retroalimentacion">
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0" for="id-form-field-1">
                        Puntuación:
                    </label>
                </div>
                <div class="col-sm-3">
                    <input class="form-control" name="puntos" type="number">
                    </input>
                </div>
            </div>
            <h4 class="text-primary-d1 mt-45 mb-3 text-140">
                Opciones
            </h4>
              <div class="form-group row">
                <div class="col-sm-3  text-sm-right pr-0">
                    <label class="" for="id-form-field-1">
                       
                        <input type="radio" name="option" class="input-lg bgc-green" value="1">
                    </label>
                </div>
                <div class="col-sm-3">
               <b> Verdadero</b>  
                </div>
            </div>
              
       <div class="form-group row">
                <div class="col-sm-3  text-sm-right pr-0">
                    <label class="" for="id-form-field-1">
                                
                        <input type="radio" name="option" value="0" class="input-lg bgc-green">
                    </label>
                </div>
                <div class="col-sm-3">
              <b> Falso</b>
                </div>
            </div>
              
            
          
            @endslot

                    @slot('cardButtons')
            <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create-text');" type="button">
                <i class="fa fa-times mr-2">
                </i>
                Cancelar
            </button>
            <button class="btn btn-bold btn-success" id="text-save">
                Aceptar
                <i class="fa fa-arrow-right ml-2">
                </i>
            </button>
            @endslot
                @endcomponent
        </div>
    </div>
</div>
