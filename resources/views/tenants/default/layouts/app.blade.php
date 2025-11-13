<!DOCTYPE html>
<html lang="es" data-theme="{{ tenant()->configuration->theme ?? 'default' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ tenant()->name }} - Tienda</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/tenant-themes/{{ tenant()->configuration->theme }}/theme.css" rel="stylesheet">
</head>
<body>
    <x-nav />
    <main class="container py-4">
        @yield('content')
    </main>
    <x-footer />
    <x-chatbot />
    <script src="/js/app.js"></script>
</body>
</html>
