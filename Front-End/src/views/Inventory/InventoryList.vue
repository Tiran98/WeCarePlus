<template>
   <v-app id="inspire">
    <v-main>
     <div class="container-fluid mt-3">
      <h3>Inventory List</h3>
      <hr />
      <v-card>
      <v-card-title>
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Type Drug/Equipment ID or Name"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="desserts"
        :search="search"
      ></v-data-table>
      </v-card>  
      <Baseline />
     </div>      
    </v-main>
   </v-app>
</template>

<script>
import Baseline from "../../components/Baseline.vue";

export default {
  name: "InventryList",
  components: {
    Baseline,
  },
   data() {
    return {
      headers: [
        {
          text: "Product ID",
          align: "start",
          sortable: false,
          value: "id",
        },
        { text: "Name", value: "productName" },
        { text: "Type", value: "productType" },
        { text: "Brand", value: "productBrand" },
        { text: "Quantity Received", value: "quanitytReceived" },
        { text: "Quantity Available", value: "quantityAvailable" },
        { text: "Price", value: "productPrice" },
        { text: "Action", value: "productAction" },
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
}
</style>