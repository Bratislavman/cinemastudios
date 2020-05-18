export const mixin = {
    data() {
        return {
            url: '',
            form: {}
        }
    },

    methods: {
        request() {
            this.validatorForm();
            let pushAllowed = true;
            try {
                for (let fieldName in this.form) {
                    for (let errorFieldName in this.form[fieldName]) {
                        if (this.form[fieldName][errorFieldName] !== '')  {
                            pushAllowed = false;
                            throw 'break';
                        }
                    };
                }
            } catch (e) {
            }
            if (pushAllowed) {
                for (let fieldName in this.form) {
                    errors.form[fieldName].backendErrors = [];
                    errors.form[fieldName].frontendErrors = {};
                }
                let $this = this;
                axios.post($this.url, {form: $this.form})
                    .then(result => {
                        $this.successFunction();
                    })
                    .catch(errors => {
                        if (errors.response.data.errors) {
                            for (let fieldName in errors.response.data.errors) {
                                errors.form[fieldName].backendErrors = [...errors.response.data.errors[fieldName]];
                            }
                        } else alert('Произошла ошибка сервера!');
                    })
            }
        },

        validatorForm() {

        },

        successFunction() {

        },

        frontendError(field, nameErrorField, text, checkFunction) {
            if (checkFunction())
                field.frontendErrors[nameErrorField] = text;
            else
                field.frontendErrors[nameErrorField] = '';
        }
    },
}
