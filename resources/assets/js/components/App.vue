<template>
  <div id="app">
  <vue-progress-bar></vue-progress-bar>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Trainer</a>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
import { EventBus } from '../helpers/event-bus.js'
import jQuery from 'jquery'

export default {
  name: 'app',
  data: function (){
    return {
        printers: []
    }
  },
  mounted: function () {
  console.log(this.$Progress);
  this.$Progress.start()
    EventBus.$on('test', function (printer) {
      console.log(jQuery)
        console.log(printer)
    })
  },
  computed: {}
}
</script>
