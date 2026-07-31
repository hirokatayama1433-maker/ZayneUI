<header
    class="zayneheader"
    style="
        display: flex;
        flex-direction: row;
        position: relative;
        z-index: var(--zayne-z-shell-base);
        border-style: solid;
        border-width: 0;
        background: {{ $background }};
        {{ $padding      ? 'padding: '             . $padding      . ';' : '' }}
        {{ $gap          ? 'gap: '                 . $gap          . ';' : '' }}
        {{ $radius       ? 'border-radius: '       . $radius       . ';' : '' }}
        {{ $radiusbottom ? 'border-bottom-left-radius: '  . $radiusbottom . ';' : '' }}
        {{ $radiusbottom ? 'border-bottom-right-radius: ' . $radiusbottom . ';' : '' }}
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
        {{ $width        ? 'width: '               . $width        . ';' : '' }}
        {{ $height       ? 'height: '              . $height       . ';' : '' }}    
    "
    {{ $attributes }}
>
    {{-- Mobile sidebar toggle (far-left, visible only on mobile) --}}
    <button
        type="button"
        class="zayne-header-mobile-toggle"
        onclick="Zayne.Sidebar.toggleMobile()"
        aria-label="Toggle sidebar"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:1.25rem; height:1.25rem;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
        </svg>
    </button>

    @isset($left)
        <div class="zayne-header-left">{{ $left }}</div>
    @endisset

    <div class="zayne-header-center">
        <div class="zayne-header-center-track">
            {{ $slot }}
        </div>
    </div>

    @isset($right)
        <div class="zayne-header-right">{{ $right }}</div>
    @endisset
</header>