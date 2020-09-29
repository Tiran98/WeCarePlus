<template>
  <v-app id="inspire">
    <v-main class="EmpAddNew">
      <div class="container-fluid mt-3">
        <h3>Add New Order</h3>
        <hr />

        <v-card-text>
          <v-form ref="orderform" v-model="valid" lazy-validation>
            <v-container fluid>
              <v-row>
                <v-col cols="12" sm="12">
                  <v-select
                    v-model="supplier_id"
                    item-text="name"
                    item-value="_id"
                    :items="SupplierList"
                    label="Supplier"
                    :rules="supplierRules"
                    required
                    @input="$v.supplier_id.$touch()"
                    @blur="$v.supplier_id.$touch()"
                  ></v-select>
                </v-col>

                <v-col cols="12" sm="12">
                  <v-text-field
                    v-model="item_name"
                    :rules="itemNameRules"
                    label="Item Name"
                    @input="$v.item_name.$touch()"
                    @blur="$v.item_name.$touch()"
                    dense
                    required
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12">
                  <v-text-field
                    v-model="qty"
                    :rules="qtyRules"
                    label="Quantity"
                    dense
                    required
                    @input="$v.qty.$touch()"
                    @blur="$v.qty.$touch()"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12">
                  <v-textarea
                    v-model="message"
                    :rules="messageRules"
                    name="input-7-1"
                    label="Message"
                    required
                    @input="$v.message.$touch()"
                    @blur="$v.message.$touch()"
                    dense
                  ></v-textarea>
                </v-col>

                <!-- Save & Clear buttons -->
                <v-col cols="12" sm="12">
                  <v-btn
                    color="secondarydark"
                    class="mr-4"
                    dark
                    :disabled="!valid"
                    @click="validate"
                  >
                    Save
                  </v-btn>

                  <v-btn color="error" class="mr-4" @click="reset">
                    Clear
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </v-card-text>
      </div>

      <!-- import baseline -->
      <Baseline />
    </v-main>
  </v-app>
</template>

<script>
import axios from "axios";
import router from "../../router";

import Baseline from "../../components/Baseline.vue";

export default {
  name: "Supplier",
  components: {
    Baseline,
  },

  data() {
    return {
      valid: true,
      supplier_id: "",
      supplierRules: [(v) => !!v || "Supplier is required"],
      item_name: "",
      itemNameRules: [(v) => !!v || "Item is required"],
      qty: 0,
      qtyRules: [(v) => !!v || "Quantity is required"],
      message: "",
      messageRules: [(v) => !!v || "Message is required"],
      SupplierList:[],
      status: null,
    };
  },
  created() {
    this.loadSuppliers();
  },
  methods: {
    loadSuppliers() {
      axios.get("http://localhost:8000/api/supplier/create").then((response) => {
        console.log("response", response);
        console.log("Done");
        response.status == 200
          ? (this.SupplierList = response.data)
          : console.log("error fetching suppliers");
      });
    },
    validate() {
      this.$refs.orderform.validate();
      if (this.$refs.orderform.validate()) {
        axios
          .post("http://localhost:8000/api/stock-order", {
            supplier_id: this.supplier_id,
            item_name: this.item_name,
            qty: this.qty,
            message: this.message,
          })
          .then((response) => {
            console.log(response);
            console.log("Done");
            router.push({ name: "ListOrderHistory" });
          });
      }
    },
    reset() {
      this.$refs.orderform.reset();
      this.$refs.orderform.resetValidation();
    },
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lobster&display=swap");

h3 {
  color: teal;
  font-weight: 500;
  font-size: 40px;
  padding-left: 10px;
}

.btn-login {
  text-decoration: none;
}
.toolbar-title {
  font-family: "Lobster", cursive;
}
</style>
