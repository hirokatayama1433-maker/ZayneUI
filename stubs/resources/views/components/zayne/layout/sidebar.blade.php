<div
    class="zaynesidebar"
    data-mode="{{ $mode }}"
    data-collapse="{{ $collapse }}"
    x-bind:class="{ 'is-open': mobileOpen }"
>
    <aside style="
        display: flex;
        flex-direction: column;
        flex: 1;
        overflow: hidden;
        gap: {{ $gap }};
        background: {{ $background }};
        padding: {{ $padding }};
        {{ $shadow       ? 'box-shadow: '          . $shadow       . ';' : '' }}
        {{ $radius       ? 'border-radius: '       . $radius       . ';' : '' }}
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
        {{ $bordercolor  ? 'border-color: '        . $bordercolor  . ';' : '' }}
    " {{ $attributes }}>

        @isset($header)
            <div class="zayne-sidebar-section">{{ $header }}</div>
        @endisset

        <div class="zayne-sidebar-body scrollbar-hide" onscroll="sidebarScrollCheck(this)">
            {{ $slot }}
        </div>

        <div class="sidebar-scroll-indicator" style="display:flex;justify-content:center;align-items:center;height:0;overflow:hidden;opacity:0;transition:opacity 200ms ease,height 200ms ease;flex-shrink:0;pointer-events:none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                style="opacity:0.4;color:var(--zayne-custom-sidebar-content);">
                <path d="M6 9l6 6 6-6"/>
            </svg>
        </div>

        @isset($footer)
            <div class="zayne-sidebar-section">{{ $footer }}</div>
        @endisset

    </aside>
</div>