<div x-data="zayneDrawer()" class="zayne-drawer-root" {{ $attributes->except(['class', 'style']) }}>
    @isset($trigger)
        <div x-on:click="open = true">{{ $trigger }}</div>
    @endisset

    <div
        x-show="open"
        x-cloak
        x-on:click.self="open = false"
        x-bind:class="open ? 'zayne-backdrop-enter' : 'zayne-backdrop-leave'"
        class="zayne-backdrop"
    ></div>

    <div
        x-show="open"
        x-cloak
        x-on:click.stop
        x-bind:class="open ? '{{ $enterClass }}' : '{{ $leaveClass }}'"
        style="{{ $style }}"
    >
        {{ $slot }}
    </div>
</div>