<template>
    <form-main :field="field">
        <v-text-field
            :label="field.label"
            :name="field.label"
            :prepend-icon="field.icon"
            :type="field.type"
            @input="validator"
        />
    </form-main>
</template>

<script>
    import FormMain from "./FormMain";

    export default {
        props: ['field', 'validator'],
        components: {FormMain},
    }
</script>
