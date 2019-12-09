<template>
    <div>
        <bread-crum-vue></bread-crum-vue>
        <br /><br />
        <a-button type="primary" icon="user-add">Cliente Potencial</a-button>
        <br /><br />
        <a-table :columns="columns" :dataSource="data" :scroll="{ x: 750, y: 300 }" rowKey="id" >
            <slot slot="action" slot-scope="text">
                <a-tag color="orange" @click="showDrawer(text.id)">Agregar Contacto</a-tag>
            </slot>
        </a-table>
        <a-drawer
                title="Create a new account"
                :width="720"
                @close="onClose"
                :visible="visible"
                :wrapStyle="{height: 'calc(100% - 108px)',overflow: 'auto',paddingBottom: '108px'}"
        >
            <a-form :form="form" layout="vertical" hideRequiredMark>
                <a-row :gutter="16">
                    <a-col :span="12">
                        <a-form-item label="Name">
                            <a-input
                                    v-decorator="['name', {
                  rules: [{ required: true, message: 'Please enter user name' }]
                }]"
                                    placeholder="Please enter user name"
                            />
                        </a-form-item>
                    </a-col>
                    <a-col :span="12">
                        <a-form-item label="Url">
                            <a-input
                                    v-decorator="['url', {
                  rules: [{ required: true, message: 'please enter url' }]
                }]"
                                    style="width: 100%"
                                    addonBefore="http://"
                                    addonAfter=".com"
                                    placeholder="please enter url"
                            />
                        </a-form-item>
                    </a-col>
                </a-row>
                <a-row :gutter="16">
                    <a-col :span="12">
                        <a-form-item label="Owner">
                            <a-select
                                    v-decorator="['owner', {
                  rules: [{ required: true, message: 'Please select an owner' }]
                }]"
                                    placeholder="Please a-s an owner"
                            >
                                <a-select-option value="xiao">Xiaoxiao Fu</a-select-option>
                                <a-select-option value="mao">Maomao Zhou</a-select-option>
                            </a-select>
                        </a-form-item>
                    </a-col>
                    <a-col :span="12">
                        <a-form-item label="Type">
                            <a-select
                                    v-decorator="['type', {
                  rules: [{ required: true, message: 'Please choose the type' }]
                }]"
                                    placeholder="Please choose the type"
                            >
                                <a-select-option value="private">Private</a-select-option>
                                <a-select-option value="public">Public</a-select-option>
                            </a-select>
                        </a-form-item>
                    </a-col>
                </a-row>
                <a-row :gutter="16">
                    <a-col :span="12">
                        <a-form-item label="Approver">
                            <a-select
                                    v-decorator="['approver', {
                  rules: [{ required: true, message: 'Please choose the approver' }]
                }]"
                                    placeholder="Please choose the approver"
                            >
                                <a-select-option value="jack">Jack Ma</a-select-option>
                                <a-select-option value="tom">Tom Liu</a-select-option>
                            </a-select>
                        </a-form-item>
                    </a-col>
                    <a-col :span="12">
                        <a-form-item label="DateTime">
                            <a-date-picker
                                    v-decorator="['dateTime', {
                  rules: [{ required: true, message: 'Please choose the dateTime' }]
                }]"
                                    style="width: 100%"
                                    :getPopupContainer="trigger => trigger.parentNode"
                            />
                        </a-form-item>
                    </a-col>
                </a-row>
                <a-row :gutter="16">
                    <a-col :span="24">
                        <a-form-item label="Description">
                            <a-textarea
                                    v-decorator="['description', {
                  rules: [{ required: true, message: 'Please enter url description' }]
                }]"
                                    :rows="4"
                                    placeholder="please enter url description"
                            />
                        </a-form-item>
                    </a-col>
                </a-row>
            </a-form>
            <div
                    :style="{
          position: 'absolute',
          left: 0,
          bottom: 0,
          width: '100%',
          borderTop: '1px solid #e9e9e9',
          padding: '10px 16px',
          background: '#fff',
          textAlign: 'right',
        }"
            >
                <a-button :style="{marginRight: '8px'}" @click="onClose">
                    Cancel
                </a-button>
                <a-button @click="onClose" type="primary">Submit</a-button>
            </div>
        </a-drawer>
    </div>

</template>
<script>
    const columns = [
        { title: 'Ciudad', width: 150, dataIndex: 'ciudad', key: '1', fixed: 'left' },
        { title: 'Razon Social', dataIndex: 'razon_social', key: '2',width: 150},
        { title: 'NIT', dataIndex: 'nit', key: '3',width: 110 },
        { title: 'Dirección', dataIndex: 'direccion', key: '4', width: 140 },
        { title: 'Pagina Web', dataIndex: 'pagina_web', key: '5',width: 140 },
        { title: 'Tipo Sociedad', dataIndex: 'tipo_sociedad', key: '6',width: 120},
        {
            title: 'Acción',
            key: 'operation',
            fixed: 'right',
            width: 150,
            scopedSlots: { customRender: 'action' },
        },
    ];
    const data = [];
    import BreadCrumVue from '../components/tools/BreadCrumVue.vue'
    import Vuex from 'vuex'
    import  { mapState} from 'vuex'
    Vue.use(Vuex)
    const store = new Vuex.Store({
        state: {
            menuActual: [
                {
                    nombre:'Clientes Potenciales',
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
                form: this.$form.createForm(this),
                visible: false,
            };
        },
        created(){
            axios.get('potentialCustomers').then(
                res => {
                    this.data = res.data
                    console.log('info',this.data);
                }
            )
        },
        store:store,
        components:{
            BreadCrumVue
        },
        computed:{
            ...mapState([
                'menuActual'
            ])
        },
        methods: {
            showDrawer(id) {
                console.log(id);
                this.visible = true;
            },
            onClose() {
                this.visible = false;
            },
        }
    };
</script>

<style scoped>

</style>