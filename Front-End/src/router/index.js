import Vue from "vue";
import VueRouter from "vue-router";

import Dashboard from "../views/Dashboard.vue";

import PatientList from "../views/Patient/PatientList.vue";
import Patientlogin from "../views/Patient/PatientLogin.vue";
import PatientReg from "../views/Patient/PatientRegistration.vue";

import Missing from "../views/Missing.vue";

import AddNewPatient from "../views/AddNewPatient.vue";

import WelcomePage from "../views/WelcomePage.vue";

import AddChanneling from "../views/Channeling/AddChanneling.vue";
import ChannelingList from "../views/Channeling/ChannelingList.vue";
import TimeSet from "../views/Channeling/TimeSet.vue";
import UpdateChannel from "../views/Channeling/UpdateChannel.vue";
import AppointmentReceipt from "../views/Channeling/AppointmentReceipt.vue";

// Employee
import PatientDashboard from "../views/Patient/PatientDashboard.vue";

import EmpList from "../views/Employee/EmpList.vue";
import EmpSignIn from "../views/Employee/EmpSignIn.vue";
import EmpAddNew from "../views/Employee/EmpAddNew.vue";
import EmpEditProfile from "../views/Employee/EmpEditProfile.vue";
import AddNewItem from "../views/Inventory/AddNewItem.vue";
import InventoryList from "../views/Inventory/InventoryList.vue";

// Doctor
import AddNewDoc from "../views/Doctor/AddNewDoc.vue";
import DoctorList from "../views/Doctor/DoctorList.vue";
import DoctorProfile from "../views/Doctor/DoctorProfile.vue";
import EditDoctor from "../views/Doctor/EditDoctor.vue";

import EmpProfile from "../views/Employee/EmpProfile.vue";

Vue.use(VueRouter);

// Finance
import AddExpenses from "../views/Finance & Reports/AddExpenses.vue";
import AddIncome from "../views/Finance & Reports/AddIncome.vue";
import ExpenseList from "../views/Finance & Reports/ExpenseList.vue";
import IncomeList from "../views/Finance & Reports/IncomeList.vue";
import UpdateExpense from "../views/Finance & Reports/UpdateExpense.vue";

// Supplier
import SupList from "../views/Supplier/SupList.vue";
import SupAddNew from "../views/Supplier/SupAddNew.vue";

// Order History
import AddNewOrder from "../views/StockOrder/AddNewOrder.vue";
import ListOrderHistory from "../views/StockOrder/ListOrderHistory.vue";

export default new VueRouter({
  mode: "history",
  routes: [
    {
      path: "/",
      name: "Welcome Page",
      component: WelcomePage,
    },
    {
      path: "/dashboard",
      name: "Dashboard",
      component: Dashboard,
    },
    {
      path: "/PatientDashboard",
      name: "PatientDashboard",
      component: PatientDashboard,
    },
    {
      path: "/patientList",
      name: "Patient List",
      component: PatientList,
    },
    {
      path: "/addNewPatient",
      name: "Add New Patient",
      component: AddNewPatient,
    },
    {
      path: "/addNewItem",
      name: "Add New Item",
      component: AddNewItem,
    },
    {
      path: "/inventoryList",
      name: "Inventory List",
      component: InventoryList,
    },
    {
      path: "/about",
      name: "About",
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () =>
        import(/* webpackChunkName: "about" */ "../views/About.vue"),
    },
    {
      path: "*",
      component: Missing,
    },
    {
      path: "/Patientreg",
      name: "Patientreg",
      component: PatientReg,
    },
    {
      path: "/Patientlogin",
      name: "Patientlogin",
      component: Patientlogin,
    },
    {
      path: "/AddChanneling",
      name: "Add Channeling",
      component: AddChanneling,
    },
    {
      path: "/ChannelingList",
      name: "Channeling List",
      component: ChannelingList,
    },
    {
      path: "/TimeSet",
      name: "Time Set",
      component: TimeSet,
    },

    {
      path: "/UpdateChannel",
      name: "Update Channel",
      component: UpdateChannel,
    },
    {
      path: "/AppointmentReceipt",
      name: "Appointment Receipt",
      component: AppointmentReceipt,
    },

    // Employee
    {
      path: "/EmpProfile",
      name: "EmpProfile",
      component: EmpProfile,
    },
    {
      path: "/EmpEditProfile",
      name: "EmpEditProfile",
      component: EmpEditProfile,
    },
    {
      path: "/EmpSignIn",
      name: "EmpSignIn",
      component: EmpSignIn,
    },
    {
      path: "/EmpList",
      name: "EmpList",
      component: EmpList,
    },
    {
      path: "/EmpAddNew",
      name: "EmpAddNew",
      component: EmpAddNew,
    },
    {
      path: "/AddIncome",
      name: "AddIncome",
      component: AddIncome,
    },
    {
      path: "/AddExpenses",
      name: "AddExpenses",
      component: AddExpenses,
    },
    {
      path: "/ExpenseList",
      name: "ExpenseList",
      component: ExpenseList,
    },
    {
      path: "/IncomeList",
      name: "IncomeList",
      component: IncomeList,
    },
    {
      path: "/UpdateExpense",
      name: "UpdateExpense",
      component: UpdateExpense,
    },
    {
      path: "/AddNewDoc",
      name: "AddNewDoc",
      component: AddNewDoc,
    },

    {
      path: "/EditDoctor",
      name: "EditDoctor",
      component: EditDoctor,
    },

    {
      path: "/DoctorList",
      name: "DoctorList",
      component: DoctorList,
    },

    {
      path: "/DoctorProfile",
      name: "DoctorProfile",
      component: DoctorProfile,
    },

    //Supplier

    {
      path: "/add-new-supplier",
      name: "SupAddNew",
      component: SupAddNew,
    },

    {
      path: "/suppliers-list",
      name: "SupList",
      component: SupList,
    },

    //Order History
    {
      path: "/add-new-order",
      name: "AddNewOrder",
      component: AddNewOrder,
    },

    {
      path: "/order-history",
      name: "ListOrderHistory",
      component: ListOrderHistory,
    },
  ],
});
