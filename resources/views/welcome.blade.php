<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auth</title>
    <style>
        .alert-succes {
            background: #77dd77;
            color: white;
            padding: 5px;
        }

        .alert-error {
            background: #dd7777;
            color: white;
            padding: 5px;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        @extends('nav')
            @php(!isset($type) ? ($type = 'home') : '')
            @endphp

            @if ($type == 'login')
                <x-auth.auth></x-auth.auth>
            @elseif ($type == 'register')
                <x-auth.register></x-auth.register>
            @else
                <x-form-category></x-form-category>
                <x-list-categories :categories="$categories"></x-list-categories>
            @endif
    </div>
</body>

</html>
