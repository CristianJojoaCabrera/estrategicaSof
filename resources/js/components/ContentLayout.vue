<template>
    <div>
        <personal-listing></personal-listing>
    </div>
</template>

<script>
    import PersonalListing from './Personal/PersonalListing.vue'
    export default {
        data() {
            return {
                collapsed: false,
            };
        },
        components:{
            PersonalListing
        }
    }
</script>

<style scoped>

</style>