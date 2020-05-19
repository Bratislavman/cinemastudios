<template>
    <v-navigation-drawer v-model="showMenu" app>
        <v-list dense>
            <navigation-item nameRoute="authorization" icon="mdi-account" text="Вход"/>
            <navigation-item nameRoute="home" icon="mdi-home" text="Главная"/>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
    import NavigationItem from "./NavigationItem";

    export default {
        props: [
            'showMenu'
        ],
        methods: {
            redirectUrl: function (url) {
                this.$router.push(url);
            },
            redirectObj: function (name, params = null) {
                this.$router.push({name, params});
            },
        },
        components: {
            NavigationItem
        },
        provide: function () {
            return {
                redirectObj: this.redirectObj
            };
        },
    }
</script>
