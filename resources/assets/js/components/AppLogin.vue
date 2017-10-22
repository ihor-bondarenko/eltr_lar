<template>
  <div class="d-flex flex-row content-full-height align-items-center justify-content-center">
      <trainer-login v-if="loginModule == 'trainer'"></trainer-login>
      <viewer-login  v-if="loginModule == 'viewer'"></viewer-login>
  </div>
</template>

<script>
import { EventBus } from '../helpers/event-bus.js'
import TrainerLogin  from './Login/Trainer.vue'
import  ViewerLogin  from './Login/Viewer.vue'

export default {
  name: 'appLogin',
  props: ['loginUrl', 'intendedUrl'],
  data () {
    return {
      msg: 'Welcome to Trainer Login'
    }
  },
  mounted: function () {
    console.log(this.intendedUrl);
  },
  computed: {
      loginModule() {
        return this.intendedUrl ? this.intendedUrl : 'trainer';
      }
  },
  methods: {
  },
  components: {
    TrainerLogin,
    ViewerLogin
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}

.print-button {
  font-size: 48dp;
}

.print-button:hover {
  cursor: pointer;
}

.trainer-module-select-card .card:hover {
  cursor: pointer;
}
</style>
