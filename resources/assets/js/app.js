

require('./bootstrap');

import Vue from 'vue'

import Buefy from 'buefy'
Vue.use(Buefy);


let userdashboardSidebar = require('./components/userdashboardSidebar.vue');
let Preloader = require('./components/Preloader.vue');


const app = new Vue({
    el: '#app',
    data: {
      message: 'bybu'
    },
    components:{
      userdashboardSidebar,
      Preloader
    }
});
app.message = 'new message' // change data
app.$el.textContent === 'new message' // false
Vue.nextTick(function () {
  app.$el.textContent === 'new message' // true
});
