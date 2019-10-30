<template>
<div class="row justify-content-center" style="margin: 0px">
    <div class="col-md-8">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">Sitios
                <div class="btn-group" role="group" aria-label="Basic example" style="float: right;" >
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="auto" title="Exportar Distancias a PDF" ><i class="fas fa-file-pdf"></i> Exportar - PDF</button>
                    <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="auto" title="Exportar Distancias a Excel" ><i class="fas fa-download"></i> Exportar - EXCEL</button>
                    <button @click="ImportarSitioModal()" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="auto" title="Importar Distancias desde Excel" ><i class="fas fa-upload"></i> Importar - EXCEL</button>
                    <button @click="AgregarSitioModal()" class="btn btn-primary" type="button"><i class="fas fa-building"></i> Agregar Sitio</button>
                </div>


            <div class="modal fade" id="ImportarSitioModal" tabindex="-1" role="dialog" aria-labelledby="ImportarSitioModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ImportarSitioModalLabel">Importar Archivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <form>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Example file input</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="SitioModal" tabindex="-1" role="dialog"
                aria-labelledby="SitioModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <form @submit.prevent="modoEdicion ? ActualizarSitio() : NuevoSitio()" @keydown="form.onKeydown($event)" > 
                            <div class="modal-header">
                                <h5 v-if="modoEdicion" class="modal-title" id="SitioModalLabel">Modificar Sitio</h5>
                                <h5 v-else class="modal-title" id="SitioModalLabel">Agregar Sitio</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
            
                                <div class="form-row">
                                    <input v-model="form.id" name="id" type="hidden">
                                    <input v-model="form.index" name="index" type="hidden">
                                    <div class="form-group col-md-12">
                                        <label>Descripcion</label>
                                        <input v-model="form.descripcion"
                                                name="descripcion"
                                                type="text" 
                                                class="form-control form-control-sm"
                                                placeholder="Descripcion del sitio"
                                                :class="{ 'is-invalid': form.errors.has('descripcion') }"
                                                >
                                                <has-error :form="form" field="descripcion"></has-error>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-9">
                                        <label>Direccion Uno</label>
                                        <input v-model="form.direccion_uno"
                                                name="direccion_uno"
                                                type="text" 
                                                class="form-control form-control-sm"
                                                placeholder="Primera direccion del Sitio"
                                                :class="{ 'is-invalid': form.errors.has('direccion_uno') }"
                                                >
                                                <has-error :form="form" field="direccion_uno"></has-error>
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label>&nbsp;</label>
                                        <select v-if="modoEdicion" v-model="form.tipo_direccion"
                                                name="tipo_direccion" 
                                                class="form-control form-control-sm"
                                                :class="{ 'is-invalid': form.errors.has('tipo_direccion') }"
                                                >
                                                <has-error :form="form" field="tipo_direccion"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="tipo_direccion in tipo_direcciones" v-bind:key="tipo_direccion.id" :value="tipo_direccion.id"  :selected="tipo_direccion.id == form.tipo_direccion">
                                                    {{ tipo_direccion.descripcion }}
                                                </option>
                                            
                                        </select>
                                        

                                        <select v-else v-model="form.tipo_direccion"
                                                name="tipo_direccion" 
                                                class="form-control form-control-sm"
                                                :class="{ 'is-invalid': form.errors.has('tipo_direccion') }"
                                                >
                                                <has-error :form="form" field="tipo_direccion"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="tipo_direccion in tipo_direcciones" v-bind:key="tipo_direccion.id" :value="tipo_direccion.id">
                                                    {{ tipo_direccion.descripcion }}
                                                </option>
                                                
                                        </select>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label>Direccion Dos</label>
                                        <input v-model="form.direccion_dos"
                                                name="direccion_dos"
                                                type="text" 
                                                class="form-control form-control-sm"
                                                placeholder="Segunda direccion del Sitio"
                                                :class="{ 'is-invalid': form.errors.has('direccion_dos') }"
                                                >
                                                <has-error :form="form" field="direccion_dos"></has-error>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Numero</label>
                                        <input v-model.number="form.numero"
                                                name="numero"
                                                type="text" 
                                                class="form-control form-control-sm"
                                                placeholder="123"
                                                :class="{ 'is-invalid': form.errors.has('numero') }"
                                                >
                                                <has-error :form="form" field="numero"></has-error>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Pais</label>
                                        <select v-if="modoEdicion" v-model="form.pais"
                                                name="pais" 
                                                class="form-control form-control-sm"
                                                @change="onChangePais"
                                                :class="{ 'is-invalid': form.errors.has('pais') }"
                                                >
                                                <has-error :form="form" field="pais"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="pais in paises" v-bind:key="pais.id" :value="pais.id" :selected="pais.id == form.pais">
                                                    {{ pais.descripcion }}
                                                </option>
                                                
                                        </select>
                                        <select v-else v-model="form.pais"
                                                name="pais" 
                                                class="form-control form-control-sm"
                                                @change="onChangePais"
                                                :class="{ 'is-invalid': form.errors.has('pais') }"
                                                >
                                                <has-error :form="form" field="pais"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="pais in paises" v-bind:key="pais.id" :value="pais.id">
                                                    {{ pais.descripcion }}
                                                </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Departamento</label>
                                        <select v-if="modoEdicion" v-model="form.departamento"
                                                name="departamento" 
                                                class="form-control form-control-sm"
                                                @change="onChangeDepartamento"
                                                :class="{ 'is-invalid': form.errors.has('departamento') }"
                                                >
                                                <has-error :form="form" field="departamento"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="departamento in departamentos" v-bind:key="departamento.id"  :value="departamento.id" :selected="departamento.id == form.departamento">
                                                    {{ departamento.descripcion }}
                                                </option>
                                        </select>
                                        <select v-else v-model="form.departamento"
                                                name="departamento" 
                                                class="form-control form-control-sm"
                                                @change="onChangeDepartamento"
                                                :class="{ 'is-invalid': form.errors.has('departamento') }"
                                                >
                                                <has-error :form="form" field="departamento"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="departamento in departamentos" v-bind:key="departamento.id"  :value="departamento.id">
                                                    {{ departamento.descripcion }}
                                                </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Ciudad</label>
                                        <select v-if="modoEdicion" v-model="form.ciudad"
                                                name="ciudad" 
                                                class="form-control form-control-sm"
                                                >
                                                <has-error :form="form" field="ciudad"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="ciudad in ciudades"  v-bind:key="ciudad.id" :value="ciudad.id" :selected="ciudad.id == form.ciudad">
                                                    {{ ciudad.descripcion }}
                                                </option>
                                        </select>
                                        <select v-else v-model="form.ciudad"
                                                name="ciudad" 
                                                class="form-control form-control-sm"
                                                :class="{ 'is-invalid': form.errors.has('ciudad') }"
                                                >
                                                <has-error :form="form" field="ciudad"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="ciudad in ciudades" v-bind:key="ciudad.id" :value="ciudad.id">
                                                    {{ ciudad.descripcion }}
                                                </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label>Tipo</label>
                                        <select v-if="modoEdicion" v-model="form.tipo_sitio"
                                                name="tipo_sitio" 
                                                class="form-control form-control-sm"
                                                :class="{ 'is-invalid': form.errors.has('tipo_sitio') }"
                                                >
                                                <has-error :form="form" field="tipo_sitio"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="tipo_sitio in tipo_sitios" v-bind:key="tipo_sitio.id" :value="tipo_sitio.id" :selected="tipo_sitio.id == form.tipo_sitio">
                                                    {{ tipo_sitio.descripcion }}
                                                </option>
                                        </select>
                                        <select v-else v-model="form.tipo_sitio"
                                                name="tipo_sitio" 
                                                class="form-control form-control-sm"
                                                :class="{ 'is-invalid': form.errors.has('tipo_sitio') }"
                                                >
                                                <has-error :form="form" field="tipo_sitio"></has-error>
                                                <option value="">Seleccionar...</option>
                                                <option v-for="tipo_sitio in tipo_sitios" v-bind:key="tipo_sitio.id" :value="tipo_sitio.id" >
                                                    {{ tipo_sitio.descripcion }}
                                                </option>
                                        </select>
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Codigo SET</label>
                                        <input v-model.number="form.codigo_set"
                                                name="codigo_set"
                                                type="text" 
                                                class="form-control form-control-sm"
                                                placeholder="123"
                                                :class="{ 'is-invalid': form.errors.has('codigo_set') }"
                                                >
                                                <has-error :form="form" field="codigo_set"></has-error>
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label>Estado</label>
                                        <select v-if="modoEdicion" v-model="form.estado"
                                                name="estado" 
                                                class="form-control form-control-sm">   
                                                <option  v-for="estado in estados" v-bind:key="estado.id" :value="estado.id"  :selected="estado.id === form.estado">
                                                    {{ estado.descripcion }}
                                                </option>
                                        </select>
                                        <select v-else v-model="form.estado"
                                                name="estado" 
                                                class="form-control form-control-sm">
                                                <option value="">Seleccionar...</option>
                                                <option  v-for="estado in estados" v-bind:key="estado.id" :value="estado.id">
                                                    {{ estado.descripcion }}
                                                </option>
                                        </select>
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
                <div class="table-responsive" style="height: 400px; overflow-x: auto;" >
                    <table class="table table-hover table-sm table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(sitio, index) in sitios" :key="sitio.id">
                                    <th scope="row">{{index+1}}</th>
                                    <td>{{sitio.descripcion}}</td>
                                    <td v-if="sitio.tipo_direccion">{{sitio.direccion_uno + ' ' + sitio.tipo_direccion.descripcion  + ' ' + sitio.direccion_dos}}</td>
                                    <td v-else>{{sitio.direccion_uno }}</td>
                                    
                                    <td>{{sitio.tipo_sitio.descripcion}}</td>
                                    <td v-if="sitio.estado.descripcion == 'Activo'" style="color: greenyellow">{{sitio.estado.descripcion}}</td>
                                    <td v-else style="color: red">{{sitio.estado.descripcion}}</td>
                                    <td><a href="#" v-on:click="ModificarSitioModal(sitio, index)"><i class="fas fa-eye text-primary"></i></a><b> | </b> <a href="#" v-on:click="EliminarSitio(sitio.id, index)"><i class="fas fa-trash-alt text-danger"></i>  </a></td>
                                </tr> 
                            </tbody>
                    </table>
                </div>
                <div style="padding-top: 5px;">
                   Lista de Sitios
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    import Vue from 'vue'
import { 
    Form,
  HasError,
  AlertError,
  AlertErrors, 
  AlertSuccess
} from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)

    export default {
        data(){
            return{
                modoEdicion: false,
                sitios:[],
                paises:[],
                departamentos:[],
                ciudades:[],
                estados:[],
                tipo_sitios:[],
                tipo_direcciones:[],
                form:new Form({
                    id: '',
                    descripcion: '',
                    direccion_uno:'',
                    direccion_dos:'',
                    codigo_set:'',
                    numero:'',
                    tipo_direccion:'',
                    estado:'',
                    tipo_sitio:'',
                    pais:'',
                    ciudad:'',
                    departamento:'',
                    index: ''
                }),
            }
        },
        mounted() {
            axios.get('/dataSitios')
                 .then((response)=>{
                     this.paises = response.data.paises;
                     this.departamentos = response.data.departamentos;
                     this.ciudades = response.data.ciudades;
                     this.estados = response.data.estados;
                     this.tipo_sitios = response.data.tipo_sitios;
                     this.tipo_direcciones = response.data.tipo_direcciones;
            });
            axios.get('/sitio')
            .then((response)=>{
                this.sitios = response.data;
            });
        },
        methods: {
            ModificarSitioModal(sitio, index){
                this.modoEdicion = true;
                this.form.reset();
                this.form.index = index;
                this.form.id = sitio.id;
                this.form.descripcion = sitio.descripcion;
                this.form.direccion_uno = sitio.direccion_uno;
                this.form.tipo_direccion = sitio.id_tipo_direccion;
                this.form.direccion_dos = sitio.direccion_dos;
                this.form.numero = sitio.direccion_numero;
                this.form.codigo_set = sitio.codigo_set;
                this.form.estado = sitio.id_estado;
                this.form.pais = sitio.id_pais;
                this.form.ciudad = sitio.id_ciudad;
                this.form.departamento = sitio.id_departamento;
                this.form.tipo_sitio = sitio.id_tipo_sitio;
                $('#SitioModal').modal('show');
            },
            AgregarSitioModal(){
                this.modoEdicion = false;
                this.form.reset();
                $('#SitioModal').modal('show');
            },
            ImportarSitioModal(){
                $('#ImportarSitioModal').modal('show');
            },
            NuevoSitio(){
                this.form.post('/sitio')
                     .then((response) => {
                        const sitio= response.data;
                        this.sitios.push(sitio);
                        this.form.reset();
                     });
                
            },
            ActualizarSitio(){
                
                this.form.put('/sitio/'+this.form.id)
                    .then((response)=>{
                        $('#SitioModal').modal('hide');
                        this.sitios.splice(response.data.index, 1, response.data.sitio[0]);
                        swal(
                            'Actualizado!',
                            'El sitio ha sido actualizado',
                            'info'
                        )
                    });

            },
            onChangePais(){
                this.form.ciudad = '';
                this.form.departamento = '';
            },
            onChangeDepartamento(){
                this.form.ciudad = '';

            },
            EliminarSitio(id, index){
                this.form.delete('/sitio/'+id).then(()=>{
                    swal(
                    'Eliminado!',
                    'El sitio ha sido eliminado',
                    'success'
                    )
                    this.sitios.splice(index,1);
                }).catch(()=> {
                    swal("Error!", "Algo anda mal", "warning");
                });
            },
        }
      
    }
</script>
