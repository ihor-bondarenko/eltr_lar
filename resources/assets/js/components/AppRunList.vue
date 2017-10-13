<template>
  <div class="d-flex flex-row full-height align-items-center justify-content-center">
    <div class="jumbotron">
      <div class="row trainer-module-select-cards-block">
         <div class="col-sm-12 col-lg-12 trainer-module-select-card mb-1" v-on:click="changeWindowLocation(loginUrl)">
           <div class="card bg-light text-dark">
             <div class="card-body">
                  <p class="card-text text-center"><span class="oi oi-book"></span> <span class="text-dark">Trainer</span></p>
             </div>
           </div>
         </div>
         <div class="col-sm-12 col-lg-12 trainer-module-select-card">
           <div class="card bg-light text-dark">
                 <div class="card-body">
                     <p class="card-text text-center"><span class="oi oi-monitor"></span> <span class="text-dark">Viewer</span></p>
                 </div>
           </div>
         </div>
       </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from '../helpers/event-bus.js'

export default {
  name: 'appRunList',
  props: ['authCheck', 'loginUrl'],
  data () {
    return {}
  },
  mounted: function(){},
  methods: {
    changeWindowLocation(url){
      window.location = url;
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
