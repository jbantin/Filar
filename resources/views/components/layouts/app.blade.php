<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Laranban' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="bg-bg-primary text-text-primary">
        <h3 class="text-3xl font-extrabold text-center py-2">Laranban v0.1</h3>
        <nav class="flex justify-evenly py-4">
            @guest
                
            @else

            
            <a class="link-button" href="/">Tasks</a>
            <a class="link-button" href="{{ route('dates.index')}}">Dates</a>
            <a class="link-button" href="{{ route('notes.index')}}">Notes</a>
            <a class="link-button" href="/logout">Logout</a>
            @endguest            
        </nav>
        {{ $slot }}
    </body>
</html>
