

require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy'
Vue.use(Buefy);

let Myhero = require('./components/Myhero.vue');
let userdashboardSidebar = require('./components/userdashboardSidebar.vue');
let Preloader = require('./components/Preloader.vue');


const app = new Vue({
    el: '#app',

    components:{Myhero, userdashboardSidebar, Preloader}
});
