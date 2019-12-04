import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        menuActual: [
            {
                nombre:'Personal',
                icon:'user'
            }
        ],
        menuCreatePersonal: [
            {
                nombre:'Personal',
                icon:'user'
            }
            ,{
                nombre:'Crear Persona',
                icon:'user'
            }
        ],
        menu:[]
    },
    mutations: {
        breadcrumb(state) {
            state.menu = '';
        },
        menuActual(state) {
            this.menuActual = [
                {
                    nombre: 'Personal',
                    icon: 'user'
                }
                , {
                    nombre: 'Crear Persona',
                    icon: 'user'
                }
            ]
        }
    },
    actions: {
        menuActual(state) {
            this.menuActual = [
                {
                    nombre: 'Personal',
                    icon: 'user'
                }
                , {
                    nombre: 'Crear Persona',
                    icon: 'user'
                }
            ]
        }
    },
    modules: {
    }
})
