<template>
    <div>
        <bread-crum-vue></bread-crum-vue>
        <br /><br />
        <a-button type="primary" icon="user-add" @click="$router.push('createPersonal')">Crear Usuario</a-button>
        <br /><br />
        <a-table :columns="columns" :dataSource="data" :scroll="{ x: 750, y: 300 }">
            <slot slot="action" slot-scope="text">
                <a-tag color="orange" @click="$router.push('createPersonal')">Editar</a-tag>
                <a-tag color="blue"  @click="showDrawer">Ver</a-tag>
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
            <p :style="[pStyle, pStyle2]">User Profile</p>
            <p :style="pStyle">Personal</p>
            <a-row>
                <a-col :span="12">
                    <description-item title="Full Name" content="Lily" />
                </a-col>
                <a-col :span="12">
                    <description-item title="Account" content="AntDesign@example.com" />
                </a-col>
            </a-row>
            <a-row>
                <a-col :span="12">
                    <description-item title="City" content="HangZhou" />
                </a-col>
                <a-col :span="12">
                    <description-item title="Country" content="China🇨🇳" />
                </a-col>
            </a-row>
            <a-row>
                <a-col :span="12">
                    <description-item title="Birthday" content="February 2,1900" />
                </a-col>
                <a-col :span="12">
                    <description-item title="Website" content="-" />
                </a-col>
            </a-row>
            <a-row>
                <a-col :span="12">
                    <description-item
                            title="Message"
                            content="Make things as simple as possible but no simpler."
                    />
                </a-col>
            </a-row>
            <a-divider />
            <p :style="pStyle">Company</p>
            <a-row>
                <a-col :span="12">
                    <description-item title="Position" content="Programmer" />
                </a-col>
                <a-col :span="12">
                    <description-item title="Responsibilities" content="Coding" />
                </a-col>
            </a-row>
            <a-row>
                <a-col :span="12">
                    <description-item title="Department" content="AFX" />
                </a-col>
                <a-col :span="12">
                    <description-item title="Supervisor">
                        <a slot="content">Lin</a>
                    </description-item>
                </a-col>
            </a-row>
            <a-row>
                <a-col :span="24">
                    <description-item
                            title="Skills"
                            content="C / C + +, data structures, software engineering, operating systems, computer networks, databases, compiler theory, computer architecture, Microcomputer Principle and Interface Technology, Computer English, Java, ASP, etc."
                    />
                </a-col>
            </a-row>
            <a-divider />
            <p :style="pStyle">Contacts</p>
            <a-row>
                <a-col :span="12">
                    <description-item title="Email" content="ant-design-vue@example.com" />
                </a-col>
                <a-col :span="12">
                    <description-item title="Phone Number" content="+86 181 0000 0000" />
                </a-col>
            </a-row>
            <a-row>
                <a-col :span="24">
                    <description-item title="Github">
                        <a slot="content" href="https://github.com/vueComponent/ant-design-vue">
                            github.com/vueComponent/ant-design-vue
                        </a>
                    </description-item>
                </a-col>
            </a-row>
        </a-drawer>
    </div>

</template>
<script>
    const columns = [
        { title: 'Nombres', width: 150, dataIndex: 'name', key: 'name', fixed: 'left' },
        { title: 'Apellidos', dataIndex: 'age', key: 'age',width: 150},
        { title: 'Tipo Documento', dataIndex: 'address', key: '1',width: 100 },
        { title: 'Nº Documento', dataIndex: 'address', key: '2', width: 100 },
        { title: 'Telefonos', dataIndex: 'address', key: '3',width: 100 },
        { title: 'Cargo', dataIndex: 'address', key: '4',width: 100  },
        {
            title: 'Acción',
            key: 'operation',
            fixed: 'right',
            width: 150,
            scopedSlots: { customRender: 'action' },
        },
        {
            title: 'PPT Ventas',
            key: 'operation',
            fixed: 'right',
            width: 150,
            scopedSlots: { customRender: 'ppto' },
        },
    ];

    const data = [];
    for (let i = 0; i < 100; i++) {
        data.push({
            key: i,
            name: `Edrward ${i}`,
            age: 32,
            address: `London Park no. ${i}`,
        });
    }
    import BreadCrumVue from '../tools/BreadCrumVue.vue'
    import Vuex from 'vuex'
    import  { mapState} from 'vuex'
    import descriptionItem from './descriptionItem';
    Vue.use(Vuex)
    const store = new Vuex.Store({
        state: {
            menuActual: [
                {
                    nombre:'Personal',
                    icon:'user'
                }
            ]
        },
        mutations: {
        }
    })
    export default {
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
            };
        },
        store:store,
        components:{
            BreadCrumVue,
            descriptionItem,
        },
        computed:{

            ...mapState([
                'menuActual'
            ])
        },
        methods:{
            edit(key){
                console.log('sdasd',key);
            },
            showDrawer() {
                this.visible = true;
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