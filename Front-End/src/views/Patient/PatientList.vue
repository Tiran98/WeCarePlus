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
        :items="employeeid"
        :items-per-page="10"
        class="elevation-1 mt-3"
      ></v-data-table>
      <Baseline />
      <h4>{{ $route.params.id }}</h4>
    </div>
  </v-main>
</template>

<script>
import Baseline from "../../components/Baseline.vue";

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
          value: "id",
        },
        { text: "Name", value: "type" },
        { text: "Age", value: "address" },
        { text: "Gender", value: "email" },
        { text: "Email", value: "number" },
        { text: "Mobile", value: "number" },
        { text: "Action", value: "action" },

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
}

.search-box {
  width: 40%;
}
</style>
