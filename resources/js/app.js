require('./bootstrap');
window.Vue = require('vue').default;
//importamos Axios
import axios from 'axios';
import VueAxios from 'vue-axios';
//Importamos y configuramos el Vue-router
import VueRouter from 'vue-router';
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
import App from './app.vue';
import { routes } from './routes';

Vue.component('pagination', require('laravel-vue-pagination'));
const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});