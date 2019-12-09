<template>
    <div>
        <bread-crum-vue></bread-crum-vue>
        <br /><br />
        <a-button type="primary" icon="user-add" @click="$router.push({name: 'createPersonal', params: {id: 0}})">Crear Usuario</a-button>
        <br /><br />
        <a-table :columns="columns" :dataSource="data" :scroll="{ x: 750, y: 300 }" rowKey="id" >
            <slot slot="action" slot-scope="text">
                <a-tag color="orange" @click="edit(text.id)">Editar</a-tag>
                <a-tag color="blue"  @click="showDrawer(text.id)">Ver</a-tag>
            </slot>
            <slot slot="ppto" slot-scope="text">
                <a-select defaultValue="1" style="width: 120px" @change="handleChange">
                    <a-icon slot="suffixIcon" type="smile" />
                    <a-select-option value="1">Ver</a-select-option>
                    <a-select-option value="2">Registrar</a-select-option>
                </a-select>
            </slot>
        </a-table>
        <a-drawer width="640" placement="right" :closable="false" @close="onClose" :visible="visible">
            <data-personal :title="person" ></data-personal>
        </a-drawer>
    </div>
</template>
<script>
    const columns = [
        { title: 'Nombres', width: 150, dataIndex: 'nombres', key: '1', fixed: 'left' },
        { title: 'Apellidos', dataIndex: 'apellidos', key: '2',width: 150},
        { title: 'Tipo Documento', dataIndex: 'tipo_documento.nombre', key: '3',width: 100 },
        { title: 'Nº Documento', dataIndex: 'numero_documento', key: '4', width: 130 },
        { title: 'Telefono', dataIndex: 'telefono', key: '5',width: 130 },
        { title: 'Cargo', dataIndex: 'tipo_cargo.nombre', key: '6',width: 110},
        {
            title: 'Acción',
            key: 'operation',
            fixed: 'right',
            width: 150,
            scopedSlots: { customRender: 'action' },
        },
        {
            title: 'PPT Ventas',
            key: 'operation2',
            fixed: 'right',
            width: 150,
            scopedSlots: { customRender: 'ppto' },
        },
    ];
    const data = [];
    import BreadCrumVue from '../tools/BreadCrumVue.vue'
    import Vuex from 'vuex'
    import  { mapState} from 'vuex'
    import descriptionItem from './descriptionItem';
    Vue.use(Vuex)
    import store from '../../store/index.js'
    import DataPersonal from './DataPersonal.vue'
    export default {
        created(){
            axios.get('personal').then(
                res => {
                    this.data = res.data
                    console.log('info',this.data);
                }
            )
        },
        data() {
            return {
                data,
                columns,
                visible: false,
                pStyle: {
                    fontSize: '16px',
                    color: 'rgba(0,0,0,0.85)',
                    lineHeight: '24px',
                    display: 'block',
                    marginBottom: '16px',
                },
                pStyle2: {
                    marginBottom: '24px',
                },
                person:{
                    nombres:"cristian"
                }
            };
        },
        store:store,
        components:{
            BreadCrumVue,
            descriptionItem,
            DataPersonal
        },
        computed:{
            ...mapState([
                'menuActual'
            ])
        },
        methods:{
            edit(key){
                this.$router.push({name: 'createPersonal', params: {id: key}})
            },
            showDrawer(id) {
                console.log(id);
                var myId = id;
                axios.get(`/persona/${myId}`).then(
                    res => {
                        console.log('res.data',res.data);
                         this.person = res.data
                        this.visible = true;
                    }
                )

            },
            onClose() {
                this.visible = false;
            },
            handleChange(value) {
                console.log(`selected ${value}`);
            },
        }

    };
</script>