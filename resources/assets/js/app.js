
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap.js';
import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes';
import ModalDialog from './components/ModalDialog';
import LoginForm from './components/login/LoginForm';
import LoginDialog from './components/login/LoginDialog';
import UserLoginNav from './components/login/UserLoginNav';

window.Vue = Vue;
Vue.use(VueRouter);

window.Event = new Vue();

Vue.component('ModalDialog', ModalDialog);
Vue.component('LoginForm', LoginForm);
Vue.component('LoginDialog', LoginDialog);
Vue.component('UserLoginNav', UserLoginNav);

new Vue({
    el: '#app',

    router
});
