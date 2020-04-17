<template>
    <div class="row alert alert-dark ">
        <div class="col-md-6 my-auto" role="alert">
            <h5 style="margin: 0px" v-if="modoEdicion"><input type="text" class="form-control form-control-sm inputRendicion" v-model="draft">
                <a href="#" @click="Actualizar()" data-toggle="tooltip" data-placement="auto" title="Actualizar descripcion">
                    <i class="fas fa-save text-primary fa-lg"></i>
                </a>
            </h5>
            <h5 style="margin: 0px" v-else><b>{{rendicion.descripcion}} </b>
                <a href="#" style="color: green" @click="Modificar()" data-toggle="tooltip" data-placement="auto" title="Modificar descripcion" >
                    <i class="far fa-edit"></i>
                </a>
            </h5>
            <small >  
                CREADO EL: <b>{{moment(rendicion.creado_el).format('DD-MM-YYYY HH:mm')}}</b>
            </small>
        </div>
        <div class="col-md-6 my-auto" role="group" style="text-align: end;" >


            <a href="#" @click="VerDetalles()" data-toggle="tooltip" data-placement="auto" title="Ver Detalles" ><i class="fas fa-eye text-info  fa-lg"></i></a><b> | </b>
            <a href="#" @click="Exportar()" data-toggle="tooltip" data-placement="auto" title="Modificar la distancia" ><i class="far fa-file-pdf text-danger  fa-lg"></i></a><b> | </b>
            <a href="#" @click="Eliminar()" data-toggle="tooltip" data-placement="auto" title="Eliminar la distancia" ><i class="fas fa-trash-alt text-primary fa-lg"></i></a>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue' 
    import { Form, HasError, AlertError } from 'vform'

    import EventBus from "../../event-bus"
    var moment = require('moment');
    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    export default {
        props:['rendicion', 'index'],
        created: function() {
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
                draft :'',
                
            }
        },
        methods: {
            VerDetalles(){
                EventBus.$emit('actualizar', this.rendicion.id);
                 
            },
            Modificar(){
                EventBus.$emit('modificando', this.index);
                this.draft = this.rendicion.descripcion;
                this.modoEdicion = true;
            },
            Actualizar(){
                const parametros = {
                    descripcion: this.draft
                };
                
                axios.put('/rendicion/'+this.rendicion.id, parametros)
                    .then((response)=>{
                        this.$emit('actualizar', response.data, this.index);
                        this.modoEdicion = false;
                    })
                    .catch((error)=>{
                        swal("Error!", "Algo anda mal" +"\n" + error.response.data.message, "warning");
                    });
            },
            Eliminar(){
                axios.delete('/rendicion/'+this.rendicion.id)
                    .then(()=>{
                        this.$emit('eliminar', this.index);
                    }).catch(()=> {
                        swal("Error!", "Algo anda mal", "warning");
                });
            },
            Exportar(){
                window.location.href = '/pdf/' + this.rendicion.id;

            }
        }
    }
</script>

<style> 
    .inputRendicion{
        display: unset;
        width: auto;
    }
</style>
