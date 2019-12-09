<template>
    <a-row type="flex" justify="start" :gutter="16">
        <p :style="[pStyle, pStyle2]">Perfil</p>
        <a-col :span="24">
            <p>{{title.nombres}} {{title.apellidos}}</p>
            <p>Cargo: {{title.tipo_cargo.nombre}}</p>
            <p>{{title.tipo_documento.nombre}} {{title.numero_documento}}</p>
            <p>{{title.telefono}} - {{title.celular}}</p>
            <p>Tipo de contrado: {{title.tipo_contrato.nombre}} - Nº Contrato:{{title.numero_contrato}} Salario: ${{title.salario}}</p>
        </a-col>
        <a-divider />
        <p :style="pStyle">Otros datos</p>
        <a-col :span="24">
            <p>Eps:{{title.eps}}</p>
            <p>Riesgo: {{title.riesgo}}</p>
            <p>Pensiones{{title.pensiones}}</p>
        </a-col>
        <a-divider />
    </a-row>
</template>

<script>
    export default {
        name: "DataPersonal",
        created(){

        },
        data() {
            return {
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
        props: ['title'],
    }
</script>

<style scoped>

</style>