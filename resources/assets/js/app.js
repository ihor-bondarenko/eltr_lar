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
import VueResource from 'vue-resource';
import BootstrapVue from 'bootstrap-vue';
import VueLocalStorage from 'vue-ls';
import { AppI18n, i18n } from './helpers/i18n';
Vue.use(BootstrapVue);
Vue.use(Vuex);
Vue.use(VueResource);
Vue.config.productionTip = false;
Vue.http.options.root = 'api/v1';

const TrainerI18n = new AppI18n();
let token = document.head.querySelector('meta[name="csrf-token"]');

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
      document.documentElement.lang = state.currentLocale;
      TrainerI18n.setSystemLocale(locale);
    }
  },
  actions: {
    setCurrentLocale(context, locale) {
      TrainerI18n.getTranslation(locale).then(function(translations){
        TrainerI18n.setLocaleMessage(locale, translations);
        context.commit('setCurrentLocale', locale);
      }).catch(function(error){});
    }
  }
})

Vue.component('login-component', AppLogin);
Vue.component('nav-component', AppNav);
Vue.component('run-list-component', AppRunList);

const trainerApp = new Vue({
  el: '#app',
  store,
  i18n,
  components: { App },
  mounted() {}
});
