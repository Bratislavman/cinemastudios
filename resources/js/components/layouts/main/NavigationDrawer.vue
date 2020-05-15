<template>
    <v-navigation-drawer
        v-model="showMenu"
        app
    >
        <v-list dense>
            <v-list-item @click="redirectObj('profile-page' , {id: $store.state.user.id})">
                <v-list-item-action>
                    <v-icon>mdi-account</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                    <v-list-item-title>Профиль</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item @click="redirectObj('profile-list-page')">
                <v-list-item-action>
                    <v-icon>mdi-account-multiple</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                    <v-list-item-title>Пользователи</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
    export default {
        props: [
            'showMenu'
        ],
        methods: {
            redirectUrl: function (url) {
                this.$router.push(url)
            },
            redirectObj: function (name, params) {
                this.$router.push({name, params})
            },
        }
    }
</script>
