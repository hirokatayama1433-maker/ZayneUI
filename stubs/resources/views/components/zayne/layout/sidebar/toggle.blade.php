<div
    x-data="zayneTooltip()"
    style="position:relative; overflow:visible;"
>
    <button
        type="button"
        onclick="Zayne.Sidebar.toggle()"
        {{ $attributes->except('class') }}
        style="{{ $baseStyle }}"
        x-ref="trigger"
        x-on:mouseenter="
            if (document.documentElement.classList.contains('sidebar-collapsed')) {
                show($refs.trigger, $refs.panel);
            }
        "
        x-on:mouseleave="hide()"
        onmouseover="
            this.style.background='var(--zayne-custom-sidebar-item-bg-hover)';
            this.style.color='var(--zayne-custom-sidebar-item-content-hover)';
        "
        onmouseout="
            this.style.background='var(--zayne-custom-sidebar-item-bg)';
            this.style.color='var(--zayne-custom-sidebar-content)';
        "
    >
        <div style="flex-shrink:0; width:38px; height:38px; display:flex; justify-content:center; align-items:center; position:relative;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor"
                class="sidebar-toggle-icon-collapsed"
                style="width:1.25rem; height:1.25rem; position:absolute; opacity:0; transition:opacity var(--layout-transition);">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor"
                class="sidebar-toggle-icon-expanded"
                style="width:1.25rem; height:1.25rem; position:absolute; opacity:1; transition:opacity var(--layout-transition);">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>
        </div>
        <span class="sidebar-label" style="font-size:0.875rem;">{{ $label }}</span>
    </button>

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
    >{{ $label }}</div>
</div>
