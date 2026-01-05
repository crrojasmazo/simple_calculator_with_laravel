<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Calculadora')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    @stack('styles')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">Simple App</a>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-sm text-gray-600">Hola, {{ auth()->user()->name }}</span>
                    <a href="{{ route('calculator.index') }}" class="text-sm text-gray-600 hover:text-gray-900 font-medium">Operaciones</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-medium">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-sm text-gray-600 hover:text-gray-800 font-medium">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="mb-2">Contacto: contacto@calculadora.com | +1 234 567 890</p>
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} Calculadora App. Todos los derechos reservados.</p>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>