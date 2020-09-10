<template>

  <v-app id="inspire">
    <v-main class="welcome-back">
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="4">
            <v-card class="elevation-12">

              <v-toolbar color="primary" dark flat>
                <v-toolbar-title>Doctor Sign in</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-subheader class="toolbar-title">WeCare+</v-subheader>
              </v-toolbar>

              <v-card-text>
                <v-form>
                  <v-text-field
                    label="Login"
                    name="login"
                    prepend-icon="mdi-account"
                    type="text"
                  ></v-text-field>

                  <v-text-field
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                  ></v-text-field>

                   <router-link to="/DoctorProfile">
                  <v-btn block color="primary">Sign in</v-btn>
                  </router-link>
                </v-form>

              </v-card-text>

            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>

</template>

<script>
export default {
  props: {
    source: String,
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lobster&display=swap");
.welcome-back {
  background: url("../../assets/doc-login-bg.jpg");
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