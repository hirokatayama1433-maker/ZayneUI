@once
<style>
    /* Root — must stretch children to equal height in vertical mode */
    .zayne-tab {
        align-items: stretch;
        height: 100%
    }

    .zayne-tab-list {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        flex-shrink: 0;
    }

    .zayne-tab-header {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 0;
        min-width: 0;
        overflow: visible;
    }

    .zayne-tab-titlebar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        min-width: 0;
    }

    .zayne-tab-title {
        flex-shrink: 0;
        font-weight: 600;
    }

    .zayne-tab-footer {
        flex-shrink: 0;
    }

    .zayne-tab-item {
        display: inline-flex;
        align-items: center;
        justify-content: start;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: var(--zayne-radius-selector);
        cursor: pointer;
        white-space: nowrap;
        transition: background 150ms ease, color 150ms ease, box-shadow 150ms ease;
        border: none;
        background: transparent;
        color: var(--zayne-color-base-content);
        text-decoration: none;
    }

    .zayne-tab-item:hover {
        background: color-mix(in oklch, var(--zayne-color-base-content) 8%, transparent);
    }

    .zayne-tab-item[disabled] {
        opacity: 0.4;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* ── underline ── */
    .zayne-tab-list--underline {
        border-bottom: 2px solid var(--zayne-color-base-border);
        gap: 0;
        border-radius: 0;
        overflow: visible;
        padding-bottom: 2px;
        margin-bottom: -2px;
    }

    .zayne-tab-list--underline .zayne-tab-item {
        border-radius: 0;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .zayne-tab-list--underline .zayne-tab-item.is-active {
        border-bottom-color: var(--zayne-tab-accent);
        color: var(--zayne-tab-accent);
    }

    /* ── pill ── */
    .zayne-tab-list--pill .zayne-tab-item {
        border-radius: 9999px;
    }

    .zayne-tab-list--pill .zayne-tab-item.is-active {
        background: var(--zayne-tab-accent);
        color: var(--zayne-color-primary-content);
    }

    .zayne-tab-list--pill.zayne-tab-list--muted .zayne-tab-item:not(.is-active) {
        color: var(--zayne-color-base-content);
        opacity: 0.6;
    }

    /* ── soft ── */
    .zayne-tab-list--soft .zayne-tab-item.is-active {
        background: color-mix(in oklch, var(--zayne-tab-accent) 15%, transparent);
        color: var(--zayne-tab-accent);
    }

    .zayne-tab-list--soft.zayne-tab-list--muted .zayne-tab-item:not(.is-active) {
        color: var(--zayne-color-base-content);
        opacity: 0.6;
    }

    /* ── solid ── */
    .zayne-tab-list--solid .zayne-tab-item.is-active {
        background: var(--zayne-color-base-200);
        color: var(--zayne-color-base-content);
    }

    .zayne-tab-list--solid.zayne-tab-list--muted .zayne-tab-item:not(.is-active) {
        color: var(--zayne-color-base-content);
        opacity: 0.6;
    }

    /* ── segmented ── */
    .zayne-tab-list--segmented {
        background: var(--zayne-color-base-200);
        border-radius: var(--zayne-radius-box);
        padding: 0.25rem;
    }

    .zayne-tab-list--segmented .zayne-tab-item {
        flex: 1;
        justify-content: center;
    }

    .zayne-tab-list--segmented .zayne-tab-item.is-active {
        background: var(--zayne-color-base-100);
        box-shadow: var(--zayne-shadow);
        color: var(--zayne-color-base-content);
    }

    /* ── vertical ── */
    .zayne-tab--vertical .zayne-tab-list {
        flex-direction: column;
        align-items: stretch;
        padding: 0.25rem 0;
        gap: 0.125rem;
    }

    .zayne-tab--vertical .zayne-tab-list--underline {
        border-bottom: none;
        border-right: 2px solid var(--zayne-color-base-border);
        overflow: unset;
        padding-bottom: 0;
        margin-bottom: 0;
        padding-right: 2px;
        margin-right: -2px;
    }

    .zayne-tab--vertical .zayne-tab-list--underline .zayne-tab-item {
        border-bottom: none;
        border-right: 2px solid transparent;
        margin-bottom: 0;
        margin-right: -2px;
    }

    .zayne-tab--vertical .zayne-tab-list--underline .zayne-tab-item.is-active {
        border-right-color: var(--zayne-tab-accent);
        color: var(--zayne-tab-accent);
    }

    .zayne-tab--vertical .zayne-tab-list--segmented {
        width: fit-content;
    }

    /*
     * Header is a flex column that STRETCHES to match the panels height —
     * this works because .zayne-tab now has align-items: stretch.
     */
    .zayne-tab--vertical .zayne-tab-header {
        flex: 0 0 auto;
        display: flex;
        flex-direction: column;
    }

    .zayne-tab--vertical .zayne-tab-titlebar {
        justify-content: flex-start;
        padding: 0rem 0.5rem 0.25rem;
        flex-shrink: 0;
    }

    /*
     * .zayne-tab-nav is the new wrapper div between titlebar and footer.
     * flex: 1 makes it absorb ALL remaining height inside the header column,
     * so the footer below it is always pushed to the very bottom.
     */
    .zayne-tab--vertical .zayne-tab-nav {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-height: 0;
    }

    .zayne-tab--vertical .zayne-tab-footer {
        flex-shrink: 0;
        padding: 0.5rem;
    }

    .zayne-tab--fill .zayne-tab-list--segmented .zayne-tab-item,
    .zayne-tab--fill .zayne-tab-list:not(.zayne-tab-list--segmented) .zayne-tab-item {
        flex: 1 1 0;
    }

    /* ── panels ── */
    .zayne-tab-panels {
        flex: 1;
        min-width: 0;
        min-height: 0;
        overflow: hidden;  /* contain the panel scroll within the panels box */
    }

    .zayne-tab-panel {
        width: 100%;
        height: 100%;
        overflow-y: auto;
    }
</style>
@endonce

@once
<script>
    function zayneTab(initial) {
        return {
            active: initial,
            setActive(value) { this.active = value; },
            isActive(value)  { return this.active === value; },
        };
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('zayneTab', zayneTab);
    });
</script>
@endonce

<div
    x-data="zayneTab('{{ $defaultopen ?: $default }}')"
    class="zayne-tab zayne-tab--{{ $orientation }}{{ $fill ? ' zayne-tab--fill' : '' }}"
    style="{{ $wrapperStyle }}"
    {{ $attributes->except(['class', 'style']) }}
>
    <div class="zayne-tab-header">
        <div class="zayne-tab-titlebar">
            @if($title)
                <div class="zayne-tab-title">{{ $title }}</div>
            @endif
            @if(isset($footer) && $orientation === 'horizontal')
                <div class="zayne-tab-footer">{{ $footer }}</div>
            @endif
        </div>

        @if($orientation === 'vertical')
            {{-- .zayne-tab-nav: flex:1 spacer — absorbs all height between titlebar and footer --}}
            <div class="zayne-tab-nav">
                <div
                    class="zayne-tab-list zayne-tab-list--{{ $variant }}{{ $muted ? ' zayne-tab-list--muted' : '' }}"
                    style="{{ $listStyle }}"
                    role="tablist"
                >
                    {{ $tabs }}
                </div>
            </div>
            @if(isset($footer))
                <div class="zayne-tab-footer">{{ $footer }}</div>
            @endif
        @else
            <div
                class="zayne-tab-list zayne-tab-list--{{ $variant }}{{ $muted ? ' zayne-tab-list--muted' : '' }}"
                style="{{ $listStyle }}"
                role="tablist"
            >
                {{ $tabs }}
            </div>
        @endif
    </div>

    <div
        class="zayne-tab-panels"
        style="{{ $panelsStyle }}"
    >
        {{ $slot }}
    </div>
</div>