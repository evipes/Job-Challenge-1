
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from "vue-router";
import store from './store/store';
import routes from "./routes";

Vue.component('products', require('./components/home/Products/Products').default);

const app = new Vue({
    store,
    el: '#app',
    route: new VueRouter(routes)
});

