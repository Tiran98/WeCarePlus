<template>
  <div class="container-fluid mt-3">
    <v-main>
      <h3>Order History</h3>
      <hr />

      <v-data-table
        :headers="headers"
        :items="OrderList"
        :search="search"
        sort-by="_id"
        class="elevation-1"
      >
        <template v-slot:top>
          <v-toolbar flat color="white">
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="700px">
            <template v-slot:activator="{}">
              <div class="search-box">
                <v-text-field
                  v-model="search"
                  append-icon="mdi-magnify"
                  label="Search the Order"
                  single-line
                  hide-details
                ></v-text-field>
              </div>
            </template>
            </v-dialog>
          </v-toolbar>
        </template>

        <!-- Baseline Import -->
      </v-data-table>
      <Baseline />
    </v-main>
  </div>
</template>

<script>
import axios from "axios";
// Baseline Import
import Baseline from "../../components/Baseline.vue";

export default {
  name: "OrderHistory",
  components: {
    Baseline,
  },
  data: () => ({
    search: "",
    dialog:false,
    headers: [
      {
        text: "Order ID",
        align: "start",
        sortable: false,
        value: "_id",
      },
      { text: "Supplier Name", value: "suppliers.name" },
      { text: "Item Name", sortable: false, value: "item_name" },
      {
        text: "Quantity",
        align: "start",
        sortable: false,
        value: "qty",
      },
      {
        text: "Message",
        align: "start",
        sortable: false,
        value: "message",
      },
    ],
    OrderList: [],
  }),

  created() {
    this.loadOrders();
  },
  methods: {
    //Default First Item
    loadOrders() {
      axios.get("http://localhost:8000/api/stock-order").then((response) => {
        console.log("response", response);
        console.log("Done");
        response.status == 200
          ? (this.OrderList = response.data)
          : console.log("error fetching order history");
      });
    }
  },
};
</script>

<style scoped>
h3 {
  color: teal;
  font-weight: 500;
  font-size: 40px;
  padding-left: 10px;
}
</style>
