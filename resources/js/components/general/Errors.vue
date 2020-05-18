<template>
    <div>
        <v-alert type="error" v-for="(value, i) in errors" :key="i">
            <span :key="index">{{value}}</span>
        </v-alert>
    </div>
</template>

<script>
    export default {
        props: ['errors']
    }
</script>
