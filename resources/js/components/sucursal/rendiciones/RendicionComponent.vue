<template>
    <div class="row alert alert-dark ">
        <div class="col-md-6 my-auto" role="alert">
            <h5 style="margin: 0px"><b>{{rendicion.descripcion}} </b><a href="#" style="color: green" v-on:click="Modificar()" data-toggle="tooltip" data-placement="auto" title="Modificar descripcion" ><i class="far fa-edit"></i></a></h5>
            <small >

                 
            CREADO EL: <b>{{rendicion.creado_el}}</b>
            </small>
        </div>
        <div class="col-md-6 my-auto" role="group" style="text-align: end;" >
            <button @click="VerDetalles()" class="btn btn-primary" type="button"><i class="fas fa-eye"></i></button>
            <detalles-component></detalles-component>
            <button @click="ImportarDistanciaModal()" type="button" class="btn btn-warning"><i class="far fa-file-pdf"></i></button>
            <button @click="EliminarRendicion()" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
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
            //     distancias:[],
            //     modoEdicion: false,
            }
        },
        mounted() {
            console.log(this.rendicion);
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
            AgregarNuevaRendicion(){
                this.modoEdicion = false;
                this.form.reset();
                $('#NuevaRendicionModal').modal('show');
            },
            NuevaRendicion(){
                this.form.post('/rendicion')
                     .then((response) => {
                         console.log(response);
                        // const rendicion= response.data;
                        // this.rendiciones.push(rendicion);
                        // this.form.reset();
                     });
                
            },
            VerDetalles(){
                $('#DetallesRendicionModal').modal({show: true, keyboard: false, backdrop: 'static'});
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
            EliminarRendicion(){



                axios.delete('/rendicion/'+this.rendicion.id)
                    .then(()=>{
                        // this.$emit('eliminar', this.index);
                        console.log('Eliminado');
                    }).catch(()=> {
                        swal("Error!", "Algo anda mal", "warning");
                });
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
