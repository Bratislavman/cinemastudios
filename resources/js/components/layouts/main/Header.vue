<template>
    <v-app-bar app color="indigo" dark>
        <v-app-bar-nav-icon @click="$parent.changeShowMenu"></v-app-bar-nav-icon>
        <v-toolbar-title>
            Кино и студии!
            <template v-if="user">
                |
                Пользователь: {{ user.name }}
                <v-btn small color="primary" @click="logout">Выход</v-btn>
            </template>
        </v-toolbar-title>
    </v-app-bar>
</template>

<script>
    import {USER_DATA, USER_LOGOUT} from "../../../store/modules/user";
    import {mapGetters, mapActions} from "vuex";

    export default {
        computed: {
            ...mapGetters({
                user: USER_DATA
            })
        },
        methods: {
            ...mapActions({
                logout: USER_LOGOUT
            })
        }
    }
</script>
