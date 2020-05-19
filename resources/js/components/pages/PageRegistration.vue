<template>
    <one-column-template>
        <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
                <v-toolbar
                    color="primary"
                    dark
                    flat
                >
                    <v-toolbar-title>Регистрация</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
                    <v-form>
                        <field-input :field="form.name" :validator="validatorName"/>
                        <field-input :field="form.email" :validator="validatorEmail"/>
                        <field-input :field="form.password" :validator="validatorPassword"/>
                        <field-input :field="form.password_confirmation" :validator="validatorPasswordConfirm"/>
                    </v-form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer/>
                    <v-btn color="primary" @click="request">Отправить</v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
    </one-column-template>
</template>

<script>
    import FieldInput from "../general/Form/FieldInput";
    import {mixin} from "../../mixins/forms/auth";

    export default {
        mixins: [mixin],

        data() {
            return {
                url: 'register',
                form: {
                    name: this.createField('Имя', 'name', 'mdi-account'),
                    email: this.createField('Почта', 'email', 'mdi-email'),
                    password: this.createField('Пароль', 'password', 'mdi-lock', 'password'),
                    password_confirmation: this.createField('Повтор пароля', 'password_confirm', 'mdi-lock', 'password')
                }
            }
        },

        components: {FieldInput},

        methods: {
            validateFieldPasswordConfirm(fieldPassword, fieldPassword2) {
                this.frontendError(fieldPassword, 'passwordConfirm', 'Пароли не совпадают',
                    () => fieldPassword.value != fieldPassword2.value
                );
            },
            validatorName(value) {
                let field = {...this.form.name};
                field.value = value;
                this.validateFieldRequired(field);
                this.validateTextFieldMaxLength(field);
                this.validateTextFieldMinLength(field, 2);
                this.form.name = field;
            },
            validatorPassword(value) {
                let field = {...this.form.password};
                field.value = value;
                this.validateFieldRequired(field);
                this.validateTextFieldMaxLength(field);
                this.validateTextFieldMinLength(field);
                this.validateFieldPasswordConfirm(field, {...this.form.password_confirmation});
                this.form.password = field;

                let field2 = {...this.form.password_confirmation};
                this.validateFieldPasswordConfirm(field2, field);
                this.form.password_confirmation = field2;
            },
            validatorPasswordConfirm(value) {
                let field = {...this.form.password_confirmation};
                field.value = value;
                this.validateFieldRequired(field);
                this.validateTextFieldMaxLength(field);
                this.validateTextFieldMinLength(field);
                this.validateFieldPasswordConfirm(field, {...this.form.password});
                this.form.password_confirmation = field;

                let field2 = {...this.form.password};
                this.validateFieldPasswordConfirm(field2, field);
                this.form.password = field2;
            },
            validatorForm() {
                this.validatorName(this.form.name.value);
                this.validatorEmail(this.form.email.value);
                this.validatorPassword(this.form.password.value);
                this.validatorPasswordConfirm(this.form.password_confirmation.value);
            }
        }
    }
</script>
