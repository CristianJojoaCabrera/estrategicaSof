<template>
    <div>
        <a-breadcrumb>
            <a-breadcrumb-item href="">
                <a-icon type="home" />
            </a-breadcrumb-item>
            <a-breadcrumb-item v-for="bread of menuActual" href="" v-bind:data="bread"
                               v-bind:key="bread.nombre">
                <a-icon :type="bread.nombre" />
                <span>{{bread.nombre}}</span>
            </a-breadcrumb-item>
        </a-breadcrumb>
    </div>
</template>

<script>
    import  { mapState} from 'vuex'
    export default {
        name: "breadCrumVue"
        ,computed:{
            ...mapState([
                'menuActual'
            ])
        },
    }
</script>

<style scoped>

</style>