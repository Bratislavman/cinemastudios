<template>
    <v-sheet color="grey lighten-3" class="pa-12">
        <waiter v-if="requestStatus === 1"/>
        <router-view v-else/>
    </v-sheet>
</template>

<script>
    import Waiter from "./general/Waiter";
    import Errors from "./general/Errors";

    export default {
        data: function () {
            return {
                requestStatus: 1
            }
        },
        components: {
            Waiter,
            Errors
        },
        mounted: function () {
            let $this = this;
            axios.post('auth')
                .then(result => {
                    $this.requestStatus = 0;
                    $this.$store.commit('AUTH', result.data);
                })
                .catch(errors => {
                    alert('Ошибка сервера! Перезагрузите страницу.');
                })
        }
    }
</script>
