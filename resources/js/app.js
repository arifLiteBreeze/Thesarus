/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue').default;

import App from './App.vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';
import VueTypeaheadBootstrap from 'vue-typeahead-bootstrap';
import 'bootstrap/scss/bootstrap.scss';
import Tabs from 'vue-tabs-component';
import VTooltip from 'v-tooltip'

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(Tabs);
Vue.use(VTooltip);
Vue.component('vue-typeahead-bootstrap', VueTypeaheadBootstrap);


const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});