<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @zayneStyles
</head>
<body>
    <zayne:layout>
        <x-slot:sidebar>{{ $sidebar ?? '' }}</x-slot:sidebar>
        <x-slot:header>{{ $header ?? '' }}</x-slot:header>
        {{ $slot }}
    </zayne:layout>
    @zayneScripts
</body>
</html>
