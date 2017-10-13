<template>
  <div class="d-flex flex-row full-height align-items-center justify-content-center">
      <div class="content col-md-8 col-lg-3"></div>
        <vue-progress-bar></vue-progress-bar>
        <router-view></router-view>
      </div>
  </div>
</template>

<script>
import { EventBus } from '../helpers/event-bus.js'

export default {
  name: 'app',
  data: function (){
    return {
        printers: []
    }
  },
  mounted: function () {},
  computed: {}
}
</script>
