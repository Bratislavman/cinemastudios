<template>
    <span>
        <router-view/>
        <errors v-if="errorsIsset" :errors="errorsValues"/>
    </span>
</template>

<script>
    import Errors from "../Errors";

    export default {
        props: ['field'],
        components: {Errors},
        computed: {
            errorsValues: function () {
                return Object.values(this.field.frontendErrors).concat([...this.field.backendErrors])
            },
            errorsIsset: function () {
                return Object.keys(this.field.frontendErrors).length > 0 || this.field.backendErrors.length > 0
            },
        }
    }
</script>
