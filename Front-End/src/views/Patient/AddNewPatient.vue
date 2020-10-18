<template>
  <v-main>
   <div class="container-fluid mt-3">
        <h3>New Appointment</h3>
        <hr />

                <v-card-text>
                  <v-form ref="form" v-model="valid" lazy-validation>
                  <v-container fluid>
                    <v-row>

                       <v-col cols="12" sm="12">
                          <v-text-field
                                    ref="name"
                                    v-model="name"
                                    :rules="[() => !!name || 'This field is required']"
                                    :error-messages="nameErrors"
                                    label="Full Name"
                                    placeholder="Your name"
                                    dense
                                    required
                                    @input="$v.name.$touch()"
                                    @blur="$v.name.$touch()"
                                  ></v-text-field>
                        </v-col>
                        <v-spacer></v-spacer>

                        <v-col cols="12" sm="12">
                          <v-text-field
                                    ref="email"
                                    v-model="email"
                                    :rules="[() => !!name || 'This field is required']"
                                    :error-messages="emailErrors"
                                    label="Email Address"
                                    placeholder="Your Email"
                                    dense
                                    required
                                    @input="$v.email.$touch()"
                                    @blur="$v.email.$touch()"
                                  ></v-text-field>
                        </v-col>
                        <v-spacer></v-spacer>

                        <v-col cols="12" sm="6">
                        <v-text-field
                                    ref="phone"
                                    v-model="phone"
                                    :rules="[() => !!phone || 'This field is required']"
                                    :error-messages="phoneErrors"
                                    label="Contact Number"
                                    placeholder="Your Phone"
                                    dense
                                    required
                                    @input="$v.phone.$touch()"
                                    @blur="$v.phone.$touch()"
                                  ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="6">
                        <v-radio-group
                          v-model="method"
                          :rules="[() => !!method || 'This field is required']"
                          :error-messages="methodErrors"
                          hide-details
                          dense
                          required
                          @input="$v.method.$touch()"
                          @blur="$v.method.$touch()"
                        >
                          <v-header> Prefer Method Of Contact </v-header> 
                          <v-radio value="Phone" label="Phone"></v-radio>
                          <v-radio value="Email" label="Email"></v-radio>
                        </v-radio-group>
                      </v-col>
                      <v-spacer></v-spacer>

                       <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                         v-model="service"
                         :items="service"
                         label="Select the Service"
                         :rules="[() => !!service || 'This field is required']"
                         :error-messages="serviceErrors"
                         dense
                         required
                         @input="$v.service.$touch()"
                         @blur="$v.service.$touch()"
                         outlined
                        ></v-select>
                      </v-col>

                      <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                         v-model="doctor"
                         :items="doctor"
                         label="Select a Doctor"
                         :rules="[() => !!doctor || 'This field is required']"
                         :error-messages="doctorErrors"
                         dense
                         required
                         @input="$v.doctor.$touch()"
                         @blur="$v.doctor.$touch()"
                         outlined
                        ></v-select>
                      </v-col>
                      <v-spacer></v-spacer>

                      <!-- DATE -->
                      <v-col cols="12" sm="6" >
                      <v-dialog
                        ref="dialog"
                        v-model="modal"
                        :return-value.sync="date"
                        persistent
                        width="290px"
                      >
                        <template v-slot:activator="{ on, attrs }">
                          <v-text-field
                            v-model="date"
                            label="Required Date"
                            prepend-icon="mdi-event"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                          ></v-text-field>
                        </template>
                        <v-date-picker v-model="date" scrollable>
                          <v-spacer></v-spacer>
                          <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                          <v-btn text color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                        </v-date-picker>
                      </v-dialog>
                    </v-col>
                    
                    <!--Time -->
                  <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                         v-model="time"
                         :items="time"
                         label="Appointment Time"
                         :rules="[() => !!time || 'This field is required']"
                         :error-messages="timeErrors"
                         dense
                         required
                         @input="$v.time.$touch()"
                         @blur="$v.time.$touch()"
                         outlined
                        ></v-select>
                      </v-col>
                      <v-spacer></v-spacer>

                  <v-col cols="12" sm="6">
                        <v-radio-group
                          v-model="visit"
                          hide-details
                          :rules="[() => !!visit || 'This field is required']"
                          :error-messages="visitErrors"
                          dense
                          required
                          @input="$v.visit.$touch()"
                          @blur="$v.visit.$touch()"
                        >
                          <v-header> First Time Visit </v-header> 
                          <v-radio value="Yes" label="Yes"></v-radio>
                          <v-radio value="No" label="No"></v-radio>
                        </v-radio-group>
                      </v-col>
                      <v-spacer></v-spacer>

                  <v-col cols="12" sm="12">
                        <v-text-field
                                    ref="details"
                                    v-model="details"
                                    label="Other details you may wish to highlight:"
                                  ></v-text-field>
                      </v-col>
                  
                    
                  <!-- Submit & Reset buttons -->
                      <v-col cols="12" sm="12">
                        <v-btn
                          color="secondarydark"
                          class="mr-4"
                          @click="Channelvalidate"
                          dark
                        >
                         Submit
                        </v-btn>
                        <v-btn color="error" class="mr-4" @click="reset">
                          Reset
                        </v-btn>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-form>
              </v-card-text>
      </div>
      <Baseline />
  </v-main>
</template>

<script>
import Baseline from "../../components/Baseline.vue";

export default {
  name: "AddNewPatient",
  components: {
    Baseline,
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
