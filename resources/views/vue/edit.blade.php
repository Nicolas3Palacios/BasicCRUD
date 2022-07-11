@extends('nav')
@section('content')
<div id="app">
    @auth
    <Personform :user="{{$shark}}"></Personform>
    @endauth
</div>
@endsection
