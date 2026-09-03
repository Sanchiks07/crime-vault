<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "Crime Vault" }}</title>
    <link rel="stylesheet" href="{{ asset('main-style.css') }}">
    <link rel="stylesheet" href="{{ asset('psychology-style.css') }}">
    <script src="{{ asset('script.js') }}" defer></script>
    <!-- google font for headings -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
</head>
<body>
    <x-navigation></x-navigation>
    
    <div class="main-container">
        {{ $slot }}
    </div>
</body>
</html>