export const fieldContainer = {
    props: ['field'],
    computed: {
        errorsValues: function () {
            let frontendErrors = Object.values(this.field.frontendErrors).filter(function (el) {
                return el != '';
            });
            return frontendErrors.concat([...this.field.backendErrors])
        },
        errorsIsset: function () {
            let frontendErrors = Object.values(this.field.frontendErrors).filter(function (el) {
                return el != '';
            });
            return frontendErrors.length > 0 || this.field.backendErrors.length > 0
        },
    }
}
