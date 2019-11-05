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
                                         <tr>
                                            <th > 1 </th>
                                            <td>CASA DE FEDE</td>
                                            <td>OFICINA - CENTRAL</td>
                                            <td >18.5</td>
                                            <td><a href="#" v-on:click="Modificar()" data-toggle="tooltip" data-placement="auto" title="Modificar la distancia" ><i class="fas fa-edit text-success fa-lg"></i></a><b> | </b> <a href="#" v-on:click="Eliminar()" data-toggle="tooltip" data-placement="auto" title="Eliminar la distancia" ><i class="fas fa-trash-alt text-danger fa-lg"></i>  </a></td>
                                        </tr> 
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button v-if="modoEdicion" type="submit" class="btn btn-primary">Modificar</button>
                        <button v-else type="submit" class="btn btn-success">Guardar</button>
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
        props:['rendicion'],
        data(){
            return{
            //   form:new Form({
            //         id: '',
            //         descripcion: '',
            //     }),
            //     sitios:[],
            //     distancias:[],
            //     rendiciones:[],
            //     modoEdicion: false,
            }
        },
        mounted() {
            // axios.get('/distancia')
            //      .then((response)=>{
                     
            //          this.distancias = response.data;
            // });
            // axios.get('/sitio')
            // .then((response)=>{
            //     this.sitios = response.data;
            // });
        },
        methods: {
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
            // ActualizarDistancia(distancia, index){
            //     this.distancias.splice(index, 1, distancia);
            //     swal(
            //         'Actualizado!',
            //         'La distancia fue actualizada',
            //         'info'
            //     )
            // },
            // EliminarDistancia(index){
            //     this.distancias.splice(index,1);
            // },
            // ImportarDistanciaModal(){
            //     $('#ImportarSitioModal').modal('show');
            // },
        }
      
    }
</script>
