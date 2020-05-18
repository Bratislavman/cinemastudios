<template>
    <div>
        <v-text-field
            :label="field.label"
            :name="field.label"
            :prepend-icon="field.icon"
            :type="field.type"
            @input="field.actionFunction"
        />
        <errors v-if="field.errors.length > 0" :type="field.errors"/>
    </div>
</template>

<script>
    import Errors from "../Errors";

    export default {
        components: {Errors},
        props: ['field']
    }
</script>
