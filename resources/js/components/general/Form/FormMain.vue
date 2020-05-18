<template>
    <span>
        <slot/>
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
                let frontendErrors = Object.values(this.field.frontendErrors).filter(function (el) {
                    return el != '';
                });
                return frontendErrors.concat([...this.field.backendErrors])
            },
            errorsIsset: function () {
                let frontendErrors = Object.values(this.field.frontendErrors).filter(function (el) {
                    return el != '';
                });
                return frontendErrors.length > 0 || this.field.backendErrors.length > 0
            },
        }
    }
</script>
