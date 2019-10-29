<template>
<div class="container">
    <form-tarea-component  @nuevo="AgregarTarea">
    </form-tarea-component>
    <tarea-component 
        v-for="(tarea, index) in tareas" 
        :key="tarea.id" 
        :tarea="tarea" 
        @actualizar="ActualizarTarea(index, ...arguments)"
        @eliminar="EliminarTarea(index)">
    </tarea-component>
</div>
</template>
 
<script>
    export default {
        data(){
            return{
                tareas:[]
            };
        },
        mounted() {
            axios.get('/tarea')
                 .then((response)=>{
                     this.tareas = response.data;
                 });
                 
        },
        methods: {
            AgregarTarea(tarea){

                this.tareas.push(tarea);
            },
            EliminarTarea(index){
                this.tareas.slipce(index,1);
            },
            ActualizarTarea(index, tarea){
                this.tareas[index] = tarea;
            }
        }
    }
</script>
