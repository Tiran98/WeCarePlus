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
import VueClock from '@dangvanthanh/vue-clock';
import store from './store'

Vue.use(Vuetify)
Vue.use(VueClock);
Vue.use(require('vue-moment'));
Vue.prototype.moment = moment

Vue.config.productionTip = false

new Vue({
  vuetify,
  router,
  store,
  render: h => h(App)
}).$mount('#app')