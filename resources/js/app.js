/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('master', require('./components/Master.vue').default);
//Vue.component('table-vue', require('./components/TableVue.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue'
import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';
import { DatePicker } from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';
import { Button } from 'ant-design-vue';
import VueRouter from 'vue-router'
Vue.use(Button);
Vue.use(DatePicker);
Vue.config.productionTip = false
Vue.use(Antd);
Vue.use(VueRouter)


// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    //routes // short for `routes: routes`
    mode:'history',
    routes:  [
        {
            path: '/',
            name:'home',
            component:require('./components/ContentLayout.vue').default
        },
        {
            path: '/createPersonal',
            name:'createPersonal',
            component:require('./views/CreatePersonal').default
        }
        ]
})

// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.

const app = new Vue({
    el: '#app',
    router,
    //el:'#app2',
    data() {
        return {
            titulo1: 'hola mundo vue'
        }
    }
}).$mount('#app');
