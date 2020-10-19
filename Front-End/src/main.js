import '@babel/polyfill'
import 'mutationobserver-shim'
import Vue from 'vue'
import './plugins/bootstrap-vue'
import App from './App.vue'
import Vuelidate from "vuelidate";
import SimpleVueValidation from 'simple-vue-validator';

import Vuetify from 'vuetify'
import vuetify from './plugins/vuetify';
import 'vuetify/dist/vuetify.min.css'
import router from './router'
import moment from 'moment'
import store from './store'
import {
  BootstrapVue,
} from 'bootstrap-vue'

Vue.use(Vuetify)
Vue.use(SimpleVueValidation);
Vue.prototype.moment = moment
Vue.use(BootstrapVue)
Vue.use(Vuelidate);

Vue.config.productionTip = false

new Vue({
  vuetify,
  Vuelidate,
  router,
  store,
  BootstrapVue,
  render: h => h(App)
}).$mount('#app')