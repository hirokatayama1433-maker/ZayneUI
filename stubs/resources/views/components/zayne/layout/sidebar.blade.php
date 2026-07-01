<div
    class="zaynesidebar"
    data-mode="{{ $mode }}"
    data-collapse="{{ $collapse }}"
    style="flex: 1; min-height: 0; display: flex; flex-direction: column; gap: 8px; overflow-y: auto;"
    onscroll="sidebarScrollCheck(this)" 
>
    <aside style="
        display: flex;
        flex-direction: column;
        flex: 1;
        min-height: 0;
        overflow: hidden;
        position: relative;
        background: {{ $background }};
        padding: {{ $padding }};
        {{ $gap          ? 'gap: '                 . $gap          . ';' : 'gap: 8px;' }}
        {{ $radius       ? 'border-radius: '       . $radius       . ';' : '' }}
        {{ $radiustop    ? 'border-top-left-radius: '     . $radiustop    . '; border-top-right-radius: '    . $radiustop    . ';' : '' }}
        {{ $radiusbottom ? 'border-bottom-left-radius: '  . $radiusbottom . '; border-bottom-right-radius: ' . $radiusbottom . ';' : '' }}
        {{ $radiusleft   ? 'border-top-left-radius: '     . $radiusleft   . '; border-bottom-left-radius: '  . $radiusleft   . ';' : '' }}
        {{ $radiusright  ? 'border-top-right-radius: '    . $radiusright  . '; border-bottom-right-radius: ' . $radiusright  . ';' : '' }}
        {{ $shadow       ? 'box-shadow: '          . $shadow       . ';' : '' }}
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
    ">

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

        <div
            class="sidebar-scroll-indicator"
            style="flex-shrink: 0; display: flex; justify-content: center; align-items: center; height: 0; overflow: hidden; opacity: 0; transition: opacity 200ms ease, height 200ms ease; pointer-events: none; background: transparent;"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                style="opacity: 0.4; animation: zayne-bounce 1s infinite; color: var(--zayne-custom-sidebar-content);">
                <path d="M6 9l6 6 6-6"/>
            </svg>
        </div>

        @isset($footer)
            <div style="flex-shrink: 0; display: flex; flex-direction: column; gap: 8px;">{{ $footer }}</div>
        @endisset
        <script>
        function sidebarScrollCheck(el) {
    const indicator = el.parentElement.querySelector('.sidebar-scroll-indicator');
    if (!indicator) return;
    const overflows = el.scrollHeight > el.clientHeight + 1;
    const atBottom  = el.scrollTop + el.clientHeight >= el.scrollHeight - 4;
    const show      = overflows && !atBottom;
    indicator.style.opacity = show ? '1' : '0';
    indicator.style.height  = show ? '20px' : '0';
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.scrollbar-hide').forEach(el => {
        // Observe size changes on the scroll container itself
        new ResizeObserver(() => sidebarScrollCheck(el)).observe(el);
        // Observe size changes on its content
        new ResizeObserver(() => sidebarScrollCheck(el)).observe(el.firstElementChild || el);
        el.addEventListener('scroll', () => sidebarScrollCheck(el));
    });
});
    
        </script>

    </aside>
</div>

<button
    type="button"
    class="zayne-mobile-toggle"
    onclick="Zayne.Sidebar.toggle()"
    aria-label="Toggle sidebar"
>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke-width="1.5" stroke="currentColor" style="width:1.25rem;height:1.25rem;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
    </svg>
</button>

<button
    type="button"
    class="zayne-mobile-backdrop"
    onclick="Zayne.Sidebar.closeMobile()"
    aria-label="Close sidebar"
></button>
