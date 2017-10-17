@extends('layouts.main')

@section('content')
    <run-list-component :app-permissions='@json(["create-trainer" => \Laratrust::can("create-trainer")])' :auth-check='@json(Auth::check())' :login-url='@json(route("login"))' :trainer-url='@json(route("trainer"))' :viewer-url='@json(route("viewer"))'></run-list-component>
@endsection
