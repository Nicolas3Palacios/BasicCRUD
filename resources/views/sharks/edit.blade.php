@extends('nav')
@section('content')

<h1>Edit: {{$shark->name}}</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('person.update', ['person'=> $shark->id])}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{$shark->name}}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{$shark->email}}">
    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" name="age" value="{{$shark->age}}">
    </div>

    <button type="submit" class="btn btn-primary">Edit!</button>

</form>

</div>

@endsection<!DOCTYPE html>
