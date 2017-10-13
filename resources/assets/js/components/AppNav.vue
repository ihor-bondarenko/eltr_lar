<template>
  <nav class="navbar navbar-expand-lg navbar-light trainer-navbar navbar-toggleable-md">
    <a class="navbar-brand" href="/">Menu</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    </div>
   </nav>
</template>

<script>
import { EventBus } from '../helpers/event-bus.js'

export default {
  name: 'appNav',
  props: ['logoutUrl', 'authCheck', 'loginUrl'],
  data () {
    return {
      msg: 'Welcome to Nav module'
    }
  },
  mounted: function(){
    console.log(this.authCheck);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
