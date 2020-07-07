require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import axios from 'axios';
import {routes} from './router';
import VueProgressBar from 'vue-progressbar'

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.use(VueProgressBar, {
    color: '#3490dc',
    failedColor: 'red',
    height: '2px'
 })

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});