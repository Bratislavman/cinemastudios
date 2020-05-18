<template>
    <main :field="field">
        <v-text-field
            :label="field.label"
            :name="field.label"
            :prepend-icon="field.icon"
            :type="field.type"

            @input="validator"
        />
    </main>
</template>

<script>
    import Main from "./Main";

    export default {
        props: ['field', 'validator'],
        components: {Main},
    }
</script>
