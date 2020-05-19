import {USER_AUTH} from "../store/modules/user";

export function navigathionHook(router, store) {
    router.beforeEach((to, from, next) => {
        //first redirect app
        if (from.fullPath == '/' && from.name == null) {
            store.dispatch(USER_AUTH).then((user) => {
                switch (to.name) {
                    case  'authorization':
                        if (user) next({name: 'home'});
                        break;
                }
            });
        }
        next();
    })
}

