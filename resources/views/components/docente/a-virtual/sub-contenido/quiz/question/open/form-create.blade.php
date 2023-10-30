<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade  modal-lg" id="modal-registro-pregunta3" role="dialog" tabindex="-1"> 
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form', ['cardId' => 'Widget-create-archivo', 'formId' => 'form-create-Popen'])
                    @slot('titleCard')
                        Agregar pregunta abierta
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
            <input name="tipo" type="hidden" value="3"/>
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
                    <textarea class="form-control" name="descripcion" id="descripcion3">
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
