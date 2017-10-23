<template>
  <b-navbar toggleable="sm" class="navbar navbar-expand-lg navbar-light trainer-navbar">
    <b-nav-toggle target="navbarNav"></b-nav-toggle>
    <b-navbar-brand href="/">menu</b-navbar-brand>
    <b-collapse is-nav id="navbarNav">
      <b-nav is-nav-bar class="ml-auto">
        <b-button size="sm" class="my-2 my-sm-0" type="button" v-if="authCheck" :href="logoutUrl" variant="warning">
          Logout <span class="sr-only">(current)</span>
          <span class="oi oi-account-logout"></span>
        </b-button>
      </b-nav>
    </b-collapse>
    <!--<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active" v-if="authCheck">
          <a class="nav-link" :href="logoutUrl">
            Logout <span class="sr-only">(current)</span>
            <span class="oi oi-account-logout"></span>
          </a>
        </li>
      </ul>
    </div>-->
   </b-navbar>
</template>

<script>
import { EventBus } from '../helpers/event-bus.js'

export default {
  name: 'appNav',
  props: [],
  data () {
    return {
      msg: 'Welcome to Nav module'
    }
  },
  mounted: function(){
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
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
