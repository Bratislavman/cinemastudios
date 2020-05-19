export function axiosSimpleRequest($this, url, resultFunction, data = null, updateState = true) {
    $this.requestStatus = 0;
    axios.post(url, data)
        .then(result => {
            $this.requestStatus = 1;
            if (updateState) resultFunction($this,result);
        })
        .catch(errors => {
            $this.requestStatus = 1;
            if (errors.response.data.errors) {
                let str = '';
                for (let field in errors.response.data.errors) {
                    errors.response.data.errors[field].forEach((error) => {
                        str += error + '\n';
                    });
                }
                alert(str);
            } else alert('Ошибка сервера! Перезагрузите страницу.');
        })
}
