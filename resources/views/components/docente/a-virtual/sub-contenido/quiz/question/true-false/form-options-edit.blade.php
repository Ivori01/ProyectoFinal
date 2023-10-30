<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade modal-lg " id="modal-update-pTrueFalseOpt" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            @component('components.card-form', ['cardId' => 'Widget-create-archivo', 'formId' => 'form-update-pTrueFalseOpt'])
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
          <input type="text" name="tipo" value="2" hidden="">
            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/> 
           
            <div id="pmu-opciones-edit2">
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
