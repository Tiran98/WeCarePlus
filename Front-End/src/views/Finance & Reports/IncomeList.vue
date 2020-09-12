<template>
  <div class="container-fluid mt-3">
    <v-main>
      <h3>Income List</h3>
      <hr />
      <v-data-table
        :headers="headers"
        :items="IncomeList"
        sort-by="IncomeID"
        class="elevation-1"
      >
        <template v-slot:top>
          <v-toolbar flat color="white">
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="500px">

              <v-card>
                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.incomeID"
                          label="IncomeID"
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
                          v-model="editedItem.patientNo"
                          label="Patient Number"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.patientName"
                          label="Patient Name"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.amount"
                          label="Amount"
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
        
      </v-data-table>
      <Baseline />
    </v-main>
  </div>
</template>

<script>
import Baseline from "../../components/Baseline.vue";

export default {
  name: "IncomeList",
  components: {
    Baseline,
  },
  data: () => ({
    dialog: false,
    headers: [
      {
        text: "Income ID",
        align: "start",
        sortable: false,
        value: "incomeID",
      },
      { text: "Time",
        value: "time" 
      },
      {
        text: "Patient Number",
        align: "start",
        sortable: false,
        value: "patientNo",
      },
      {
        text: "Patient Name",
        align: "start",
        sortable: false,
        value: "patientName",
      },
      { text: "Amount",
        sortable: false, 
        value: "amount" 
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
      incomeID:"",
      time:"",
      patientNo: "",
      patientName: "",
      amount: "",     
    },
    defaultItem: {
      incomeID:"",
      time:"",
      patientNo: "",
      patientName: "",
      amount: "",
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
      this.IncomeList = [
        {
           incomeID:"1",
           time:"10.00",
           patientNo: "2",
           patientName: "Sanda",
           amount: "10$",
        },
      ];
    },
    editItem(item) {
      this.editedIndex = this.IncomeList.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },
    deleteItem(item) {
      const index = this.IncomeList.indexOf(item);
      confirm("Are you sure you want to delete this item?") &&
        this.IncomeList.splice(index, 1);
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
        Object.assign(this.IncomeList[this.editedIndex], this.editedItem);
      } else {
        this.IncomeList.push(this.editedItem);
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