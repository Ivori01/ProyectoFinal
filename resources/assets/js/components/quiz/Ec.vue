<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                       chilhh
                    </div>
                </div>
            </div>
        </div>
         <p>Original message: "{{ message }}"</p>
  <input v-model="message" placeholder="edíteme">
<p>El mensaje es: {{ message }}</p>
    </div>
</template>

<script>
    export default {
      
  data() {
            return {
       
    message: 'Hello'
  }
}
    }
</script>
