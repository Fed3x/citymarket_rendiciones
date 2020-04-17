<template>
    <div class="modal fade" id="DetallesRendicionModal" tabindex="-1" role="dialog"
        aria-labelledby="DetallesRendicionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-rendicion" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DetallesRendicionModalLabel">Detalles</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="btn-group btn-agregar" role="group" aria-label="Basic example">
                           <button @click="AgregarDetalle()" class="btn btn-primary" type="button"><i class="fas fa-map-signs"></i> Agregar Detalle</button>
                        </div>
                        <br>
                        <br>
                        <div class="table-responsive table-rendicion">
                            <table class="table table-hover table-sm table-borderless">
                                    <thead class="">
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Sitio Desde</th>
                                            <th>Sitio Hasta</th>
                                            <th>Kilometraje</th>
                                            <th>Finalidad</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <detalle-component v-for="(detalle_rendicion, index) in detalles_rendicion" 
                                            :key="detalle_rendicion.id" 
                                            :detalle_rendicion="detalle_rendicion" 
                                            :index="index"
                                            :sitios="sitios"
                                            :id_rendicion="id_rendicion"
                                            @nuevo="NuevoDetalle(...arguments, index)"
                                            @actualizar="ActualizarDetalle(...arguments, index)"
                                            @eliminar="EliminarDetalle(index)">
                                        </detalle-component> 
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button @click="CerrarDetalle()" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue' 
    import { Form, HasError, AlertError } from 'vform'
    import EventBus from "../../event-bus"

    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    export default {
        props:['detalle'],
        data(){
            return{
                detalles_rendicion:[],
                sitios:[],
                id_rendicion:0,
            }
        },
        mounted() {
            
            self = this;
            EventBus.$on('actualizar', function(parametros) { 
                self.CargarDetalles(parametros);
            });
            axios.get('/sitio')
            .then((response)=>{
                this.sitios = response.data;
            });
        },
        methods: {
            AgregarDetalle(){
                this.detalles_rendicion.push({id_sitio_desde: '',
                    id_sitio_hasta: '',
                    kilometraje: '0',
                    sitio_desde: '',
                    sitio_hasta: ''
                        }
                    );
            },
            CargarDetalles(detalle){
                this.id_rendicion = detalle;

                axios.get('/rendicion_detalles/' + detalle)
                     .then((response)=>{
                        this.detalles_rendicion = response.data;
                });
                $('#DetallesRendicionModal').modal({show: true, keyboard: false, backdrop: 'static'});

            },
            CerrarDetalle(){
                $('#DetallesRendicionModal').modal({show: false});
                this.detalles_rendicion = this.detalles_rendicion.splice();
                console.log('vaciando array');
            },

            NuevoDetalle(detalle_rendicion, index){
                this.detalles_rendicion.splice(index, 1, detalle_rendicion);
                swal(
                    'Nuevo registro creado exitosamente!',
                    'La distancia fue guardada!',
                    'success'
                )
            },

            ActualizarDetalle(detalle_rendicion, index){
                this.detalles_rendicion.splice(index, 1, detalle_rendicion);
                swal(
                    'Actualizado!',
                    'La distancia fue actualizada',
                    'info'
                )
            },
            EliminarDetalle(index){
                this.detalles_rendicion.splice(index,1);
            },
        }
      
    }
</script>

<style> 
    .btn-agregar{
        position: absolute !important;
        right: 10px !important;
    }

    .table-rendicion{
        overflow-x: unset !important;
    }
    .modal-rendicion{
        max-width: 90%;
        padding: 0px;
        max-height: 90vh;
    
    }
</style>
