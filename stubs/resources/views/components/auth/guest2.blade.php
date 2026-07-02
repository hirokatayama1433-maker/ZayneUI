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
    <div style="display:grid; grid-template-columns:1fr 1fr; min-height:100vh;">

        {{-- Branding panel — hidden on mobile, visible on desktop via .zayne-auth-split-panel in zayne.css --}}
        <div
            class="zayne-auth-split-panel"
            style="display:flex; flex-direction:column; align-items:center; justify-content:center; padding:3rem; background:var(--zayne-color-primary); color:var(--zayne-color-primary-content);"
        >
            @isset($branding)
                {{ $branding }}
            @else
                <span style="font-size:1.5rem; font-weight:700;">{{ config('app.name') }}</span>
            @endisset
        </div>

        {{-- Form content --}}
        <main style="display:flex; align-items:center; justify-content:center; padding:3rem;">
            {{ $slot }}
        </main>

    </div>

    @zayneScripts
</body>
</html>
