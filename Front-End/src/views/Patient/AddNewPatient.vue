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
