<template>
 <div class="card">
   <h3 class="card-header text-center">Update Profile </h3>
   <div  class="card-body">
   <form @submit.prevent="submitForm">
     <div class="form">
       
       <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control">

       </div>

       <div class="form-group">
          <label>Age</label>
          <input type="number" id="quantity" class="form-control" min="18">

       </div>

        <div class="form-group col-md-6">
          <label>Gender</label><br>
          <input type="radio" id="male" name="gender" value="male">
          <label for="male">Male</label><br>
          <input type="radio" id="female" name="gender" value="female">
          <label for="female">Female</label><br>
          <input type="radio" id="other" name="gender" value="other">
          <label for="other">Other</label> 
        </div>

         <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control"
                v-model.trim="$v.email.$mode" :class="{
                'is-invalid':$v.email.$error,'is-valid':$v.email.$invalid}">
            <div class="valid-feedback">your first email is valid! </div>
                <div class="invalid-feedback">
                 <span v-if="!$v.email.required">Email is required</span>
                 <span v-if="!$v.email.minLength">Email must have at least></span>
                 </div>
         </div>

         <div class="form-group">
          <label>Phone</label>
          <input type="number" class="form-control"
          v-model.number.lazy="$v.phone.$mode" :class="{
              'is-invalid':$v.phone.$error,'is-valid':$v.phone.$invalid
          }">
          <div class="valid-feedback">your phone is valid! </div>
            <div class="invalid-feedback">
                 <span v-if="!$v.phone.required">phone is required</span>
                 <span v-if="!$v.phone.numeric">This phone number only numeric accepted</span>
                     

            </div>
        </div>

        <div class="form-group">
          <label>Address</label>
          <input type="text" class="form-control">
        </div>

        <div class="form-group">
          <label>Employee Type</label>
          <input type="text" class="form-control">

       </div>

            <button type="submit" class="btn btn-success">Save {{submitstatus}}</button>
     </div>
   
   </form>
   </div>
   </div>

</template>



<script>
import { required,minLength,maxLength,numeric} from 'vuelidate/lib/validators'
export default {
   name :'SupplierNew',
   data () {
       return{
           firstname:'',
           // radio button 
           address:'',
          
        
           submitstatus:null

       }
   } ,
   validations: {
       firstname:{
           required,
           minLength: minLength(3),
           maxLength: maxLength(10)
       },
       address:{
           required,
           minLength: minLength(10),
           maxLength: maxLength(20)
       },
       email:{
           required,
           isUnique(value){

               if(value){

                   //eslint-disable-next-line
                   var email_regex=   /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
                    
                    return new Promise((resolve)=> {
                        setTimeout(() => {
                            resolve(email_regex.test(value))
                            
                        }, 350+Math.random()*300)
                    })
               }
           }
       }, phone:{
           required,
           numeric,
           minLength : minLength(12)
       }
    

   },
   methods:{

       submitForm(){
           this.$v.$touch()
           if(this.$v.$invalud){
               this.submitstatus="FAIL"
           }else{
               this.submitstatus="SUCCESS"
           }
       }
   }

}
</script>