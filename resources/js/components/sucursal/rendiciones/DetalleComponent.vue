<template>
    <tr>
        <th > {{index+1}}</th>
        <td  class="col-sm-4 text-center" v-if="modoEdicion"><v-select v-model="draft.id_sitio_desde" label="descripcion" :options="sitios" :reduce="sitios => sitios.id" ></v-select></td>
        <td  class="col-sm-4 text-center" v-else>{{detalle_rendicion.sitio_desde.descripcion}}</td>
        <td  class="col-sm-4 text-center" v-if="modoEdicion"><v-select v-model="draft.id_sitio_hasta" label="descripcion" :options="sitios" :reduce="sitios => sitios.id" ></v-select></td>
        <td  class="col-sm-4 text-center" v-else>{{detalle_rendicion.sitio_hasta.descripcion}}</td>
        <td  class="col-sm-2 text-center" v-if="modoEdicion"><input type="text" class="form-control form-control-sm" v-model="draft.kilometraje"></td>
        <td  class="col-sm-2 text-center" v-else>{{detalle_rendicion.kilometraje}}</td>
        
        <td  class="col-sm-2 text-center" v-if="modoEdicion"><a href="#" v-on:click="detalle_rendicion.id == null ? Agregar():Actualizar()" data-toggle="tooltip" data-placement="auto" title="Guardar la distancia" ><i class="fas fa-save text-primary fa-lg"></i></a><b> | </b> <a href="#" v-on:click="Eliminar()" data-toggle="tooltip" data-placement="auto" title="Eliminar la distancia" ><i class="fas fa-trash-alt text-danger fa-lg"></i>  </a></td>
        <td  class="col-sm-2 text-center" v-else><a href="#" v-on:click="Modificar()" data-toggle="tooltip" data-placement="auto" title="Modificar la distancia" ><i class="fas fa-edit text-success fa-lg"></i></a><b> | </b> <a href="#" v-on:click="Eliminar()" data-toggle="tooltip" data-placement="auto" title="Eliminar la distancia" ><i class="fas fa-trash-alt text-danger fa-lg"></i>  </a></td>
        
    </tr> 
</template>
<script>
    import Vue from 'vue'
    var EventBus = new Vue

    import vSelect from 'vue-select'

    Vue.component('v-select', vSelect)
    import 'vue-select/dist/vue-select.css';

    
    import { Form, HasError, AlertError } from 'vform'

    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    export default {
        props: ['detalle_rendicion','index','sitios'],
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
                modoEdicion: false,
                draft:[{
                    id_sitio_desde: '',
                    id_sitio_hasta: '',
                    kilometraje: ''
                }],
            }
        },
        mounted() {

        },
        methods: {
            Modificar(){
                EventBus.$emit('modificando', this.index);
                this.modoEdicion = true;
                this.draft.id_sitio_desde = this.detalle_rendicion.id_sitio_desde;
                this.draft.id_sitio_hasta = this.detalle_rendicion.id_sitio_hasta;
                this.draft.kilometraje = this.detalle_rendicion.kilometraje;
            },
            Actualizar(){
                const parametros = {
                    id_sitio_desde: this.draft.id_sitio_desde,
                    id_sitio_hasta: this.draft.id_sitio_hasta,
                    kilometraje: this.draft.kilometraje
                };
                
                axios.put('/distancia/'+this.detalle_rendicion.id, parametros)
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
                    id_sitio_desde: this.draft.id_sitio_desde,
                    id_sitio_hasta: this.draft.id_sitio_hasta,
                    kilometraje: this.draft.kilometraje
                };
                console.log(parametros);
                
                // axios.post('/distancia', parametros)
                //      .then((response) => {
                //          this.modoEdicion = false;
                //          this.$emit('nuevo', response.data, this.index);
                    
                // }).catch((error)=> {
                    
                //     swal("Error!", "Algo anda mal", "warning");
                // });
            },
            Eliminar(){
                if (this.distancia.id != null){

                    axios.delete('/distancia/'+this.distancia.id)
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
