<template>
  <div class="d-flex flex-column flex-md-row trainer-module-select-cards-block">
    <div class="trainer-module-select-card" v-for="(item, index) in list" v-on:click="setView(index)">
      <div class="card bg-light text-dark">
        <div class="card-body">
           <blockquote class="card-blockquote">
             <span class="oi oi-account-login"></span>
             <p class="card-text">{{ item.translate }}</p>
           </blockquote>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from '../../../helpers/event-bus.js'

export default {
  name: 'ListLogin',
  props: [],
  data () {
    return {
      msg: 'Welcome to Trainer list Login',
      list: {
        'DirectLogin' : {'translate': 'Direct Login'},
        'PasswordLogin': {'translate': 'Login with password'},
        'CommanderLogin': {'translate': 'Commander login'}
      }
    }
  },
  mounted: function () {
    console.log(this.msg);
  },
  computed: {},
  methods: {
    setView(v) {
        this.$emit('changeLogin', v);
    }
  }
}
</script>

<style scoped>
  .trainer-module-select-card{
      flex: 1 0 auto;
  }
</style>
