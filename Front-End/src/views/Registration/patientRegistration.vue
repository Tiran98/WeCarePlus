<template>
   <v-app id="inspire">
    <v-main>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="primary"
                dark
                flat
              >
                <v-toolbar-title>Patient Registation</v-toolbar-title>
                <v-spacer></v-spacer>
               
              </v-toolbar>
              <v-card-text>
                <v-form ref="form" @submit.prevent="validate" v-model="valid" lazy-validation>
                   <v-text-field
                    v-model="name"
                    :counter="10"
                    :rules="nameRules"
                    label="Full Name"
                    name="name"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    name="email"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="password"
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                  ></v-text-field>
                  <v-text-field
                    id="Repassword"
                    label="Re Enter Password"
                    name="repassword"
                    prepend-icon="mdi-lock"
                    type="password"
                  ></v-text-field>
                
                  <v-header>Gender</v-header>
                  <v-radio-group v-model="gender" hide-details name="gender"> 
                    <v-radio value="Male" label="Male"></v-radio>
                    <v-radio value="Female" label="Female"></v-radio>
                  </v-radio-group>

                  <v-text-field
                    v-model="age"
                    :counter="3"
                    :rules="nameRules"
                    label="Age"
                    required
                    name="age"
                  ></v-text-field>

                  <v-text-field
                    v-model="address"
                    :counter="50"
                    :rules="nameRules"
                    label="Address"
                    name="age"
                    required
                  ></v-text-field>

                  <v-checkbox
                    v-model="checkbox"
                    :rules="[v => !!v || 'You must agree to continue!']"
                    label="Agree to terms and conditions"
                    required
                  ></v-checkbox>

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
import axios from 'axios'
import router from '../../router'

  export default {
      data: () => ({

        return :{
          patient:{
            name:'',
            email:'',
            password:'',
            gender:'',
            age:'',
            address:'',
          }
        },

        valid: true,

        password: '',
        passwordRules: [
          value => !!value || 'Required.',
          v => v.length >= 8 || 'Min 8 characters',
        ],
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
        register() {
          axios.post('/api/register',{
            name : this.name,
            email : this.email,
            password : this.password,
            gender : this.gender,
            age : this.age,
            address : this.address
          })
          .then((res) => {
            console.log(res)
            router.push({name: 'login'})
          })
          .catch((err) => {
            console.log(err)
          })
        },
        validate () {

        axios.post('http://localhost:8001/api/register',{name:this.name,
        email : this.email,
        password : this.password,
        gender : this.gender,
        age : this.age,
        address : this.address}).then((response)=>
        {
          console.log(response);
          console.log("Done");
        })
        

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
