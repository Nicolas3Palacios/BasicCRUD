@extends('nav')
@section('content')
    <div id="app">
        @auth
            <postForm :pozt="{{ $post }}"/>
        @endauth
    </div>
@endsection
