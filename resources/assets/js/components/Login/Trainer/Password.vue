<template>
  <div class="d-flex flex-row align-items-center justify-content-center">
    Password login
  </div>
</template>

<script>
import { EventBus } from '../../../helpers/event-bus.js'

export default {
  name: 'PasswordLogin',
  props: [],
  data () {
    return {
      msg: 'Welcome to Trainer password Login'
    }
  },
  mounted: function () {
    console.log(this.msg);
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
    csrf_token() {
      return this.$store.state.csrf_token;
    }
  },
  methods: {
    commanderApiLogin() {}
  }
}
</script>
