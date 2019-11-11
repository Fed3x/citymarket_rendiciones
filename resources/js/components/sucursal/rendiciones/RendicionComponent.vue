<template>
    <div class="row alert alert-dark ">
        <div class="col-md-6 my-auto" role="alert">
            <h5 style="margin: 0px"><b>{{rendicion.descripcion}} </b><a href="#" style="color: green" v-on:click="Modificar()" data-toggle="tooltip" data-placement="auto" title="Modificar descripcion" ><i class="far fa-edit"></i></a></h5>
            <small >

                 
            CREADO EL: <b>{{rendicion.creado_el}}</b>
            </small>
        </div>
        <div class="col-md-6 my-auto" role="group" style="text-align: end;" >
  
            <!-- <detalles-component :rendicion="rendicion" :key="rendicion.id" ></detalles-component> -->

            <a href="#" @click="VerDetalles()" data-toggle="tooltip" data-placement="auto" title="Ver Detalles" ><i class="fas fa-eye text-info  fa-lg"></i></a><b> | </b>
            <a href="#" v-on:click="Modificar()" data-toggle="tooltip" data-placement="auto" title="Modificar la distancia" ><i class="far fa-file-pdf text-danger  fa-lg"></i></a><b> | </b>
            <a href="#" v-on:click="Eliminar()" data-toggle="tooltip" data-placement="auto" title="Eliminar la distancia" ><i class="fas fa-trash-alt text-primary fa-lg"></i></a>
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
                detalles_rendicion:[],
                sitios:[],
                vacio: "",
            //   form:new Form({
            //         id: '',
            //         descripcion: '',
            //     }),
            //     distancias:[],
            //     modoEdicion: false,
            }
        },
        mounted() {
            // console.log(this.rendicion);
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
                this.detalles_rendicion = this.detalles_rendicion.splice()
                // console.log(this.detalles_rendicion);
                axios.get('/rendicion_detalles/' + this.rendicion.id)
                 .then((response)=>{
                     console.log(response);
                     this.detalles_rendicion.push(response.data);
                });
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
            Eliminar(){
                axios.delete('/rendicion/'+this.rendicion.id)
                    .then(()=>{
                        this.$emit('eliminar', this.index);
                    }).catch(()=> {
                        swal("Error!", "Algo anda mal", "warning");
                });
            },
            ImportarDistanciaModal(){
                $('#ImportarSitioModal').modal('show');
            },
        }
      
    }
</script>
