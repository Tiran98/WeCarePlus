<template>
  <v-app id="inspire">
    <v-main class="welcome-back">
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="4">
            <v-card class="elevation-12">
              <v-toolbar color="primary" dark flat>
                <v-toolbar-title>Patient Login</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-subheader class="toolbar-title">WeCare+</v-subheader>
              </v-toolbar>
              <v-card-text>
                <v-form @submit.prevent="Login" v-model="valid">
                  <v-text-field
                    v-model="email"
                    label="Email"
                    name="login"
                    prepend-icon="mdi-account"
                    type="text"
                  ></v-text-field>

                  <v-text-field
                    v-model="password"
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                  ></v-text-field>
                  <v-btn color="primary" @click="Login"
                  >Login</v-btn>
                </v-form>
              </v-card-text>
              <v-card-actions class="px-4">
                <v-btn
                  block
                  color="secondarydark"
                  to="/Patientreg"
                  class="btn-login"
                  dark
                >
                  <span>Sign Up</span>
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import axios from 'axios'
import router from '../../router'

export default {
  data:() => ({
    return :{
      patient:{
        email:'',
        password:''
      }
    } 
  }),
  methods:{
    Login(){
      axios.post('http://localhost:8000/api/login',{
        email : this.email,
        password : this.password
      }).then((response)=>
      {
        console.log(response);
        console.log("Done");
        router.push({name: 'Dashboard'})
      })
    }
  },
  props: {
    source: String,
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lobster&display=swap");

.welcome-back {
  background: url("../../assets/welcome-background.jpg");
  background-size: cover;
  background-attachment: fixed;
  min-height: 100vh;
}

.btn-login {
  text-decoration: none;
}

.toolbar-title {
  font-family: "Lobster", cursive;
}
</style>
