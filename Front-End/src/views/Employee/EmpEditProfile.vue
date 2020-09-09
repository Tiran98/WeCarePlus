<template>

   <v-app id="inspire">
    <v-main>

        <div class="container-fluid mt-3">
      <h3>Edit Employee Profile</h3>
      <hr />

      <v-card class="">
              
              <v-card-text>
                <v-form ref="form" v-model="valid" lazy-validation>
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