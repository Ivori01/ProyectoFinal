<template>
<div class="col-12  cards-container mb-2" id="card-container-3">
    <div class="card bgc-yellow-m3 shadow-sm" id="card-3" draggable="false">
        <div class="card-header card-header-sm">
            <h5 class="card-title text-dark-tp3 text-600 text-90 align-self-center">
                {{ pregunta.nombre }}
            </h5>

            <div class="card-toolbar">
                <a href="#" class="card-toolbar-btn text-blue-d3" draggable="false">
                    <i class="fa fa-cog"></i>
                </a>

                <a href="#" data-action="reload" class="card-toolbar-btn text-success-d3" draggable="false">
                    <i class="fas fa-sync-alt"></i>
                </a>

                <a href="#" data-action="toggle" class="card-toolbar-btn text-grey-d3 d-style collapsed" draggable="false">
                    <i class="fa fa-minus d-n-collapsed"></i>
                    <i class="fa fa-plus d-collapsed"></i>
                </a>

                <a href="#" data-action="close" class="card-toolbar-btn text-danger-d3" draggable="false">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div><!-- /.card-header -->

        <div class="card-body bgc-white p-0 collapse" style="">
            <div class="p-3">
                <p>
                    <h5 class="card-title text-110 text-primary-d2 pt-0">
                        {{ pregunta.nombre }}
                    </h5>
                </p>
                <p class="mb-0 text-110 text-black-d2 pb-3">
                    {{ pregunta.descripcion }}
                </p>
                <div class="alert bgc-blue-l3 brc-blue-l1 text-dark-tp2" role="alert">
                    <div v-if="contarRespuestas>1">
                        <div v-for="opcion in opciones">
                            <div class="alert d-flex bgc-green-l1 brc-green-m4 border-1 pl-3 radius-l-0" role="alert" v-if="opcion.respuesta==1">
                                <p>
                                    <label class="mt-1 mt-sm-0 ml-sm-3">
                                        <input checked="false" class="mr-1 bgc-success" id="id-checkbox-disable-it" type="checkbox" disabled="" />
                                        {{ opcion.detalle }}
                                    </label>
                                </p>
                            </div>
                            <div v-else="">
                            	<p>
                                    <label class="mt-1 mt-sm-0 ml-sm-3">
                                        <input  class="mr-1 bgc-success" id="id-checkbox-disable-it" type="checkbox" disabled="" />
                                        {{ opcion.detalle }}
                                    </label>
                                </p>
                            </div>

                        </div>
                    </div>

                    <div v-else>
                    	  <div v-for="opcion in opciones">
                            <div class="alert d-flex bgc-green-l1 brc-green-m4 border-1 pl-3 radius-l-0" role="alert" v-if="opcion.respuesta==1">
                                <p>
                                    <label class="mt-1 mt-sm-0 ml-sm-3">
                                        <input checked="false" class="mr-1 bgc-success"  type="radio" disabled/>
                                        {{ opcion.detalle }}
                                    </label>
                                </p>
                            </div>
                            <div v-else="">
                            	<p>
                                    <label class="mt-1 mt-sm-0 ml-sm-3">
                                        <input  class="mr-1 bgc-success"  type="radio" disabled/>
                                        {{ opcion.detalle }}
                                    </label>
                                </p>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div><!-- /.card-body -->
    </div><!-- /.card -->
</div>
</template>

<script>
export default {
    props: ['pregunta'],
    data() {
        return {
            opciones: this.pregunta.opciones,
            message: 'Hello',
            totalRespuestas: 0
        }
    },
    computed: {
        contarRespuestas() {
            this.totalRespuestas = 0;
            for (var opcion of this.opciones) {

                if (opcion.respuesta == 1) {
                    this.totalRespuestas++;
                }

            }

            return this.totalRespuestas;
        }

    }
}
</script>
