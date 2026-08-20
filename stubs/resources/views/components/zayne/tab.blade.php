@once
<style>
    .zayne-tab-list {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        flex-shrink: 0;
    }

    .zayne-tab-item {
        display: inline-flex;
        align-items: center;
        justify-content: center;
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
    }

    .zayne-tab-list--underline .zayne-tab-item {
        border-radius: 0;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .zayne-tab-list--underline .zayne-tab-item.is-active {
        border-bottom-color: var(--zayne-color-primary);
        color: var(--zayne-color-primary);
    }

    /* ── pill ── */
    .zayne-tab-list--pill .zayne-tab-item {
        border-radius: 9999px;
    }

    .zayne-tab-list--pill .zayne-tab-item.is-active {
        background: var(--zayne-color-primary);
        color: var(--zayne-color-primary-content);
    }

    .zayne-tab-list--pill.zayne-tab-list--muted .zayne-tab-item:not(.is-active) {
        color: var(--zayne-color-base-content);
        opacity: 0.6;
    }

    /* ── soft ── */
    .zayne-tab-list--soft .zayne-tab-item.is-active {
        background: color-mix(in oklch, var(--zayne-color-primary) 15%, transparent);
        color: var(--zayne-color-primary);
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
    }

    .zayne-tab--vertical .zayne-tab-list--underline {
        border-bottom: none;
        border-right: 2px solid var(--zayne-color-base-border);
    }

    .zayne-tab--vertical .zayne-tab-list--underline .zayne-tab-item {
        border-bottom: none;
        border-right: 2px solid transparent;
        margin-bottom: 0;
        margin-right: -2px;
    }

    .zayne-tab--vertical .zayne-tab-list--underline .zayne-tab-item.is-active {
        border-right-color: var(--zayne-color-primary);
        color: var(--zayne-color-primary);
    }

    .zayne-tab--vertical .zayne-tab-list--segmented {
        width: fit-content;
    }

    /* ── panels ── */
    .zayne-tab-panels {
        flex: 1;
        min-width: 0;
        min-height: 0;
    }

    .zayne-tab-panel {
        width: 100%;
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
    x-data="zayneTab('{{ $default }}')"
    class="zayne-tab zayne-tab--{{ $orientation }}"
    style="{{ $wrapperStyle }}"
    {{ $attributes->except(['class', 'style']) }}
>
    <div
        class="zayne-tab-list zayne-tab-list--{{ $variant }}{{ $muted ? ' zayne-tab-list--muted' : '' }}"
        style="{{ $listStyle }}"
        role="tablist"
    >
        {{ $tabs }}
    </div>

    <div
        class="zayne-tab-panels"
        style="{{ $panelsStyle }}"
    >
        {{ $slot }}
    </div>
</div>