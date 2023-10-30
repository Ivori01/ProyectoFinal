<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade modal-lg " id="modal-update-pMultipleOpt" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form', ['cardId' => 'Widget-create-archivo', 'formId' => 'form-update-pMultipleOpt'])
                    @slot('titleCard')
                       Editar pregunta de opcion multiple
                    @endslot
                    @slot('toolbarCard')
            <a class="card-toolbar-btn text-white text-120" data-dismiss="modal" href="#">
                <i class="fa fa-times">
                </i>
            </a>
            @endslot
                    @slot('formInputs')
          <input type="text" name="tipo" value="1" hidden="">
            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/> 
           
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label class="mb-0" for="id-form-field-1">
                        Nombre :
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control" name="detalle" type="text" />
                    <label class="mt-0 mt-sm-0 ml-sm-3">
                            <input class="mr-1 mt-2 input-lg bgc-success" name="respuesta" type="checkbox" value="1" checked="">
                                Respuesta
            
                        </label>
                </div>
            </div>
             <div class="d-flex flex-row-reverse pt-0">
                <button class="btn btn-bold btn-sm btn-info" id="addMore2" type="button" onclick="saveOptionMultiple();">
                    Agregar opción
                    <i class="fa fa-plus mr-2">
                    </i>
                </button>
            </div>
            <h4 class="text-primary-d1 mt-45 mb-3 text-140">
                Opciones
            </h4>
       
            <div id="pmu-opciones-edit">
            </div>
           
            @endslot

                    @slot('cardButtons')
            <button class="btn btn-bold btn-sm btn-danger" onclick="rstForm('#form-create-text');" type="button">
                <i class="fa fa-times mr-2">
                </i>
                Cancelar
            </button>
            <button class="btn btn-bold btn-success" >
               Actualizar
                <i class="fa fa-arrow-right ml-2">
                </i>
            </button>
            @endslot
                @endcomponent
        </div>
    </div>
</div>
