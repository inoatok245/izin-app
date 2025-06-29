<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Sistem Izin') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        document.documentElement.classList.add('dark');
    </script>
</head>
<body class="bg-gray-950 text-white antialiased">
    <div class="min-h-screen flex flex-col">
        <header class="bg-gray-900 border-b border-gray-700">
            <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
                <h1 class="text-xl font-semibold text-white">Sistem Izin Karyawan</h1>
                <nav class="flex gap-4 text-sm text-gray-300">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-amber-400 font-bold' : 'hover:text-white' }}">Dashboard</a>
                    <a href="{{ route('izin.index') }}" class="{{ request()->routeIs('izin.index') ? 'text-amber-400 font-bold' : 'hover:text-white' }}">Riwayat</a>
                    <a href="{{ route('izin.create') }}" class="{{ request()->routeIs('izin.create') ? 'text-amber-400 font-bold' : 'hover:text-white' }}">Ajukan Izin</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-400 ml-2">Logout</button>
                    </form>
                </nav>
            </div>
        </header>

        <main class="flex-1 py-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
