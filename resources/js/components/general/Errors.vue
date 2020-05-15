<template>
    <div>
        <v-alert type="error" v-for="(values, fieldName) in errors" :key="fieldName">
            <div class="title">{{fieldName}}</div>
            <template v-for="(value, index) in values">
                <span :key="index">{{value}}</span>
            </template>
        </v-alert>
    </div>
</template>

<script>
    export default {
        props: ['errors']
    }
</script>
