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
<<<<<<< Updated upstream
import AddNewPatient from '../views/AddNewPatient.vue'
=======
import WelcomePage from '../views/WelcomePage.vue'
import AddNewPatient from '../views/Patient/AddNewPatient.vue'
import AddChanneling from '../views/Channeling/AddChanneling.vue'
import ChannelingList from '../views/Channeling/ChannelingList.vue'
import TimeSet from '../views/Channeling/TimeSet.vue'
import UpdateChannel from '../views/Channeling/UpdateChannel.vue'
import AppointmentReceipt from '../views/Channeling/AppointmentReceipt.vue'
import Dashboard from '../views/Dashboard.vue'

// Employee
>>>>>>> Stashed changes
import EmpList from '../views/Employee/EmpList.vue'
import EmpSignIn from '../views/Employee/EmpSignIn.vue'
import EmpAddNew from '../views/Employee/EmpAddNew.vue'
import EmpEditProfile from '../views/Employee/EmpEditProfile.vue'
import AddNewIncome from '../views/Finance & Reports/AddIncome.vue'

Vue.use(VueRouter)

// Finance
import AddExpenses from '../views/Finance & Reports/AddExpenses.vue'
import AddIncome from '../views/Finance & Reports/AddIncome.vue'
import ExpenseList from '../views/Finance & Reports/ExpenseList.vue'
import IncomeList from '../views/Finance & Reports/IncomeList.vue'
import UpdateExpense from '../views/Finance & Reports/UpdateExpense.vue'


export default new VueRouter({
<<<<<<< Updated upstream
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
<<<<<<< Updated upstream
=======
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

      path: "/AppointmentReceipt",
      name: "Appointment Receipt",
      component: AppointmentReceipt
    },

    // Employee
    {

      path: '/EmpEditProfile',
      name: 'EmpEditProfile',
      component: EmpEditProfile
    },
    {
      path: '/EmpList',
      name: 'EmpList',
      component: EmpList
    },
    {
>>>>>>> Stashed changes
      path: '/EmpSignIn',
      name: 'EmpSignIn',
      component: EmpSignIn
    },
    {
      path: '/EmpAddNew',
      name: 'EmpAddNew',
      component: EmpAddNew
    },
<<<<<<< Updated upstream
    {
      path: '/EmpEditProfile',
      name: 'EmpEditProfile',
      component: EmpEditProfile
    }
=======
      {
      path: '/EmpProfile',
      name: 'EmpProfile',
      component: EmpProfile
    },

    //Finance
    {
      path: '/AddIncome',
      name: 'AddIncome',
      component: AddIncome
    },
    {
      path: '/AddExpenses',
      name: 'AddExpenses',
      component: AddExpenses
    },
    {
      path: '/ExpenseList',
      name: 'ExpenseList',
      component: ExpenseList
    },
    {
      path: '/IncomeList',
      name: 'IncomeList',
      component: IncomeList
    },
    {
      path: '/UpdateExpense',
      name: 'UpdateExpense',
      component: UpdateExpense
    },
    

>>>>>>> Stashed changes
  ]

=======
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
        },
        {
            path: '/AddIncome',
            name: 'AddNewIncome',
            component: AddNewIncome
        }


    ]
>>>>>>> Stashed changes
});