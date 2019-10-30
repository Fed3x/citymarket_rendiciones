<template>
<div class="row justify-content-center" style="margin: 0px">
    <div class="col-md-8">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">Rendiciones

                <div class="btn-group" role="group" aria-label="Basic example" style="float: right;" >
                <button @click="AgregarNuevaRendicion()" class="btn btn-primary" type="button"><i class="fab fa-rev"></i> Agregar Rendicion</button>
                </div>
                <div class="modal fade" id="NuevaRendicionModal" tabindex="-1" role="dialog"
                    aria-labelledby="NuevaRendicionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                             <form @submit.prevent="modoEdicion ? ActualizarSitio() : NuevoSitio()" @keydown="form.onKeydown($event)" > 
                                <div class="modal-header">
                                    <h5 v-if="modoEdicion" class="modal-title" id="NuevaRendicionModalLabel">Modificar Rendicion</h5>
                                    <h5 v-else class="modal-title" id="NuevaRendicionModalLabel">Nueva Rendicion</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <div class="form-row">
                                        <input v-model="form.id" name="id" type="hidden">
                                        <div class="form-group col-md-12">
                                            <label>Descripcion</label>
                                            <input v-model="form.descripcion"
                                                    name="descripcion"
                                                    type="text" 
                                                    class="form-control form-control-sm"
                                                    placeholder="Descripcion de la Rendicion"
                                                    :class="{ 'is-invalid': form.errors.has('descripcion') }"
                                                    >
                                                    <has-error :form="form" field="descripcion"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <button v-if="modoEdicion" type="submit" class="btn btn-primary">Modificar</button>
                                    <button v-else type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
              <div class="row alert alert-dark ">
                    <div class="col-md-6 my-auto" role="alert">

                   <h5 style="margin: 0px"><b>Rendicion #1</b></h5>
                  <small >
                    Fecha de Creacion: 30/10/2019 10:25
                  </small>
                </div>
                
                  <div class="col-md-6 my-auto" role="group" style="text-align: end;" >
                    <button @click="AgregarDistancia()" class="btn btn-primary" type="button"><i class="fas fa-eye"></i></button>
                    <button @click="ImportarDistanciaModal()" type="button" class="btn btn-warning"><i class="far fa-file-pdf"></i></button>
                    <button @click="AgregarDistancia()" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
                  </div>
              </div>
                <div class="row alert alert-dark ">
                    <div class="col-md-6 my-auto" role="alert">

                   <h5 style="margin: 0px"><b>Rendicion #2</b></h5>

                </div>
                
                  <div class="col-md-6 my-auto" role="group" style="text-align: end;" >
                    <button @click="AgregarDistancia()" class="btn btn-primary" type="button"><i class="fas fa-eye"></i></button>
                    <button @click="ImportarDistanciaModal()" type="button" class="btn btn-warning"><i class="far fa-file-pdf"></i></button>
                    <button @click="AgregarDistancia()" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
                  </div>
              </div>

                <div class="row alert alert-dark ">
                    <div class="col-md-6 my-auto" role="alert">

                   <h5 style="margin: 0px"><b>Rendicion #3</b></h5>

                </div>
                
                  <div class="col-md-6 my-auto" role="group" style="text-align: end;" >
                    <button @click="AgregarDistancia()" class="btn btn-primary" type="button"><i class="fas fa-eye"></i></button>
                    <button @click="ImportarDistanciaModal()" type="button" class="btn btn-warning"><i class="far fa-file-pdf"></i></button>
                    <button @click="AgregarDistancia()" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
                  </div>
              </div>
                <div class="row alert alert-dark ">
                    <div class="col-md-6 my-auto" role="alert">

                   <h5 style="margin: 0px"><b>Rendicion #2</b></h5>

                </div>
                
                  <div class="col-md-6 my-auto" role="group" style="text-align: end;" >
                    <button @click="AgregarDistancia()" class="btn btn-primary" type="button"><i class="fas fa-eye"></i></button>
                    <button @click="ImportarDistanciaModal()" type="button" class="btn btn-warning"><i class="far fa-file-pdf"></i></button>
                    <button @click="AgregarDistancia()" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
                  </div>
              </div>
                <div class="row alert alert-dark ">
                    <div class="col-md-6 my-auto" role="alert">

                   <h5 style="margin: 0px"><b>Rendicion #2</b></h5>

                </div>
                
                  <div class="col-md-6 my-auto" role="group" style="text-align: end;" >
                    <button @click="AgregarDistancia()" class="btn btn-primary" type="button"><i class="fas fa-eye"></i></button>
                    <button @click="ImportarDistanciaModal()" type="button" class="btn btn-warning"><i class="far fa-file-pdf"></i></button>
                    <button @click="AgregarDistancia()" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
                  </div>
              </div>
                <div class="row alert alert-dark ">
                    <div class="col-md-6 my-auto" role="alert">

                   <h5 style="margin: 0px"><b>Rendicion #4</b></h5>

                </div>
                  <div class="col-md-6 my-auto" role="group" style="text-align: end;" >
                    <button @click="AgregarDistancia()" class="btn btn-primary" type="button"><i class="fas fa-eye"></i></button>
                    <button @click="ImportarDistanciaModal()" type="button" class="btn btn-warning"><i class="far fa-file-pdf"></i></button>
                    <button @click="AgregarDistancia()" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
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
              form:new Form({
                    id: '',
                    descripcion: '',
                }),
                sitios:[],
                distancias:[],
                modoEdicion: false,
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
            AgregarNuevaRendicion(){
                this.form.reset();
                $('#NuevaRendicionModal').modal('show');
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
