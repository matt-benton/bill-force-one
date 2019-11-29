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
                <ul class="side-nav">
                    <a href="/bills" @if (Request::path() === 'bills') class="active" @endif>
                        <li>
                            <?xml version="1.0" encoding="UTF-8"?>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                            </svg>
                            <h3>My Bills</h3>
                        </li>
                    </a>
                    <a href="/bills/create" @if (Request::path() === 'bills/create') class="active" @endif>
                        <li>
                            <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                <path d="M19 15V18H16V20H19V23H21V20H24V18H21V15H19M14 18H3V8L11 13L19 8V13H21V6C21 4.9 20.1 4 19 4H3C1.9 4 1 4.9 1 6V18C1 19.1 1.9 20 3 20H14V18M19 6L11 11L3 6H19Z" />
                            </svg>
                            <h3>New Bill</h3>
                        </li>
                    </a>
                </ul>
            </nav>
            
            @yield('content')
        </div>
    </body>
</html>
<script src="{{ url('/js/app.js') }}"></script>
