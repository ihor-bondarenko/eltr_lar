<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Trainer</title>
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

            .content-full-height {
                height: 90vh;
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
                /*font-size: 84px;*/
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
      <template id="content-template">
        <div>
          <nav-component></nav-component>
          @yield('content')
        </div>
      </template>
      <div id="app">
        <app
        :logout-url='@json(route("logout"))'
        :auth-check='@json(Auth::check())'
        :login-url='@json(route("login"))'
        :app-permissions='@json(["create-trainer" => \Laratrust::can("create-trainer"), "create-viewer" => \Laratrust::can("create-viewer")])'
        :trainer-url='@json(route("trainer"))'
        :viewer-url='@json(route("viewer"))'></app>
      </div>
        <!-- Scripts -->
        <script src="{{ asset('js/manifest.js') }}"></script>
        <script src="{{ asset('js/vendor.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
        /*$(document).ready(function(){
          $('.collapse').collapse()
        })*/
        //console.log('@json(Lang::get("app"))')
        </script>
    </body>
</html>
