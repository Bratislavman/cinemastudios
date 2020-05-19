import {USER_AUTH} from "../store/modules/user";

export function navigathionHook(router, store) {
    router.beforeEach((to, from, next) => {
        //first redirect app
        if (from.fullPath == '/' && from.name == null) {
            store.dispatch(USER_AUTH).then((user) => {
                console.log(user, to.name);
                switch (to.name) {
                    case 'home':
                    case '404':
                        next();
                        break;
                    case  'authorization':
                        if (user) next({name: 'home'});
                        break;
                }
                next();
            });
        }
    })
}

