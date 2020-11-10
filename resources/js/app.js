require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Dashboard from './routes/Dashboard.vue';

const routes = [
    { path: '/', component: Dashboard, name: 'Dashboard' }
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

const app = new Vue({
    router
}).$mount('#app');
