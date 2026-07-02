<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @zayneAppearance
    @zayneStyles
</head>
<body>
    <main class="zayne-auth-shell">
        {{ $slot }}
    </main>

    @zayneScripts
</body>
</html>
