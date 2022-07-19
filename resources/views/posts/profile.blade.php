@extends('nav')
@section('content')
    <div id="app">
        @auth
            <user-profile></user-profile>
        @endauth
    </div>
@endsection
