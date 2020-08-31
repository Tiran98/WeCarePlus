<template>
  <div id="app">
    <ptRegistation></ptRegistation>
    <!--<router-view></router-view> -->
  </div>
</template>

<script>

import ptRegistation from '../src/views/Registration/patientRegistration'
//import ptLogin from '../src/views/Registration/Login'

export default {
  name: 'App',
  components: {
    ptRegistation,
    //ptLogin
    
  }
}
</script>

<style>
</style>
