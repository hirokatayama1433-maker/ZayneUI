<div
    x-data="zayneTooltip()"
    class="zayne-tooltip-root"
    x-ref="trigger"
    x-on:mouseenter="show($refs.trigger, $refs.panel)"
    x-on:mouseleave="hide()"
    {{ $attributes->except(['class', 'style']) }}
>
    @isset($trigger)
        <div>{{ $trigger }}</div>
    @endisset

    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            x-ref="panel"
            x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
            style="position:fixed; z-index:var(--zayne-z-tooltip); {{ $style }}"
        >
            {{ $slot->isNotEmpty() ? $slot : $text }}
        </div>
    </template>
</div>
