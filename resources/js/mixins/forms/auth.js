import OneColumnTemplate from "../../components/layouts/main/OneColumnTemplate";
import {mixin} from "./form";

export const mixin = {
    data: () => ({
        url: 'auth',
        form: {
            email: {
                value: '',
                frontendErrors: [],
                backendErrors: [],
                label: 'Почта',
                name: 'Email',
                icon: 'mdi-email',
                type: 'text',
                validate: function (value) {
                    this.validateFieldRequired('email');
                    this.validateTextFieldMaxLength('email');
                    this.validateFieldEmail();
                }
            },
            password: {
                value: '',
                frontendErrors: [],
                backendErrors: [],
                label: 'Пароль',
                name: 'Password',
                icon: 'mdi-lock',
                type: 'password',
                validate: function (value) {
                    this.validateFieldRequired('password');
                    this.validateTextFieldMaxLength('password');
                    this.validateTextFieldMinLength('password');
                }
            }
        }
    }),

    mixins: [mixin],

    components: {
        OneColumnTemplate
    },

    methods: {
        successFunction() {
            //redirect homepage
        },

        validateFieldRequired(nameField) {
            this.frontendError(nameField, 'required', 'Поле обязательно', () => value === '');
        },
        validateFieldEmail() {
            this.frontendError('email', 'email', 'Почта невалидна', () => {
                const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                return pattern.test(value) || 'Invalid e-mail.'
            });
        },
        validateTextFieldMaxLength(nameField, max = 20) {
            this.frontendError(nameField, 'maxSymbol', `Максимум ${max} символов`, () => value.length > max);
        },
        validateTextFieldMinLength(nameField, min = 6) {
            this.frontendError(nameField, 'minSymbol', `Минимум ${min} символов`, () => value.length < min);
        }
    },
}
