
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-bg-primary">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('dates.index') }}" class="text-xl font-bold text-gray-900">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    
                    @auth
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('dates.index') }}" class="link-button">Dates</a>
                            <span class="text-gray-700">{{ Auth::user()->name }}</span>
                            <a href="/logout" class="btn-secondary">Logout</a>
                        </div>
                    @else
                        <div class="flex items-center space-x-4">
                            <a href="/login" class="link-button">Login</a>
                            <a href="/register" class="btn-primary">Register</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    
    @livewireScripts
</body>
</html>