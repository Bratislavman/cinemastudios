require('./bootstrap');

window.Vue = require('vue');

/**
 * vue-router
 */
import VueRouter from 'vue-router';
import {routes} from './routes/routes';

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});

/**
 * vuetify
 */
import Vuetify from 'vuetify';

Vue.use(Vuetify);

/**
 * vue-select
 */
import vSelect from "vue-select";
Vue.component("v-select", vSelect);

/**
 */
import App from './components/App'

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    components: {App},
    router
});
