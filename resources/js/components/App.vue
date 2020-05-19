<template>
    <v-sheet color="grey lighten-3" class="pa-12">
        <waiter v-if="requestStatus === 1"/>
        <router-view v-else/>
    </v-sheet>
</template>

<script>
    import Waiter from "./general/Waiter";
    import Errors from "./general/Errors";
    import {USER_REQUEST_STATUS} from "../store/modules/user";
    import {mapGetters} from 'vuex';

    export default {
        components: {
            Waiter,
            Errors
        },
        computed: {
            ...mapGetters({
                requestStatus: USER_REQUEST_STATUS
            })
        }
    }
</script>
