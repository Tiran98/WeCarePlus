<template>
<!-- ajay -->
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
          size="100"
          color="teal"
        ></v-list-item-avatar>
      </v-list-item>

      <v-col cols="12" sm="12">
      <li class="list-group-item">
        <small class="type-age">age</small>
        <medium class="type-age">36</medium><br>

        <small class="type-Gender">Gender</small>
        <medium class="type-Gender">Male</medium><br>

        <small class="type-email">email</small>
        <medium class="type-email">susithasenarathne@gmail.com</medium><br>

        <small class="type-Degree">Degree</small>
        <medium class="type-Degree">M.Sc - Anotomy</medium><br>

        <small class="type-department">Department</small>
        <medium class="type-department">-</medium><br>

        <small class="type-Specialized">Specialized</small>
        <medium class="type-Specialized">Specialized</medium><br>
      </li>
      </v-col>

      <v-card-actions>
        <v-col cols="12" sm="12">

          <v-btn
          color="secondarydark"
          class="mr-4"
          dark
        >
        Edit Doctor Details
        </v-btn>
        <v-btn color="error" class="mr-4" >
          Delete Account
          </v-btn>
        </v-col>
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
.mr-2 span{
  font-size: 25px;
}
.list-group-item small{
  padding-right: 20px;
}


</style>