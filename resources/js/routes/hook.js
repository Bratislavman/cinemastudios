export function navigathionHook( router)  {
    router.beforeEach((to, from, next) => {
        //if (to.name !== 'Login' && !isAuthenticated) next({ name: 'Login' })
        console.log(to,'to');
        //else
            next()
    })
}


