<template>
    <div class="row trainer-module-select-cards-block">
       <div class="col-sm-6 trainer-module-select-card">
         <div class="card bg-light text-dark">
           <div class="card-body">
              <blockquote class="card-blockquote">
                <span class="oi oi-browser"></span>
                <p class="card-text">Trainer</p>
              </blockquote>
           </div>
         </div>
       </div>
       <div class="col-sm-6 trainer-module-select-card">
         <div class="card bg-light text-dark">
               <div class="card-body">
                 <blockquote class="card-blockquote">
                   <span class="oi oi-monitor"></span>
                   <p class="card-text">Viewer</p>
                 </blockquote>
               </div>
         </div>
       </div>
    </div>
</template>

<script>
import { EventBus } from '../helpers/event-bus.js'

export default {
  name: 'main',
  data () {
    return {
      msg: 'Welcome to Trainer',
      selectedPrinter: ''
    }
  },
  mounted: function () {
    console.log('hello module')
  },
  computed: {
    listPrinters () {
      return this.$store.state.printers
    }
  },
  methods: {
    printAction () {
      this.$i18n.set('de')
      EventBus.$emit('test', this.selectedPrinter)
    }
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
.trainer-module-select-card:hover {
  cursor: pointer;
  opacity: 0.6;
}
.trainer-module-select-cards-block .card-text {
  font-size: 1.3rem;
  font-weight: 400;
}
</style>
