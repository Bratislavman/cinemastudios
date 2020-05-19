<template>
    <v-list-item @click="redirectObj(nameRoute, routeParams)">
        <v-list-item-action>
            <v-icon>{{ icon }}</v-icon>
        </v-list-item-action>
        <v-list-item-content>
            <v-list-item-title>{{ text }}</v-list-item-title>
        </v-list-item-content>
    </v-list-item>
</template>

<script>
    export default {
        props: {
            nameRoute: {
                type: String,
                required: true,
            },
            icon: {
                type: String,
                required: true,
            },
            text: {
                type: String,
                required: true
            },
            routeParams: {
                type: Object,
                default: null,
            }
        },
        inject: ['redirectObj']
    }
</script>
