<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @zayneAppearance
    @zayneStyles
</head>
<body>
    @isset($header)
        {{ $header }}
    @endisset
    {{ $slot }}
    @zayneScripts
</body>
</html>
