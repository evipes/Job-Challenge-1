require("./bootstrap");

import "es6-promise/auto";
import axios from "axios";
import Vue from "vue";

import VueAuth from "@websanova/vue-auth";
import VueAxios from "vue-axios";
import VueRouter from "vue-router";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import auth from "./auth";
import router from "./router";
import vueMask from 'vue-jquery-mask';

window.Vue = Vue;
require('./filter');
Vue.use(vueMask);
Vue.use(VueSweetalert2);
Vue.use(VueRouter);
Vue.router = router;
Vue.use(VueAxios, axios);

axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/`;
Vue.use(VueAuth, auth);

//Import v-from
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

new Vue({
    el: "#app",
    router
}).mount("#app");
