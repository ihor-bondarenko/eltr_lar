// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
require('./bootstrap');
import 'babel-polyfill';
import Vue from 'vue';
import VueProgressBar from 'vue-progressbar';
import Vuex from 'vuex';
import App from './components/App';
import AppLogin from './components/AppLogin';
import AppNav from './components/AppNav';
import AppRunList from './components/AppRunList';
//import router from './router';
import vuexI18n from 'vuex-i18n';
import VueI18n from 'vue-i18n'
import VueResource from 'vue-resource';
import BootstrapVue from 'bootstrap-vue';
import VueLocalStorage from 'vue-ls';
Vue.use(BootstrapVue);
Vue.use(Vuex);
Vue.use(VueI18n);
Vue.use(VueLocalStorage, {
    namespace: 'trainerls__'
});
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
/*Vue.use(vuexI18n.plugin, store);
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
*/

const translationsEn = {
  'trainer_tr_menu_title': 'Menu EN',
  'trainer_tr_trainer_title': 'Trainer',
  'trainer_tr_logout_title': 'Logout EN',
  'trainer_tr_selected_language': 'English',
  'trainer_tr_direct_login_btn': 'Direct login En',
  'trainer_tr_login_with_password_btn': 'Login with password En',
  'trainer_tr_commander_login_btn': 'Login with Commander API En'
};
const translationsDe = {
  'trainer_tr_menu_title': 'Menu DE',
  'trainer_tr_trainer_title': 'Trainer2',
  'trainer_tr_logout_title': 'Logout DE',
  'trainer_tr_selected_language': 'Deutsch',
  'trainer_tr_direct_login_btn': 'Direct login De',
  'trainer_tr_login_with_password_btn': 'Login with password De',
  'trainer_tr_commander_login_btn': 'Login with Commander API De'
};

const messages = {
  en : translationsEn,
  de: translationsDe
}
const i18n = new VueI18n({
  locale: Vue.ls.get('currentLocale', 'en'), // set locale
  messages, // set locale messages
});

const store = new Vuex.Store({
  state: {
    "appStateData": {},
    "csrf_token": token.content ? token.content : '',
    "locales": ["en", "de"],
    "currentLocale": i18n.locale
  },
  mutations: {
    setAppStateData (state, list) {
      state.appStateData = list
    },
    setCurrentLocale (state, locale) {
      i18n.locale = locale;
      state.currentLocale = locale;
      Vue.ls.set('currentLocale', state.currentLocale);
    }
  }
})

Vue.component('login-component', AppLogin);
Vue.component('nav-component', AppNav);
Vue.component('run-list-component', AppRunList);
const trainerApp = new Vue({
  el: '#app',
  store,
  //router,
  i18n,
  //template: '<App/>',
  components: { App }
})

window.initVm = function() {

}
