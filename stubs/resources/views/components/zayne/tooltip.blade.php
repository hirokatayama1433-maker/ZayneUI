@once
<style>
    .zayne-tooltip-root {
        position: relative;
        display: inline-flex;
    }

    .zayne-tooltip-panel {
        position: fixed;
        z-index: var(--zayne-z-tooltip);
        background: var(--zayne-color-base-900);
        color: var(--zayne-color-base-100);
        font-size: 0.75rem;
        line-height: 1.4;
        padding: 0.375rem 0.625rem;
        border-radius: var(--zayne-radius-selector);
        white-space: nowrap;
        pointer-events: none;
        box-shadow: var(--zayne-shadow);
        max-width: 220px;
        white-space: normal;
    }
</style>
@endonce

@once
<script>
    function zayneTooltip() {
        return {
            open: false,
            init() {
                window.addEventListener('zayne:sidebar-toggled', () => {
                    this.open = false;
                });
            },
            show(trigger, panel) {
                this.open = true;
                this.$nextTick(() => zaynePosition(trigger, panel));
            },
            hide() { this.open = false; },
        };
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('zayneTooltip', zayneTooltip);
    });
</script>
@endonce

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
