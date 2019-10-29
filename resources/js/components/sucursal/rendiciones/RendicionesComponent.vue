<template>
<div class="row justify-content-center" style="margin: 0px">
    <div class="col-md-8">
        <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-header">Rendiciones

                <div class="btn-group" role="group" aria-label="Basic example" style="float: right;" >
                    <a href="/distancia/export" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="auto" title="Exportar Distancias a Excel" ><i class="fas fa-download"></i> Exportar - EXCEL</a>
                    <button @click="ImportarDistanciaModal()" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="auto" title="Importar Distancias desde Excel" ><i class="fas fa-upload"></i> Importar - EXCEL</button>
                    <button @click="AgregarDistancia()" class="btn btn-primary" type="button"><i class="fas fa-map-signs"></i> Agregar Distancia</button>
                </div>
            </div>
            <importar-distancia-component @importar="ImportarDistancia(...arguments)"></importar-distancia-component>
            <div class="card-body">
                <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
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
