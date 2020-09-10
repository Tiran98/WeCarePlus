import Vue from 'vue'
import VueRouter from 'vue-router';
import Patientlogin from '../views/Patient/PatientLogin.vue'
import PatientReg from '../views/Patient/PatientRegistration.vue'
import PatientList from '../views/Patient/PatientList.vue'
import Missing from '../views/Missing.vue'
import WelcomePage from '../views/WelcomePage.vue'
import Dashboard from '../views/Dashboard.vue'
import AddNewPatient from '../views/Patient/AddNewPatient.vue'
import AddChanneling from '../views/Channeling/AddChanneling.vue'
import ChannelingList from '../views/Channeling/ChannelingList.vue'
import TimeSet from '../views/Channeling/TimeSet.vue'
import UpdateChannel from '../views/Channeling/UpdateChannel.vue'
import AppointmentReceipt from '../views/Channeling/AppointmentReceipt.vue'
import PatientDashboard from '../views/Patient/PatientDashboard.vue'

Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  routes: [{
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
      path: "/PatientDashboard",
      name: "PatientDashboard",
      component: PatientDashboard
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
      component: TimeSet
    },

    {
      path: "/UpdateChannel",
      name: "Update Channel",
      component: UpdateChannel
    },

    {
      path: "/AppointmentReceipt",
      name: "Appointment Receipt",
      component: AppointmentReceipt
    },

  ]
});