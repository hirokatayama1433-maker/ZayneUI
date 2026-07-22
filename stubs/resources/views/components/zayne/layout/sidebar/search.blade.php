@props([
    'placeholder' => 'Search...',
    'kbd'         => null,
    'icon'        => 'search',
])

@php
    $tooltipLabel = $kbd ? $placeholder . ' (' . $kbd . ')' : $placeholder;
@endphp

<div
    x-data="zayneTooltip()"
    class="zayne-sidebar-search-group"
    style="position:relative; overflow:visible; width:100%;"
>
    <div
        class="zayne-sidebar-search"
        x-ref="trigger"
        style="
            display: flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            height: 36px;
            box-sizing: border-box;
            padding: 0 0.625rem;
            border-radius: var(--zayne-radius-field);
            border: var(--zayne-border-field) solid var(--zayne-color-base-border);
            background: var(--zayne-color-base-100);
            color: var(--zayne-custom-sidebar-content);
            transition: border-color 150ms ease, background 150ms ease;
            cursor: text;
        "
        x-on:mouseenter="
            if (document.documentElement.classList.contains('sidebar-collapsed')) {
                show($refs.trigger, $refs.panel);
            }
        "
        x-on:mouseleave="hide()"
        onclick="
            if (document.documentElement.classList.contains('sidebar-collapsed')) {
                Zayne.Sidebar.expand();
                var field = this;
                setTimeout(function () {
                    field.querySelector('[data-zayne-search-field]')?.focus();
                }, 220);
            }
        "
    >
        <span style="flex-shrink:0; display:flex; opacity:0.5;">
            <zayne:icon :name="$icon" size="1rem" />
        </span>

        <input
            type="text"
            class="sidebar-label"
            placeholder="{{ $placeholder }}"
            data-zayne-search-field
            style="
                flex: 1;
                min-width: 0;
                height: 100%;
                placeholder-font: 8px;
                border: none;
                outline: none;
                background: transparent;
                font-size: 14px; /* 12px */
                color: var(--zayne-custom-sidebar-content);
                padding: 0;
            "
            {{ $attributes->except('class') }}
        >

        @if($kbd)
            <kbd
                class="sidebar-label"
                style="
                    flex-shrink: 0;
                    font-size: 0.7rem;
                    line-height: 1;
                    padding: 0.2rem 0.375rem;
                    border-radius: calc(var(--zayne-radius-field) - 2px);
                    border: 1px solid var(--zayne-color-base-border);
                    color: var(--zayne-custom-sidebar-content);
                    opacity: 0.6;
                "
            >{{ $kbd }}</kbd>
        @endif
    </div>

    <div
        x-show="open && document.documentElement.classList.contains('sidebar-collapsed')"
        x-cloak
        x-ref="panel"
        x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
        data-zayne-placement="right-center"
        style="
            position: fixed;
            z-index: var(--zayne-z-tooltip);
            background: var(--zayne-color-base-200);
            color: var(--zayne-color-base-content);
            padding: 0.25rem 0.625rem;
            border-radius: var(--zayne-radius-field);
            font-size: 0.8rem;
            white-space: nowrap;
            pointer-events: none;
            box-shadow: var(--zayne-shadow);
        "
    >{{ $tooltipLabel }}</div>
</div>