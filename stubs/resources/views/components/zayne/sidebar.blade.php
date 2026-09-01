@once
    <style>
        /* ── Sidebar ── */
        .zaynesidebar {
            grid-area: sidebar;
            display: flex;
            flex-direction: column;
            min-height: 0;
            overflow: visible;
            position: relative;
            z-index: var(--zayne-z-shell-elevated);
        }

        .zaynesidebar aside {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-height: 0;
            width: var(--sidebar-expanded-w);
            transition: none;
            overflow: visible;
        }

        html.sidebar-ready .zaynesidebar aside {
            transition: width var(--layout-transition);
        }

        html.sidebar-collapsed .zaynesidebar[data-collapse="viewicons"] aside {
            width: var(--sidebar-collapsed-w);
        }

        html.sidebar-collapsed .zaynesidebar[data-collapse="full"] aside {
            width: 0;
            padding: 0 !important;
            border: none !important;
        }

        .zayne-sidebar-section {
            flex-shrink: 0;
        }

        .zayne-sidebar-body {
            display: flex;
            flex: 1;
            flex-direction: column;
            gap: 0.25rem;
            min-height: 0;
            overflow-y: auto;
        }

        /* ── Collapse: hide text/labels ── */
        /* zayne-sb-text: any span that should vanish when collapsed */
        .zayne-sb-text {
            white-space: nowrap;
            overflow: hidden;
            transition: none;
        }

        html.sidebar-ready .zayne-sb-text {
            transition: opacity var(--layout-transition), max-width var(--layout-transition);
        }

        html.sidebar-collapsed .zayne-sb-text {
            opacity: 0;
            max-width: 0;
            pointer-events: none;
        }

        /* sidebar-label: the section-group label text (MODULES, etc.) */
        .sidebar-label {
            white-space: nowrap;
            overflow: hidden;
            transition: none;
        }

        html.sidebar-ready .sidebar-label {
            transition: opacity var(--layout-transition), max-width var(--layout-transition);
        }

        html.sidebar-collapsed .sidebar-label {
            opacity: 0;
            max-width: 0;
            pointer-events: none;
        }

        /* sidebar-divider: the line that appears in collapsed state */
        .sidebar-divider {
            display: none;
        }

        html.sidebar-collapsed .sidebar-divider {
            display: block;
            opacity: 1;
            max-height: 1px;
        }

        .zayne-mobile-backdrop {
            display: none;
        }

        @media (max-width: 768px) {
            html.sidebar-mobile-open,
            html.sidebar-mobile-open body {
                overflow: hidden;
            }

            .zayne-mobile-backdrop {
                position: fixed;
                inset: 0;
                z-index: 2;
                background: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(4px);
                -webkit-backdrop-filter: blur(4px);
                border: 0;
                padding: 0;
                appearance: none;
            }

            html.sidebar-mobile-open .zayne-mobile-backdrop {
                display: block;
            }

            .zaynesidebar {
                grid-area: auto;
                position: fixed;
                inset: 0 auto 0 0;
                width: min(86vw, var(--sidebar-expanded-w)) !important;
                height: 100dvh;
                z-index: var(--zayne-z-drawer);
                flex: none !important;
                min-height: auto !important;
                overflow: visible !important;
                gap: 0 !important;
                border: 0 !important;
                box-shadow: 0px 0px !important;
                pointer-events: none;
            }

            .zaynesidebar aside {
                width: 100%;
                height: 100%;
                transform: translateX(-100%);
                transition: transform 260ms var(--ease-out-smooth);
            }

            html.sidebar-mobile-open .zaynesidebar {
                pointer-events: auto;
            }

            html.sidebar-mobile-open .zaynesidebar aside,
            html.sidebar-mobile-open .zaynesidebar[data-collapse="viewicons"] aside,
            html.sidebar-mobile-open .zaynesidebar[data-collapse="full"] aside {
                width: min(86vw, var(--sidebar-expanded-w)) !important;
                padding: var(--zayne-sidebar-mobile-padding, 10px) !important;
            }

            html.sidebar-mobile-open .zaynesidebar aside {
                transform: translateX(0);
            }

            /* restore all collapsible text on mobile when open */
            html.sidebar-mobile-open .zayne-sb-text,
            html.sidebar-mobile-open .sidebar-label {
                opacity: 1 !important;
                max-width: none !important;
                pointer-events: auto !important;
            }

            html.sidebar-mobile-open .sidebar-labelwrap {
                padding: 0 !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
            }

            html.sidebar-mobile-open .sidebar-divider {
                opacity: 0 !important;
                max-height: 0 !important;
            }

            html.sidebar-mobile-open .sidebar-toggle-icon-collapsed {
                opacity: 0 !important;
            }

            html.sidebar-mobile-open .sidebar-toggle-icon-expanded {
                opacity: 1 !important;
            }

            .zayne-mobile-toggle {
                display: flex;
                position: fixed;
                bottom: 1.5rem;
                left: 1.5rem;
                z-index: var(--zayne-z-mobile-toggle);
                width: 48px;
                height: 48px;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                border: none;
                padding: 0;
                appearance: none;
                cursor: pointer;
                box-shadow: var(--zayne-custom-layout-shadow);
                background: var(--zayne-color-primary);
                color: var(--zayne-color-primary-content);
            }

            html:not(.sidebar-mobile-open) .zayne-mobile-backdrop {
                display: none;
            }
        }

        /* ── Sidebar edge toggle ── */
        .zayne-sidebar-edge-toggle {
            position: absolute;
            right: -13px;
            top: 13px;
            width: 25px;
            height: 25px;
            border-radius: 25%;
            background: var(--zayne-color-base-100);
            border: 1px solid var(--zayne-color-base-border);
            color: var(--zayne-color-base-content);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            box-shadow: var(--zayne-shadow);
            transition: right var(--layout-transition), background 150ms ease;
            padding: 0;
            appearance: none;
        }

        .zayne-sidebar-edge-toggle:hover {
            background: var(--zayne-color-base-200);
            border-color: var(--zayne-color-primary);
            color: var(--zayne-color-primary);
        }

        .zayne-sidebar-edge-toggle-icon {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
            transition: transform var(--layout-transition);
        }

        html:not(.sidebar-collapsed) .zayne-sidebar-edge-toggle-icon {
            transform: rotate(180deg);
        }

        @media (max-width: 768px) {
            .zayne-sidebar-edge-toggle {
                display: none;
            }
        }
    </style>
