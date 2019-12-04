<template>
    <div>
        <bread-crum-vue></bread-crum-vue>
        <br><br>
        <a-steps :current="current">
            <a-step v-for="item in steps" :key="item.title" :title="item.title" />
        </a-steps>
        <div class="">
            <div v-show="current == 0">
                <a-form :form="form1">
                    <a-row type="flex" justify="start" :gutter="16">
                        <a-col :span="12">
                            <a-form-item  label="Fecha de ingresos">
                                <a-date-picker v-decorator="[
                                          'fecha',
                                          { rules: [{ required: true, message: 'Campo obligatorio' }] },
                                        ]" style="width: 100%" @change="onChange" />
                            </a-form-item>
                        </a-col>
                        <a-col :span="12">
                            <a-form-item  label="Cargo">
                                <a-select
                                        showSearch
                                        placeholder="Seleccione un cargo"
                                        optionFilterProp="children"
                                        style="width: 100%"
                                        @focus="handleFocus"
                                        @blur="handleBlur"
                                        @change="handleChange"
                                        :filterOption="filterOption"
                                        v-decorator="[
                                          'cargo',
                                          { rules: [{ required: true, message: 'Campo obligatorio' }] },
                                        ]"
                                >
                                    <a-select-option value="1">Ejecutivo</a-select-option>
                                </a-select>
                            </a-form-item>
                        </a-col>
                    </a-row>
                    <a-row type="flex" justify="start" :gutter="16">
                        <a-col :span="12">
                            <a-form-item  label="Nombres">
                                <a-input
                                        v-decorator="[
                                                      'nombre',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                        <a-col :span="12">
                            <a-form-item  label="Apellidos">
                                <a-input
                                        v-decorator="[
                                                      'apellido',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                    </a-row>
                    <a-row type="flex" justify="start" :gutter="16">
                        <a-col :span="8">
                            <a-form-item  label="Tipo documento">
                                <a-select
                                        showSearch
                                        placeholder="Select a person"
                                        optionFilterProp="children"
                                        style="width: 100%"
                                        @focus="handleFocus"
                                        @blur="handleBlur"
                                        @change="handleChange"
                                        :filterOption="filterOption"
                                        v-decorator="[
                                          'tipodocumento',
                                          { rules: [{ required: true, message: 'Campo obligatorio' }] },
                                        ]"
                                >
                                    <a-select-option value="1">C.C</a-select-option>
                                    <a-select-option value="2">C.E</a-select-option>
                                    <a-select-option value="3">Nit</a-select-option>
                                </a-select>
                            </a-form-item>
                        </a-col>
                        <a-col :span="8">
                            <a-form-item  label="Nº de documento">
                                <a-input
                                        v-decorator="[
                                                      'documento',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                        <a-col :span="8">
                            <a-form-item  label="De">
                                <a-input
                                        v-decorator="[
                                                      'lugar',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                    </a-row>
                    <a-row type="flex" justify="start" :gutter="16">
                        <a-col :span="8">
                            <a-form-item  label="Dirección">
                                <a-input
                                        v-decorator="[
                                                      'direccion',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                        <a-col :span="8">
                            <a-form-item  label="Telefono">
                                <a-input
                                        v-decorator="[
                                                      'telefono',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                        <a-col :span="8">
                            <a-form-item  label="Celular">
                                <a-input
                                        v-decorator="[
                                                      'celular',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                    </a-row>
                </a-form>
            </div>
            <div v-show="current == 1">
                <a-form :form="form2">
                    <a-row type="flex" justify="start" :gutter="16">
                        <a-col :span="8">
                            <a-form-item  label="Eps">
                                <a-input
                                        v-decorator="[
                                                      'eps',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                        <a-col :span="8">
                            <a-form-item  label="Pesiones">
                                <a-input
                                        v-decorator="[
                                                      'pensiones',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                        <a-col :span="8">
                            <a-form-item  label="Cesantias">
                                <a-input
                                        v-decorator="[
                                                      'cesantias',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                    </a-row>
                    <a-row type="flex" justify="start" :gutter="16">
                        <a-col :span="8">
                            <a-form-item  label="Tipo de contrato">
                                <a-select
                                        showSearch
                                        placeholder="Selecione una opción"
                                        optionFilterProp="children"
                                        style="width: 100%"
                                        @focus="handleFocus"
                                        @blur="handleBlur"
                                        @change="handleChange"
                                        :filterOption="filterOption"
                                        v-decorator="[
                                          'tipocontrato',
                                          { rules: [{ required: true, message: 'Campo obligatorio' }] },
                                        ]"
                                >
                                    <a-select-option value="1">Termino fijo</a-select-option>
                                    <a-select-option value="2">Termino indefinido</a-select-option>
                                    <a-select-option value="3">Prestanción de servicios</a-select-option>
                                </a-select>
                            </a-form-item>
                        </a-col>
                        <a-col :span="8">
                            <a-form-item  label="Nº de contrato">
                                <a-input
                                        v-decorator="[
                                                      'contrato',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                        <a-col :span="8">
                            <a-form-item  label="Riesgo">
                                <a-input
                                        v-decorator="[
                                                      'riesgo',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                />
                            </a-form-item>
                        </a-col>
                    </a-row>
                    <a-row type="flex" justify="start" :gutter="16">
                            <a-col :span="8">
                                <a-form-item  label="Duración">
                                    <a-input-group compact>
                                        <a-select defaultValue="1">
                                            <a-select-option value="1">Año(s)</a-select-option>
                                            <a-select-option value="2">Mes(es)</a-select-option>
                                        </a-select>
                                        <a-input style="width:60%" v-decorator="[
                                                      'duracionText',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]" />
                                    </a-input-group>
                                </a-form-item>
                            </a-col>
                            <a-col :span="8">
                                <a-form-item  label="Salario basico">
                                    <a-input
                                            v-decorator="[
                                                      'salario',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                        ]"
                                    />
                                </a-form-item>
                            </a-col>
                            <a-col :span="4">
                                <a-form-item  label="Comisiones">
                                        <a-select
                                                showSearch
                                                placeholder="Selecione una opción"
                                                optionFilterProp="children"
                                                style="width: 100%"
                                                @focus="handleFocus"
                                                @blur="handleBlur"
                                                @change="handleChange"
                                                :filterOption="filterOption"
                                                v-decorator="[
                                                      'comision',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                            ]"
                                        >
                                            <a-select-option value="1">Si</a-select-option>
                                            <a-select-option value="2">No</a-select-option>

                                        </a-select>
                                </a-form-item>
                            </a-col>
                            <a-col :span="4">
                                <a-form-item  label="Ptto de venta">
                                    <a-select
                                            showSearch
                                            placeholder="Selecione una opción"
                                            optionFilterProp="children"
                                            style="width: 100%"
                                            @focus="handleFocus"
                                            @blur="handleBlur"
                                            @change="handleChange"
                                            :filterOption="filterOption"
                                            v-decorator="[
                                                      'ppto',
                                                      {
                                                        rules: [

                                                          {
                                                            required: true,
                                                            message: 'Campo Obligatorio',
                                                          },
                                                        ],
                                                      },
                                            ]"
                                    >
                                        <a-select-option value="1">Si</a-select-option>
                                        <a-select-option value="2">No</a-select-option>

                                    </a-select>
                                </a-form-item>
                            </a-col>
                    </a-row>
                    <a-row type="flex" justify="start" :gutter="16">
                        <a-col :span="24">
                            <a-form-item  label="Funciones">
                            <a-textarea
                                    placeholder="Funciones"
                                    :autosize="{ minRows: 2, maxRows: 6 }"
                            />

                        </a-form-item>
                        </a-col>
                    </a-row>
                </a-form>
            </div>
        </div>
        <div class="steps-action">
            <a-button v-if="current < steps.length - 1" type="primary" @click="next(current)">
                Siguiente
            </a-button>
            <a-button
                    v-if="current == steps.length - 1"
                    type="primary"
                    @click="next(current)"
            >
                Finalizar
            </a-button>
            <a-button v-if="current>0" style="margin-left: 8px" @click="prev">
                Anterior
            </a-button>
        </div>
    </div>
