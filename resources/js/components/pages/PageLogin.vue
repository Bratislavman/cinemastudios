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
                        <input :field="form.email"/>
                        <input :field="form.password"/>
                    </v-form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer/>
                    <v-btn color="primary" @click="form.request">Войти</v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
    </one-column-template>
</template>

<script>
    import {mixin} from "../../mixins/forms/auth";
    import Input from "../general/Form/Input";

    export default {
        mixins: [mixin],
        components: {Input},
    }
</script>
