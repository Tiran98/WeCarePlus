<template>
  <div class="v-main">
    <v-main>
      <div class="container-fluid">
        <div class="row mt-5 mx-3">
          <div class="col-lg-3 col-md-6 col-xs-12">
            <v-btn
              x-large
              block
              depressed
              dark
              color="#eb4034"
              class="px-5 white--text"
            >
              <v-icon right dark class="mr-3">mdi-calendar-range</v-icon>
              Appointments
              <v-icon right dark class="ml-3 mr-1"
                >mdi-numeric-3-circle-outline</v-icon
              >
            </v-btn>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <v-btn x-large block depressed dark color="#1f00ab">
              <v-icon right dark class="mr-3">mdi-calendar-range</v-icon>
              Messages
              <v-icon right dark class="ml-3"
                >mdi-numeric-2-circle-outline</v-icon
              >
            </v-btn>
          </div>
          <div class="col-lg-2 col-md-6 col-xs-12">
            <digital-clock :blink="true" :displaySeconds="true" class="" />
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 date mt-3 text-center">
            <span>{{ moment().format("dddd, MMMM Do YYYY") }}</span>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row mt-2 mx-3">
          <div class="col-lg-3 col-md-6 col-xs-12">
            <v-btn x-large block depressed color="#fff896">
              <v-icon right dark class="mr-3">mdi-bed</v-icon>
              Patients
            </v-btn>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <v-btn x-large block depressed color="#9ef4ff">
              <v-icon right dark class="mr-3">mdi-doctor</v-icon>
              Doctors
            </v-btn>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <v-btn x-large block depressed color="#ff7578">
              <v-icon right dark class="mr-3">mdi-account-group</v-icon>
              Employees
            </v-btn>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <v-btn x-large block depressed color="#d773ff">
              <v-icon right dark class="mr-3">mdi-truck-check</v-icon>
              Suppliers
            </v-btn>
          </div>
        </div>
      </div>
      <div class="container-fluid mt-5">
        <Calender />
      </div>
    </v-main>
  </div>
</template>

<script>
import DigitalClock from "../components/Clock";
import Calender from "../components/Calender.vue";

export default {
  name: "MainDash",
  components: {
    DigitalClock,
    Calender,
  },
};
</script>

<style lang="scss" scoped>
.v-main {
  max-height: 80vh;
}
.dash-card {
  font-size: 11pt;
  text-align: center;
  line-height: 0;
}

.clock {
  background-color: #263238;
  color: #eceff1;
  border-radius: 5px;
  padding: 0.3rem 0.9rem;
  font-size: 26pt;
  font-family: "Menlo", monospace;
}

.date {
  background-color: #263238;
  color: #eceff1;
  border-radius: 5px;
  height: 50px;
  font-size: 16pt;
  font-family: "Menlo", monospace;
}
</style>
