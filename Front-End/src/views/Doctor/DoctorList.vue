<template>
<!-- ajay -->
  <v-main>
    <div class="container-fluid mt-3">
      <h3>Doctor List</h3>
      <hr />
      
      
      <div class="d-flex flex-row-reverse">
        <div class="searchbox">
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Type Docotor's name"
            single-line
            hide-details
          ></v-text-field>
        </div>
      </div>
      

      <v-data-table
        :headers="headers"
        :items="employeeid"
        :items-per-page="10"
        class="elevation-1"
      ></v-data-table>
      <Baseline />
    </div>
        
  </v-main>
</template>

<script>
import Baseline from "../../components/Baseline.vue";

export default {
  name: "Doctor ",
  components: {
    Baseline,
  },
  data() {
    return {
      headers: [
        {
          text: "Doctor ID",
          align: "start",
          sortable: false,
          value: "id",
        },
        { text: "Name", value: "type" },
        { text: "Age", value: "address" },
        { text: "Gender", value: "email" },
        { text: "Email", value: "number" },
        { text: "Mobile", value: "number" },
        { text: "Address", value: "type" },
        { text: "Department", value: "type" },
        { text: "Degree", value: "type" },
        { text: "Speciallized in", value: "type" },

        <td>
          <a href="">Edit</a>
          <a href="">Delete</a>
        </td>,
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
h3 {
  color: teal;
  font-weight: 500;
  font-size: 30px;
  padding-left: 20px;
}
.searchbox {
  margin: auto;
  width: 40%;
  padding-bottom: 10px;
}


</style>