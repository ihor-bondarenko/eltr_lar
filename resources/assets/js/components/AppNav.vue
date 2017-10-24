<template>
  <b-navbar toggleable="sm" class="navbar navbar-expand-lg navbar-light trainer-navbar">
    <b-nav-toggle target="navbarNav"></b-nav-toggle>
    <b-navbar-brand href="/">{{ $t('trainer_tr_menu_title') }}</b-navbar-brand>
    <b-collapse is-nav id="navbarNav">
      <b-nav is-nav-bar class="ml-auto">
        <b-nav-form>
          <b-button size="sm" class="my-2 my-sm-0" type="button" v-if="authCheck" :href="logoutUrl" variant="warning">
            {{ $t('trainer_tr_logout_title') }} <span class="sr-only">(current)</span>
            <span class="oi oi-account-logout"></span>
          </b-button>
        </b-nav-form>
        <lang-component></lang-component>
      </b-nav>
    </b-collapse>
   </b-navbar>
</template>

<script>
import LangComponent  from './NavBar/Lang.vue'
import { EventBus } from '../helpers/event-bus.js'
import { mapActions } from 'vuex'

export default {
  name: 'appNav',
  props: [],
  data () {
    return {
      msg: 'Welcome to Nav module'
    }
  },
  mounted: function(){

  },
  computed: {
    logoutUrl() {
      return this.$store.state.appStateData.logoutUrl;
    },
    authCheck() {
      return this.$store.state.appStateData.authCheck;
    },
    loginUrl() {
      return this.$store.state.appStateData.loginUrl;
    },
    localeList() {
      return this.$store.state.locales;
    }
  },
  methods: {},
  components: {
    LangComponent
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
