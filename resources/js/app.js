require('./bootstrap');

import { CClickaway } from '@coreui/vue';

// Import components
import Nav from './components/Nav.vue';
import Main from './components/Main.vue';
import Info from './components/Info.vue';
import Map from './components/Map.vue';
import Seo from './components/Seo.vue';
import Footer from './components/Footer.vue';
import Vue from 'vue';

window.Vue = require('vue').default;

// Register components
Vue.component('navbar', Nav);
Vue.component('mainc', Main);
Vue.component('info', Info);
Vue.component('mapc', Map);
Vue.component('seo', Seo);
Vue.component('foot', Footer);

const app = new Vue({
    el: '#app',
});