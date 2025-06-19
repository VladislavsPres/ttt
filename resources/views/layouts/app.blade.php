<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-mono bg-white text-black">
    <div class="h-auto border-l-4 border-black">
        @include('layouts.navigation')

        @hasSection('header')
            <header class="border-t border-b border-black bg-gray-100">
                <div class="max-w-7xl mx-auto py-2 px-1">
                    @yield('header')
                </div>
            </header>
        @endif

        <div class="max-w-7xl mx-auto py-3 px-1">
            @if (session('success'))
                <div class="border-2 border-black bg-green-200 p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="border-2 border-black bg-red-200 p-4 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>
    @stack('scripts')
</body>
</html>


{{-- resources/views/layouts/navigation.blade.php --}}
<nav class="border-b-2 border-black bg-white">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 h-16">
        <a href="{{ route('dashboard') }}" class="text-xl font-bold uppercase border-b-2 border-black">ProjectTT</a>

        <div class="flex gap-4 items-center">
            <a href="{{ route('dashboard') }}" class="uppercase text-sm border-b border-black">Dashboard</a>
            <a href="{{ route('galleries.index') }}" class="uppercase text-sm border-b border-black">Galleries</a>

            <div class="relative">
                <form action="{{ route('locale.switch', 'en') }}" method="GET" class="inline">
                    <button class="text-sm uppercase border-b border-black">EN</button>
                </form>
                <form action="{{ route('locale.switch', 'lv') }}" method="GET" class="inline ml-2">
                    <button class="text-sm uppercase border-b border-black">LV</button>
                </form>
            </div>

            @auth
                <span class="text-sm uppercase">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline ml-2">
                    @csrf
                    <button type="submit" class="text-sm uppercase border-b border-black">Logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-sm uppercase border-b border-black">Login</a>
                <a href="{{ route('register') }}" class="text-sm uppercase ml-2 border-b border-black">Register</a>
            @endguest
        </div>
    </div>
</nav>