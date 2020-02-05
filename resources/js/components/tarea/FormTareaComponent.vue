<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Diario Laboral</div>
                <div class="card-body">
                    <form action="" v-on:submit.prevent="NuevaTarea()">
                        <div class="form-group">
                            <label for="tarea">¿Que estas haciendo ahora?</label>
                            <input type="text" class="form-control" name="tarea" id="tarea" aria-describedby="helpId"
                                placeholder="¿Que estas haciendo ahora?" v-model="descripcion">
                            <small id="helpId" class="form-text text-muted">¿Estas haciendo la tarea?</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Publicar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>      

<script>
    export default {
        data(){
            return{
                descripcion: ''
            }
        },
        mounted() {
            console.log('Form Component.')
        },
        methods: {
            NuevaTarea(){
                const parametro = {
                    descripcion:  this.descripcion
                };
                this.descripcion  = '';
                axios.post('/tarea', parametro)
                     .then((response) => {
                        const tarea= response.data;
                        this.$emit('nuevo', tarea);
                        
                     });
            }
        }
      
    }
</script>
