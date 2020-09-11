<template>

  <v-app id="inspire">
    <v-main class="NewIncome">

      <div class="container-fluid mt-3">
        <h3>New Income</h3>
        <hr />

                <v-card-text>
                  <v-form ref="form" v-model="valid" lazy-validation>
                  <v-container fluid>
                    <v-row>

                       <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                         v-model="emptype"
                         :items="emptype"
                         label="Income Type"
                         dense
                         outlined
                        ></v-select>
                      </v-col>

                      <!-- DATE -->
                      <v-col cols="12" sm="6">
                        <v-menu
                         v-model="menu2"
                         :close-on-content-click="false"
                         :nudge-right="40"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                      <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                          v-model="date"
                          label="Income Date"
                          prepend-icon="mdi-event"
                          readonly
                          v-bind="attrs"
                          v-on="on"
                        ></v-text-field>
                      </template>
                      <v-date-picker v-model="date" @input="menu2 = false"
                      ></v-date-picker>
                      </v-menu>
                      </v-col>
                      <v-spacer></v-spacer>

                      <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="regNum"
                          :error-messages="regNumErrors"
                          label="Patient Registration Number"
                          dense
                          required
                          @input="$v.regNum.$touch()"
                          @blur="$v.regNum.$touch()"
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="name"
                          :error-messages="nameErrors"
                          label="Full Name"
                          dense
                          required
                          @input="$v.name.$touch()"
                          @blur="$v.name.$touch()"
                        ></v-text-field>
                      </v-col>

                      <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                         v-model="paytype"
                         :items="paytype"
                         label="Payment Type"
                         dense
                         outlined
                        ></v-select>
                      </v-col>

                      <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="phone"
                          :error-messages="phoneErrors"
                          label="Payment Amount"
                          required
                          @input="$v.phone.$touch()"
                          @blur="$v.phone.$touch()"
                          dense
                        ></v-text-field>
                      </v-col>

                      <!-- Save & Clear buttons -->
                      <v-col cols="12" sm="12">
                        <v-btn
                          color="secondarydark"
                          class="mr-4"
                          @click="register"
                          dark
                        >
                          Save
                        </v-btn>
                        <v-btn color="error" class="mr-4" @click="reset">
                          Clear
                        </v-btn>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-form>
              </v-card-text>
      </div>
      <Baseline />
    </v-main>
  </v-app>

</template>

<script>
import Baseline from "../../components/Baseline.vue";
import { validationMixin } from "vuelidate";
import { required, minLength, email, sameAs } from "vuelidate/lib/validators";

export default {
  name: "NewIncome",
  components: {
    Baseline,
  },

  mixins: [validationMixin],
  validations: {
    name: { required, minLength: minLength(4) },
    email: { required, email },
    password: { required, minLength: minLength(8) },
    address: {required, minLength: minLength(5)},
    confirmPassword: { sameAsPassword: sameAs("password") },
    phone: { required },
  },
  data() {
    return {
      name: "",
      email: "",
      password: "",
      confirmPassword: "",
      phone: "",
      address:"",
      emptype: ['Laboratory Assistant','Nurse','Pharmacist','Other Hospital Staff'],
      status: null,
      showPassword: false,

    };
  },
  computed: {
    nameErrors() {
      const errors = [];
      if (!this.$v.name.$dirty) return errors;
      !this.$v.name.minLength &&
        errors.push("Name must be at least 4 characters long.");
      !this.$v.name.required && errors.push("Name is required.");
      return errors;
    },
    emailErrors() {
      const errors = [];
      if (!this.$v.email.$dirty) return errors;
      !this.$v.email.email && errors.push("Must be valid e-mail");
      !this.$v.email.required && errors.push("E-mail is required");
      return errors;
    },
    passwordErrors() {
      const errors = [];
      if (!this.$v.password.$dirty) return errors;
      !this.$v.password.minLength &&
        errors.push("Password must be at least 8 characters long");
      !this.$v.password.required && errors.push("Password is required");
      return errors;
    },
    confirmPasswordErrors() {
      const errors = [];
      if (!this.$v.confirmPassword.$dirty) return errors;
      !this.$v.confirmPassword.sameAsPassword &&
        errors.push("Passwords doesn't match");
      return errors;
    },
    phoneErrors() {
      const errors = [];
      if (!this.$v.phone.$dirty) return errors;
      !this.$v.phone.required && errors.push("Contact Number is required");
      return errors;
    },
    addressErrors() {
      const errors = [];
      if (!this.$v.address.$dirty) return errors;
      !this.$v.address.minLength &&
        errors.push("Address must be at least 5 characters long.");
      !this.$v.address.required && errors.push("Address is required.");
      return errors;
    },
  },
  // Save & Clear buttons 
  methods: {
    async register() {
      this.$v.$touch();
      this.$store
        .dispatch("register", {
          name: this.name,
          email: this.email,
          password: this.password,
        })
        .then(() => {
          this.$router.push({ name: "Dashboard" });
        })
        .catch((err) => {
          console.log(err);
        });
    },
    reset() {
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
    },
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lobster&display=swap");

h3 {
  color: teal;
  font-weight: 500;
  font-size: 40px;
  padding-left: 10px;
}

.btn-login {
  text-decoration: none;
}
.toolbar-title {
  font-family: "Lobster", cursive;
}
</style>