<!DOCTYPE html>
<html>

<head>
    <title>Basic CRUD</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="container" id="app">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <li><a class="navbar-brand" href="{{ route('person.index') }}">Home</a></li>
            </div>
            {{-- <ul class="nav navbar-nav">
            <li><a href="{{ route('person.create') }}">Create a person</a>
        </ul> --}}
            <ul class="nav navbar-nav">
                @if (\Illuminate\Support\Facades\Auth::check())
                    <li>
                        <a href="{{ route('person.vue') }}">Vue</a>
                    </li>
                    <li>
                        <a class="dropdown-item">User: {{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                    </li>
                    <li>
                        {{-- <a class="dropdown-item" href="{{ route('logout') }}">Logout</a> --}}
                        <logout></logout>
                    </li>
                @else
                    <li>
                        <a class="dropdown-item" href="{{ route('login') }}">Sign in</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('register') }}">Sign up</a>
                    </li>
                @endif


            </ul>

        </nav>
        @if (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif
        <div id="app">
            @yield('content')
        </div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
</script>

</html>
