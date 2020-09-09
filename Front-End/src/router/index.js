import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../views/Dashboard.vue'
import Login from '../views/Registration/Login.vue'
import registation from '@/views/Registration/patientRegistration.vue'
import home from '../views/Home/home.vue'
import PatientList from '../views/PatientList.vue'
import Missing from '../views/Missing.vue'
import AddNewPatient from '../views/AddNewPatient.vue'


Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'Dashboard',
            component: Dashboard
        },
        {
            path: '/patientList',
            name: 'Patient List',
            component: PatientList
        },
        {
            path: '/addNewPatient',
            name: 'Add New Patient',
            component: AddNewPatient
        },
        {
            path: '/about',
            name: 'About',
            // route level code-splitting
            // this generates a separate chunk (about.[hash].js) for this route
            // which is lazy-loaded when the route is visited.
            component: () =>
                import ( /* webpackChunkName: "about" */ '../views/About.vue')
        },
        {
            path: '*',
            component: Missing
        },
        {
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
        }
    ]
});