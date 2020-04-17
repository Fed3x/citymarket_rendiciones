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
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                        <v-select v-model="filtro" label="descripcion" placeholder="Buscar Distancias" :options="sitios" :reduce="sitios => sitios.id" @input="Filtro"></v-select>
                        </div>
                    </div>
                </div>
                
             

                <div id="table_distancias" class="table-responsive">
                    <table class="table table-hover table-sm table-borderless">
                            <thead class="">
                                <tr>
                                    <th scope="col" class="col-sm-1 text-center">#</th>
                                    <th scope="col" class="col-sm-4 text-center">Sitio Desde</th>
                                    <th scope="col" class="col-sm-4 text-center">Sitio Hasta</th>
                                    <th scope="col" class="col-sm-1 text-center">Kilometraje</th>
                                    <th scope="col" class="col-sm-1 text-center">Accion</th>
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
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <span>
                                        Mostranto registros desde el <b>{{ paginacion.from}}</b> al <b>{{ paginacion.to}}</b> | Total: <b>{{ paginacion.total}}</b>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-toolbar float-right" role="toolbar">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button type="button" class="btn btn-light" @click="PrimeraPagina()"><i class="fas fa-angle-double-left"></i></button>
                                            <button type="button" class="btn btn-light" @click="AnteriorPagina()"><i class="fas fa-angle-left"></i></button>
                                            <button type="button" class="btn btn-light" @click="SiguientePagina()"><i class="fas fa-angle-right"></i></button>
                                            <button type="button" class="btn btn-light" @click="UltimaPagina()"><i class="fas fa-angle-double-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<style>
#table_distancias{
    overflow-x: unset;
}

#table_distancias .table-responsive{
    overflow-x: unset;
}
</style>
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
                paginacion: [{
                    'count': '',
                    'current_page': '',
                    'first_page_url': '',
                    'last_page_url': '',
                    'next_page_url': '',
                    'prev_page_url': '',
                    'total': '',
                    'to' : '',
                    'from' : '',
                    'per_page': '',
                }],
                filtro : ''
            }
        },
        mounted() {
            axios.get('/sitio')
                .then((response)=>{
                    this.sitios = response.data;
            });
            this.CargarDistancias();
            
        },
        methods: {
            CargarDistancias(){
                axios.get('/distancia')
                .then((response)=>{
                    this.distancias = response.data.data;

                    this.paginacion.total = response.data.total;
                    this.paginacion.current_page = response.data.current_page;
                    this.paginacion.first_page_url = response.data.first_page_url;
                    this.paginacion.last_page_url = response.data.last_page_url;
                    this.paginacion.next_page_url = response.data.next_page_url;
                    this.paginacion.prev_page_url = response.data.prev_page_url;
                    this.paginacion.to = response.data.to;
                    this.paginacion.from = response.data.from;
                    this.paginacion.per_page = response.data.per_page;
                });
                
            },
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
            PrimeraPagina(){
                axios.get(this.paginacion.first_page_url)
                 .then((response)=>{
                     this.distancias = response.data.data;
                     this.paginacion.total = response.data.total;
                     this.paginacion.current_page = response.data.current_page;
                     this.paginacion.first_page_url = response.data.first_page_url;
                     this.paginacion.last_page_url = response.data.last_page_url;
                     this.paginacion.next_page_url = response.data.next_page_url;
                     this.paginacion.prev_page_url = response.data.prev_page_url;
                     this.paginacion.to = response.data.to;
                     this.paginacion.from = response.data.from;
                     this.paginacion.per_page = response.data.per_page;
                });
            },
            AnteriorPagina(){
                axios.get(this.paginacion.prev_page_url)
                 .then((response)=>{
                     this.distancias = response.data.data;
                     this.paginacion.total = response.data.total;
                     this.paginacion.current_page = response.data.current_page;
                     this.paginacion.first_page_url = response.data.first_page_url;
                     this.paginacion.last_page_url = response.data.last_page_url;
                     this.paginacion.next_page_url = response.data.next_page_url;
                     this.paginacion.prev_page_url = response.data.prev_page_url;
                     this.paginacion.to = response.data.to;
                     this.paginacion.from = response.data.from;
                     this.paginacion.per_page = response.data.per_page;
                });

            },
            SiguientePagina(){
                axios.get(this.paginacion.next_page_url)
                 .then((response)=>{
                     this.distancias = response.data.data;
                     this.paginacion.total = response.data.total;
                     this.paginacion.current_page = response.data.current_page;
                     this.paginacion.first_page_url = response.data.first_page_url;
                     this.paginacion.last_page_url = response.data.last_page_url;
                     this.paginacion.next_page_url = response.data.next_page_url;
                     this.paginacion.prev_page_url = response.data.prev_page_url;
                     this.paginacion.to = response.data.to;
                     this.paginacion.from = response.data.from;
                     this.paginacion.per_page = response.data.per_page;
                });
            },
            UltimaPagina(){
                axios.get(this.paginacion.last_page_url)
                 .then((response)=>{
                     this.distancias = response.data.data;
                     this.paginacion.total = response.data.total;
                     this.paginacion.current_page = response.data.current_page;
                     this.paginacion.first_page_url = response.data.first_page_url;
                     this.paginacion.last_page_url = response.data.last_page_url;
                     this.paginacion.next_page_url = response.data.next_page_url;
                     this.paginacion.prev_page_url = response.data.prev_page_url;
                     this.paginacion.to = response.data.to;
                     this.paginacion.from = response.data.from;
                     this.paginacion.per_page = response.data.per_page;
                });
            },
            Filtro(){
                const parametros = {
                    filtro: this.filtro,
                };
                
                if(this.filtro !== null){
                    axios.get('/distancia/' + this.filtro, parametros)
                    .then((response) => {
                        this.distancias = response.data.data;
                        this.paginacion.total = response.data.total;
                        this.paginacion.current_page = response.data.current_page;
                        this.paginacion.first_page_url = response.data.first_page_url;
                        this.paginacion.last_page_url = response.data.last_page_url;
                        this.paginacion.next_page_url = response.data.next_page_url;
                        this.paginacion.prev_page_url = response.data.prev_page_url;
                        this.paginacion.to = response.data.to;
                        this.paginacion.from = response.data.from;
                        this.paginacion.per_page = response.data.per_page;
                    }).catch((error)=> {
                        swal("Error!", "Algo anda mal", "warning");
                    });
                }else{
                    this.CargarDistancias();
                }
                
            }

        }
      
    }
</script>
