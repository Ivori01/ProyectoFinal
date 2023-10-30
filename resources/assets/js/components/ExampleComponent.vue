<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                         <h4>ahora el child</h4>
        <ec></ec>
                    </div>
                </div>
            </div>
        </div>

       
    </div>
</template>

<script>
    import Ec from './quiz/Ec.vue';
    export default {
          components: {Ec},
        mounted() {
            console.log('Component mounted child.')
        }
    }
</script>
