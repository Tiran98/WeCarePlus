<template>

   <v-app id="inspire">
    <v-main>

        <div class="container-fluid mt-3">
      <h3>Add New Employee</h3>
      <hr />

      <v-card class="">
              
              <v-card-text>
                <v-form ref="form" v-model="valid" lazy-validation>
<<<<<<< Updated upstream
                   <v-text-field
                    v-model="name"
                    :counter="10"
                    :rules="nameRules"
                    label="Name"
                    required
                  ></v-text-field>

                  <v-text-field
                  v-model="age"
                  :counter="3"
                  type = "number"
                  min = "18"
                  label="Age"
                  required
                ></v-text-field>

                   <v-header>Gender</v-header>
                <v-radio-group v-model="transition" hide-details>
                  <v-radio value="Male" label="Male"></v-radio>
                  <v-radio value="Female" label="Female"></v-radio>
                  
                </v-radio-group>

                  <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    required
                  ></v-text-field>
=======
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

                      <v-col cols="12" sm="4">
                        <v-text-field
                          v-model="age"
                          type="number"
                          min="18"
                          label="Age"
                          dense
                          required
                        ></v-text-field>
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
                          :error-messages="addressErrors"
                          label="Address"
                          @input="$v.address.$touch()"
                          @blur="$v.address.$touch()"
                          dense
                          required
                        ></v-text-field>
                      </v-col>

                      <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                         v-model="emptype"
                         :items="emptype"
                         label="Employee Type"
                         dense
                         outlined
                        ></v-select>
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
>>>>>>> Stashed changes
                </v-form>

                <v-text-field
                    v-model="emptype"
                    label="Contact Number"
                    required
                  ></v-text-field>

                <v-text-field
                  v-model="address"
                  :counter="50"
                  :rules="nameRules"
                  label="Address"
                  required
                ></v-text-field>

                <v-text-field
                    v-model="emptype"
                    :rules="nameRules"
                    label="Employee Type"
                    required
                  ></v-text-field>

                <v-btn
                  :disabled="!valid"
                  color="success"
                  class="mr-4"
                  @click="validate"
                >
                  Validate
                </v-btn>

                <v-btn
                  color="error"
                  class="mr-4"
                  @click="reset"
                >
                  Reset Form
                </v-btn>

                <v-btn
                  color="warning"
                  @click="resetValidation"
                >
                  Reset Validation
                </v-btn>
              </v-card-text>
            </v-card>
         
      <Baseline />
    </div>
      
    </v-main>
    
  </v-app>

      
  
</template>

<script>

import Baseline from "../../components/Baseline.vue";
<<<<<<< Updated upstream
=======
import { validationMixin } from "vuelidate";
import { required, minLength, email, sameAs } from "vuelidate/lib/validators";

export default {
  name: "Employee",
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
>>>>>>> Stashed changes

  export default {
      name: "Employee ",
         components: {
        Baseline,
        },
      data: () => ({
        valid: true,

        name: '',

        nameRules: [
          v => !!v || 'Name is required',
          v => (v && v.length <= 10) || 'Name must be less than 10 characters',
        ],
        
        email: '',
        emailRules: [
          v => !!v || 'E-mail is required',
          v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
      }),
      methods: {
        validate () {
          this.$refs.form.validate()
        },
        reset () {
          this.$refs.form.reset()
        },
        resetValidation () {
          this.$refs.form.resetValidation()
        },
      },
    }

</script>

<style lang="scss" scoped>
h3 {
  color: teal;
  font-weight: 500;
  font-size: 30px;
}

</style>