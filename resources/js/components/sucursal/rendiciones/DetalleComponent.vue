<template>
    <tr>
        <th class="col-sm-1 text-center"> {{index+1}}</th>
        <td  class="col-sm-1 text-center" v-if="modoEdicion"><input type="date" class="form-control form-control-sm" v-model="draft.fecha"></td>
        <td  class="col-sm-1 text-center" v-else>{{moment(detalle_rendicion.fecha).format('DD/MM/YYYY')}}</td>
        
        <td  class="col-sm-3 text-center" v-if="modoEdicion"><v-select v-model="draft.id_sitio_desde" label="descripcion" @input="Desde"  :options="sitios" :reduce="sitios => sitios.id" ></v-select></td>
        <td  class="col-sm-3 text-center" v-else>{{detalle_rendicion.sitio_desde.descripcion}}</td>
        <td  class="col-sm-3 text-center" v-if="modoEdicion"><v-select v-model="draft.id_sitio_hasta" label="descripcion" @input="Hasta"  :options="sitios" :reduce="sitios => sitios.id" ></v-select></td>
        <td  class="col-sm-3 text-center" v-else>{{detalle_rendicion.sitio_hasta.descripcion}}</td>
        <td  class="col-sm-1 text-center" v-if="modoEdicion"><input type="text" class="form-control form-control-sm" v-model="draft.kilometraje"></td>
        <td  class="col-sm-1 text-center" v-else>{{detalle_rendicion.kilometraje}}</td>
        <td  class="col-sm-2 text-center" v-if="modoEdicion"><input type="text" class="form-control form-control-sm" v-model="draft.finalidad"></td>
        <td  class="col-sm-2 text-center" v-else>{{detalle_rendicion.finalidad}}</td>

        <td  class="col-sm-1 text-center" v-if="modoEdicion"><a href="#" v-on:click="detalle_rendicion.id == null ? Agregar():Actualizar()" data-toggle="tooltip" data-placement="auto" title="Guardar la distancia" ><i class="fas fa-save text-primary fa-lg"></i></a><b> | </b> <a href="#" v-on:click="Eliminar()" data-toggle="tooltip" data-placement="auto" title="Eliminar la distancia" ><i class="fas fa-trash-alt text-danger fa-lg"></i>  </a></td>
        <td  class="col-sm-1 text-center" v-else><a href="#" v-on:click="Modificar()" data-toggle="tooltip" data-placement="auto" title="Modificar la distancia" ><i class="fas fa-edit text-success fa-lg"></i></a><b> | </b> <a href="#" v-on:click="Eliminar()" data-toggle="tooltip" data-placement="auto" title="Eliminar la distancia" ><i class="fas fa-trash-alt text-danger fa-lg"></i>  </a></td>
        
    </tr> 
</template>        

<script>
    import Vue from 'vue'
    var EventBus = new Vue

    import vSelect from 'vue-select'

    Vue.component('v-select', vSelect)
    import 'vue-select/dist/vue-select.css';

    
    import { Form, HasError, AlertError } from 'vform'
    var moment = require('moment');
    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    export default {
        props: ['detalle_rendicion','index','sitios','id_rendicion'],
        created: function() {
            if (this.detalle_rendicion.id == null){
                this.Modificar();
            }
            EventBus.$on('modificando', function(index){
                if (this.index != index){
                    this.modoEdicion = false;
                }
            }.bind(this));
        },
        data(){
            return{
                moment: moment,
                modoEdicion: false,
                draft:[{
                    fecha: '',
                    id_sitio_desde: '',
                    id_sitio_hasta: '',
                    kilometraje: '',
                    finalidad: '',
                }],
            }
        },
        mounted() {

        },
        methods: {
            Modificar(){
                EventBus.$emit('modificando', this.index);
                this.modoEdicion = true;
                this.draft.fecha = this.detalle_rendicion.fecha;
                this.draft.finalidad = this.detalle_rendicion.finalidad;
                this.draft.id_sitio_desde = this.detalle_rendicion.id_sitio_desde;
                this.draft.id_sitio_hasta = this.detalle_rendicion.id_sitio_hasta;
                this.draft.kilometraje = this.detalle_rendicion.kilometraje;
            },
            Actualizar(){
                const parametros = {
                    id_sitio_desde: this.draft.id_sitio_desde,
                    id_sitio_hasta: this.draft.id_sitio_hasta,
                    kilometraje: this.draft.kilometraje,
                    fecha: this.draft.fecha,
                    finalidad: this.draft.finalidad
                };
                
                axios.put('/rendicion_detalles/'+this.detalle_rendicion.id, parametros)
                    .then((response)=>{
                        this.modoEdicion = false;
                        this.$emit('actualizar', response.data, this.index);
                    })
                    .catch((error)=>{
                        swal("Error!", "Algo anda mal" +"\n" + error.response.data.message, "warning");
                    });
            },
            Agregar(){
                const parametros = {
                    id_rendicion: this.id_rendicion,
                    fecha: this.draft.fecha,
                    finalidad: this.draft.finalidad,
                    id_sitio_desde: this.draft.id_sitio_desde,
                    id_sitio_hasta: this.draft.id_sitio_hasta,
                    kilometraje: this.draft.kilometraje,
                    
                };
                
                axios.post('/rendicion_detalles', parametros)
                     .then((response) => {
                         this.$emit('nuevo', response.data, this.index);
                         this.modoEdicion = false;
                }).catch((error)=> {
                    swal("Error!", "Algo anda mal", "warning");
                });
            },
            Desde(valor){
               this.BuscarDistancia(valor, this.draft.id_sitio_hasta);
            },
            Hasta(valor){
                this.BuscarDistancia(this.draft.id_sitio_desde, valor);
            },
            BuscarDistancia(desde, hasta){
                console.log('Buscando distancia.. desde: ' + desde + ' hasta: '+ hasta);
                const parametros = {
                    id_sitio_desde: desde,
                    id_sitio_hasta: hasta
                };
                
                axios.post('/BuscarDistancias', parametros)
                     .then((response) => {
                         console.log(this.draft.kilometraje);
                         if(response.data.kilometraje != null){
                            this.draft = Object.assign({}, this.draft, { kilometraje: response.data.kilometraje });
                         }else{
                            this.draft = Object.assign({}, this.draft, { kilometraje: 0 });
                         }
                         console.log(this.draft.kilometraje);
                }).catch((error)=> {
                    swal("Error!", "Algo anda mal", "warning");
                });

            },

            Eliminar(){
                if (this.detalle_rendicion.id != null){

                    axios.delete('/rendicion_detalles/'+this.detalle_rendicion.id)
                    .then(()=>{
                        this.$emit('eliminar', this.index);

                    }).catch(()=> {
                        swal("Error!", "Algo anda mal", "warning");
                });
                }else{
                    this.$emit('eliminar', this.index);
                }
                swal(
                    'Eliminado!',
                    'La distancia fue eliminada!',
                    'success'
                )
            },
        }
      
    }
</script>



<style>

</style>