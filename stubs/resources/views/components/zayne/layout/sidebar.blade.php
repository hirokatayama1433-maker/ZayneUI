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
    onscroll="sidebarScrollCheck(this)" 
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
        {{ $radius       ? 'border-radius: '       . $radius       . ';' : '' }}">

        @isset($header)
            <div style="flex-shrink: 0;">{{ $header }}</div>
        @endisset

        <div
            class="scrollbar-hide"
            style="flex: 1; min-height: 0; display: flex; flex-direction: column; gap: 8px; overflow-y: auto;"
            onscroll="sidebarScrollCheck(this)"
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