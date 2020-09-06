import Vue from 'vue'
import App from './App.vue'

import Vuetify from 'vuetify'
import vuetify from './plugins/vuetify';
import 'vuetify/dist/vuetify.min.css'
import router from './router'
import moment from 'moment'

Vue.use(Vuetify)
Vue.prototype.moment = moment

Vue.config.productionTip = false

new Vue({
  vuetify,
  router,
  render: h => h(App)
}).$mount('#app')