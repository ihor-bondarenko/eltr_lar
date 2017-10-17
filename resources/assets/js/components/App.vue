<script>
import { EventBus } from '../helpers/event-bus.js'

export default {
  template: '#content-template',
  name: 'app',
  props: {
    'logoutUrl': String,
    'authCheck': Boolean,
    'loginUrl': String,
    'appPermissions': Object,
    'trainerUrl': String,
    'viewerUrl': String
  },
  data: function (){
    return {
      appData :Object.assign({}, this.$props)
    }
  },
  mounted: function () {
    this.$store.commit('setAppStateData', this.appData)
  },
  computed: {}
}
</script>
