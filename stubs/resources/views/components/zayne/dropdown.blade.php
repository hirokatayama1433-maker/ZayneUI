<div x-data="zayneDropdown()" class="zayne-dropdown-root" {{ $attributes->except(['class', 'style']) }}>
    @isset($trigger)
        <div x-on:click="open = !open">{{ $trigger }}</div>
    @endisset

    <div
        x-show="open"
        x-cloak
        x-on:click.outside="open = false"
        x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
        class="zayne-dropdown-panel"
        style="{{ $style }}"
    >
        {{ $slot }}
    </div>
</div>
