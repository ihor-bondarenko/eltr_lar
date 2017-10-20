<template>
  <div class="d-flex flex-row full-height align-items-center justify-content-center">
      <div class="title m-b-md">Viewer login</div>
  </div>
</template>

<script>
import { EventBus } from '../../helpers/event-bus.js'

export default {
  name: 'ViewerLogin',
  props: [],
  data () {
    return {
      msg: 'Welcome to Viewer Login'
    }
  },
  mounted: function () {
    console.log(this.msg);
  },
  computed: {},
  methods: {}
}
</script>
