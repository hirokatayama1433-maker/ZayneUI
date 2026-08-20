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

@once
<script>
    function zayneDropdown() {
        return {
            open: false,
            hideTimeout: null,
            hoverGroup: null,
            cancelHide() {
                if (this.hideTimeout) {
                    clearTimeout(this.hideTimeout);
                    this.hideTimeout = null;
                }
            },
            syncHoverGroup(panel) {
                this.hoverGroup = panel?.dataset?.zayneHoverGroup ?? null;
            },
            claimHoverGroup(panel) {
                this.syncHoverGroup(panel);
                if (!this.hoverGroup) return;
                window.__zayneHoverGroups ??= {};
                const active = window.__zayneHoverGroups[this.hoverGroup];
                if (active && active !== this) active.hide();
                window.__zayneHoverGroups[this.hoverGroup] = this;
            },
            releaseHoverGroup() {
                if (!this.hoverGroup || !window.__zayneHoverGroups) return;
                if (window.__zayneHoverGroups[this.hoverGroup] === this) {
                    delete window.__zayneHoverGroups[this.hoverGroup];
                }
            },
            show(trigger, panel) {
                this.cancelHide();
                this.claimHoverGroup(panel);
                this.open = true;
                this.$nextTick(() => zaynePosition(trigger, panel));
            },
            toggle(trigger, panel) {
                this.cancelHide();
                this.syncHoverGroup(panel);
                this.open = !this.open;
                if (this.open) {
                    this.claimHoverGroup(panel);
                    this.$nextTick(() => zaynePosition(trigger, panel));
                } else {
                    this.releaseHoverGroup();
                }
            },
            hide() {
                this.cancelHide();
                this.open = false;
                this.releaseHoverGroup();
            },
            hideSoon(delay = 180) {
                this.cancelHide();
                this.hideTimeout = setTimeout(() => {
                    this.open = false;
                    this.hideTimeout = null;
                    this.releaseHoverGroup();
                }, delay);
            },
        };
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('zayneDropdown', zayneDropdown);
    });
</script>
@endonce

<div x-data="zayneDropdown()" class="zayne-dropdown-root" {{ $attributes->except(['class', 'style']) }}>
    @isset($trigger)
        <div x-ref="trigger" x-on:click="toggle($refs.trigger, $refs.panel)">{{ $trigger }}</div>
    @endisset

    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            x-ref="panel"
            x-on:click.outside="open = false"
            x-on:click.stop
            x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
            style="position:fixed; z-index:var(--zayne-z-dropdown); {{ $style }}"
        >
            {{ $slot }}
        </div>
    </template>
</div>
