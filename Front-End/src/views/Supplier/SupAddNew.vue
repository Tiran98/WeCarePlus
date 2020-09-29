<template>
  <v-app id="inspire">
    <v-main class="EmpAddNew">
      <div class="container-fluid mt-3">
        <h3>Add New Supplier</h3>
        <hr />

        <v-card-text>
          <v-form ref="supform" v-model="valid" lazy-validation>
            <v-container fluid>
              <v-row>
                <v-col cols="12" sm="12">
                  <v-text-field
                    v-model="name"
                    :rules="nameRules"
                    label="Supplier Name"
                    dense
                    required
                    @input="$v.name.$touch()"
                    @blur="$v.name.$touch()"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12">
                  <v-radio-group
                    v-model="product_type"
                    hide-details
                    dense
                    :rules="productTypeRules"
                  >
                    <v-header> Product Type </v-header>
                    <v-radio value="Drugs" label="Drugs"></v-radio>
                    <v-radio value="Equipment" label="Equipment"></v-radio>
                  </v-radio-group>
                </v-col>

                <v-col cols="12" sm="12">
                  <v-text-field
                    v-model="address"
                    :rules="addressRules"
                    label="Address"
                    @input="$v.address.$touch()"
                    @blur="$v.address.$touch()"
                    dense
                    required
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12">
                  <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    dense
                    required
                    @input="$v.email.$touch()"
                    @blur="$v.email.$touch()"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12">
                  <v-text-field
                    v-model="phone"
                    :rules="phoneRules"
                    label="Contact Number"
                    required
                    @input="$v.phone.$touch()"
                    @blur="$v.phone.$touch()"
                    dense
                  ></v-text-field>
                </v-col>

                <!-- Save & Clear buttons -->
                <v-col cols="12" sm="12">
                  <v-btn
                    color="secondarydark"
                    class="mr-4"
                    dark
                    :disabled="!valid"
                    @click="Supvalidate"
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
      name: "",
      nameRules: [
        (v) => !!v || "Name is required",
        (v) =>
          (v && v.length >= 4) || "Name must be at least 4 characters long.",
      ],
      product_type: "",
      productTypeRules: [(v) => !!v || "Product Type is required"],
      address: "",
      addressRules: [
        (v) => !!v || "Address is required",
        (v) =>
          (v && v.length >= 5) || "Address must be at least 5 characters long.",
      ],
      email: "",
      emailRules: [
        (v) => !!v || "E-mail is required",
        (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
      ],
      phone: "",
      phoneRules: [(v) => !!v || "Phone Number is required"],
      status: null,
    };
  },
  // Save & Clear buttons
  methods: {
    Supvalidate() {
      this.$refs.supform.validate();
      if (this.$refs.supform.validate()) {
        axios
          .post("http://localhost:8000/api/supplier", {
            name: this.name,
            product_type: this.product_type,
            address: this.address,
            email: this.email,
            phone: this.phone,
          })
          .then((response) => {
            console.log(response);
            console.log("Done");
            router.push({ name: "SupList" });
          });
      }
    },
    reset() {
      this.$refs.supform.reset();
      this.$refs.supform.resetValidation();
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
