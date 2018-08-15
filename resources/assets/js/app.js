

require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy'
Vue.use(Buefy);

let Myfooter = require('./components/Myfooter.vue');
let Myhero = require('./components/Myhero.vue');
let userdashboardSidebar = require('./components/userdashboardSidebar.vue');
let Myplainfooter = require('./components/Myplainfooter.vue');
let Preloader = require('./components/Preloader.vue');


const app = new Vue({
    el: '#app',

    components:{Myfooter, Myhero, userdashboardSidebar, Myplainfooter, Preloader}
});
