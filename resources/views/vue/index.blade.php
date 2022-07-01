@extends('nav')
@section('content')
<div id="app">
    <index :users="{{$sharks}}"></index>
</div>
@endsection
