<template>
    <v-alert type="error" v-for="(values, fieldName) in errors" :key="fieldName">
        <div class="title">{{fieldName}}</div>
        <template v-for="(value, i) in values" :key="i">
            {{value}}
        </template>
    </v-alert>
</template>

<script>
    export default {
        props: ['errors']
    }
</script>
