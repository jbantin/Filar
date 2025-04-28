<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Laranban' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <nav class="flex justify-evenly py-4">
            <a class="link-button" href="/" class="text-blue-500">Home</a>
            @guest
                <a class="link-button" href="/login">Login</a>
                <a class="link-button" href="/register">Register</a>
            @else
                <h3 class="text-2xl font-extrabold">Laranban v0.1</h3>
                <a class="link-button" href="/logout">Logout</a>
            @endguest            
        </nav>
        {{ $slot }}
    </body>
</html>
