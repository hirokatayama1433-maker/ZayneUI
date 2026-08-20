@once
<style>
    .zayne-popover-panel {
        position: fixed;
        z-index: var(--zayne-z-popover);
        background: var(--zayne-color-base-100);
        border: var(--zayne-border-box) solid var(--zayne-color-base-border);
        border-radius: var(--zayne-radius-box);
        box-shadow: var(--zayne-shadow);
        box-sizing: border-box;
    }
</style>
@endonce

@once
<script>
    function zaynePopover() {
        return {
            open: false,
            toggle(trigger, panel) {
                this.open = !this.open;
                if (this.open) {
                    this.$nextTick(() => zaynePosition(trigger, panel));
                }
            },
            hide() { this.open = false; },
        };
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('zaynePopover', zaynePopover);
    });
</script>
@endonce

<div x-data="zaynePopover()" class="zayne-popover-root" {{ $attributes->except(['class', 'style']) }}>
    @isset($trigger)
        <div x-ref="trigger" x-on:click="toggle($refs.trigger, $refs.panel)">{{ $trigger }}</div>
    @endisset

    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            x-ref="panel"
            x-on:click.outside="hide()"
            x-on:click.stop
            x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
            style="position:fixed; z-index:var(--zayne-z-popover); {{ $style }}"
        >
            {{ $slot }}
        </div>
    </template>
</div>
