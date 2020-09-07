<template>
  <div id="ptLogin">
    <div class="container login-container">
      <div class="row">
        <div class="col-md-6 login-form">
          <h3 class="signin_txtTitle">Patient Login</h3>
          <form>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="Your Email *"
                value=""
              />
            </div>
            <div class="form-group">
              <input
                type="password"
                class="form-control"
                placeholder="Your Password *"
                value=""
              />
            </div>
            <div class="form-group">
              <a href="#" class="ForgetPwd">Forget Password?</a>
            </div>
            <div class="form-group">
              <input
                type="submit"
                class="btnSubmit signinbtn"
                value="Sign In"
              />
            </div>
            <div class="form-group">
              <input
                type="submit"
                class="btnSubmit signupbtn"
                value="Sign Up"
              />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
@import "../../assets/CSS/Login.css";
</style>
