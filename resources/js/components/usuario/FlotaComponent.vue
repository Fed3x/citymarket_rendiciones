<template>
    <div class="modal fade" id="FlotaModal" tabindex="-1" role="dialog"
        aria-labelledby="FlotaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form @submit.prevent="modoEdicion ? ActualizarRendicion() : NuevaRendicion()" @keydown="form.onKeydown($event)" > 
                    <div class="modal-header">
                        <h5 v-if="modoEdicion" class="modal-title" id="FlotaModalLabel">Modificar Flota</h5>
                        <h5 v-else class="modal-title" id="FlotaModalLabel">Nueva Flota</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="form-row">

                        <div class="col-md-3">
                            <div class="form-group col-md-12">
                                Marca: 
                            </div>

                            <div class="form-group col-md-12">
                                Modelo: 
                            </div>
                            <div class="form-group col-md-12">
                                Matricula: 
                            </div>
                            <div class="form-group col-md-12">
                                Año: 
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group col-md-12">
                                &nbsp;<v-select id="inputBrand" v-model="draft.id_marca" label="descripcion" :options="auto_marcas" :reduce="auto_marcas => auto_marcas.id" ></v-select>
                            </div>

                            <div class="form-group col-md-12">
                                &nbsp;<v-select id="inputModel" v-model="draft.id_modelo" label="descripcion" :options="auto_marcas" :reduce="auto_marcas => auto_marcas.id" ></v-select>
                            </div>
                            <div class="form-group col-md-12" style="display: flex">
                                <input type="text" class="form-control form-control-sm text-center" id="inputPatent" >
                            </div>
                            <div class="form-group col-md-12" style="display: flex">
                                <input type="number" class="form-control form-control-sm text-center" id="inputYear" >
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button v-if="modoEdicion" type="submit" class="btn btn-primary">Modificar</button>
                        <button v-else type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>


<script>
    import Vue from 'vue'
    import EventBus from "../event-bus"

    import vSelect from 'vue-select'
    

    Vue.component('v-select', vSelect)
    import 'vue-select/dist/vue-select.css';

    
    import { Form, HasError, AlertError } from 'vform'

    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    export default {
        created(){

        },
        data(){
            return{
                modoEdicion: false,
                draft:[{
                    id_marca: '',
                    id_modelo: '',
                    año: '',
                    matricula: ''
                }],
                auto_marcas: [],
                auto_modelos: []
            }
        },
        mounted() {
            EventBus.$on('flota', (parametros) => { 
                this.MostrarFlota();
            });
            axios.get('/auto_marca')
                 .then((response)=>{
                    this.auto_marcas = response.data;
            });

        },
        methods: {
            MostrarFlota(){
                this.modoEdicion = true;
                $('#FlotaModal').modal({show: true, keyboard: false, backdrop: 'static'});
            },
            // Modificar(){
            //     EventBus.$emit('modificando', this.index);
            //     this.modoEdicion = true;
            //     this.draft.id_sitio_desde = this.distancia.id_sitio_desde;
            //     this.draft.id_sitio_hasta = this.distancia.id_sitio_hasta;
            //     this.draft.kilometraje = this.distancia.kilometraje;
            // },
            // Actualizar(){
            //     const parametros = {
            //         id_sitio_desde: this.draft.id_sitio_desde,
            //         id_sitio_hasta: this.draft.id_sitio_hasta,
            //         kilometraje: this.draft.kilometraje
            //     };
                
            //     axios.put('/distancia/'+this.distancia.id, parametros)
            //         .then((response)=>{
            //             this.modoEdicion = false;
            //             this.$emit('actualizar', response.data, this.index);
            //         })
            //         .catch((error)=>{
            //             swal("Error!", "Algo anda mal" +"\n" + error.response.data.message, "warning");
            //         });
            // },
            // Agregar(){
            //     const parametros = {
            //         id_sitio_desde: this.draft.id_sitio_desde,
            //         id_sitio_hasta: this.draft.id_sitio_hasta,
            //         kilometraje: this.draft.kilometraje
            //     };
            //     axios.post('/distancia', parametros)
            //          .then((response) => {
            //              this.modoEdicion = false;
            //              this.$emit('nuevo', response.data, this.index);
                    
            //     }).catch((error)=> {
                    
            //         swal("Error!", "Algo anda mal", "warning");
            //     });
            // },
            // Eliminar(){
            //     if (this.distancia.id != null){

            //         axios.delete('/distancia/'+this.distancia.id)
            //         .then(()=>{
            //             this.$emit('eliminar', this.index);

            //         }).catch(()=> {
            //             swal("Error!", "Algo anda mal", "warning");
            //     });
            //     }else{
            //         this.$emit('eliminar', this.index);
            //     }
            //     swal(
            //         'Eliminado!',
            //         'La distancia fue eliminada!',
            //         'success'
            //     )
            // },
        }
      
    }
</script>

<style >
#inputBrand{
    width: 315px;
    margin-top: -25px;
}

#inputModel{
    width: 315px;
    margin-top: -25px;
}

#inputYear{
    width: 390px;
}

#inputPatent{
    width: 390px;
}

</style>