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
                            <div class="form-group col-md-12">
                            <label for="inputBrand">Marca</label>
                            <input type="text" class="form-control" id="inputBrand">
                            </div>
                            <div class="form-group col-md-12">
                            <label for="inputModel">Modelo</label>
                            <input type="text" class="form-control" id="inputModel">
                            </div>
                            <div class="form-group col-md-12">
                            <label for="inputPatent">Patente</label>
                            <input type="text" class="form-control" id="inputPatent">
                            </div>
                            <div class="form-group col-md-12">
                            <label for="inputYear">Año</label>
                            <input type="number" class="form-control" id="inputYear">
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
        // props: ['distancia','index','sitios'],
        created(){

        },
        data(){
            return{
                modoEdicion: false,
                draft:[{
                    id_sitio_desde: '',
                    id_sitio_hasta: '',
                    kilometraje: ''
                }],
            }
        },
        mounted() {
            EventBus.$on('flota', function(parametros){
                console.log('recibi el event bus-flota');
                this.MostrarFlota();
            }.bind(this));

        },
        methods: {
            MostrarFlota(){
                console.log('MostraRFlota');
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
