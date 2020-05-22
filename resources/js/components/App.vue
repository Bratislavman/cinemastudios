<template>
    <v-sheet color="grey lighten-3" class="pa-12">
        <waiter v-if="requestStatus === 1"/>
        <router-view v-else/>

        <input placeholder="name" v-model = "form.name" name="name" value = "Name">
        <v-file-input v-model = "form.logo"></v-file-input>
        <input placeholder="created_year"  v-model = "form.created_year" name="created_year" >
        <input placeholder="closed_year"  v-model = "form.closed_year" name="closed_year" >
        <input placeholder="country_id"  v-model = "form.closed_year" name="closed_year" >

        <div @click="form1">vvv111</div>
    </v-sheet>
</template>

<script>
    import Waiter from "./general/Waiter";
    import Errors from "./general/Errors";
    import {USER_INI, USER_REQUEST_STATUS} from "../store/modules/user";
    import {mapGetters} from 'vuex';

    export default {
        data() {
            return {
                url: 'login',
                form: {
                    name: 'Name',
                    logo: null,
                    created_year: 1992,
                    closed_year: 1993,
                    country_id: 1,
                }
            }
        },
        components: {
            Waiter,
            Errors
        },
        computed: {
            ...mapGetters({
                requestStatus: USER_REQUEST_STATUS
            })
        },
        methods: {
            form1() {
                var $this = this;
                const formData = new FormData();
                formData.append('name',  $this.form.name);
                formData.append('logo',  $this.form.logo);
                formData.append('created_year', $this.form.created_year);
                formData.append('closed_year', $this.form.closed_year);
                formData.append('country_id', $this.form.country_id);

                axios.post('studios/create',  formData)
                    .then(result => {
                        console.log(result, 'result');
                    })
                    .catch(errors => {
                        console.log(errors.response.data.errors, 'errors.response.data.errors');
                    })
            }
        },
    }
</script>
