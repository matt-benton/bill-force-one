
<html>
    <head>
        <title>App Name - @yield('title')</title>
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