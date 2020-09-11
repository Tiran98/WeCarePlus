<template>
  <b-container class="mt-3" fluid>
    <v-main>
      <h3>Add New Appointment</h3>
      <hr />

      <b-form @submit="onSubmit" @reset="onReset" v-if="show">
        <b-form-group id="name-group" label="Full Name:" label-for="name">
          <b-form-input
            id="name"
            v-model="form.name"
            required
            placeholder="Your Name"
          ></b-form-input>
        </b-form-group>
        <b-form-group id="email-group" label="Email address:" label-for="email">
          <b-form-input
            id="email"
            v-model="form.email"
            type="email"
            required
            placeholder="Your Email"
          ></b-form-input>
        </b-form-group>
        <b-row>
          <b-col>
            <b-form-group
              id="number-group-"
              label="Contact Number:"
              label-for="number"
            >
              <b-form-input
                id="number"
                v-model="form.number"
                required
                placeholder="Your Phone"
              ></b-form-input>
            </b-form-group>
          </b-col>
          <b-col>
            <b-form-group
              id="contact-meth-group"
              label="Prefered method of contact:"
              label-for="contact-meth"
            >
              <b-form-radio
                v-model="form.contact"
                name="contact-meth"
                value="Phone"
                class="ml-2"
                >Phone</b-form-radio
              >
              <b-form-radio
                v-model="form.contact"
                name="contact-meth"
                value="Email"
                class="ml-2"
                >Email</b-form-radio
              >
            </b-form-group>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <b-form-group
              id="service-group"
              label="Service:"
              label-for="service"
            >
              <b-form-select
                id="service"
                v-model="form.service"
                :options="services"
                required
              ></b-form-select>
            </b-form-group>
          </b-col>
          <b-col>
            <b-form-group id="doctor-group" label="Doctor:" label-for="doctor">
              <b-form-select
                id="doctor"
                v-model="form.doctor"
                :options="doctors"
                required
              ></b-form-select>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <b-form-group
              id="app-date-group"
              label="Appointment Date:"
              label-for="app-date"
            >
              <b-form-datepicker
                id="app-date"
                v-model="form.appDate"
              ></b-form-datepicker>
            </b-form-group>
          </b-col>
          <b-col>
            <b-form-group
              id="appTime-group"
              label="Appointment Time:"
              label-for="appTime"
            >
              <b-form-select
                id="appTime"
                v-model="form.appTime"
                :options="time"
                required
              ></b-form-select>
            </b-form-group>
          </b-col>
        </b-row>
        <b-form-group
          id="firstVisit-group"
          label="First time visit?"
          label-for="firstVisit"
        >
          <b-form-radio v-model="form.firstVisit" name="firstVisit" value="Yes"
            >Yes</b-form-radio
          >
          <b-form-radio v-model="form.firstVisit" name="firstVisit" value="No"
            >No</b-form-radio
          >
        </b-form-group>

        <b-form-group
          id="details-group"
          label="Other details you may wish to highlight:"
          label-for="details"
        >
          <b-form-input
            id="details"
            v-model="form.details"
            required
            placeholder=""
          ></b-form-input>
        </b-form-group>

        <b-button type="submit" class="mr-3 submit-btn">Submit</b-button>
        <b-button type="reset" class="reset-btn">Reset</b-button>
      </b-form>
    </v-main>
    <BaselinePat />
  </b-container>
</template>

<script>
import BaselinePat from "../../components/BaselinePat.vue";

export default {
  name: "AddChanneling",
  components: {
    BaselinePat,
  },
  data() {
    return {
      form: {
        email: "",
        name: "",
        number: "",
        service: null,
        doctor: null,
        appDate: null,
        time: null,
        firstVisit: null,
        details: "",
      },
      services: [
        { text: "Select the service", value: null },
        "O.P.D",
        "Surgery",
        "Clinic",
      ],
      doctors: [
        { text: "Select a doctor", value: null },
        "Dr.Jayalath",
        "Dr.Sudarshani",
        "Dr.Shadeen",
      ],
      time: [
        { text: "Select the time", value: null },
        "06.00a.m-09.00a.m",
        "11.00a.m-2.00p.m",
        "04.00p.m-10.00p.m",
      ],
      show: true,
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      alert(JSON.stringify(this.form));
    },
    onReset(evt) {
      evt.preventDefault();
      // Reset our form values
      this.form.email = "";
      this.form.name = "";
      this.form.doctor = [];
      this.form.services = [];
      this.form.number = "";
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
  },
};
</script>

<style scoped>
h3 {
  color: teal;
  font-weight: 500;
}

.submit-btn {
  background-color: teal;
  color: white;
  border: none;
  width: 400px;
}

.submit-btn:hover {
  background-color: rgb(0, 156, 156);
}

.reset-btn {
  background-color: #eb3333;
  color: white;
  border: none;
  width: 150px;
}

.reset-btn:hover {
  background-color: #ff6060;
}
</style>
