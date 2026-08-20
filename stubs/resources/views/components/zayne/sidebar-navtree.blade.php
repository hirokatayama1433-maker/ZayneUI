@once
    <style>
        /* ── Navtree ── */
            .zaynenavtree {
                display: flex;
                flex-direction: column;
            }
            .zaynenavtree.navtree-open .navtree-chevron {
                transform: rotate(180deg);
            }
    </style>
@endonce
<div
    x-data="zayneDropdown()"
    class="zaynenavtree"
    style="display:flex; flex-direction:column; position:relative; overflow:visible;"
>

    <button
        type="button"
        {{ $attributes->except('class') }}
        style="{{ $baseStyle }}"
        x-ref="trigger"
        x-on:mouseenter="
            if (document.documentElement.classList.contains('sidebar-collapsed')) {
                cancelHide();
                show($refs.trigger, $refs.panel);
            }
        "
        x-on:mouseleave="
            if (document.documentElement.classList.contains('sidebar-collapsed')) {
                hideSoon(220);
            }
        "
        @if(!$active)
            onmouseover="
                this.style.background='{{ $hoverBg }}';
                this.style.color='{{ $hoverColor }}';
            "
            onmouseout="
                this.style.background='{{ $background ?? 'var(--zayne-custom-sidebar-item-bg)' }}';
                this.style.color='{{ $color ?? 'var(--zayne-custom-sidebar-content)' }}';
            "
        @endif
        x-on:click="
            if (document.documentElement.classList.contains('sidebar-collapsed')) {
                show($refs.trigger, $refs.panel);
                return;
            }

            open = false;

            const tree = $el.closest('.zaynenavtree');
            const items = tree.querySelector('.navtree-items');
            const chevron = tree.querySelector('.navtree-chevron');
            const isOpen = tree.classList.contains('navtree-open');

            if (isOpen) {
                items.style.maxHeight = '0px';
                items.style.opacity = '0';
                chevron.style.transform = 'rotate(0deg)';
                tree.classList.remove('navtree-open');
            } else {
                items.style.maxHeight = items.scrollHeight + 'px';
                items.style.opacity = '1';
                chevron.style.transform = 'rotate(180deg)';
                tree.classList.add('navtree-open');
            }
        "
    >
        <div style="flex-shrink:0; width:38px; height:38px; display:flex; justify-content:center; align-items:center;">
            <zayne:icon name="{{ $icon }}" size="18px"/>
        </div>

        <span class="sidebar-label" style="font-size:0.875rem; flex:1; text-align:left; display:flex; align-items:center; min-width:0;">
            {{ $label }}
        </span>

        <span class="sidebar-label" style="display:flex; align-items:center; padding-right:0.75rem;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor"
                class="navtree-chevron"
                style="width:0.75rem; height:0.75rem; transition:transform 280ms cubic-bezier(0.4,0,0.2,1); transform:rotate(0deg);">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </span>
    </button>

    {{-- Normal expanded children --}}
    <div
        class="navtree-items"
        style="display:flex; flex-direction:column; gap:4px; padding-left:38px; overflow:hidden; max-height:0; opacity:0; transition:max-height 150ms cubic-bezier(0.4,0,0.2,1), opacity 150ms ease; position:relative;"
    >
        <span
            aria-hidden="true"
            style="position:absolute; left:18px; top:4px; bottom:4px; width:1.5px; border-radius:9999px; background-color:color-mix(in srgb, var(--zayne-custom-sidebar-content) 20%, transparent);"
        ></span>
        <div style="height:4px;"></div>
        {{ $slot }}
    </div>

    {{-- Collapse dropdown — shown when sidebar is collapsed --}}
    <div
        x-show="open && document.documentElement.classList.contains('sidebar-collapsed')"
        x-cloak
        x-ref="panel"
        data-zayne-placement="right-start"
        data-zayne-hover-group="sidebar-navtree"
        x-on:mouseenter="cancelHide(); show($refs.trigger, $refs.panel)"
        x-on:mouseleave="hideSoon(220)"
        x-on:click.outside="open = false"
        x-on:click.stop
        x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
        style="
            position: fixed;
            z-index: var(--zayne-z-dropdown);
            min-width: 200px;
            background: var(--zayne-color-base-100);
            border-radius: var(--zayne-radius-box);
            box-shadow: var(--zayne-shadow);
            overflow: hidden;
        "
    >
        <div style="padding: 0.5rem 0.75rem; font-size:0.7rem; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:var(--zayne-color-base-content); opacity:0.5; border-bottom: 1px solid var(--zayne-color-base-border);">
            {{ $label }}
        </div>
        <div
            style="padding:0.375rem; display:flex; flex-direction:column; gap:4px;"
            x-on:click="open = false"
        >
            {{ $slot }}
        </div>
    </div>

</div>
