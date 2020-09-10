<template>
  <v-main>
    <div class="container-fluid mt-3">
      <h3>Add New Patient</h3>
      <hr />
      <Baseline />
    </div>
  </v-main>
</template>

<script>
import Baseline from "../../components/Baseline.vue";

export default {
  name: "AddNewPatient",
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
