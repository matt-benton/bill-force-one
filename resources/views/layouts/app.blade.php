<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bill Force One</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />
    </head>
    <body>
        <div class="container">
            <nav>
                <div class="brand">
                    <a href="/"><h3>Bill Force One</h3></a>
                    <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                    <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                    </svg>
                </div>
                <ul class="side-nav">
                    <a href="/accounts" @if (Request::path() === 'accounts') class="active" @endif>
                        <li><h3>Accounts</h3></li>
                    </a>
                    <a href="/accounts/create" @if (Request::path() === 'accounts/create') class="active" @endif>
                        <li><h3>New Account</h3></li>
                    </a>
                </ul>
            </nav>
            @yield('content')
        </div>
        <script src="{{ url('/js/menu-button.js') }}"></script>
        @yield('scripts')
    </body>
</html>
