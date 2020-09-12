import Vue from 'vue'
import VueRouter from 'vue-router';
import Login from '../views/Registration/Login.vue';
import registation from '../views/Registration/patientRegistration.vue';
import home from '../views/Home/home.vue';
import AddSupp from '../views/Supplier/AddSupplier.vue'

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [{
            path: "/register",
            name: "register",
            component: registation
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/home",
            component: home
        },
        {
            path: "/addSupp",
            name: "AddSupp",
            component: AddSupp
        },
    ]
});