<template>
  <div class="container">
    <v-main>
      <div class="row">
        <div class="col-4">
          <v-btn
            x-large
            block
            depressed
            dark
            color="#eb4034"
            class="mx-2 px-5 white--text"
          >
            <v-icon right dark class="mr-5">mdi-calendar-range</v-icon>
            Appointments
            <v-icon right dark class="ml-5 mr-1"
              >mdi-numeric-3-circle-outline</v-icon
            >
          </v-btn>
        </div>
        <div class="col-4">
          <v-btn x-large block depressed dark color="#1f00ab">
            <v-icon right dark class="mr-5">mdi-calendar-range</v-icon>
            Messages
            <v-icon right dark class="ml-5"
              >mdi-numeric-2-circle-outline</v-icon
            >
          </v-btn>
        </div>
        <div class="col-4"></div>
      </div>
    </v-main>
  </div>
</template>

<script>
export default {
  name: "MainDash",
  components: {},
};
</script>

<style lang="scss" scoped>
.dash-card {
  font-size: 11pt;
  text-align: center;
  line-height: 0;
}
</style>
