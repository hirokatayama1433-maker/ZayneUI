<div
    x-data="zayneTooltip()"
    class="zayne-tooltip-root"
    x-on:mouseenter="open = true"
    x-on:mouseleave="open = false"
    {{ $attributes->except(['class', 'style']) }}
>
    @isset($trigger)
        <div>{{ $trigger }}</div>
    @endisset

    <div
        x-show="open"
        x-cloak
        x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
        class="zayne-tooltip-panel"
        style="{{ $style }}"
    >
        {{ $slot->isNotEmpty() ? $slot : $text }}
    </div>
</div>
