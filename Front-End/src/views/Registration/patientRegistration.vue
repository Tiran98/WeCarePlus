<template>
  <div id="ptRegister" class="bodyclr">
     <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title signintxt">Patient Registration</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="male" value="male" checked>
                                <label class="form-check-label" for="male">
                                  Male
                                </label>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="female" value="female">
                                <label class="form-check-label" for="female">
                                  Female
                                </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="age" id="regAge" placeholder="Age"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" id="regAdd" placeholder="Address"/>
                        </div>
                        <div class="form-group termsText">
                            <input class="form-control,agree-term" type="checkbox" name="agree-term" id="agree-term" />
                            <label for="agree-term" class="label-agree-term text-center"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group regsubmitbtn">
                          <router-link to="/login">
                            <input type="submit" name="submit" id="submit" class="btn" value="Register"/>
                            </router-link>
                        </div>
                    </form>
                    <p class="loginhere signintxt">
                        Have already an account ? <a href="#" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
      </section>
  </div>
</template>

<script>
  export default {
    name: 'patientRegistration',
    components: {
    }
  }
</script>

<style scoped>
@import "../../assets/CSS/Registation.css"

</style>