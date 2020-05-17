import PageError404 from "../components/pages/PageError404";
import PageHome from "../components/pages/PageHome";
import PageLogin from "../components/pages/PageLogin";
import PageRegistration from "../components/pages/PageRegistration";

export const routes = [
    {path: '/authorization', name: 'authorization', component: PageLogin},
    {path: '/registration', name: 'registration', component: PageRegistration},
    {path: '/',  name: 'providers', component: PageHome},
    {path: '*', component: PageError404, name: '404'}
]
