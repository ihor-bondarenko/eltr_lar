<template>
  <div class="d-flex flex-column flex-lg-row trainer-module-select-cards-block justify-content-around">
      <b-btn type="button" class="btn btn-outline-info btn-select-login-module btn-lg mb-sm-2 mb-2" v-for="(item, index) in list" :key="index" v-on:click="setView(index)">
        <span class="oi oi-account-login"></span> <span>{{ $t(item.keyword) }}</span>
      </b-btn>
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
        'DirectLogin' : {'keyword': 'trainer_tr_direct_login_btn'},
        'PasswordLogin': {'keyword': 'trainer_tr_login_with_password_btn'},
        'CommanderLogin': {'keyword': 'trainer_tr_commander_login_btn'}
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
  .btn-select-login-module:hover {
    cursor: pointer;
  }
</style>
