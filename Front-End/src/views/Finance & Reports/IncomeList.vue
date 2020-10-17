<template>
  <div class="container-fluid mt-3">
    <v-main>
      <h3>Income List</h3>
      <hr />
      <v-data-table
        :headers="headers"
        :items="IncomeList"
        sort-by="_id"
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
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem._id"
                          label="Income ID"
                        ></v-text-field>
                      </v-col>
                       <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.emptype"
                          label="Income Type"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.date"
                          label="Income Date"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.regNum"
                          label="Patient Number"
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
                          v-model="editedItem.paytype"
                          label="Payment Type"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          v-model="editedItem.payAmount"
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
       <v-snackbar v-model="success_snackbar" color="#43A047" centered elevation="24" :timeout="timeout">
        {{ success_text }}

        <template v-slot:action="{ attrs }">
          <v-btn color="#43A047" success_text v-bind="attrs" @click="success_snackbar = false">
            Close
          </v-btn>
        </template>
      </v-snackbar>
      <v-snackbar v-model="fail_snackbar" color="#C62828" centered elevation="24" :timeout="timeout">
        {{ fail_text }}

        <template v-slot:action="{ attrs }">
          <v-btn color="#C62828" fail_text v-bind="attrs" @click="fail_snackbar = false">
            Close
          </v-btn>
        </template>
      </v-snackbar>
      <v-btn
        :disabled="IncomeList === [] ? true : false"
        color="secondarydark"
        class="text-center"
        href="http://localhost:8000/api/income-generate-pdf" target="_blank"
      >
        Download Incomes List
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
import Baseline from "../../components/Baseline.vue";

export default {
  name: "IncomeList",
  components: {
    Baseline,
  },
  data: () => ({
    dialog: false,
    timeout:5000,
    success_snackbar: false,
    fail_snackbar: false,
    success_text:'Operation Successful !',
    fail_text:'Operation Failed !',
    headers: [
      {
        text: "Income ID",
        align: "start",
        sortable: false,
        value: "_id",
      },
      { text: "Income Type",
        align: "start",
        value: "emptype",
        sortable: true,
      },
      { text: "Time",
        align: "start",
        value: "date" 
      },
      {
        text: "Patient Number",
        align: "start",
        sortable: false,
        value: "regNum",
      },
      {
        text: "Patient Name",
        align: "start",
        sortable: false,
        value: "name",
      },
      { text: "Payment Type",
       align: "start",
        sortable: true, 
        value: "paytype" 
      },
      { text: "Amount",
       align: "start",
        sortable: false, 
        value: "payAmount" 
      },
      {
        text: "Actions",
        value: "actions",
        sortable: false,
      },
    ],
    IncomeList: [],
    editedIndex: -1,
    editedItem: {
      _id:"",
      emptype:"",
      date:"",
      regNum: "",
      name: "",
      paytype:"",
      payAmount: "",     
    },
    defaultItem: {
      _id:"",
      emptype:"",
      date:"",
      regNum: "",
      name: "",
      paytype:"",
      payAmount: "",     
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
    this.loadIncomes();
  },
  methods: {
    //Default First Item
    loadIncomes() {
      axios.get("http://localhost:8000/api/income").then((response) => {
        console.log("response", response);
        console.log("Done");
        response.status == 200
          ? (this.IncomeList = response.data)
          : console.log("error fetching incomes");
      });
    },
    updateIncomes(_id) {
      axios
        .put("http://localhost:8000/api/income/" + _id, {
          emptype: this.editedItem.emptype,
          date: this.editedItem.date,
          regNum: this.editedItem.regNum,
          name:this.editedItem.name,
          paytype:this.editedItem.paytype,
          payAmount:this.editedItem.payAmount,
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
    deleteIncomes(_id) {
      axios
        .delete("http://localhost:8000/api/income/" + _id)
        .then((response) => {
          console.log("response", response);
          console.log("Done Delete");
          response.status == 200
            ? (this.success_snackbar = true)
            : (this.fail_snackbar = true);
        });
    },
    editItem(item) {
      this.editedIndex = this.IncomeList.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },
    deleteItem(item) {
      const index = this.IncomeList.indexOf(item);
      let r = confirm("Are you sure you want to delete this item?");
      if(r == true){
          this.IncomeList.splice(index, 1) 
          this.deleteIncomes(item._id);
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
        Object.assign(this.IncomeList[this.editedIndex], this.editedItem);
        this.updateIncomes(this.editedItem._id);
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