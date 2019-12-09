window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
//component:require('./components/ContentLayout.vue').default
//component:require('./views/CreatePersonal').default
export default new VueRouter({
    //routes // short for `routes: routes`
    mode:'history',//evitar #/
    base: process.env.BASE_URL,
    routes:  [
        {
            path: '/',
            name:'home',
            component: () => import(/* webpackChunkName: "about" */ './components/ContentLayout.vue')
            
        },
        {
            path: '/createPersonal/:id',
            name:'createPersonal',
            component: () => import(/* webpackChunkName: "about" */ './views/CreatePersonal.vue')
            
        },
        {
            path: '/editPersonal:id',
            name:'editPersonal',
            component: () => import(/* webpackChunkName: "about" */ './views/CreatePersonal.vue')

        },
        {
            path: '/potentialCustomers',
            name:'potentialCustomers',
            component: () => import(/* webpackChunkName: "about" */ './views/PotentialCustomers.vue')

        },
    ]
})