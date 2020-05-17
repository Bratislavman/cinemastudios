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
                        <v-text-field
                            label="Почта"
                            name="Email"
                            prepend-icon="mdi-email"
                            type="text"
                        />
                        <v-text-field
                            label="Пароль"
                            name="password"
                            prepend-icon="mdi-lock"
                            type="password"
                        />
                    </v-form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer/>
                    <v-btn color="primary">Войти</v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
    </one-column-template>
</template>

<script>
    import {mixin} from "../../mixins/forms/auth";

    export default {
        mixins: [mixin],
    }
</script>
