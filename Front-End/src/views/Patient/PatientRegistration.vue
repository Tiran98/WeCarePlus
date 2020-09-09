<template>
  <v-app id="inspire">
    <v-main class="welcome-back">
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="4">
            <v-card class="">
              <v-toolbar color="primary" dark flat>
                <v-toolbar-title>Patient Registration</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-subheader class="toolbar-title">WeCare+</v-subheader>
              </v-toolbar>
              <v-card-text>
                <v-form ref="form" v-model="valid" lazy-validation>
                  <v-container fluid>
                    <v-row>
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

                      <!-- <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="name"
                          :rules="nameRules"
                          label="Full Name"
                          dense
                          required
                        ></v-text-field>
                      </v-col> -->

                      <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="email"
                          :error-messages="emailErrors"
                          label="E-mail"
                          dense
                          required
                          @input="$v.email.$touch()"
                          @blur="$v.email.$touch()"
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="6">
                        <v-text-field
                          v-model="password"
                          :type="showPassword ? 'text' : 'password'"
                          :error-messages="passwordErrors"
                          name="input-10-1"
                          label="Password"
                          hint="At least 8 characters"
                          dense
                          @input="$v.password.$touch()"
                          @blur="$v.password.$touch()"
                          :append-icon="
                            showPassword ? 'mdi-eye' : 'mdi-eye-off'
                          "
                          @click:append="showPassword = !showPassword"
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="6">
                        <v-text-field
                          v-model="confirmPassword"
                          :type="showPassword ? 'text' : 'password'"
                          :error-messages="confirmPasswordErrors"
                          name="input-10-1"
                          label="Confirm Password"
                          dense
                          @input="$v.confirmPassword.$touch()"
                          @blur="$v.confirmPassword.$touch()"
                          :append-icon="
                            showPassword ? 'mdi-eye' : 'mdi-eye-off'
                          "
                          @click:append="showPassword = !showPassword"
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="6">
                        <v-text-field
                          v-model="age"
                          type="number"
                          min="2"
                          label="Age"
                          dense
                          required
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="6">
                        <v-radio-group
                          v-model="transition"
                          hide-details
                          row
                          dense
                        >
                          <v-radio value="Male" label="Male"></v-radio>
                          <v-radio value="Female" label="Female"></v-radio>
                        </v-radio-group>
                      </v-col>

                      <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="phone"
                          :error-messages="phoneErrors"
                          label="Contact Number"
                          required
                          @input="$v.phone.$touch()"
                          @blur="$v.phone.$touch()"
                          dense
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="address"
                          :rules="nameRules"
                          label="Address"
                          dense
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="12">
                        <v-checkbox
                          v-model="checkbox"
                          :error-messages="checkboxErrors"
                          label="I accept Terms of Use & Privacy Policy."
                          required
                          @input="$v.checkbox.$touch()"
                          @blur="$v.checkbox.$touch()"
                        ></v-checkbox>
                      </v-col>

                      <!-- 
                <v-select
                  :items="items"
                  outlined
                  label="Select TeST"
                ></v-select> -->
                      <v-col cols="12" sm="12">
                        <v-btn
                          color="secondarydark"
                          class="mr-4"
                          @click="register"
                          dark
                        >
                          Sumbit
                        </v-btn>

                        <!-- <v-col cols="12" sm="12">
                        <v-btn
                          :disabled="!valid"
                          color="secondarydark"
                          class="mr-4"
                          @click="validate"
                        >
                          Sumbit
                        </v-btn> -->

                        <v-btn color="error" class="mr-4" @click="reset">
                          Clear
                        </v-btn>

                        <!-- <v-btn color="warning" @click="resetValidation">
                          Reset Validation
                        </v-btn> -->
                      </v-col>
                    </v-row>
                  </v-container>
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
import { validationMixin } from "vuelidate";
import { required, minLength, email, sameAs } from "vuelidate/lib/validators";

export default {
  mixins: [validationMixin],
  validations: {
    name: { required, minLength: minLength(4) },
    email: { required, email },
    password: { required, minLength: minLength(8) },
    confirmPassword: { sameAsPassword: sameAs("password") },
    phone: { required },
    checkbox: { required },
  },
  data() {
    return {
      name: "",
      email: "",
      password: "",
      confirmPassword: "",
      phone: "",
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
    checkboxErrors() {
      const errors = [];
      if (!this.$v.checkbox.$dirty) return errors;
      !this.$v.checkbox.required &&
        errors.push(
          "Please accept our Terms of Use & Privacy Policy before submitting the form"
        );
      return errors;
    },
  },
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

// export default {
//   name: "Employee ",
//   components: {},
//   data: () => ({
//     valid: true,
//     items: ["sanda", "tiran", "udari"],
//     name: "",
//     nameRules: [
//       (v) => !!v || "Name is required",
//       (v) => (v && v.length <= 10) || "Name must be less than 10 characters",
//     ],

//     email: "",
//     emailRules: [
//       (v) => !!v || "E-mail is required",
//       (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
//     ],
//   }),
//   methods: {
//     validate() {
//       this.$refs.form.validate();
//     },
//     reset() {
//       this.$refs.form.reset();
//     },
//     resetValidation() {
//       this.$refs.form.resetValidation();
//     },
//   },
// };
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
