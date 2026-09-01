@once
    <style>
        .zaynenavtree {
            display: flex;
            flex-direction: column;
        }

        .zaynenavtree .navtree-items .zayne-navitem-no-icon > a,
        .zaynenavtree .navtree-items .zayne-navitem-no-icon > button,
        .zayne-navtree-flyout .zayne-navitem-no-icon > a,
        .zayne-navtree-flyout .zayne-navitem-no-icon > button {
            padding-left: 10px !important;
        }

        .zaynenavtree.navtree-open .navtree-chevron {
            transform: rotate(180deg);
        }

        /* Flyout is teleported outside the sidebar but still matches collapsed text-hide rules */
        html.sidebar-collapsed .zayne-navtree-flyout .zayne-sb-text {
            opacity: 1;
            max-width: none;
            pointer-events: auto;
        }
    </style>
@endonce

@include('zayne::_zayne-dropdown-alpine')

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
                show($refs.trigger, _panel);
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
                show($refs.trigger, _panel);
                return;
            }

            const tree = $el.closest('.zaynenavtree');
            const items = tree.querySelector('.navtree-items');
            const chevron = tree.querySelector('.navtree-chevron');
            const isOpen = tree.classList.contains('navtree-open');
            const nextOpen = !isOpen;

            if (nextOpen) {
                items.style.maxHeight = items.scrollHeight + 'px';
                items.style.opacity = '1';
                chevron.style.transform = 'rotate(180deg)';
                tree.classList.add('navtree-open');
            } else {
                items.style.maxHeight = '0px';
                items.style.opacity = '0';
                chevron.style.transform = 'rotate(0deg)';
                tree.classList.remove('navtree-open');
            }
        "
    >
        <div style="flex-shrink:0; width:38px; height:38px; display:flex; justify-content:center; align-items:center;">
            <zayne:icon name="{{ $icon }}" size="18px"/>
        </div>

        <span class="zayne-sb-text" style="font-size:0.875rem; flex:1; text-align:left; display:flex; align-items:center; min-width:0;">
            {{ $resolvedLabel }}
        </span>

        <span class="zayne-sb-text" style="display:flex; align-items:center; padding-right:0.75rem;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor"
                class="navtree-chevron"
                style="width:0.75rem; height:0.75rem; transition:transform 280ms cubic-bezier(0.4,0,0.2,1); transform:rotate(0deg);">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </span>
    </button>

    {{-- Expanded in-place children --}}
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

    {{--
        Collapsed flyout — teleported to <body> to escape sidebar overflow clipping.
        registerPanel() hands the DOM node back because $refs don't cross teleport boundaries.
    --}}
    <template x-teleport="body">
        <div
            x-init="registerPanel($el)"
            class="zayne-navtree-flyout"
            x-show="open && document.documentElement.classList.contains('sidebar-collapsed')"
            x-cloak
            data-zayne-placement="right-start"
            data-zayne-hover-group="sidebar-navtree"
            x-on:mouseenter="cancelHide(); show($refs.trigger, _panel)"
            x-on:mouseleave="hideSoon(220)"
            x-on:click.outside="hide()"
            x-on:click.stop
            x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
            style="
                position: fixed;
                z-index: var(--zayne-z-dropdown);
                min-width: 200px;
                background: var(--zayne-color-base-100);
                border-radius: var(--zayne-radius-box);
                border: 1px solid var(--zayne-color-base-border);
                box-shadow: var(--zayne-shadow);
                overflow: hidden;
            "
        >
            <div style="padding:0.5rem 0.75rem; font-size:0.7rem; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:var(--zayne-color-base-content); opacity:0.5; border-bottom:1px solid var(--zayne-color-base-border);">
                {{ $resolvedLabel }}
            </div>
            <div
                style="padding:0.375rem; display:flex; flex-direction:column; gap:4px;"
                x-on:click="hide()"
            >
                {{ $slot }}
            </div>
        </div>
    </template>
</div>
