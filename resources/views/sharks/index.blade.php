@extends('nav')
@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Age</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($sharks as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->age }}</td>

            <td>
                <a class="btn btn-small btn-success" href="{{route('person.edit',['person'=>$value->id])}}">Edit this person</a>
                <form action="{{route('person.destroy',['person'=>$value->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-small btn-danger">delete</button>
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

