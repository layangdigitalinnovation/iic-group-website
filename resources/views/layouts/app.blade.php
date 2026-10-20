<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description', 'IIC Group connects Indonesian capabilities with opportunities in Saudi Arabia through structured partnerships, accountable coordination and responsible execution.')">
    <meta name="theme-color" content="#0a1a33">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/logo/favicon-192.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo/favicon-192.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Inter:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}?v={{ file_exists(public_path('css/site.css')) ? filemtime(public_path('css/site.css')) : time() }}">
</head>
<body>
    @yield('content')
    <script src="{{ asset('js/site.js') }}?v={{ file_exists(public_path('js/site.js')) ? filemtime(public_path('js/site.js')) : time() }}" defer></script>
</body>
</html>
