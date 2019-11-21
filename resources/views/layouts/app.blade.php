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
                            <svg class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20">
                                <path d="M17.5 6h-16c-0.827 0-1.5 0.673-1.5 1.5v9c0 0.827 0.673 1.5 1.5 1.5h16c0.827 0 1.5-0.673 1.5-1.5v-9c0-0.827-0.673-1.5-1.5-1.5zM17.5 7c0.030 0 0.058 0.003 0.087 0.008l-7.532 5.021c-0.29 0.193-0.819 0.193-1.109 0l-7.532-5.021c0.028-0.005 0.057-0.008 0.087-0.008h16zM17.5 17h-16c-0.276 0-0.5-0.224-0.5-0.5v-8.566l7.391 4.927c0.311 0.207 0.71 0.311 1.109 0.311s0.798-0.104 1.109-0.311l7.391-4.927v8.566c0 0.276-0.224 0.5-0.5 0.5z"></path>
                            </svg>
                            <h3>My Bills</h3>
                        </li>
                    </a>
                    <a href="/bills/create" @if (Request::path() === 'bills/create') class="active" @endif>
                        <li>
                            <svg class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20">
                                <path d="M17.854 5.646l-4.5-4.5c-0.094-0.094-0.221-0.146-0.354-0.146h-9.5c-0.827 0-1.5 0.673-1.5 1.5v16c0 0.827 0.673 1.5 1.5 1.5h13c0.827 0 1.5-0.673 1.5-1.5v-12.5c0-0.133-0.053-0.26-0.146-0.354zM16.793 6h-3.293c-0.276 0-0.5-0.224-0.5-0.5v-3.293l3.793 3.793zM16.5 19h-13c-0.276 0-0.5-0.224-0.5-0.5v-16c0-0.276 0.224-0.5 0.5-0.5h8.5v3.5c0 0.827 0.673 1.5 1.5 1.5h3.5v11.5c0 0.276-0.224 0.5-0.5 0.5z"></path>
                                <path d="M11.5 13h-2.5v-2.5c0-0.276-0.224-0.5-0.5-0.5s-0.5 0.224-0.5 0.5v2.5h-2.5c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h2.5v2.5c0 0.276 0.224 0.5 0.5 0.5s0.5-0.224 0.5-0.5v-2.5h2.5c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5z"></path>
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