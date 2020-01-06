<template>
    <div class="modal fade" id="ImportarSitioModal" tabindex="-1" role="dialog" aria-labelledby="ImportarSitioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ImportarSitioModalLabel">Importar Archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <input type="file" class="form-control-file" @change="fieldChange">
                        </div>

                        <div  v-show="errors" class="alert alert-warning alert-dismissible fade show" role="alert">
                        <div v-for="error in errors" :key="error.index">
                            Fila {{ error.fila}}: {{error.error | descripcion}}.
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" @click="ImportarArchivo">Importar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import { 
        Form,
        HasError,
        AlertError,
        AlertErrors, 
        AlertSuccess
    } from 'vform'
    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    Vue.component(AlertErrors.name, AlertErrors)
    Vue.component(AlertSuccess.name, AlertSuccess)
    export default {
        data(){
            return{
                file: null,
                errors: null,
            }
        },
        filters:{
            descripcion: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },
        methods:{
            fieldChange(e){
                // console.log(e.target.files[0]);
                this.file = e.target.files[0];
                
            },
            ImportarArchivo(){
                let formData = new FormData();
  		        formData.append('file', this.file);

                axios.post( '/ImportarDistancias',formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                    ).then((response) => {
                        this.errors = null;
                        this.$emit('importar', response.data[0]);
                        console.log('No se insertaron');
                        this.errors = response.data[1];
                        console.log(this.errors);
                    })
                    .catch((error)=> {
                        console.log(error.data);
                    });              
                    

            },

        }
    }
</script>

<style>

</style>