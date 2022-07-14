@extends('nav')
@section('content')
    <div id="app">
        @auth
            <postform></postform>
        @endauth
        <allpost></allpost>
    </div>
@endsection
