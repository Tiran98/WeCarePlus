<template>

  <v-app id="inspire">
    <v-main class="NewIncome">

      <div class="container-fluid mt-3">
        <h3>New Expense</h3>
        <hr />

                <v-card-text>
                  <v-form ref="form" v-model="valid" lazy-validation>
                  <v-container fluid>
                    <v-row>

                       <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                         v-model="emptype"
                         :rules="emptypeRules"
                         :items="emptypelist"
                         label="Expense Type"
                         dense
                         outlined
                         required
                         @input="$v.emptype.$touch()"
                         @blur="$v.emptype.$touch()"
                        ></v-select>
                      </v-col>

                      <!-- DATE -->
                      <v-col cols="12" sm="6">
                        <v-menu
                         v-model="menu2"
                         :close-on-content-click="false"
                         :nudge-right="40"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                      <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                          v-model="date"
                          :rules="dateRules"
                          label="Expense Date"
                          prepend-icon="mdi-event"
                          readonly
                          v-bind="attrs"
                          v-on="on"
                          required
                          @input="$v.date.$touch()"
                          @blur="$v.date.$touch()"
                        ></v-text-field>
                      </template>
                      <v-date-picker v-model="date" @input="menu2 = false"
                      ></v-date-picker>
                      </v-menu>
                      </v-col>
                      <v-spacer></v-spacer>

                      <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="regNum"
                          :rules="regNumRules"
                          label="Patient Registration Number"
                          dense
                          required
                          @input="$v.regNum.$touch()"
                          @blur="$v.regNum.$touch()"
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="name"
                          :rules="nameRules" 
                          label="Full Name"
                          dense
                          required
                          @input="$v.name.$touch()"
                          @blur="$v.name.$touch()"
                        ></v-text-field>
                      </v-col>

                      <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                         v-model="paytype"
                         :rules="paytypeRules"
                         :items="paytypeList"
                         label="Payment Type"
                         dense
                         outlined
                         required
                         @input="$v.paytype.$touch()"
                         @blur="$v.paytype.$touch()"
                        ></v-select>
                      </v-col>

                      <v-col cols="12" sm="12">
                        <v-text-field
                          v-model="payAmount"
                          :rules="payAmountRules"
                          label="Payment Amount"
                          required
                          dense
                          @input="$v.payAmount.$touch()"
                          @blur="$v.payAmount.$touch()"
                        ></v-text-field>
                      </v-col>

                      <!-- Save & Clear buttons -->
                      <v-col cols="12" sm="12">
                        <v-btn
                          color="secondarydark"
                          class="mr-4"
                          @click="addExpense"
                          dark
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
      <Baseline />
    </v-main>
  </v-app>

</template>

<script>
import Baseline from "../../components/Baseline.vue";
import axios from "axios";
import router from "../../router";

export default {
  name: "NewIncome",
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
      date:"",
      dateRules: [
        (v) => !!v || "Date is required",
      ],
      regNum: "",
      regNumRules: [
        (v) => !!v || "Reg Number is required",
        (v) =>
          (v && v.length >= 5) || "Number must be at least 5 characters long.",
      ],
      emptype:"",
      emptypeRules: [
        (v) => !!v || "Employee Type is required",
      ],
      paytype:"",
      paytypeRules: [
        (v) => !!v || "Payment Type is required",
      ],
      paytypeList:["Credit Card","Cash"],
      emptypelist:['Laboratory Assistant','Nurse','Pharmacist','Other Hospital Staff'],
      menu2:"",
      payAmount:"",
      payAmountRules: [
        (v) => !!v || "Payment Amount is required",
      ],
      status: null,
      showPassword: false,

    };
  },
  // Save & Clear buttons 
  methods: {
    addExpense() {
      this.$refs.form.validate();
      if(this.$refs.form.validate()){
        axios
          .post("http://localhost:8000/api/expense", {
            emptype: this.emptype,
            date: this.date,
            regNum: this.regNum,
            name:this.name,
            paytype:this.paytype,
            payAmount:this.payAmount,

        })
        .then((response) => {
            console.log(response);
            console.log("Done");
            router.push({ name: "ExpenseList" });
        })
        .catch((err) => {
          console.log(err);
        });
      }
    },
    reset() {
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
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