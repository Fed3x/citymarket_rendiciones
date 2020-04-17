<template>
    <div class="modal fade" id="modalNuevo" data-backdrop="static" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="NuevaRendicionModalLabel">{{attributos.titulo}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Descripcion</label>  
                                <input v-model="descripcion"
                                        name="descripcion"
                                        type="text" 
                                        class="form-control form-control-sm"
                                        :placeholder= attributos.placeholder
                                        >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"  @click="Cerrar()">Cerrar</button>
                        <button type="button" class="btn btn-success" @click="Guardar()">Guardar</button>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue' 
    import { Form, HasError, AlertError } from 'vform'
    import EventBus from "../event-bus"

    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    export default {

        data(){
            return{

                descripcion: '',
                attributos:[{
                    referencia: '',
                    titulo: '',
                    placeholder: '',
                    mensaje: '',
                    referencia_padre: '',
                }],
            }
        },
        mounted() {
            EventBus.$on('AgregarReferencia', (parametros) => {
                this.MostrarModal(parametros);
            });

        },
        methods: {
            Cerrar(){
                EventBus.$emit('CerrarModalReferencia');

            },
            MostrarModal(parametros){
                this.descripcion = '';
                this.attributos = Object.assign({}, this.attributos, { referencia: parametros.referencia });
                this.attributos = Object.assign({}, this.attributos, { titulo: parametros.titulo });
                this.attributos = Object.assign({}, this.attributos, { placeholder: parametros.placeholder });
                this.attributos = Object.assign({}, this.attributos, { mensaje: parametros.mensaje });
                this.attributos = Object.assign({}, this.attributos, { referencia_padre: parametros.referencia_padre });
                $('#modalNuevo').modal({show: true, keyboard: false, backdrop: 'static'});
            },
            Guardar(){

                let parametros = {
                descripcion: this.descripcion,
                referencia_padre: this.attributos.referencia_padre
                }
                
                axios.post('/' + this.attributos.referencia, parametros)
                     .then((response) => {
                        EventBus.$emit('CargarNuevaReferencia', [response.data, this.attributos]);
                        swal({
                            title: '¡Exito!',
                            text: this.attributos.mensaje,
                            icon: 'success',
                            buttons: {
                                confirm: true,
                            },
                        }).then(function(isConfirm) {
                                if (isConfirm) {
                                    $('#modalNuevo').modal('hide');
                                    EventBus.$emit('CerrarModalReferencia');
                                }
                            });
                }).catch((error)=> {
                    swal("Error!", "Algo anda mal", "warning");
                });
            },
        }
      
    }
</script>
<style>

</style>
