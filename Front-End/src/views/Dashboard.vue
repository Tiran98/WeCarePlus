<template>
  <div class="dashboard">
    <MainDash />
    <Baseline />
  </div>
</template>

<script>
import Baseline from "../components/Baseline.vue";
import MainDash from "../components/MainDash.vue";

export default {
  name: "Dashboard",
  components: {
    Baseline,
    MainDash,
  },
};
</script>
