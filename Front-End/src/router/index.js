import Vue from 'vue'
import VueRouter from 'vue-router';
import Login from '../views/Registration/Login.vue'
import registation from '../views/Registration/patientRegistration.vue'
import home from '../views/Home/home.vue'
import PatientList from '../views/Patient/PatientList.vue'
import Missing from '../views/Missing.vue'
import WelcomePage from '../views/WelcomePage.vue'
import AddNewPatient from '../views/Patient/AddNewPatient.vue'
import AddChanneling from '../views/Channeling/AddChanneling.vue'
import ChannelingList from '../views/Channeling/ChannelingList.vue'
import TimeSet from '../views/Channeling/TimeSet.vue'
import UpdateChannel from '../views/Channeling/UpdateChannel.vue'
import AppointmentReceipt from '../views/Channeling/AppointmentReceipt.vue'


// Employee
import EmpList from '../views/Employee/EmpList.vue'
import EmpSignIn from '../views/Employee/EmpSignIn.vue'
import EmpAddNew from '../views/Employee/EmpAddNew.vue'
import EmpEditProfile from '../views/Employee/EmpEditProfile.vue'

Vue.use(VueRouter)
import EmpProfile from '../views/Employee/EmpProfile.vue'

Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'WelcomePage',
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
      path: "/AddChanneling",
      name: "Add Channeling",
      component: AddChanneling
    },

    {
      path: "/ChannelingList",
      name: "Channeling List",
      component: ChannelingList
    },

    {
      path: "/TimeSet",
      name: "Time Set",
      component:TimeSet
    },

    {
      path: "/UpdateChannel",
      name: "Update Channel",
      component:UpdateChannel
    },

    {

      path: '/EmpEditProfile',
      name: 'EmpEditProfile',
      component: EmpEditProfile
    },
    {

      path: "/AppointmentReceipt",
      name: "Appointment Receipt",
      component: AppointmentReceipt
    },
    {
      path: '/EmpList',
      name: 'EmpList',
      component: EmpList
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
      path: '/EmpProfile',
      name: 'EmpProfile',
      component: EmpProfile
    }

  ]
});
