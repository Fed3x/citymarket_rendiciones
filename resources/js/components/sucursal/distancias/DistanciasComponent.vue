<template>
<div class="row justify-content-center" style="margin: 0px">
    <div class="col-md-8">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">Distancias entre Sitios

                <div class="btn-group" role="group" aria-label="Basic example" style="float: right;" >
                    <a href="/distancia/export" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="auto" title="Exportar Distancias a Excel" ><i class="fas fa-download"></i> Exportar - EXCEL</a>
                    <button @click="ImportarDistanciaModal()" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="auto" title="Importar Distancias desde Excel" ><i class="fas fa-upload"></i> Importar - EXCEL</button>
                    <button @click="AgregarDistancia()" class="btn btn-primary" type="button"><i class="fas fa-map-signs"></i> Agregar Distancia</button>
                </div>
            </div>
            <importar-distancia-component @importar="ImportarDistancia(...arguments)"></importar-distancia-component>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-sm table-borderless">
                            <thead class="">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="col-sm-4">Sitio Desde</th>
                                    <th scope="col" class="col-sm-4">Sitio Hasta</th>
                                    <th scope="col" class="col-sm-1">Kilometraje</th>
                                    <th scope="col" >Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                               <distancia-component v-for="(distancia, index) in distancias" 
                                                    :key="distancia.id" 
                                                    :distancia="distancia" 
                                                    :index="index"
                                                    :sitios="sitios"
                                                    @nuevo="NuevaDistancia(...arguments, index)"
                                                    @actualizar="ActualizarDistancia(...arguments, index)"
                                                    @eliminar="EliminarDistancia(index)">
                                                    
                                </distancia-component> 
                            </tbody>
                    </table>
                </div>
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
                sitios:[],
                distancias:[],
            }
        },
        mounted() {
            axios.get('/distancia')
                 .then((response)=>{
                     
                     this.distancias = response.data;
            });
            axios.get('/sitio')
            .then((response)=>{
                this.sitios = response.data;
            });
        },
        methods: {
            AgregarDistancia(){
                this.distancias.push({id_sitio_desde: '',
                    id_sitio_hasta: '',
                    kilometraje: '0',
                    sitio_desde: '',
                    sitio_hasta: ''
                        }
                    );
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
            EliminarDistancia(index){
                this.distancias.splice(index,1);
            },
            ImportarDistanciaModal(){
                $('#ImportarSitioModal').modal('show');
            },
        }
      
    }
</script>
