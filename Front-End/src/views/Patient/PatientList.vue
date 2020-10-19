<template>
  <v-app id="inspire">
    <v-main>
      <div class="container-fluid mt-3">
        <h3>Patients List</h3>
        <hr />
        <div class="d-flex flex-row-reverse">
          <div class="search-box">
            <v-text-field
              v-model="search"
              append-icon="mdi-magnify"
              label="Type Patient's name"
              single-line
              hide-details
            ></v-text-field>
          </div>
        </div>

        <!-- Report generate -->
        <v-btn
          :disabled="patients === [] ? true : false"
          color="secondarydark"
          class="btn"
          href="http://127.0.0.1:8000/api/patientListGen-pdf"
          target="_blank"
          dark
        >
          Download Patient List
          <v-icon right>
            mdi-download
          </v-icon>
        </v-btn>

        <v-data-table
          :headers="headers"
          :items="patients"
          :items-per-page="10"
          class="elevation-1 mt-1"
        >
          <template v-slot:top>
            <v-toolbar flat color="white">
              <v-spacer></v-spacer>
              <v-dialog v-model="dialog" max-width="500px">
                <v-card>
                  <v-card-text>
                    <v-container>
                      <v-row>
                        <v-col cols="12" sm="6" md="6">
                          <v-text-field
                            v-model="editedItem._id"
                            label="Patient ID"
                            disabled
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="6">
                          <v-text-field
                            v-model="editedItem.name"
                            label="Patient Name"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="6">
                          <v-text-field
                            v-model="editedItem.age"
                            label="Age"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="6">
                          <v-text-field
                            v-model="editedItem.gender"
                            label="Gender"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="6">
                          <v-text-field
                            v-model="editedItem.phone"
                            label="Phone"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="6">
                          <v-text-field
                            v-model="editedItem.address"
                            label="Address"
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
                    <v-btn color="blue darken-1" text @click="Save">Save</v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>
            </v-toolbar>
          </template>

          <!-- Action Buttons -->
          <template v-slot:[`item.action`]="{ item }">
            <v-icon small class="mr-2" @click="editItem(item)">
              mdi-pencil
            </v-icon>
            <v-icon small @click="deleteItem(item)">
              mdi-delete
            </v-icon>
          </template>
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

        <Baseline />
      </div>
    </v-main>
  </v-app>
</template>

<script>
import Baseline from "../../components/Baseline.vue";
import axios from "axios";

export default {
  name: "PatientList",
  components: {
    Baseline,
  },
  data() {
    return {
      dialog: false,
      timeout: 5000,
      success_snackbar: false,
      fail_snackbar: false,
      success_text: "Operation Sucessful!",
      fail_text: "Operation Failed!",
      headers: [
        {
          text: "Patient ID",
          align: "start",
          value: "_id",
        },
        { text: "Name", value: "name" },
        { text: "Age", value: "age" },
        { text: "Gender", value: "gender", sortable: false },
        { text: "Email", value: "email", sortable: false },
        { text: "Mobile", value: "phone", sortable: false },
        { text: "Address", value: "address", sortable: false },
        { text: "Action", value: "action", sortable: false },
      ],
      patients: [],
      editedIndex: -1,
      editedItem: {
        _id: "",
        name: "",
        age: "",
        gender: "",
        email: "",
        phone: "",
        address: "",
      },
      defaultItem: {
        _id: "",
        name: "",
        age: "",
        gender: "",
        email: "",
        phone: "",
        address: "",
      },
    };
  },
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
    this.getPatients();
  },
  methods: {
    getPatients() {
      axios.get("http://127.0.0.1:8000/api/patientlist").then((response) => {
        console.log("response", response);
        console.log("Done");
        response.status == 200
          ? (this.patients = response.data)
          : console.log("error fetching data");
      });
    },
    updatePatient(_id) {
      axios
        .put("http://127.0.0.1:8000/api/patientlist/" + _id, {
          name: this.editedItem.name,
          age: this.editedItem.age,
          gender: this.editedItem.gender,
          phone: this.editedItem.phone,
          address: this.editedItem.address,
        })
        .then((response) => {
          console.log("response", response);
          console.log("Done Update");
          console.log(response.status);
          response.status == 200
            ? this.success_snackbar == true
            : this.fail_snackbar == true;
        });
    },
    editPatient(_id) {
      axios
        .get("http://127.0.0.1:8000/api/patientlist/" + _id)
        .then((response) => {
          console.log("response", response);
          console.log("Done Update");
          console.log(response.status);
          response.status == 200
            ? (this.editedItem = response.data)
            : console.log("error fetching data");
        });
    },
    deletePatient(_id) {
      axios
        .delete("http://127.0.0.1:8000/api/patientlist/" + _id)
        .then((response) => {
          console.log("response", response);
          console.log("Done Delete");
          console.log(response.status);
          response.status == 200
            ? this.success_snackbar == true
            : this.fail_snackbar == true;
        });
    },
    editItem(item) {
      this.editedIndex = this.patients.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },
    deleteItem(item) {
      const index = this.patients.indexOf(item);
      let r = confirm("Are you sure?");
      if (r == true) {
        this.patients.splice(index, 1);
        this.deletePatient(item._id);
      }
    },
    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },
    Save() {
      if (this.editedIndex > -1) {
        Object.assign(this.patients[this.editedIndex], this.editedItem);
        this.updatePatient(this.editedItem._id);
      } else {
        this.patients.push(this.editedItem);
      }
      this.close();
    },
  },
  mounted() {
    this.getPatients();
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
