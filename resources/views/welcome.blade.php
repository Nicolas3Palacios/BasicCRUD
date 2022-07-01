<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Category</title>
        <style>
            .alert-succes{
                background:#77dd77;
                color: white;
                padding: 5px;
            }
            .alert-error    {
                background:#dd7777;
                color: white;
                padding: 5px;
            }
            .container{
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }
            body{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <x-form-category></x-form-category>
            <x-list-categories :categories="$categories"></x-list-categories>
        </div>
    </body>
</html>
