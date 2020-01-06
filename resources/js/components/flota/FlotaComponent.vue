<template>
<div>
      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</div>


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
        props: ['distancia','index','sitios'],
        created: function() {
            if (this.distancia.id == null){ 
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
                this.draft.id_sitio_desde = this.distancia.id_sitio_desde;
                this.draft.id_sitio_hasta = this.distancia.id_sitio_hasta;
                this.draft.kilometraje = this.distancia.kilometraje;
            },
            Actualizar(){
                const parametros = {
                    id_sitio_desde: this.draft.id_sitio_desde,
                    id_sitio_hasta: this.draft.id_sitio_hasta,
                    kilometraje: this.draft.kilometraje
                };
                
                axios.put('/distancia/'+this.distancia.id, parametros)
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
                axios.post('/distancia', parametros)
                     .then((response) => {
                         this.modoEdicion = false;
                         this.$emit('nuevo', response.data, this.index);
                    
                }).catch((error)=> {
                    
                    swal("Error!", "Algo anda mal", "warning");
                });
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

<style >
#dist_desde{
    width: 380px;

}

#dist_hasta{
    width: 380px;

}

</style>