export const USER_INI = 'USER_INI';
export const USER_CHANGE_REQUEST_STATUS = 'USER_CHANGE_REQUEST_STATUS';
export const USER_REQUEST_STATUS = 'USER_REQUEST_STATUS';
export const USER_LOGOUT = 'USER_LOGOUT';
export const USER_DATA = 'USER_DATA';
export const USER_AUTH = 'USER_AUTH';

export const user = {
    state: {
        user: null,
        requestStatus: 1
    },
    mutations: {
        [USER_INI]: (state, data) => {
            state.user = data;
        },
        [USER_CHANGE_REQUEST_STATUS]: (state, value) => {
            state.requestStatus = value;
        },
        [USER_LOGOUT]: (state, data) => {
            state.user = null;
        }
    },
    getters: {
        [USER_DATA]: state => {
            return state.user;
        },
        [USER_REQUEST_STATUS]: state => {
            return state.requestStatus;
        },
    },
    actions: {
        [USER_AUTH]: async (context) => {
            context.commit(USER_CHANGE_REQUEST_STATUS, 1);
            return await axios.post('auth')
                .then(result => {
                    context.commit(USER_CHANGE_REQUEST_STATUS, 0);
                    context.commit(USER_INI, result.data);
                    return result.data;
                })
                .catch(errors => {
                    context.commit(USER_CHANGE_REQUEST_STATUS, 0);
                    alert('Ошибка сервера! Перезагрузите страницу.');
                })
        },
        [USER_LOGOUT]: (context, router) => {
            context.commit(USER_INI, null);
            router.push({name: 'home'});
            axios.post('logout').catch(errors => {
                alert('Ошибка сервера! Вам не удалось выйти из системы. Перезагрузите страницу.');
            })
        }
    }
}
