<template>
    <div class="row justify-content-center" style="margin: 0px">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-header">Rendiciones

                    <div class="btn-group" role="group" aria-label="Basic example" style="float: right;" >
                    <button @click="AgregarNuevaRendicion()" class="btn btn-primary" type="button"><i class="fab fa-rev"></i> Agregar Rendicion</button>
                    </div>
                    <div class="modal fade" id="NuevaRendicionModal" tabindex="-1" role="dialog"
                        aria-labelledby="NuevaRendicionModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form @submit.prevent="modoEdicion ? ActualizarRendicion() : NuevaRendicion()" @keydown="form.onKeydown($event)" > 
                                    <div class="modal-header">
                                        <h5 v-if="modoEdicion" class="modal-title" id="NuevaRendicionModalLabel">Modificar Rendicion</h5>
                                        <h5 v-else class="modal-title" id="NuevaRendicionModalLabel">Nueva Rendicion</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="form-row">
                                            <input v-model="form.id" name="id" type="hidden">
                                            <div class="form-group col-md-12">
                                                <label>Descripcion</label>
                                                <input v-model="form.descripcion"
                                                        name="descripcion"
                                                        type="text" 
                                                        class="form-control form-control-sm"
                                                        placeholder="Descripcion de la Rendicion"
                                                        :class="{ 'is-invalid': form.errors.has('descripcion') }"
                                                        >
                                                        <has-error :form="form" field="descripcion"></has-error>
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
                </div>
                <detalles-component :detalle="detalle"></detalles-component>
                <div class="card-body">
                    <rendicion-component
                    v-for="(rendicion, index) in rendiciones"
                    :key="rendicion.id"
                    :rendicion="rendicion"
                    :index="index"
                    @eliminar="EliminarRendicion(index)"
                    @ver_detalles="ModalDetalle(detalle)"
                    ></rendicion-component>
                </div>
            </div>
        </div>
    </div> 
</template>
<script>
    import Vue from 'vue' 
    import { Form, HasError, AlertError } from 'vform'

    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    export default {
        data(){
            return{
              form:new Form({
                    id: '',
                    descripcion: '',
                }),
                rendiciones:[],
                modoEdicion: false,
                detalle: null
            }
        },
        mounted() {
            axios.get('/rendicion')
                 .then((response)=>{
                    this.rendiciones = response.data;
            });
        },
        methods: {
            AgregarNuevaRendicion(){
                this.modoEdicion = false;
                this.form.reset();
                $('#NuevaRendicionModal').modal({show: true, keyboard: false, backdrop: 'static'});

            },
            NuevaRendicion(){
                this.form.post('/rendicion')
                     .then((response) => {
                        const rendicion= response.data;
                        this.rendiciones.push(rendicion);
                        this.form.reset();
                     });
                
            },
            NuevaDistancia(distancia, index){
                this.distancias.splice(index, 1, distancia);
                swal(
                    'Creado!',
                    'La distancia fue guardada!',
                    'success'
                )
            },
            ImportarDistancia(distancia){
                for (let i in distancia){
                     this.distancias.push(distancia[i]);
                }
            },
            ActualizarDistancia(distancia, index){
                this.distancias.splice(index, 1, distancia);
                swal(
                    'Actualizado!',
                    'La distancia fue actualizada',
                    'info'
                )
            },
            ModalDetalle(detalle){
                this.detalle = detalle;
                
            },
            EliminarRendicion(index){
                this.rendiciones.splice(index,1);
                swal(
                    'Eliminado!',
                    'La distancia fue eliminada!',
                    'success'
                )
            },
            ImportarDistanciaModal(){
                $('#ImportarSitioModal').modal('show');
            },
        }
      
    }
</script>
