<template>
  <div class="dashboard">
    <PatientDash />
    <BaselinePat />
  </div>
</template>

<script>
import BaselinePat from "../../components/BaselinePat.vue";
import PatientDash from "../../components/PatientDash.vue";

export default {
  name: "PatientDashboard",
  components: {
    BaselinePat,
    PatientDash,
  },
};
</script>
