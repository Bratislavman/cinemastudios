<template>
    <span>
        <slot/>
        <errors v-if="errorsIsset" :errors="errorsValues"/>
    </span>
</template>

<script>
    import Errors from "../Errors";
    import {fieldContainer} from "../../../mixins/forms/fieldContainer";

    export default {
        components: {Errors},
        mixins: [fieldContainer],
    }
</script>
