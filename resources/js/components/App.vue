<template>
    <v-sheet color="grey lighten-3" class="pa-12">
        <waiter v-if="requestStatus === 1"/>
        <router-view v-else/>

        <errors v-else-if="errors.length > 0" :errors="errors"/>
    </v-sheet>
</template>

<script>
    import Waiter from "./general/Waiter";
    import Errors from "./general/Errors";
    import {axiosRequestForComponent} from "../helpers/general";

    export default {
        data: function () {
            return {
                requestStatus: 1,
                errors: [],
            }
        },
        components: {
            Waiter,
            Errors
        },
        mounted: function () {
            //axiosRequestForComponent(this, 'auth', null, 'AUTH', 'requestStatus', 'errors');
        }
    }
</script>
