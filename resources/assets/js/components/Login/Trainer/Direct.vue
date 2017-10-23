<template>
  <div class="d-flex flex-row align-items-center justify-content-center">
    <div class="form-group p-2 col-md-12 col-xl-8">
            <form class="form-horizontal" method="POST" :action="loginUrl">
              <input type="hidden" :value="csrf_token" name="_token">
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Username</label>
                    <div class="col-md-12">
                        <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-12 control-label">Password</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </form>
    </div>
  </div>
</template>

<script>
import { EventBus } from '../../../helpers/event-bus.js'

export default {
  name: 'DirectLogin',
  props: [],
  data () {
    return {
      msg: 'Welcome to Trainer direct Login'
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
