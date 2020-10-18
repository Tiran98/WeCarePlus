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
        <span>Dananjaya Sandakalum</span><br />
        <small class="user-type">Patient</small>
      </div>

      <v-menu offset-y>
        <template v-slot:activator="{ on, attrs }">
          <v-btn dark icon v-bind="attrs" v-on="on">
            <v-icon>mdi-menu-down</v-icon>
          </v-btn>
        </template>
        <v-card>
            <v-btn
                  block
                  color="white"
                  @click="logout"
                  class="btn-login"
                >
                  <span>Logout</span>
                </v-btn>
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
import axios from 'axios'
import router from '../router'

export default {
  name: "Baseline",
  components: {},
  data() {
    return {
      drawer: true,
      items: [
        {
          action: "mdi-view-dashboard",
          title: "Dashboard",
          items: [{ action: "/PatientDashboard", title: "Patient Dashboard" }],
        },
        {
          action: "mdi-bookmark-plus",
          title: "Appoinments",
          items: [
            { action: "/AddChanneling", title: "New Appointment" },
            { action: "/ChannelingList", title: "Appointment List" },
          ],
        },
        {
          action: "mdi-format-page-break",
          title: "Prescriptions",
          items: [{ title: "List Item" }],
        },
        {
          action: "mdi-account",
          title: "User Profile",
        },
        {
          action: "mdi-message",
          title: "Messages",
        },
      ],
    };
  },

  methods: {
    logout () {
     axios.get('http://127.0.0.1:8000/api/logout')
     .then((response)=>
      {
        console.log(response);
        console.log("Done");
        router.push({name: 'Welcome Page'})
      }).catch((err) => console.log(err));
    }
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
