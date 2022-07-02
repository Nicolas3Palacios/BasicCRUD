<!DOCTYPE html>
<html>
<head>
    <title>Basic CRUD</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('person.index') }}">Home</a>
        </div>
        {{-- <ul class="nav navbar-nav">
            <li><a href="{{ route('person.create') }}">Create a person</a>
        </ul> --}}
        <ul class="nav navbar-nav">
            <li><a href="{{ route('person.vue') }}">Vue</a>
        </ul>
    </nav>
    @if (session('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
    @endif
    @yield('content')
</body>
<script src="{{mix('js/app.js')}}"></script>
</html>
