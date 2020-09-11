<template>

  <v-app id="inspire">
    <v-main class="EmpAddNew">

      <div class="container-fluid mt-3">
        <h3>Add New Employee</h3>
        <hr />

              <v-card-text>
                <v-form ref="form" @submit.prevent="Empvalidate" v-model="valid" lazy-validation>
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
                        <v-radio-group
                          v-model="gender"
                          hide-details
                          dense
                        >
                          <v-header> Gender </v-header> 
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

                        <v-btn
                          color="secondarydark"
                          class="mr-4"
                          @click="Empvalidate"
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

      <!-- import baseline -->
      <Baseline />
    </v-main>
  </v-app>

</template>

<script>
import axios from 'axios'
import router from '../../router'

import Baseline from "../../components/Baseline.vue";
import { validationMixin } from "vuelidate";
import { required, minLength, email, sameAs } from "vuelidate/lib/validators";
export default {
  name: "Employee ",
  components: {
    Baseline,
  },

  mixins: [validationMixin],
  validations: {
    name: { required, minLength: minLength(4) },
    email: { required, email },
    password: { required, minLength: minLength(8) },
    confirmPassword: { sameAsPassword: sameAs("password") },
    phone: { required },
  },
  data: () => ({
    return :{
      Employee:{
        name:'',
        email:'',
        password:'',
        gender:'',
        phone:'',
        age:'',
        address:'',
      }
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
  },
}),  
  methods: {
     Empvalidate () {
      axios.post('http://localhost:8000/api/addEmp',{
      name:this.name,
      email : this.email,
      password : this.password,
      gender : this.gender,
      phone : this.phone,
      age : this.age,
      address : this.address}).then((response)=>
      {
        console.log(response);
        console.log("Done");
        router.push({name: 'EmpList'})
      })
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