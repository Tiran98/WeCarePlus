import '@babel/polyfill'
import 'mutationobserver-shim'
import Vue from 'vue'
import './plugins/bootstrap-vue'
import App from './App.vue'

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
Vue.prototype.moment = moment
Vue.use(BootstrapVue)

Vue.config.productionTip = false

new Vue({
  vuetify,
  router,
  store,
  BootstrapVue,
  render: h => h(App)
}).$mount('#app')