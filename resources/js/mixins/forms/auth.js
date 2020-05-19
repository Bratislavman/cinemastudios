import OneColumnTemplate from "../../components/layouts/main/OneColumnTemplate";
import {mixin as mixinForm} from "./form";
import {USER_INI} from "../../store/modules/user";

export const mixin = {
    data() {
        return {
            url: 'login',
            form: {
                email: this.createField('Почта', 'email', 'mdi-email'),
                password: this.createField('Пароль', 'password', 'mdi-lock', 'password')
            }
        }
    },

    mixins: [mixinForm],

    components: {
        OneColumnTemplate
    },

    methods: {
        createField(label, name, icon, type = 'text', value = '') {
            return {
                value,
                frontendErrors: {},
                backendErrors: [],
                label,
                name,
                icon,
                type
            }
        },

        successFunction(result) {
            this.$store.commit(USER_INI, result.data);
            this.$router.push({name: 'home'});
        },

        validateFieldRequired(field) {
            this.frontendError(field, 'required', 'Поле обязательно', () => field.value === '');
        },
        validateFieldEmail(field) {
            this.frontendError(field, 'email', 'Почта невалидна', () => {
                const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return pattern.test(field.value) === false;
            });
        },
        validateTextFieldMaxLength(field, max = 20) {
            this.frontendError(field, 'maxSymbol', `Максимум ${max} символов`, () => field.value.length > max);
        },
        validateTextFieldMinLength(field, min = 6) {
            this.frontendError(field, 'minSymbol', `Минимум ${min} символов`, () => field.value.length < min);
        },

        validatorEmail(value) {
            let field = {...this.form.email};
            field.value = value;
            this.validateFieldRequired(field);
            this.validateTextFieldMaxLength(field);
            this.validateFieldEmail(field);
            this.form.email = field;
        },
        validatorPassword(value) {
            let field = {...this.form.password};
            field.value = value;
            this.validateFieldRequired(field);
            this.validateTextFieldMaxLength(field);
            this.validateTextFieldMinLength(field);
            this.form.password = field;
        },
        validatorForm() {
            this.validatorEmail(this.form.email.value);
            this.validatorPassword(this.form.password.value);
        }
    },
}
