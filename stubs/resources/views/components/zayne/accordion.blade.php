{{-- accordion.blade.php — ZayneUI Accordion Component --}}

@once
<style>
    /* ── Accordion ── */
    .zayne-accordion-item:first-child {
        border-top: none !important;
    }

    .zayne-accordion--separated > .zayne-accordion-item {
        border: 1px solid var(--zayne-color-base-border) !important;
        border-radius: var(--zayne-radius-box) !important;
        overflow: hidden !important;
    }

    .zayne-accordion--separated .zayne-accordion-item {
        border-top: none !important;
    }

    .zayne-accordion-trigger:focus-visible {
        outline: 2px solid var(--zayne-color-primary);
        outline-offset: -2px;
    }

    /* ── Accordion panel — CSS-driven open/close ── */
    .zayne-accordion-panel {
        display: grid;
        grid-template-rows: 0fr;
        opacity: 0;
        transition:
            grid-template-rows 280ms cubic-bezier(0.4, 0, 0.2, 1),
            opacity 200ms ease,
            border-top 200ms ease;
        border-top: 0px solid transparent;
    }

    .zayne-accordion-panel > * {
        overflow: hidden;
    }

    .zayne-accordion-panel.is-open {
        grid-template-rows: 1fr;
        opacity: 1;
        border-top: 1px solid var(--zayne-color-base-border);
    }
</style>
@endonce

@once
<script>
    /* ── Accordion ── */
    function zayneAccordion({ multiple = false, default: defaultOpen = '' } = {}) {
        return {
            openItems: defaultOpen ? [defaultOpen] : [],

            toggle(value) {
                if (this.isOpen(value)) {
                    this.openItems = this.openItems.filter(v => v !== value);
                } else {
                    this.openItems = multiple
                        ? [...this.openItems, value]
                        : [value];
                }
            },

            isOpen(value) {
                return this.openItems.includes(value);
            },
        };
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('zayneAccordion', zayneAccordion);
    });
</script>
@endonce

@php
    // ── Accordion — resolve variant class and pass Alpine config
@endphp

<div
    x-data="zayneAccordion({ multiple: {{ $multiple ? 'true' : 'false' }}, default: '{{ $default ?? '' }}' })"
    class="zayne-accordion zayne-accordion--{{ $variant }}"
    style="{{ $style }}"
    {{ $attributes }}
>
    {{ $slot }}
</div>