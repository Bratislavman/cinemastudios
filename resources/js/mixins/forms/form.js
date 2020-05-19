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
                for (let fieldName in this.form)
                    for (let errorFieldName in this.form[fieldName].frontendErrors)
                        if (this.form[fieldName].frontendErrors[errorFieldName] !== '') throw 'break';

            } catch (e) {
                pushAllowed = false;
            }
            if (pushAllowed) {
                let data = {};
                for (let fieldName in this.form) {
                    this.form[fieldName].backendErrors = [];
                    this.form[fieldName].frontendErrors = {};
                    data[fieldName] = this.form[fieldName].value;
                }
                let $this = this;
                axios.post($this.url, data)
                    .then(result => {
                        $this.successFunction(result);
                    })
                    .catch(errors => {
                        if (errors.response.data.errors) {
                            for (let fieldName in errors.response.data.errors) {
                                $this.form[fieldName].backendErrors = [...errors.response.data.errors[fieldName]];
                            }
                        } else alert('Произошла ошибка сервера!');
                    })
            }
        },

        validatorForm() {

        },

        successFunction(result) {

        },

        frontendError(field, nameErrorField, text, checkFunction) {
            if (checkFunction())
                field.frontendErrors[nameErrorField] = text;
            else
                field.frontendErrors[nameErrorField] = '';
        }
    },
}
