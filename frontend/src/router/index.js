import { createRouter, createWebHashHistory } from "vue-router";

const Home = () => import("../components/Home.vue")
const Register = () => import("../components/auth/Register.vue")
const Login = () => import("../components/auth/Login.vue")
const Product = () => import("../components/products/Product.vue")

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/register",
            name: "register",
            component: Register
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/product/:slug",
            name: "product",
            component: Product
        },
    ]
})

export default router