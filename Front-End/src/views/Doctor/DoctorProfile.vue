<template>

   <v-app id="inspire">
    <v-main>

      <div class="container-fluid mt-3">
        <h3>Doctor Profile</h3>
      <hr />

    <v-card
        class="mx-auto"
        max-width="600"
        outlined
      >

      <v-list-item three-line>
        <v-list-item-content>
          <div class="overline mb-4">Doctor Profile</div>
          <div class="mr-2">
            <span>Susitha Senarathne</span><br />
            <small class="type-degree">M.Sc - Anotomy</small><br>
            <small class="type-department">General Physician</small>
          </div>
        </v-list-item-content>

        <v-list-item-avatar
          tile
          size="80"
          color="grey"
        ></v-list-item-avatar>
      </v-list-item>

      <v-card-actions>
        <v-btn text>Button</v-btn>
        <v-btn text>Button</v-btn>
      </v-card-actions>
    </v-card>
         
      <Baseline />
    </div>
      
    </v-main>
    
  </v-app>

      
  
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

      ],
    };
  },
};
</script>

<style lang="scss" scoped>
h3 {
  color: teal;
  font-weight: 500;
  font-size: 25px;
  padding-left: 20px;
}

.mx-auto{
  margin-top: 15px;
}
span{
  font-size: 25px;
}

</style>