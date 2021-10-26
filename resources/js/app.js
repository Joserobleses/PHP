require('./bootstrap');


import { store } from './store';

// a partir de este punto añadido para Vue 

import vue from 'vue'
window.Vue = vue;


import App from './components/App.vue';

// importar Axios

import VueAxios from 'vue-axios';
import axios from 'axios';

// importar y configurar vue-router

import VueRouter from 'vue-router';
import { routes } from './routes';
import Vue from 'vue';
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

//Vue.use(VueAuth, auth)

import Vuex from 'vuex';
//import Vue from 'vue';

Vue.use(Vuex);




const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el  : '#app',
    router:router,
    store:store,
    render: h => h(App)
});

