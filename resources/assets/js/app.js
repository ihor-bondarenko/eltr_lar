// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
require('./bootstrap');
import Vue from 'vue';
import VueProgressBar from 'vue-progressbar';
import Vuex from 'vuex';
import App from './components/App';
import AppLogin from './components/AppLogin';
import AppNav from './components/AppNav';
import AppRunList from './components/AppRunList';
import router from './router';
import vuexI18n from 'vuex-i18n';
import VueResource from 'vue-resource';
Vue.use(Vuex);
Vue.config.productionTip = false;

Vue.use(VueResource);
Vue.http.options.root = 'api/v1';

const options = {
  color: '#bffaf3',
  failedColor: '#874b4b',
  thickness: '5px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false
}

Vue.use(VueProgressBar, options);

let token = document.head.querySelector('meta[name="csrf-token"]');

const store = new Vuex.Store({
  state: {
    "printers": [],
    "csrf_token": token.content ? token.content : ''
  },
  mutations: {
    setPrinterList (state, list) {
      console.log(list)
      state.printers = list
    }
  }
})
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
Vue.i18n.set('en');

Vue.component('login-component', AppLogin);
Vue.component('nav-component', AppNav);
Vue.component('run-list-component', AppRunList);
const trainerApp = new Vue({
  el: '#app',
  store,
  router,
//  template: '<App/>',
  //components: { App }
})

window.initVm = function() {

}
