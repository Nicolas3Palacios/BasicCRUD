@extends('nav')
@section('content')
<div id="app">
    <Personform :user="{{$shark}}"></Personform>
</div>
@endsection
