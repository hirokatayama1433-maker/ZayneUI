<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    
    @zayneAppearance
    @zayneStyles
</head>
<body style="display: flex; justify-content:center; background: var(--zayne-background-main);">
    <div class="zaynemainlayout">
        @include('components.layouts.partials.header')
        @include('components.layouts.partials.sidebar')

        <zayne:main width="90%" padding="20px">
            {{ $slot }}
        </zayne:main>

        @zayneScripts
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </div>
</body>
</html> 
