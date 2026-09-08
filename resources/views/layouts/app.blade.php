<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'VizzioCraft')</title>
    <meta name="description" content="@yield('meta_description', 'VizzioCraft — modern digital solutions for growing businesses.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-bg font-sans text-ink antialiased">
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />
    <x-whatsapp-chat />
    @stack('scripts')
</body>
</html>
