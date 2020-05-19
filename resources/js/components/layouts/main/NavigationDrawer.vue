<template>
    <v-navigation-drawer v-model="showMenu" app>
        <v-list dense>
            <navigation-item nameRoute="home" icon="mdi-home" text="Главная"/>
            <template v-if = "user">

            </template>
            <template v-else>
                <navigation-item nameRoute="authorization" icon="mdi-account" text="Вход"/>
                <navigation-item nameRoute="registration" icon="mdi-account-plus" text="Регистрация"/>
            </template>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
    import NavigationItem from "./NavigationItem";
    import {mapGetters} from "vuex";
    import {USER_DATA} from "../../../store/modules/user";

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
        computed: {
            ...mapGetters({
                user: USER_DATA
            })
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
