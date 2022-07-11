@extends('nav')
@section('content')
    <div id="app">
        @auth
            <index :users="{{ $sharks }}"></index>
        @endauth
    </div>
@endsection
