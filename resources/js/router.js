import Vue from 'vue';
import VueRouter from "vue-router";
import Login from "./components/Login.vue";
import Register from "./components/Register.vue";
import Home from "./components/Home.vue";

Vue.use(VueRouter)

const routes = [
    {
        path: "/",
        component: Home
    },
    {
        path: "/login",
        component: Login
    },
    {
        path: "/register",
        component: Register
    }
];

const router = new VueRouter({
    mode: "history",
    routes,
});

export default router;
