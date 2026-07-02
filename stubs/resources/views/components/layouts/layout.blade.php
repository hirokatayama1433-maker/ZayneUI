<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @zayneAppearance
    @zayneStyles
</head>
<body class="zaynemainlayout">

    @include('components.layouts.partials.sidebar')
    @include('components.layouts.partials.header')

    <zayne:layout.main>
        {{ $slot }}
    </zayne:layout.main>

    @zayneScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
