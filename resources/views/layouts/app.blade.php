<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bill Force One</title>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="/bills">My Bills</a></li>
                <li><a href="/bills/create">New Bill</a></li>
            </ul>
        </nav>

        @yield('content')
    </body>
</html>