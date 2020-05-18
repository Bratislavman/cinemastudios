require('./bootstrap');

window.Vue = require('vue');

/**
 * vue-router
 */
import VueRouter from 'vue-router';
import {routes} from './routes/routes';
import {navigathionHook} from "./routes/hook";

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});

navigathionHook(router);

/**
 * vuetify
 */
import Vuetify from 'vuetify';

Vue.use(Vuetify);

/**
 * vuex
 */
import Vuex from 'vuex';

Vue.use(Vuex);
import {store as storeIni} from "./store";

const store = new Vuex.Store(storeIni);

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
    store,
    router
});
