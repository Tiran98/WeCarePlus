import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../views/Dashboard.vue'
import home from '../views/Home/home.vue'
import PatientList from '../views/Patient/PatientList.vue'
import Patientlogin from '../views/Patient/PatientLogin.vue'
import PatientReg from '../views/Patient/PatientRegistration.vue'
import Login from '../views/Registration/Login.vue'
import registation from '@/views/Registration/patientRegistration.vue'
import Missing from '../views/Missing.vue'
import AddNewPatient from '../views/AddNewPatient.vue'
import EmpList from '../views/Employee/EmpList.vue'
import EmpSignIn from '../views/Employee/EmpSignIn.vue'
import EmpAddNew from '../views/Employee/EmpAddNew.vue'
import EmpEditProfile from '../views/Employee/EmpEditProfile.vue'

Vue.use(VueRouter)

export default new VueRouter({
  mode: 'history',
  routes: [{
      path: '/',
      name: 'Welcome Page',
      component: WelcomePage
    },
    {
      path: '/dashboard',
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
      component: () => import( /* webpackChunkName: "about" */ '../views/About.vue')
    },
    {
      path: '*',
      component: Missing
    },
    {
      path: "/Patientreg",
      name: "Patientreg",
      component: PatientReg
    },
    {
      path: "/Patientlogin",
      name: "Patientlogin",
      component: Patientlogin
    },
    {
      path: "/home",
      component: home
    },
    {
      path: '/EmpSignIn',
      name: 'EmpSignIn',
      component: EmpSignIn
    },
    {
      path: '/EmpAddNew',
      name: 'EmpAddNew',
      component: EmpAddNew
    },
    {
      path: '/EmpEditProfile',
      name: 'EmpEditProfile',
      component: EmpEditProfile
    }
  ]

});