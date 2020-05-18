export const user = {
    state: {
        user: null
    },
    mutations: {
        AUTH: (state, data) => {
            state.user = data;
        },
        LOGOUT: (state, data) => {
            state.user = null;
        }
    },
    getters: {
        user: state => {
            return state.user;
        }
    }
}