@endonce

<div
    class="zaynesidebar"
    data-mode="{{ $mode }}"
    data-collapse="{{ $collapse }}"
    style="flex: 1; min-height: 0; display: flex; flex-direction: column; gap: 8px; overflow: visible; border-style: solid;
        {{ $shadow       ? 'box-shadow: '          . $shadow       . ';' : '' }}
        {{ $radius       ? 'border-radius: '       . $radius       . ';' : '' }}
        {{ $radiustop    ? 'border-top-left-radius: '     . $radiustop    . '; border-top-right-radius: '    . $radiustop    . ';' : '' }}
        {{ $radiusbottom ? 'border-bottom-left-radius: '  . $radiusbottom . '; border-bottom-right-radius: ' . $radiusbottom . ';' : '' }}
        {{ $radiusleft   ? 'border-top-left-radius: '     . $radiusleft   . '; border-bottom-left-radius: '  . $radiusleft   . ';' : '' }}
        {{ $radiusright  ? 'border-top-right-radius: '    . $radiusright  . '; border-bottom-right-radius: ' . $radiusright  . ';' : '' }}
        {{ $margin       ? 'margin: '              . $margin       . ';' : '' }}
        {{ $margintop    ? 'margin-top: '          . $margintop    . ';' : '' }}
        {{ $marginbottom ? 'margin-bottom: '       . $marginbottom . ';' : '' }}
        {{ $marginleft   ? 'margin-left: '         . $marginleft   . ';' : '' }}
        {{ $marginright  ? 'margin-right: '        . $marginright  . ';' : '' }}
        {{ $border       ? 'border-width: '        . $border       . ';' : '' }}
        {{ $bordertop    ? 'border-top-width: '    . $bordertop    . ';' : '' }}
        {{ $borderbottom ? 'border-bottom-width: ' . $borderbottom . ';' : '' }}
        {{ $borderleft   ? 'border-left-width: '   . $borderleft   . ';' : '' }}
        {{ $borderright  ? 'border-right-width: '  . $borderright  . ';' : '' }}
        {{ $bordercolor  ? 'border-color: '        . $bordercolor  . ';' : '' }}"
    onscroll="zayneSidebarScrollCheck(this)"
>
    <aside style="
        display: flex;
        flex-direction: column;
        flex: 1;
        min-height: 0;
        overflow: hidden;
        position: relative;
        z-index: var(--zayne-z-shell-elevated);
        border-style: solid;
        border-width: 0;
        background: {{ $background }};
        padding: {{ $padding }};
        {{ $gap ? 'gap: ' . $gap . ';' : 'gap: 8px;' }}
        {{ $radius ? 'border-radius: ' . $radius . ';' : '' }}">

        @isset($header)
            <div style="flex-shrink: 0;">{{ $header }}</div>
        @endisset

        <div
            class="scrollbar-hide"
            style="flex: 1; min-height: 0; display: flex; flex-direction: column; gap: 8px; overflow-y: auto;"
            onscroll="zayneSidebarScrollCheck(this)"
        >
            {{ $slot }}
        </div>

        @isset($footer)
            <div style="flex-shrink: 0;">{{ $footer }}</div>
        @endisset
    </aside>

    {{-- Mobile backdrop --}}
    <button
        type="button"
        class="zayne-mobile-backdrop"
        onclick="Zayne.Sidebar.closeMobile()"
        aria-label="Close sidebar"
    ></button>

    @if($mode === 'collapsible')
        <button
            type="button"
            class="zayne-sidebar-edge-toggle"
            onclick="Zayne.Sidebar.toggle()"
            aria-label="Toggle sidebar"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2.5"
                stroke="currentColor"
                class="zayne-sidebar-edge-toggle-icon"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    @endif
</div>