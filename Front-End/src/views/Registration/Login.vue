<template>
    <body>
        <div id="ptLogin">
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6 login-form">
                        <h3 class="signin_txtTitle">Patient Login</h3>
                        <form>
                            <div class="form-group">
                                <input v-model="email" type="text" class="form-control" placeholder="Your Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input v-model="password" type="password" class="form-control" placeholder="Your Password *" value="" />
                            </div>
                            <div class="form-group">
                                <a href="#" class="ForgetPwd">Forget Password?</a>
                            </div>
                            <div class="form-group">
                                <button @click="login" type="submit" class="btnSubmit signinbtn">Sign In</button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btnSubmit signupbtn">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>        
        </div>
    </body>
</template>

<script>
    export default{
        data(){
            return{
                email : '',
                password : ''
            }
        }
    }
</script>

<style scoped>
    @import "../../assets/CSS/Login.css"
</style>