/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
// Vue.component('sitios-component', require('./components/sucursal/SitiosComponent.vue').default);

Vue.component('sitios-component', require('./components/sucursal/sitios/SitiosComponent.vue').default);
Vue.component('distancias-component', require('./components/sucursal/distancias/DistanciasComponent.vue').default);
Vue.component('distancia-component', require('./components/sucursal/distancias/DistanciaComponent.vue').default);
Vue.component('importar-distancia-component', require('./components/sucursal/distancias/ImportarDistanciaComponent.vue').default);
// RENDICIONES
Vue.component('rendiciones-component', require('./components/sucursal/rendiciones/RendicionesComponent.vue').default);
Vue.component('rendicion-component', require('./components/sucursal/rendiciones/RendicionComponent.vue').default);
Vue.component('detalles-component', require('./components/sucursal/rendiciones/DetallesComponent.vue').default);
Vue.component('detalle-component', require('./components/sucursal/rendiciones/DetalleComponent.vue').default);


Vue.component('tareas-component', require('./components/tarea/TareasComponent.vue').default);
Vue.component('form-tarea-component', require('./components/tarea/FormTareaComponent.vue').default);
Vue.component('tarea-component', require('./components/tarea/TareaComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import swal from 'sweetalert'
window.swal = swal;

// const toast = swal.mixin({
//     toast: true,
//     position: 'top-end',
//     showConfirmButton: false,
//     timer: 3000
// });

// window.toast = toast;



const app = new Vue({
    el: '#app',
});
