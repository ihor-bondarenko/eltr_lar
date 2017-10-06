
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
const App = require('./components/App');
//const router = require('./router');
import VueRouter from 'vue-router'

const Vuex = require('vuex');
const vuexI18n = require('vuex-i18n');
const VueResource = require('vue-resource');
//console.log(router);
Vue.use(VueRouter)
const routes = [
  { path: '/foo', component: App },
]
const router = new VueRouter({
  routes // short for `routes: routes`
})
/*Vue.use(Vuex);
Vue.use(VueResource);
const store = new Vuex.Store({
  state: {
    printers: []
  },
  mutations: {
    setPrinterList (state, list) {
      console.log(list)
      state.printers = list
    }
  }
});
Vue.use(vuexI18n.plugin, store);
const translationsEn = {
  'content': 'This is some {type} content'
};

const translationsDe = {
  'My nice title': 'Ein schöner Titel',
  'content': 'Dies ist ein toller Inhalt'
};
Vue.i18n.add('en', translationsEn);
Vue.i18n.add('de', translationsDe);
Vue.i18n.set('en');*/
//Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
  el: '#app',
  //store,
  router,
  template: '<App/>',
  components: { App }
})
