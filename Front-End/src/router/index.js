import Vue from 'vue'
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: "/register",
            component: require('../views/Registration/patientRegistration.vue'),
            meta: {
                forAuth: true
            }
        },
        {
            path: "/login",
            component: require('../views/Registration/Login.vue'),
            meta: {
                forAuth: true
            }
        },
        {
            path: "/home",
            component: require('../views/Home/home.vue'),
            meta: {
                forAuth: true
            }
        },
        {
            path: "/EmpEditProfile",
            component: require('../views/Employee/EmpEditProfile.vue'),
            meta: {
                forAuth: true
            }
        }
    ],
    linkActiveClass: 'active'
})

export default router