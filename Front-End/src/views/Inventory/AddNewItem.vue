<template>
   <v-app id="inspire">
    <v-main>
     <div class="container-fluid mt-3">
      <h3>Add New Item</h3>
      <hr />
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="15">
            <v-card class="">
              <v-card-text>

                 <v-form ref="form" v-model="valid" lazy-validation>
                    <v-container fluid>
                      
                       <v-col cols="12" sm="8">
                        <v-radio-group v-model="row" row>
                         Product Type: <v-spacer></v-spacer>
                        <v-radio label="Drug" value="Drug"></v-radio> <v-spacer></v-spacer>
                        <v-radio label="Equipment" value="Equipment"></v-radio>
                        </v-radio-group>
                      </v-col> 

                       <v-text-field
                        v-model="productName"
                        :counter="50"
                        :rules="pnameRules"
                        label="Name of the Product"
                        required
                      ></v-text-field>

                      <v-textarea
                        autocomplete="productDescription"
                        label="Product Description"
                      ></v-textarea>

                       <v-text-field
                        v-model="productBrand"
                        :counter="20"
                        :rules="pbrandRules"
                        label="Brand Product"
                        required
                      ></v-text-field>

                      <v-row>
                      <v-col cols="12" sm="6">
                       <v-text-field
                        v-model="productQuantity"
                        :counter="10000"
                        :rules="pqtyRules"
                        label="Quantity"
                        required
                      ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="6">
                       <v-text-field
                        v-model="productPrice"
                        :counter="10"
                        :rules="ppriceRules"
                        label="Price per Item"
                        required
                      ></v-text-field>
                      </v-col>
                      </v-row>

                      <v-row>
                      <v-col cols="12" sm="6">
                       <v-text-field
                        v-model="productManuDate"
                        :counter="10"
                        :rules="pmanuRules"
                        label="ManufactureDate"
                        required
                      ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="6">
                       <v-text-field
                        v-model="productExpDate"
                        :counter="10"
                        :rules="pexpRules"
                        label="Expiry Date"
                        required
                      ></v-text-field>
                      </v-col>
                      </v-row>

                      <v-col cols="12" sm="12">
                        <v-btn
                          color="secondarydark"
                          class="mr-4"
                          @click="validate"
                          dark
                        > Add Product
                       </v-btn>

                       <v-btn color="error" class="mr-4" @click="reset">
                          Clear
                       </v-btn>
                      </v-col>

                    </v-container>  
                 </v-form>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
        
      <Baseline />
     </div>      
    </v-main>
   </v-app>
</template>

<script>
import Baseline from "../../components/Baseline.vue";

export default {
  name: "AddNewItem",
  components: {
    Baseline,
  },
  data: () => ({
    valid: true,
    productName: '',
    pnameRules: [
      v => !!v || 'Product Name is required',
      v => (v && v.length <= 50) || 'Name must be less than 50 characters',
    ],
    productBrand: '',
    pbrandRules: [
      v => !!v || 'Product Brand is required',
      v => (v && v.length <= 20) || 'Name must be less than 20 characters',
    ],
    productQuantity: '',
    pqtyRules: [
      v => !!v || 'Product Quantity is required',
    ],
    productPrice: '',
    ppriceRules: [
      v => !!v || 'Product Price is required',
    ],
    productManuDate: '',
    pmanuRules: [
      v => !!v || 'Product Manufacture Date is required',
    ],
    productExpDate: '',
    pexpRules: [
      v => !!v || 'Product Expiry Date is required',
    ],
    select: null,
    items: [
      'Drug',
      'Equipment',
    ],
  }),
    methods: {
      validate () {
      this.$refs.form.validate()
      },
      reset () {
      this.$refs.form.reset()
      },
    }
}
</script>

<style lang="scss" scoped>

h3 {
  color: teal;
  font-weight: 500;
  font-size: 30px;
}
</style>