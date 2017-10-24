import Vue from 'vue'
import VueI18n from 'vue-i18n'
import VueLocalStorage from 'vue-ls';

Vue.use(VueI18n);
Vue.use(VueLocalStorage, {
    namespace: 'trainerls__'
});

const messages = {
  en : {},
  de: {}
};
const i18n = new VueI18n({
  locale: Vue.ls.get('currentLocale', 'en'), // set locale
  messages, // set locale messages
});

class AppI18n {
  constructor() {
    this.init();
  }
  init(){
    let self = this;
    if(window._.isFunction(window.getI18n)) {
      let _tr = window.getI18n();
      if(window._.isObject(_tr)) {
        window._.forEach(_tr, function(v, k){
          i18n.setLocaleMessage(k, JSON.parse(v));
        });
      }
      _tr = {};
    }
    document.documentElement.lang = Vue.ls.get('currentLocale', 'en');
    self.getTranslation(Vue.ls.get('currentLocale', 'en')).then(function(translations){
      self.setLocaleMessage(Vue.ls.get('currentLocale', 'en'), translations);
    }).catch(function(error){});
  }
  getTranslation(locale) {
    let self = this;
    return new Promise(function(resolve, reject) {
      if(!window._.isEmpty(i18n.getLocaleMessage(locale))){
        resolve(i18n.getLocaleMessage(locale))
      }else{
          window.axios.get(`/get-translation/${locale}`)
          .then(function (response) {
            resolve(response.data);
          })
          .catch(function (error) {
            reject(error);
          });
      }
    })
  }
  setLocaleMessage(locale, translations) {
      i18n.setLocaleMessage(locale, translations);
  }
  setSystemLocale(locale) {
    window.axios.get(`/set-locale/${locale}`)
    .then(function (response) {
      console.log(response.data);
    })
    .catch(function (error) {});
  }
}

export { i18n, AppI18n };
