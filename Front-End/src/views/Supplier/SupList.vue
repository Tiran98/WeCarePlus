<template>
  <div class="container-fluid mt-3">
    <v-main>
      <h3>Supplier List</h3>
      <hr />

      <v-data-table
        :headers="headers"
        :items="SupplierList"
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
                    label="Search the Name"
                    single-line
                    hide-details
                  ></v-text-field>
                </div>
              </template>

              <v-card>
                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem._id"
                          label="Supplier ID"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.name"
                          label="Supplier Name"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.product_type"
                          label="Product Type"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.address"
                          label="Address"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.email"
                          label="Email"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.phone"
                          label="Phone"
                        ></v-text-field>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-card-text>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="close"
                    >Cancel</v-btn
                  >
                  <v-btn color="blue darken-1" text @click="save">Save</v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-toolbar>
        </template>

        <!-- Action Buttons -->
        <template v-slot:[`item.actions`]="{ item }">
          <v-icon small class="mr-2" @click="editItem(item)">
            mdi-pencil
          </v-icon>
          <v-icon small @click="deleteItem(item)">
            mdi-delete
          </v-icon>
        </template>

        <!-- Baseline Import -->
      </v-data-table>
      <v-snackbar
        v-model="success_snackbar"
        color="#43A047"
        centered
        elevation="24"
        :timeout="timeout"
      >
        {{ success_text }}

        <template v-slot:action="{ attrs }">
          <v-btn
            color="#43A047"
            success_text
            v-bind="attrs"
            @click="success_snackbar = false"
          >
            Close
          </v-btn>
        </template>
      </v-snackbar>
      <v-snackbar
        v-model="fail_snackbar"
        color="#C62828"
        centered
        elevation="24"
        :timeout="timeout"
      >
        {{ fail_text }}

        <template v-slot:action="{ attrs }">
          <v-btn
            color="#C62828"
            fail_text
            v-bind="attrs"
            @click="fail_snackbar = false"
          >
            Close
          </v-btn>
        </template>
      </v-snackbar>
      <v-btn
        :disabled="SupplierList === [] ? true : false"
        color="secondarydark"
        class="text-center"
        href="http://localhost:8000/api/supplier-generate-pdf" target="_blank"
      >
        Download Supplier List
        <v-icon right>
          mdi-cloud-download
        </v-icon>
      </v-btn>
      <Baseline />
      
    </v-main>
  </div>
</template>

<script>
import axios from "axios";
// Baseline Import
import Baseline from "../../components/Baseline.vue";

export default {
  name: "SupplierList",
  components: {
    Baseline,
  },
  data: () => ({
    dialog: false,
    search: "",
    success_snackbar: false,
    fail_snackbar: false,
    timeout: 5000,
    success_text: "Operation Successful !",
    fail_text: "Operation Failed !",
    headers: [
      {
        text: "Supplier ID",
        align: "start",
        sortable: false,
        value: "_id",
      },
      { text: "Supplier Name", value: "name" },
      { text: "Product Type", sortable: false, value: "product_type" },
      {
        text: "Address",
        align: "start",
        sortable: false,
        value: "address",
      },
      {
        text: "Email",
        align: "start",
        sortable: false,
        value: "email",
      },
      {
        text: "Number",
        align: "start",
        sortable: false,
        value: "phone",
      },
      {
        text: "Actions",
        value: "actions",
        sortable: false,
      },
    ],
    SupplierList: [],
    editedIndex: -1,
    editedItem: {
      _id: "",
      name: "",
      product_type: "",
      address: "",
      email: "",
      phone: "",
    },
    defaultItem: {
      _id: "",
      name: "",
      product_type: "",
      address: "",
      email: "",
      phone: "",
    },
  }),
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Appointment" : "Edit Appointment";
    },
  },
  watch: {
    dialog(val) {
      val || this.close();
    },
  },
  created() {
    this.loadSuppliers();
  },
  methods: {
    //Default First Item
    loadSuppliers() {
      axios.get("http://localhost:8000/api/supplier").then((response) => {
        console.log("response", response);
        console.log("Done");
        response.status == 200
          ? (this.SupplierList = response.data)
          : console.log("error fetching suppliers");
      });
    },
    updateSupplier(_id) {
      axios
        .put("http://localhost:8000/api/supplier/" + _id, {
          name: this.editedItem.name,
          product_type: this.editedItem.product_type,
          address: this.editedItem.address,
          email: this.editedItem.email,
          phone: this.editedItem.phone,
        })
        .then((response) => {
          console.log(response);
          console.log("Done Update");
          console.log(response.status);
          response.status == 200
            ? (this.success_snackbar = true)
            : (this.fail_snackbar = true);
        });
    },
    deleteSuppliers(_id) {
      axios
        .delete("http://localhost:8000/api/supplier/" + _id)
        .then((response) => {
          console.log("response", response);
          console.log("Done Delete");
          response.status == 200
            ? (this.success_snackbar = true)
            : (this.fail_snackbar = true);
        });
    },
    editItem(item) {
      this.editedIndex = this.SupplierList.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },
    deleteItem(item) {
      const index = this.SupplierList.indexOf(item);
      let r = confirm("Are you sure you want to delete this item ?");
      if (r == true) {
        this.SupplierList.splice(index, 1);
        this.deleteSuppliers(item._id);
      }
    },
    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },
    save() {
      if (this.editedIndex > -1) {
        Object.assign(this.SupplierList[this.editedIndex], this.editedItem);
        this.updateSupplier(this.editedItem._id);
      } else {
        this.SupplierList.push(this.editedItem);
      }
      this.close();
    },
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