</template>
<script>
    import BreadCrumVue from '../components/tools/BreadCrumVue.vue'
    import Vuex from 'vuex'
    import  { mapState} from 'vuex'
    Vue.use(Vuex)
    const store = new Vuex.Store({
        state: {
            menuActual: [
                {
                    nombre:'Personal',
                    icon:'user'
                }
                ,{
                    nombre:'Crear Persona',
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
                current: 0,
                idPersona:this.$route.params.id,
                steps: [
                    {
                        title: 'Datos Personales',
                        content: 'First-content',
                    },
                    {
                        title: 'Otros',
                        content: 'Second-content',
                    },
                ],
                form1: this.$form.createForm(this, { name: 'coordinated' }),
                form2: this.$form.createForm(this, { name: 'coordinated2' }),
                datosPersonal:{}
            };
        },
        created(){
            if(this.idPersona != '0'){
                console.log('algo',this.idPersona);
                var myId = 1;
                axios.get(`/persona/${myId}`).then(
                    res => {
                        console.log('res.data',res.data);
                        let data = res.data
                        this.form1.setFieldsValue({
                            nombre:data.name,
                            cargo:data.position
                        })
                    }
                )
            }else{
                console.log('algo');

            }
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
            next(current) {
                let next = false
                if(current == 0){
                    this.form1.validateFields((err, values) => {
                        if (!err) {
                            console.log('Received values of form:1 ', values);
                            next = true;
                            this.datosPersonal = values
                            this.current++
                        }
                    });
                }else{
                    this.form2.validateFields((err, values) => {
                        if (!err) {
                            console.log('Received values of form:guardar los datos2 ', values);
                            Object.assign(this.datosPersonal, values);
                            this.guardaDatos()
                        }
                    });
                }


console.log('validaw',current,current == 0);
            },
            prev() {
                this.current--;
            },
            handleChange(value) {
                console.log(`selected ${value}`);
            },
            handleBlur() {
                console.log('blur');
            },
            handleFocus() {
                console.log('focus');
            },
            filterOption(input, option) {
                return (
                    option.componentOptions.children[0].text.toLowerCase().indexOf(input.toLowerCase()) >= 0
                );
            },
           guardaDatos(){
            console.log(this.datosPersonal,'datos a almacenar');
               axios.post(`/createPersonal`,this.datosPersonal)
                   .then(res => {
                       console.log('retorna pagina inicio');
                       this.$notification.open({
                           message: 'Correcto',
                           description:
                               'Se ha registrado un nuevo integrante',
                           duration: 2,
                       });
                       this.$router.push('/')
                   })
           },
            redirectRoute(){
                this.$router.push('/')
            },

            onChange(date, dateString) {
                console.log(date, dateString);
            },
        },
    };
</script>
<style scoped>
    .steps-content {
        margin-top: 16px;
        border: 1px dashed #e9e9e9;
        border-radius: 6px;
        background-color: #fafafa;
        min-height: 200px;
        text-align: center;
        padding-top: 80px;
    }

    .steps-action {
        margin-top: 18px;
    }
    .gutter-example >>> .ant-row > div {
        background: transparent;
        border: 0;
    }
</style>
