<div
    class="zaynemainlayout"
    x-data="{ mobileOpen: false }"
    {{ $attributes }}
>
    @isset($sidebar)
        {{ $sidebar }}
    @endisset

    @isset($header)
        {{ $header }}
    @endisset

    <div class="zaynemain">{{ $slot }}</div>

    <div
        class="zayne-mobile-backdrop"
        x-show="mobileOpen"
        x-cloak
        x-on:click="mobileOpen = false"
        x-bind:class="mobileOpen ? 'zayne-backdrop-enter' : 'zayne-backdrop-leave'"
    ></div>

    <button
        class="zayne-mobile-toggle"
        x-on:click="mobileOpen = !mobileOpen"
        aria-label="Toggle navigation"
        type="button"
    >
        <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
        <svg x-show="mobileOpen" x-cloak xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
    </button>
</div>