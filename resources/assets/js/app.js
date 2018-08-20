

require('./bootstrap');

import Vue from 'vue'
import VueAnalytics from 'vue-analytics'

import Buefy from 'buefy'
Vue.use(Buefy);

Vue.use(VueAnalytics, {
  id: 'UA-123989535-1',
  checkDuplicatedScript: true
})

let userdashboardSidebar = require('./components/userdashboardSidebar.vue');
let Preloader = require('./components/Preloader.vue');


const app = new Vue({
    el: '#app',

    components:{userdashboardSidebar, Preloader}
});
