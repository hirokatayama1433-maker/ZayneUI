<div
    class="zaynesidebar"
    data-mode="{{ $mode ?? 'collapsible' }}"
    data-collapse="{{ $collapse ?? 'viewicons' }}"
    x-bind:class="{ 'is-open': mobileOpen }"
>
    <aside
        style="
            display: flex;
            flex-direction: column;
            flex: 1;
            overflow: hidden;
            gap: {{ $gap }};
            background: {{ $background }};
            padding: {{ $padding }};
            {{ $shadow    ? 'box-shadow: '       . $shadow    . ';' : '' }}
            {{ $radius    ? 'border-radius: '    . $radius    . ';' : '' }}
            {{ $margin    ? 'margin: '           . $margin    . ';' : '' }}
            {{ $margintop ? 'margin-top: '       . $margintop . ';' : '' }}
            {{ $marginbottom ? 'margin-bottom: ' . $marginbottom . ';' : '' }}
            {{ $marginleft   ? 'margin-left: '   . $marginleft   . ';' : '' }}
            {{ $marginright  ? 'margin-right: '  . $marginright  . ';' : '' }}
            {{ $border       ? 'border-width: '        . $border       . ';' : '' }}
            {{ $bordertop    ? 'border-top-width: '    . $bordertop    . ';' : '' }}
            {{ $borderbottom ? 'border-bottom-width: ' . $borderbottom . ';' : '' }}
            {{ $borderleft   ? 'border-left-width: '   . $borderleft   . ';' : '' }}
            {{ $borderright  ? 'border-right-width: '  . $borderright  . ';' : '' }}
            {{ $bordercolor  ? 'border-color: '        . $bordercolor  . ';' : '' }}
        "
        {{ $attributes }}
    >
        @isset($header)
            <div class="flex flex-col shrink-0">{{ $header }}</div>
        @endisset

        <div
            class="flex-1 flex flex-col overflow-y-auto scrollbar-hide"
            style="min-height: 0; gap: {{ $gap }};"
            onscroll="sidebarScrollCheck(this)"
        >
            {{ $slot }}
        </div>

        <div class="sidebar-scroll-indicator pointer-events-none"
            style="display:flex;justify-content:center;align-items:center;height:0;overflow:hidden;opacity:0;transition:opacity 200ms ease,height 200ms ease;flex-shrink:0;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                style="opacity:0.4;animation:sidebar-bounce 1.2s ease-in-out infinite;color:var(--zayne-custom-sidebar-content);">
                <path d="M6 9l6 6 6-6"/>
            </svg>
        </div>

        @isset($footer)
            <div class="flex flex-col shrink-0 gap-2">{{ $footer }}</div>
        @endisset

    </aside>
</div>