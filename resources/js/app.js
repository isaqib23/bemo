require('./bootstrap');
import Vue from 'vue';
import router from './router/index';
import App from './components/App';
import axios from 'axios';
import axiosRequest from './plugins/axiosRequests';
import { api } from './config.js';
import VModal from 'vue-js-modal'

Vue.use(VModal, { dialog: true });
window.Vue = Vue;
window.axios = axios;
window.api = api;
window.axiosRequest = axiosRequest;

export const app = new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
