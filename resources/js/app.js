require('./bootstrap');

window.Vue = require('vue').default;

// Import components
// import Nav from './components/Nav.vue';
// import Main from './components/Main.vue';
// import Info from './components/Info.vue';
// import Map from './components/Map.vue';
// import Seo from './components/Seo.vue';
// import Footer from './components/Footer.vue';
import Vue from 'vue';

// Register components
// Vue.component('navbar', Nav);
// Vue.component('mainc', Main);
// Vue.component('info', Info);
// Vue.component('mapc', Map);
// Vue.component('seo', Seo);
// Vue.component('foot', Footer);


import { Form } from 'vform';
import VueRouter from 'vue-router';
import routes from './routes.js'

Vue.use(VueRouter);

window.Form = Form;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// ------- Vuex Store
import store from './Store/Store.js';

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
    store
});
