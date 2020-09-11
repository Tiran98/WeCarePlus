<template>
  <div class="container-fluid mt-3">
    <v-main>
      <h3>Add New Appointment</h3>
      <hr />
      <v-data-table
        :headers="headers"
        :items="Appointment"
        sort-by="patientNo"
        class="elevation-1"
      >
        <template v-slot:top>
          <v-toolbar flat color="white">
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="500px">
              <template v-slot:activator="{}">
                <div class="search-box">
                  <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search the date"
                    single-line
                    hide-details
                  ></v-text-field>
                </div>
              </template>
              <v-card>
                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.patientName"
                          label="Patient Name"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.patientNo"
                          label="Patient No"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.appDate"
                          label="App.Date"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.time"
                          label="Time"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.doctor"
                          label="Doctor"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.service"
                          label="Service"
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
        <template v-slot:[`item.actions`]="{ item }">
          <v-icon small class="mr-2" @click="editItem(item)">
            mdi-pencil
          </v-icon>
          <v-icon small @click="deleteItem(item)">
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
      <BaselinePat />
    </v-main>
  </div>
</template>

<script>
import BaselinePat from "../../components/BaselinePat.vue";

export default {
  name: "AddChanneling",
  components: {
    BaselinePat,
  },
  data: () => ({
    dialog: false,
    headers: [
      {
        text: "Patient ID",
        align: "start",
        sortable: false,
        value: "patientNo",
      },

      { text: "Patient Name", value: "name" },

      { text: "App.Date", value: "appDate" },

      {
        text: "Time",
        align: "start",
        sortable: false,
        value: "time",
      },

      {
        text: "Doctor",
        align: "start",
        sortable: false,
        value: "Doctor",
      },
      {
        text: "Service",
        align: "start",
        sortable: false,
        value: "Service",
      },
      {
        text: "Actions",
        value: "actions",
        sortable: false,
      },
    ],
    Appointment: [],
    editedIndex: -1,
    editedItem: {
      name: "",
      patientNo: 0,
      appDate: 0,
      time: 0,
      Doctor: "",
      Service: "",
    },
    defaultItem: {
      name: "",
      patientNo: 0,
      appDate: 0,
      time: 0,
      Doctor: "",
      Service: "",
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
    this.initialize();
  },
  methods: {
    //Default First Item
    initialize() {
      this.Appointment = [
        {
          patientNo: 0,
          name: "Udari Heshani",
          appDate: "10/09/2020",
          time: 0,
          Doctor: "Susitha Senarathne",
          Service: "OPD",
        },
      ];
    },
    editItem(item) {
      this.editedIndex = this.Appointment.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },
    deleteItem(item) {
      const index = this.Appointment.indexOf(item);
      confirm("Are you sure you want to delete this item?") &&
        this.Appointment.splice(index, 1);
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
        Object.assign(this.Appointment[this.editedIndex], this.editedItem);
      } else {
        this.Appointment.push(this.editedItem);
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
}
</style>
