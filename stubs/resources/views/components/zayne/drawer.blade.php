<div x-data="zayneDrawer()" class="zayne-drawer-root" {{ $attributes->except(['class', 'style']) }}>
    @isset($trigger)
        <div x-on:click="open = true">{{ $trigger }}</div>
    @endisset

    <div
        x-show="open"
        x-cloak
        x-on:click="open = false"
        x-bind:class="open ? 'zayne-backdrop-enter' : 'zayne-backdrop-leave'"
        class="zayne-backdrop"
    ></div>

    <div
        x-show="open"
        x-cloak
        x-trap="open"
        x-bind:class="open ? 'zayne-drawer-enter' : 'zayne-drawer-leave'"
        class="zayne-drawer-panel"
        style="{{ $style }}"
    >
        {{ $slot }}
    </div>
</div>
