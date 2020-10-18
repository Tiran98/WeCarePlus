<template>
  <v-main>
    <div class="container-fluid mt-3">
      <h3>Patient List</h3>
      <hr />
      <div class="d-flex flex-row-reverse">
        <div class="search-box">
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Type Patient's name"
            single-line
            hide-details
          ></v-text-field>
        </div>
      </div>
      <v-data-table
        :headers="headers"
        :items="patients"
        :items-per-page="10"
        class="elevation-1 mt-3"
      ></v-data-table>
      <Baseline />
    </div>
  </v-main>
</template>

<script>
import Baseline from "../../components/Baseline.vue";
import axios from 'axios'

export default {
  name: "PatientList",
  components: {
    Baseline,
  },
  data() {
    return {
      headers: [
        {
          text: "Patient ID",
          align: "start",
          sortable: false,
          value: "_id",
        },
        { text: "Name", value: "name" },
        { text: "Age", value: "age" },
        { text: "Gender", value: "gender" },
        { text: "Email", value: "email" },
        { text: "Mobile", value: "phone" },
        { text: "Address", value: "address" },
        { text: "Action", value: "action" },

        <td>
          <a href="">Edit</a>
          <a href="">Delete</a>
        </td>,
      ],
      patients: [],
      editedIndex: -1,
      editedItem: {
        _id:"",
        name:"",
        age:"",
        gender:"",
        email:"",
        phone:"",
        address:"",
      },
      defaultItem: {
        _id:"",
        name:"",
        age:"",
        gender:"",
        email:"",
        phone:"",
        address:"",
      },
    };
  },
  created() {
    this.getPatients();
  },
  methods: {
    getPatients(){
      axios.get('http://127.0.0.1:8000/api/patientIndex')
      .then((response)=> {
        console.log("response", response);
        console.log("Done");
        response.status == 200
          ? (this.patients = response.data)
          : console.log("error fetching data");
      })
    }
  },
  mounted() {
    this.getPatients()
  },
};
</script>

<style lang="scss" scoped>
h3 {
  color: teal;
  font-weight: 500;
}

.search-box {
  width: 40%;
}
</style>
