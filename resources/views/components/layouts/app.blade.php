<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Filar' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <nav class="flex justify-evenly">
            <a href="/" class="text-blue-500">Home</a>
            @guest
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @else
                <p>Welcome {{Auth::user()->name}}</p>
                <a href="/logout">Logout</a>
            @endguest            
        </nav>
        {{ $slot }}
    </body>
</html>
