<template>
    <field-container :field="field">
        <v-text-field
            :label="field.label"
            :name="field.label"
            :prepend-icon="field.icon"
            :type="field.type"
            :error="errorsIsset"
            @input="validator"
        />
    </field-container>
</template>

<script>
    import {field} from "../../../mixins/forms/field";

    export default {
        mixins: [field]
    }
</script>
