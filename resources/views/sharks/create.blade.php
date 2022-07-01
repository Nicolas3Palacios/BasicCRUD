@extends('nav')
@section('content')
<h1>Create a person</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('person.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" name="age">
    </div>

    <button type="submit" class="btn btn-primary">Create!</button>

</form>

</div>

@endsection
