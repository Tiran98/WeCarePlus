<template>
  <v-app id="inspire">
    <v-navigation-drawer
      app
      color="accent"
      mini-variant
      expand-on-hover
      permanent
    >
      <v-list shaped>
        <v-list-group
          v-for="item in items"
          :key="item.title"
          v-model="item.active"
          :prepend-icon="item.action"
          no-action
        >
          <template v-slot:activator>
            <v-list-item-content class="nav-Item">
              <v-list-item-title v-text="item.title"></v-list-item-title>
            </v-list-item-content>
          </template>

          <v-list-item
            v-for="subItem in item.items"
            :key="subItem.title"
            @click="stop"
          >
            <v-list-item-content class="nav-subItem">
              <router-link :to="subItem.action">
                <v-list-item-title v-text="subItem.title"></v-list-item-title>
              </router-link>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>
      </v-list>
    </v-navigation-drawer>

   

    <v-app-bar app color="primary" dark>
      <v-toolbar-title class="toolbar-title">WeCare+</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-avatar size="44" class="mr-5">
        <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John" />
      </v-avatar>
      <div class="mr-2">
        <span>Susitha Senarathne</span><br />
        <small class="user-type">Doctor</small>
      </div>

      <v-menu offset-y>
        <template v-slot:activator="{ on, attrs }">
          <v-btn dark icon v-bind="attrs" v-on="on">
            <v-icon>mdi-menu-down</v-icon>
          </v-btn>
        </template>
        <v-card>
          <router-link to="/home" class="logout-btn">Profile</router-link>
          <!-- <a href="../views/Doctor/DoctorProfile.vue" class="logout-btn">Profile</a> -->
        </v-card>
        <v-card>
          <router-link to="/home" class="logout-btn">Logout</router-link>
          <!-- <a href="Home/home.vue" class="logout-btn">Logout</a> -->
        </v-card>
      </v-menu>
    </v-app-bar>

    <v-footer color="primary" app padless>
      <v-card-text class="py-1 white--text text-center"
        >&copy; {{ new Date().getFullYear() }} — <strong>WeCarePlus</strong>
      </v-card-text>
    </v-footer>
  </v-app>
</template>

<script>


export default {
  name: "Baseline",
  components: {
    
  },
  data() {
    return {
      drawer: true,
      items: [
        {
          action: "mdi-view-dashboard",
          title: "Dashboard",
        },
        {
          action: "mdi-bed",
          title: "Patient",
          items: [
            { action: "/patientList", title: "Patient List" },
            { action: "/addNewPatient", title: "Add New Patient" },
          ],
        },
        {
          action: "mdi-bookmark-plus",
          title: "Appoinments",
          items: [{ title: "List Item" }],
        },
        {
          action: "mdi-format-page-break",
          title: "Prescriptions",
          items: [{ title: "List Item" }],
        },
        {
          action: "mdi-doctor",
          title: "Doctor",
          items: [
            { action: "/AddNewDoc", title: "Add New Doctor"},
            { action: "/EditDoctor", title: "Edit Doctor Details"},
            { action: "/DoctorList", title: "Doctor List"},
            { action: "/DoctorProfile", title: "Doctor Profile"}
            ],
        },
        {
          action: "mdi-account-group",
          title: "Employee",
          items: [
            { action: "/EmpList", title: "Employee List" },
            { action: "/EmpAddNew", title: "Add New Employee" },
            
          ],
        },
        {
          action: "mdi-truck-check",
          title: "Supplier",
          items: [{ title: "List Item" }],
        },
        {
          action: "mdi-server",
          title: "Inventory",
          items: [{ title: "List Item" }],
        },
        {
          action: "mdi-message",
          title: "Messages",
          items: [{ title: "List Item" }],
        },
        {
          action: "mdi-cash-multiple",
          title: "Finance",
          items: [{ title: "List Item" }],
        },
      ],
    };
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lobster&display=swap");

.nav-Item {
  font-weight: 500;
}

.nav-subItem a {
  text-decoration: none;
  font-weight: 500;
}

.toolbar-title {
  font-family: "Lobster", cursive;
}

.logout-btn {
  padding: 40px;
  margin-top: 15px;
  text-decoration: none;
  line-height: 2;
}

.user-type {
  line-height: 0ch;
  color: turquoise;
}
</style>
