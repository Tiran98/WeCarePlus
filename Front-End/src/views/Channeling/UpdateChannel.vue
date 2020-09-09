<template>
<div class="container">
  <v-form
    ref="form"
    v-model="valid"
    lazy-validation
  >
    
 <v-form-title><h3><B> Update Appointmnent </B></h3></v-form-title>
    
    <v-text-field
      v-model="name"
      :counter="10"
      :rules="nameRules"
      label="Full Name"
      required
    ></v-text-field>

    <v-text-field
      v-model="number"
      :counter="10"
      :rules="numberRules"
      label="Phone Number"
      required
    ></v-text-field>

    <v-text-field
      v-model="email"
      :rules="emailRules"
      label="E-mail"
      required
    ></v-text-field>

     <v-col cols="12">
        <header>Contact Method</header>
      <v-container fluid>
    <v-radio-group v-model="radios" :mandatory="false">
      <v-radio label="Email" value="radio-1"></v-radio>
      <v-radio label="Phone" value="radio-2"></v-radio>
    </v-radio-group>
  </v-container>
  </v-col>

    <v-container id="dropdown-example">
    <v-row>
      <v-col cols="12" sm="4">
        <p>Service</p>

        <v-overflow-btn
          class="my-2"
          :items="dropdown_service"
          label="Service Btn"
          Service
          target="#dropdown_example"
        ></v-overflow-btn>
      </v-col>

      <v-col cols="12" sm="4">
        <p>Doctor</p>

        <v-overflow-btn
          class="my-2"
          :items="dropdown_name"
          label="Doctor Btn"
          Doctor
          target="#dropdown-example"
        ></v-overflow-btn> -->
      </v-col>
    </v-row>
    </v-container>

    <v-row justify="center">
        <v-date-picker v-model="picker" color="green lighten-1" header-color="primary">
            </v-date-picker>
             </v-row>

     <v-row justify="center">
        <v-time-picker v-model="e4" color="green lighten-1">
            </v-time-picker>
             </v-row>         

    <v-text-field
      v-model="name"
      :counter="100"
      :rules="nameRules"
      label="Details"
      required
    ></v-text-field>

    <v-col cols="12">
        <header>First Time Visit</header>
      <v-container fluid>
    <v-radio-group v-model="radios" :mandatory="false">
      <v-radio label="Yes" value="radio-1"></v-radio>
      <v-radio label="No" value="radio-2"></v-radio>
    </v-radio-group>
  </v-container>
  </v-col>


    <v-checkbox
      v-model="checkbox"
      :rules="[v => !!v || 'You must agree to continue!']"
      label="Do you agree?"
      required
    ></v-checkbox>

    <v-btn
      :disabled="!valid"
      class="mr-4 validate-btn"
      @click="SubmitAnAppointment"
    >
      Submit An Appointment
    </v-btn>

    <v-btn
      color="primarydark"
      class="mr-4 validate-btn"
      @click="Cancel"
    >
      Cancel
    </v-btn>

    
  </v-form>
  </div>
</template>

<script>
  export default {
    data: () => ({
      valid: true,
      name: '',
      nameRules: [
        v => !!v || 'Your Name is required',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters',
      ],

      number: '',
      numberRules: [
        v => !!v || 'Your Number is required',
        v => (v && v.length <= 10) || 'Phone must be less than 10 integers',
      ],

      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
     
      dropdown_service: [
          'Clinic','Surgery','O.P.D'
      ],
      
      dropdown_name: [
        { text: 'Dr.Jayalath', callback: () => console.log('Dr.Jayalath') },
        { text: 'Dr.Sudarshani', callback: () => console.log('Dr.Sudarshani') },
        { text: 'Dr.Shadeen', callback: () => console.log('Dr.Shadeen') },
      ],

        return: {
        picker: new Date().toISOString().substr(0,10),
        e4:null,
        radioGroup: 1,
        //radioGroup: 1,
       },
    

      checkbox: false,
    }),
    methods: {
      SubmitAnAppointment () {
        this.$refs.form.SubmitAnAppointment()
      },
      Cancel () {
        this.$refs.form.Cancel()
      },
     
    },
  }
</script>

<style scoped>
.validate-btn {
    background-color: teal;
    color: #000;
}
</style>
