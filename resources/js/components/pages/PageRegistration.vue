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
                        <field-input :field="form.name" :validator="validatorName"/>
                        <field-input :field="form.email" :validator="validatorEmail"/>
                        <field-input :field="form.password" :validator="validatorPassword"/>
                        <field-input :field="form.password_confirm" :validator="validatorPasswordConfirm"/>
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
    import FieldInput from "../general/Form/FieldInput";
    import {mixin} from "../../mixins/forms/auth";

    export default {
        mixins: [mixin],

        data: () => ({
            url: 'register',
            form: {
                name: this.createField('Имя', 'Имя', 'mdi-account'),
                email: this.createField('Почта', 'Email', 'mdi-email'),
                password: this.createField('Пароль', 'Password', 'mdi-lock'),
                password_confirm: this.createField('Повтор пароля', 'Password', 'mdi-lock')
            }
        }),

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
                this.form.password = field;
            },
            validatorPassword(value) {
                let field = {...this.form.password};
                field.value = value;
                this.validateFieldRequired(field);
                this.validateTextFieldMaxLength(field);
                this.validateTextFieldMinLength(field);
                this.validateFieldPasswordConfirm(field, {...this.form.password_confirm});
                this.form.password = field;
            },
            validatorPasswordConfirm(value) {
                let field = {...this.form.password_confirm};
                field.value = value;
                this.validateFieldRequired(field);
                this.validateTextFieldMaxLength(field);
                this.validateTextFieldMinLength(field);
                this.validateFieldPasswordConfirm(field, {...this.form.password});
                this.form.password_confirm = field;
            },
            validatorForm() {
                this.validatorName(this.form.name.value);
                this.validatorEmail(this.form.email.value);
                this.validatorPassword(this.form.password.value);
                this.validatorPasswordConfirm(this.form.password_confirm.value);
            }
        }
    }
</script>
