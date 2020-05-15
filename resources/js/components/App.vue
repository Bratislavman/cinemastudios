<template>
    <div>
        <waiter v-if="requestStatus === 0"/>
        <v-sheet v-else-if="requestStatus === 1" color="grey lighten-3" class="pa-12">
            <v-sheet class="pa-12">
                <router-link :to="{name: 'fields-groups'}">Группы полей</router-link>
                <router-link :to="{name: 'fields'}">Поля</router-link>
                <router-link :to="{name: 'providers'}">Поставщики</router-link>
            </v-sheet>
            <router-view/>
        </v-sheet>
        <errors v-else-if="requestStatus === 2" :errors="errors"/>
    </div>
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
