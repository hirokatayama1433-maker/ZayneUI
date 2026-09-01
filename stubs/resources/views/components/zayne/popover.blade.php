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

    /* Teleported popover content escapes sidebar DOM but still matches collapsed text-hide rules */
    html.sidebar-collapsed .zayne-popover-panel .zayne-sb-text {
        opacity: 1;
        max-width: none;
        pointer-events: auto;
    }
</style>
@endonce

@once
<script>
    function zaynePopover() {
        return {
            open: false,
            _id: null,
            _reposition: null,

            startReposition(trigger, panel) {
                this.stopReposition();
                this._reposition = () => zaynePosition(trigger, panel);
                window.addEventListener('scroll', this._reposition, { passive: true, capture: true });
                window.addEventListener('resize', this._reposition, { passive: true });
            },

            stopReposition() {
                if (!this._reposition) return;
                window.removeEventListener('scroll', this._reposition, { capture: true });
                window.removeEventListener('resize', this._reposition);
                this._reposition = null;
            },

            toggle(trigger, panel) {
                if (this.open) { this.hide(); return; }
                this._id = Symbol();
                ZayneOverlayStack.push({ id: this._id, type: 'positioned', hide: () => this.hide() });
                this.open = true;
                this.$nextTick(() => {
                    zaynePosition(trigger, panel);
                    this.startReposition(trigger, panel);
                });
            },

            hide() {
                this.open = false;
                this.stopReposition();
                if (this._id) {
                    ZayneOverlayStack.pop(this._id);
                    this._id = null;
                }
            },
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
            class="zayne-popover-panel"
            x-show="open"
            x-cloak
            x-ref="panel"
            @keydown.window.escape="if (open) hide()"
            x-on:click.outside="if ($refs.trigger && $refs.trigger.contains($event.target)) return; hide()"
            x-on:click.stop
            x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
            style="{{ $style }}"
        >
            {{ $slot }}
        </div>
    </template>
</div>
