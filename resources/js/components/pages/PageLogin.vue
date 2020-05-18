<template>
    <one-column-template>
        <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
                <v-toolbar
                    color="primary"
                    dark
                    flat
                >
                    <v-toolbar-title>Вход</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
                    <v-form>
                        <form-input :field="form.email" :validator = "validatorEmail"/>
                        <form-input :field="form.password" :validator = "validatorPassword"/>
                    </v-form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer/>
                    <v-btn color="primary" @click="request">Войти</v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
    </one-column-template>
</template>

<script>
    import {mixin} from "../../mixins/forms/auth";
    import FormInput from "../general/Form/FormInput";

    export default {
        mixins: [mixin],
        components: {FormInput},
    }
</script>
