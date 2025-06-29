<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistem Perizinan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Pastikan dark mode aktif saat load
        document.documentElement.classList.add('dark');
    </script>
</head>
<body class="antialiased bg-gray-950 text-white">
    {{ $slot }}
</body>
</html>
