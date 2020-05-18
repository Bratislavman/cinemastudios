<template>
    <div>
        <v-alert type="error" v-for="(value, fieldName) in errors" :key="fieldName">
            <span :key="index">{{value}}</span>
        </v-alert>
    </div>
</template>

<script>
    export default {
        props: ['errors']
    }
</script>
