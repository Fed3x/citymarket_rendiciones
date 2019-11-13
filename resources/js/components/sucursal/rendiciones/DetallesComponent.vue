<template>
    <div class="modal fade" id="DetallesRendicionModal" tabindex="-1" role="dialog"
        aria-labelledby="DetallesRendicionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DetallesRendicionModalLabel">Detalles</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="btn-group" role="group" aria-label="Basic example" style="float: right;" >
                           <button @click="AgregarDetalle()" class="btn btn-primary" type="button"><i class="fas fa-map-signs"></i> Agregar Detalle</button>
                        </div>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm table-borderless">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" class="col-sm-4 text-center">Sitio Desde</th>
                                            <th scope="col" class="col-sm-4 text-center">Sitio Hasta</th>
                                            <th scope="col" class="col-sm-2 text-center">Kilometraje</th>
                                            <th scope="col" class="col-sm-2 text-center">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <detalle-component v-for="(detalle_rendicion, index) in detalles_rendicion" 
                                            :key="detalle_rendicion.id" 
                                            :detalle_rendicion="detalle_rendicion" 
                                            :index="index"
                                            :sitios="sitios"
                                            @nuevo="NuevaDistancia(...arguments, index)"
                                            @actualizar="ActualizarDetalle(...arguments, index)"
                                            @eliminar="EliminarDistancia(index)">
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
            }
        },
        mounted() {
            
            self = this;
            EventBus.$on('actualizar', function(parametros) { // Para recibir un evento
                console.log('recibi el event bus');
                self.ActualizarDetalles(parametros);
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
            ActualizarDetalles(detalle){
                console.log('estoy actualizando los detalles');
                console.log(detalle);
               
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
            // AgregarNuevaRendicion(){
            //     this.modoEdicion = false;
            //     this.form.reset();
            //     $('#NuevaRendicionModal').modal('show');
            // },
            // NuevaRendicion(){
            //     this.form.post('/rendicion')
            //          .then((response) => {
            //              console.log(response);
            //             // const rendicion= response.data;
            //             // this.rendiciones.push(rendicion);
            //             // this.form.reset();
            //          });
                
            // },
            // NuevaDistancia(distancia, index){
            //     this.distancias.splice(index, 1, distancia);
            //     swal(
            //         'Creado!',
            //         'La distancia fue guardada!',
            //         'success'
            //     )
            // },
            // ImportarDistancia(distancia){
            //     for (let i in distancia){
            //          this.distancias.push(distancia[i]);
            //     }
            // },
            ActualizarDetalle(detalle_rendicion, index){
                this.detalles_rendicion.splice(index, 1, detalle_rendicion);
                swal(
                    'Actualizado!',
                    'La distancia fue actualizada',
                    'info'
                )
            },
            // EliminarDistancia(index){
            //     this.distancias.splice(index,1);
            // },
            // ImportarDistanciaModal(){
            //     $('#ImportarSitioModal').modal('show');
            // },
        }
      
    }
</script>
