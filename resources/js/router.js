import VueRouter from "vue-router";

const Login = () => import("./components/auth/LoginComponent.vue");
const Registrar = () => import("./components/auth/RegistrarComponent.vue");

const Checkout = () => import("./components/CheckoutComponent.vue");

const Painel = () => import("./components/PainelComponent.vue");
const Produtos = () => import("./components/ProdutosComponent.vue");
const Forbidden = () => import("./components/403Component.vue");

const Layout = () => import("./layouts/auth.vue");
const LayoutP = () => import("./layouts/painel.vue");

const routes = [
    {
        path: "",
        component: Layout,
        name: "login",
        children: [
            {
                path: "/",
                name: "auth-login",
                component: Login,
                meta: { auth: false }
            },
            {
                path: "/register",
                name: "auth-register",
                component: Registrar,
                meta: { auth: false }
            }
        ]
    },
    {
        path: "",
        component: LayoutP,
        name: "dashboard",
        children: [
            {
                path: "/painel",
                name: "painel",
                component: Painel,
                meta: {
                    auth: true
                }
            },
            {
                path: "/painel/produtos",
                name: "painel-produtos",
                component: Produtos,
                meta: {
                    auth: {
                        roles: 'seller',
                        redirect: { name: "auth-login" },
                        forbiddenRedirect: "/403"
                    }
                }
            },
            {
                path: "/403",
                name: "negado",
                component: Forbidden,
                meta: {
                    auth: true
                }
            }
        ]
    },
    {
        path: "/checkout/:slug",
        name: "Checkout",
        component: Checkout
    },
    {
        path: "/404",
        redirect: { name: 'painel' }
    }
];

const router = new VueRouter({
    routes
});

export default router;
