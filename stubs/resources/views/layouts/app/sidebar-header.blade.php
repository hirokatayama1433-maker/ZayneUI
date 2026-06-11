<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @zayneStyles
</head>
<body class="zaynemainlayout">
    @isset($sidebar)
        {{ $sidebar }}
    @endisset

    @isset($header)
        {{ $header }}
    @endisset

    <zayne:layout.main>
        {{ $slot }}
    </zayne:layout.main>

    @zayneScripts
</body>
</html>