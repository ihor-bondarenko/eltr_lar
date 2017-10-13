<template>
  <div>
    <div class="title m-b-md">
        Trainer
    </div>
      <div class="row trainer-module-select-cards-block">
         <div class="col-sm-4 trainer-module-select-card">
           <div class="card bg-light text-dark">
             <div class="card-body">
                <blockquote class="card-blockquote">
                  <span class="oi oi-account-login"></span>
                  <p class="card-text">Direct Login</p>
                </blockquote>
             </div>
           </div>
         </div>
         <div class="col-sm-4 trainer-module-select-card">
           <div class="card bg-light text-dark">
                 <div class="card-body">
                   <blockquote class="card-blockquote">
                     <span class="oi oi-account-login"></span>
                     <p class="card-text">Comander login</p>
                   </blockquote>
                 </div>
           </div>
         </div>
         <div class="col-sm-4 trainer-module-select-card">
           <div class="card bg-light text-dark">
                 <div class="card-body">
                   <blockquote class="card-blockquote">
                     <span class="oi oi-account-login"></span>
                     <p class="card-text">Login with password</p>
                   </blockquote>
                 </div>
           </div>
         </div>
       </div>
      <div class="panel panel-default">
          <div class="panel-heading">Login</div>
          <div class="panel-body">
              <form class="form-horizontal" method="POST" action="">
                  <div class="form-group">
                      <label for="email" class="col-md-4 control-label">Username</label>
                      <div class="col-md-12">
                          <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="password" class="col-md-12 control-label">Password</label>

                      <div class="col-md-12">
                          <input id="password" type="password" class="form-control" name="password" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                              Login
                          </button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</template>

<script>
import { EventBus } from '../helpers/event-bus.js'

export default {
  name: 'appViewerLogin',
  data () {
    return {
      msg: 'Welcome to Trainer Login'
    }
  },
  mounted: function () {
    console.log('hello login module')
  },
  computed: {},
  methods: {}
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
</style>
