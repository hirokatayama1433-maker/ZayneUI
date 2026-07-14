@php
    $tooltipLabel = $kbd ? $placeholder . ' (' . $kbd . ')' : $placeholder;
@endphp

<div
    x-data="zayneTooltip()"
    class="zayne-sidebar-search-group"
    style="position:relative; overflow:visible;"
>
    <div
        class="zayne-input-wrapper zayne-sidebar-search"
        style="{{ $style }}"
        x-ref="trigger"
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
                    field.querySelector('[data-zayne-input-field]')?.focus();
                }, 220);
            }
        "
    >
        <span
            class="zayne-input-icon zayne-input-icon--leading"
            style="flex-shrink:0; color:var(--zayne-custom-sidebar-content); opacity:0.5;"
        >
            <zayne:icon :name="$icon" size="1rem" />
        </span>

        <input
            type="text"
            class="zayne-input sidebar-label"
            placeholder="{{ $placeholder }}"
            @if($name) name="{{ $name }}" @endif
            @if($value !== null) value="{{ $value }}" @endif
            data-zayne-input-field
            {{ $attributes->except('class') }}
        >

        @if($kbd)
            <kbd class="zayne-input-kbd sidebar-label" style="flex-shrink:0;">{{ $kbd }}</kbd>
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