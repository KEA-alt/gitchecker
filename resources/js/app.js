/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Home from './components/HomeComponent.vue';
import Doc from './components/DocComponent.vue';
import Audit from './components/AuditComponent.vue';
import Donate from './components/DonateComponent.vue';
import Contact from './components/ContactComponent.vue';
import Politique from './components/PolitiqueComponent.vue';
import Conditions from './components/ConditionsComponent.vue';
import Report from './components/ReportComponent.vue';
import Error404 from './components/404Component.vue';

const routes = [{
        path: '/',
        component: Home
    },
    {
        path: '/documentation',
        component: Doc
    },
    {
        path: '/audit',
        component: Audit
    },
    {
        path: '/donate',
        component: Donate
    },
    {
        path: '/contact',
        component: Contact
    },
    {
        path: '/politique',
        component: Politique
    },
    {
        path: '/conditions',
        component: Conditions
    },
    {
        path: '/report/:reportId',
        component: Report
    },
    {
        path: '/error404',
        component: Error404
    },
    {
        path: '*',
        redirect: '/error404'
    }
]

const routeur = new VueRouter({
    routes
});

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: routeur
});
