<template>
    <v-app-bar
        app
        color="indigo"
        dark
    >
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
    export default {
        computed: {
            user: function () {
                return this.$store.getters.user
            },
        },
        methods: {
            logout() {
                this.$store.commit('LOGOUT');
                this.$router.push({name: 'home'});
                axios.post('logout').catch(errors => {
                        alert('Ошибка сервера! Вам не удалось выйти из системы. Перезагруите страницу.');
                })
            }
        }
    }
</script>
