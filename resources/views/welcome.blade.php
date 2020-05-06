<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />

        <title>Bill Force One</title>
    </head>
    <body>
        <div class="welcome-container">
            <div class="welcome-panel">
                <h1 class="main-heading">Bill Force One</h1>
                <h3 class="sub-heading">Track Your Monthly Expenses: Know What's Due And When</h3>
                <ul class="welcome-menu">
                    <li class="welcome-menu-item"><a href="/accounts"><button class="btn btn-secondary">Accounts</button></a></li>
                    <li class="welcome-menu-item"><a href="/accounts/create"><button class="btn btn-secondary">New Account</button></a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
