require('./bootstrap');
window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('master', require('./components/Master.vue').default);
import Vue from 'vue'
import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';
import router from './router';
import store from './store'

Vue.config.productionTip = false
Vue.use(Antd);

const app = new Vue({
    el: '#app',
    router,
    store,
    //el:'#app2',
    data() {
        return {
            titulo1: 'hola mundo vue'
        }
    }
}).$mount('#app');
