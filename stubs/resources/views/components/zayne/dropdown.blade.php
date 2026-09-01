@once
<style>
    .zayne-dropdown-root {
        position: relative;
        display: inline-flex;
    }

    .zayne-dropdown-panel {
        position: fixed;
        z-index: var(--zayne-z-dropdown);
        background: var(--zayne-color-base-100);
        border: var(--zayne-border-box) solid var(--zayne-color-base-border);
        border-radius: var(--zayne-radius-box);
        box-shadow: var(--zayne-shadow);
        overflow: hidden;
        min-width: 160px;
        box-sizing: border-box;
    }
</style>
@endonce

@include('zayne::_zayne-dropdown-alpine')

<div x-data="zayneDropdown()" class="zayne-dropdown-root" {{ $attributes->except(['class', 'style']) }}>
    @isset($trigger)
        <div x-ref="trigger" x-on:click="toggle($refs.trigger, $refs.panel)">{{ $trigger }}</div>
    @endisset

    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            x-ref="panel"
            @keydown.window.escape="if (open) hide()"
            x-on:click.outside="if ($refs.trigger && $refs.trigger.contains($event.target)) return; hide()"
            x-on:click.stop
            x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
            style="position:fixed; z-index:var(--zayne-z-dropdown); {{ $style }}"
        >
            {{ $slot }}
        </div>
    </template>
</div>
