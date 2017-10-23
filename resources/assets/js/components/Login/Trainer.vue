<template>
  <div class="col-12 col-lg-6 ">
      <div class="title m-b-md">
          <h1>Trainer Login</h1>
      </div>
      <div>
        <list-login v-on:changeLogin="setLoginView"></list-login>
        <component v-bind:is="loginView"></component>
      </div>
  </div>
</template>

<script>
import { EventBus } from '../../helpers/event-bus.js'
import CommanderLogin  from './Trainer/Commander.vue'
import DirectLogin  from './Trainer/Direct.vue'
import PasswordLogin  from './Trainer/Password.vue'
import ListLogin  from './Trainer/List.vue'

export default {
  name: 'TrainerLogin',
  props: [],
  data () {
    return {
      msg: 'Welcome to Trainer Login',
      loginView: ''
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
    commanderApiLogin() {
      window.axios.post('/commander-login', {
        "username": "",
        "version_url": '',
        "password": "pass",
        "imei": 'trainer',
        "module-name": 'biometric_system',
        "type" : '3',
        "version_uuid": "123455"
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    setLoginView(view) {
      this.loginView = view;
    }
  },
  components: {
    CommanderLogin,
    DirectLogin,
    PasswordLogin,
    ListLogin
  }
}
</script>
