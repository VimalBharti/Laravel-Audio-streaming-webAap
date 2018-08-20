

require('./bootstrap');

window.Vue = require('vue');
import VueAnalytics from 'vue-analytics'
Vue.use(VueAnalytics, {
  id: 'UA-123989535-1'
})

import Buefy from 'buefy'
Vue.use(Buefy);

let Myhero = require('./components/Myhero.vue');
let userdashboardSidebar = require('./components/userdashboardSidebar.vue');
let Preloader = require('./components/Preloader.vue');


const app = new Vue({
    el: '#app',

    components:{userdashboardSidebar, Preloader}
});
