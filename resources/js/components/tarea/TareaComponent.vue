<template>
    <div>    
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div v-if="tarea.actualizado_el != null" class="card-header">Publicado el {{tarea.creado_el}} | Actualizado el  {{tarea.actualizado_el}}</div>
                    <div v-else class="card-header">Publicado el {{tarea.creado_el}}</div>
                    <div class="card-body">
                        <div v-if="modoEdicion" class="form-group">
                        <input type="text" class="form-control" v-model="tarea.descripcion">
                        </div>
                        <p v-else>{{tarea.descripcion}}</p>
                    </div>
                    <div class="card-footer">
                        <button v-if="modoEdicion" type="button" class="btn btn-success" v-on:click="ActualizarTarea()">Guardar Cambios</button>
                        <button v-else type="button" class="btn btn-info" v-on:click="ModificarTarea()">Editar</button>

                        <button type="button" class="btn btn-danger" v-on:click="EliminarTarea()">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['tarea'],
        data(){
            return {
                modoEdicion: false
            };
        },
        mounted() {
            console.log('Tarea Component.');
        },
        methods: {
            EliminarTarea(){
                axios.delete(`/tarea/${this.tarea.id}`)
                     .then(()=>{
                         this.$emit('eliminar');
                     });
            },
            ModificarTarea(){
                this.modoEdicion = true;
            },
            ActualizarTarea(){
                const parametros = {
                    descripcion: this.tarea.descripcion
                };
                axios.put(`/tarea/${this.tarea.id}`,parametros)
                     .then((response)=>{
                        this.modoEdicion = false;
                        const tarea = response.data;
                        this.$emit('actualizar', tarea);
                });
            }
        },
    }
</script>
