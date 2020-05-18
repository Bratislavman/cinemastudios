export const mixin = {
    data() {
        return {
            url: '',
            form: {}
        }
    },

    methods: {
        request() {
            let errorsCheck = false;
            for (let fieldName in this.form) {
                if (errors.form[fieldName].frontentdErrors.length > 0) {
                    errorsCheck = true;
                    break
                }
            }
            if (errorsCheck == false) {
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

        successFunction() {

        },

        frontendError(nameField, nameErrorField, text, checkFunction) {
            if (checkFunction(this.form[nameField].frontendErrors[nameErrorField]))
                this.form[nameField].frontendErrors[nameErrorField] = text;
            else
                this.form[nameField].frontendErrors[nameErrorField] = '';
        }
    },
}
