<template>
  <v-app id="inspire">
    <v-main class="welcome-back">
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="4">
            <v-card class="elevation-12 p-3">
              <v-card-text>
                <h1 class="text-center mb-5">Welcome to WeCare+</h1>
                <br />
                <router-link to="/Patientlogin" class="btn-login">
                  <v-btn large block depressed dark color="#00b3b3">
                    <span>Patient</span>
                  </v-btn>
                </router-link>
                <router-link to="/dashboard" class="btn-login">
                  <v-btn
                    large
                    block
                    depressed
                    dark
                    color="#008080"
                    class="mt-3"
                  >
                    <span>Employee</span>
                  </v-btn>
                </router-link>
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
  setup() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
.welcome-back {
  background: url("../assets/welcome-background.jpg");
  background-size: cover;
  background-attachment: fixed;
  min-height: 100vh;
}

h1 {
  color: #008080;
  font-weight: 600;
}

.box {
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 5px;
  margin-top: 100px;
}

.btn-login {
  text-decoration: none;
}
</style>
