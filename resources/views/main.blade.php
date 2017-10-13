<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Laravel</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .trainer-navbar {
              background-color: cadetblue;
              font-weight: 500;
            }
            .icon {
              width: 16px;
              height: 16px;
            }

            .trainer-module-select-card .text-dark {
                font-weight: 500;
            }
            .trainer-module-select-card:hover {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
      <div id="app">
        <nav-component :logout-url='@json(route("logout"))' :auth-check='@json(Auth::check())' :login-url='@json(route("login"))'></nav-component>
        @if (Auth::guest())
          <run-list-component :auth-check='@json(Auth::check())' :login-url='@json(route("login"))'></run-list-component>
        @endif
      </div>
      <!--  <div class2="-d-flex -flex-row -full-height -align-items-center -justify-content-center" style="display: none">
            <div class="-content col-md-8 col-lg-3">
                @if (!Auth::check())
                <div class="title m-b-md">
                    Trainer
                </div>
                <div>
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
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Username</label>
                                    <div class="col-md-12">
                                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-12 control-label">Password</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
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
                @else
                <div id="app"></div>
                @endif
            </div>
        </div> -->
        <!-- Scripts -->
        <script src="{{ asset('js/manifest.js') }}"></script>
        <script src="{{ asset('js/vendor.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
        $(document).ready(function(){
          $('.collapse').collapse()
        })
        </script>
        @if (Auth::check())
        <script>
          initVm();
        </script>
        @endif
    </body>
</html>
