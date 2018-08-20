

require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy'
Vue.use(Buefy);

import VueAnalytics from 'vue-analytics'
Vue.use(VueAnalytics, {
  id: 'UA-123989535-1'
});

let userdashboardSidebar = require('./components/userdashboardSidebar.vue');
let Preloader = require('./components/Preloader.vue');


const app = new Vue({
    el: '#app',

    components:{userdashboardSidebar, Preloader}
});
