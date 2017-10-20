@extends('layouts.main')

@section('content')
  <login-component :login-url='@json(route("login"))' :intended-url='@json(session("url_intended"))'></login-component>
@endsection
