<template>
  <b-nav-item-dropdown id="languageSelectionList" :text="languageSelectionListTitle" right>
    <b-dropdown-item href="#" v-for="(locale, index) in localeList" :key="index" @click="setLocale(locale)">
      <span v-bind:class="getClassName(locale)" class="current-locale-btn text-right">{{ locale }}</span>
    </b-dropdown-item>
  </b-nav-item-dropdown>
</template>

<script>
import { EventBus } from '../../helpers/event-bus.js'
import { mapActions } from 'vuex'

export default {
  name: 'LangComponent',
  props: [],
  data () {
    return {
      msg: 'Welcome to Trainer Lang'
    }
  },
  mounted: function () {},
  computed: {
    localeList() {
      return this.$store.state.locales;
    },
    languageSelectionListTitle() {
      //console.log(this.$t('trainer_selected_language'));
      return this.$t('trainer_tr_selected_language');
    },
    getCurrentLocale() {
      return this.$store.state.currentLocale;
    }
  },
  methods: {
    setLocale(locale) {},
    ...mapActions({
      setLocale: 'setCurrentLocale'
    }),
    getClassName(locale) {
      return 'current-locale-' + locale;
    }
  }
}
</script>

<style scoped>
</style>
