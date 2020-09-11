<template>
  <div class="container-fluid mt-3">
    <v-main>
      <h3>Employee List</h3>
      <hr />
      <table>
        <tr>
          <th>Employee Id</th>
          <th>Employee Name</th>
          <th>Type</th>
          <th>Address</th>
          <th>Email</th>
        </tr>
        <tr v-for="employee in employees" :key="employee.employee.Email">
          <td >{{employee.Email}}</td>
          <td >{{employee.Password}}</td>
          <td >{{employee.Gender}}</td>
        </tr>
      </table>
      <!-- <v-data-table
        :headers="headers"
        :items="EmployeeList"
        sort-by="EmployeeID"
        class="elevation-1"
      >
      <template v-slot:item="props">
        <tr>
          <td>{{props.item.id}}</td>
          <td>{{props.item.name}}</td>
        </tr>
      </template>
        <template v-slot:top>
          <v-toolbar flat color="white">
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="500px">
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
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.employeeID"
                          label="Employee ID"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.name"
                          label="Employee Name"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.type"
                          label="Type"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.address"
                          label="Address"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.Email"
                          label="Email"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.number"
                          label="Number"
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
        
      </v-data-table> -->
      <Baseline />
    </v-main>
  </div>
</template>

<script>
import Baseline from "../../components/Baseline.vue";
import axios from 'axios'

export default {
  name: "EmployeeList",
  components: {
    Baseline,
  },
  data: () => ({
    return :{
      employee :[]
    }
    // dialog: false,
    // headers: [
    //   {
    //     text: "Employee ID",
    //     align: "start",
    //     sortable: false,
    //     value: "employeeID",
    //   },
    //   { text: "Employee Name",
    //     value: "name" 
    //   },
    //   { text: "Type",
    //     sortable: false, 
    //     value: "type" 
    //   },
    //   {
    //     text: "Address",
    //     align: "start",
    //     sortable: false,
    //     value: "address",
    //   },
    //   {
    //     text: "Email",
    //     align: "start",
    //     sortable: false,
    //     value: "Email",
    //   },
    //   {
    //     text: "Number",
    //     align: "start",
    //     sortable: false,
    //     value: "number",
    //   },
    //   {
    //     text: "Actions",
    //     value: "actions",
    //     sortable: false,
    //   },
    // ],
    // EmployeeList: [],
    // editedIndex: -1,
    // editedItem: {
    //   employeeID:"",
    //   name: "",
    //   type: "",
    //   address: "",
    //   Email: "",
    //   number: "",     
    // },
    // defaultItem: {
    //   employeeID:"",
    //   name: "",
    //   type: "",
    //   address: "",
    //   Email: "",
    //   number: "",
    // },
  }),
  // computed: {
  //   formTitle() {
  //     return this.editedIndex === -1 ? "New Appointment" : "Edit Appointment";
  //   },
  // },
  // watch: {
  //   dialog(val) {
  //     val || this.close();
  //   },
  // },
  created() {
      axios.get('http://localhost:8000/api/empListItems').then((response)=>{
      this.employee = response.data;
      console.log("Done");
      console.log(response.data);
      });
  },
  methods: {
   
    // editItem(item) {
    //   this.editedIndex = this.EmployeeList.indexOf(item);
    //   this.editedItem = Object.assign({}, item);
    //   this.dialog = true;
    // },
    // deleteItem(item) {
    //   const index = this.EmployeeList.indexOf(item);
    //   confirm("Are you sure you want to delete this item?") &&
    //     this.EmployeeList.splice(index, 1);
    // },
    // close() {
    //   this.dialog = false;
    //   this.$nextTick(() => {
    //     this.editedItem = Object.assign({}, this.defaultItem);
    //     this.editedIndex = -1;
    //   });
    // },
    // save() {
    //   if (this.editedIndex > -1) {
    //     Object.assign(this.EmployeeList[this.editedIndex], this.editedItem);
    //   } else {
    //     this.EmployeeList.push(this.editedItem);
    //   }
    //   this.close();
    // },
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