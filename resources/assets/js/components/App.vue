<template>
  <div>
  <vue-progress-bar></vue-progress-bar>
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
