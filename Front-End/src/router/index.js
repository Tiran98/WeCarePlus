import Vue from 'vue'
import VueRouter from 'vue-router'
import PatientList from '../views/Patient/PatientList.vue'
import PatientLogin from '../views/Patient/PatientLogin.vue'
import PatientReg from '../views/Patient/PatientRegistration.vue'
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


// Employee
import EmpList from '../views/Employee/EmpList.vue'
import EmpSignIn from '../views/Employee/EmpSignIn.vue'
import EmpAddNew from '../views/Employee/EmpAddNew.vue'
import EmpEditProfile from '../views/Employee/EmpEditProfile.vue'


// Doctor
import AddNewDoc from '../views/Doctor/AddNewDoc.vue'
import DoctorList from '../views/Doctor/DoctorList.vue'
import DoctorProfile from '../views/Doctor/DoctorProfile.vue'
import EditDoctor from '../views/Doctor/EditDoctor.vue'

Vue.use(VueRouter)
import EmpProfile from '../views/Employee/EmpProfile.vue'

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
            component: () =>
                import ( /* webpackChunkName: "about" */ '../views/About.vue')
        },
        {
            path: '*',
            component: Missing
        },
        {
            path: "/PatientReg",
            name: "PatientReg",
            component: PatientReg
        },
        {
            path: "/PatientLogin",
            name: "PatientLogin",
            component: PatientLogin
        },
        {
            path: "/AddChanneling",
            name: "Add Channeling",
            component: AddChanneling
        },
        {
            path: "/PatientDashboard",
            name: "PatientDashboard",
            component: PatientDashboard
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
        },

        // Doctor

        {
            path: '/AddNewDoc',
            name: 'AddNewDoc',
            component: AddNewDoc
        },

        {
            path: '/EditDoctor',
            name: 'EditDoctor',
            component: EditDoctor
        },

        {
            path: '/DoctorList',
            name: 'DoctorList',
            component: DoctorList
        },
        
        {
            path: '/DoctorProfile',
            name: 'DoctorProfile',
            component: DoctorProfile
        }

    ]
});