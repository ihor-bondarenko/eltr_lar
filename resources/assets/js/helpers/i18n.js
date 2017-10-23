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
  constructor() {}
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
}

const TrainerI18n = new AppI18n();

/*export default new VueI18n({
  locale: Vue.ls.get('currentLocale', 'en'),
  messages,
});*/
export { i18n, TrainerI18n };
